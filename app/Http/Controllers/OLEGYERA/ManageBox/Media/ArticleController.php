<?php

namespace Fresh\Medpravda\Http\Controllers\OlEGYERA\ManageBox\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Fresh\Medpravda\DepTerm;

use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaArticleDep;
use Fresh\Medpravda\MediaArticleSetting;
//use Fresh\Medpravda\MediaArticleContentRu;
//use Fresh\Medpravda\MediaArticleContentUa;
use Fresh\Medpravda\MediaArticleContent;

use Fresh\Medpravda\MediaArticleComment;

use Fresh\Medpravda\Repositories\MediaRepository;


class ArticleController extends ApiController{

    private $repository;

    public function __construct(MediaArticle $article, MediaArticleDep $dep, MediaArticleSetting $set, MediaArticleContent $content)
    {
        $this->repository = new MediaRepository(new MediaArticle());

        $this->article = $article;
        $this->dep = $dep;
        $this->set = $set;
        $this->content = $content;
    }


    protected function getArticles(Request $request){
        return response()->json(['articles' => $this->repository->search($request, true, 'desc', null, $request->filter,  false), 'count' => MediaArticle::count()], 200);
    }

    protected function getArticle($alias){
        return $this->repository->getArticleGroupAlias($alias);
    }

    protected function deleteArticle($id){
        $article = MediaArticle::findOrFail($id);
        $article->content->delete();
        $article->dependency->delete();
        $article->setting->delete();

        $article->delete();
        return response()->json(true, 200);
    }

    protected function verifyArticle(Request $request){
        $article = MediaArticle::where($request->item_name, $request->item)->first();
        if(!empty($article)){
            return response()->json('Статья с таким названием уже существует.', 409);
        }
        else{
            if(mb_strlen($request->item) <= 0){
                return response()->json('Название не может быть пустым.', 422);
            }
            if(mb_strlen($request->item) >= 200){
                return response()->json('Название не должно превышать 200 символов.', 422);
            }
            return response()->json(true, 200);
        }
    }

    protected function createArticle(Request $request){
        $response = $this->article->create([
            'title' => $request->title,
            'utitle' => $request->utitle,
            'alias' => $this->createAlias($request->title),
        ]);

        $this->set->create(['id' => $response->id]);
        $this->dep->create(['id' => $response->id, 'image_id' => 1, 'editor_id' => \Auth::user()->id]);
        $this->content->create(['media_article_id' => $response->id]);
        return response()->json($response);
    }

    protected function updateArticleTitle(Request $request, $alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(!empty($article)){
            if(empty(MediaArticle::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->title) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $article->update(
                    [
                        'title' => $request->title,
                    ]
                );
                return response()->json($this->repository->getAcrossAlias($alias, true), 200);
            }else{
                return response()->json(['errors' => ['title' => ['Бад с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateArticleUTitle(Request $request, $alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(!empty($article)){
            if(empty(MediaArticle::where('utitle', $request->utitle)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->utitle) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->utitle) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $article->update(
                    [
                        'utitle' => $request->utitle,
                    ]
                );
                return response()->json($this->repository->getAcrossAlias($alias, true), 200);
            }else{
                return response()->json(['errors' => ['utitle' => ['Бад с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

//    protected function switchArticleSetting(Request $request, $alias){
//        $article = MediaArticle::where('alias', $alias)->first();
//        if(!empty($article)){
//            $article->setting->update([$request->category => $request->switch]);
//            return response()->json($this->repository->getAcrossAlias($alias, true), 200);
//        }
//        else{
//            return response()->json(false, 404);
//        }
//    }

    protected function updateArticleImage(Request $request, $alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(!empty($article)){
            if(empty($request->id)){
                $article->dependency->update(['image_id' => 1]);
            }else{
                $article->dependency->update(['image_id' => $request->id[0]]);
            }
            return response()->json($this->repository->getAcrossAlias($alias, true), 200);
        }
        else{
            return response()->json(false, 404);
        }
    }


    protected function getArticleColumn($alias, $type, $column){
        $article_col = '';
        switch ($type){
            case 'ru':
                $article_col = $this->VerifyTerms(MediaArticle::where('alias', $alias)->first()->contentRu[$column], 'ru', $alias, $type, $column);
                break;
            case 'ua':
                $article_col = $this->VerifyTerms(MediaArticle::where('alias', $alias)->first()->contentUa[$column], 'ua', $alias, $type, $column);
                break;
        }
        return response()->json(['trext' => $article_col], 200);
    }

    protected function updateArticleColumn(Request $request, $alias, $type, $column){
        return response()->json($this->UpdateArticleColumnScript($request->new_data, $alias, $type, $column), 200);
    }

    protected function UpdateArticleColumnScript($new_data, $alias, $type, $column){
        switch ($type){
            case 'ru':
                return  MediaArticle::where('alias', $alias)->first()->contentRu->update([$column => $new_data]);
                break;
            case 'ua':
                return  MediaArticle::where('alias', $alias)->first()->contentUa->update([$column => $new_data]);
                break;
        }
    }


    private function VerifyTerms($instruction, $lang, $alias, $type, $column){
        $exploded_strings = explode('-term', $instruction);
        $terms_id_array = [];
        $terms_title_array = [];
        //collect term`s id
        foreach ($exploded_strings as $exploded_string){
            if(strpos($exploded_string, 'href="#') != false){
                array_push($terms_id_array, explode('href="#', $exploded_string)[1]);
            }
        }
        $terms_id_array = array_unique($terms_id_array);
        //collect term`s title
        foreach ($terms_id_array as $id){
            $exploded_string = explode('<a href="#' . $id . '-term">', $instruction)[1];
            $exploded_string = explode('</a>', $exploded_string)[0];
            $terms_title_array = Arr::add($terms_title_array, $id, $exploded_string);
        }

        //shape instruction
        $count_changes = 0;
        foreach ($terms_title_array as $key => $item){
            $finded_term = DepTerm::find($key);
            if(!empty($finded_term)){
                $term_title = $lang == 'ru' ? $finded_term->title : $finded_term->utitle;
                if($term_title != $item){
                    $instruction = str_ireplace('<a href="#' . $key . '-term">' . $item . '</a>', '<a href="#' . $key . '-term">' . $term_title . '</a>', $instruction);
                    $count_changes++;
                }
            }
            else{
                $instruction = str_ireplace('<a href="#' . $key . '-term">' . $item . '</a>', '', $instruction);
                $count_changes++;
            }
        }

        if($count_changes != 0){
            $this->UpdateArticleColumnScript($instruction, $alias, $type, $column);
        }
        return $instruction;
    }






}
