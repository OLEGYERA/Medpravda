<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\MediaArticleContentBlock;
use Illuminate\Support\Arr;

use Fresh\Medpravda\DepTerm;
use Fresh\Medpravda\MediaArticle;
use Fresh\Medpravda\MediaStructureBlock;
use Illuminate\Http\Request;

class ArticleContentController extends ApiController
{
    private $article_instruction;

    protected function getArticleContent($alias, $lang){
        $article = MediaArticle::where('alias', $alias)->first();
        switch ($lang){
            case 'ru':
                $this->article_instruction = $article->content->ru;
                break;
            case 'ua':
                $this->article_instruction = $article->content->ua;
                break;
        }
         return response()->json(['trext' => $this->article_instruction], 200);
    }

    protected function updateArticleContent(Request $request, $alias, $lang){
        return response()->json(MediaArticle::where('alias', $alias)->first()->content->update([$lang => $request->new_data]));
    }


    protected function getArticleContentBlockList($alias, $lang){
        $article = MediaArticle::where('alias', $alias)->first();
        $blocks = [];
        switch ($lang){
            case 'ru':
                $blocks = $article->dependency->structure->blocks()->select(['id as value', 'title as name'])->get();
                break;
            case 'ua':
                $blocks = $article->dependency->structure->blocks()->select(['id as value', 'utitle as name'])->get();
                break;
        }
        return response()->json(['blocks' => $blocks], 200);
    }

    protected function getArticleContentBlockInstruction($alias, $block_id, $lang){
        $article = MediaArticle::where('alias', $alias)->first();
        $instruction = MediaArticleContentBlock::where('block_id', $block_id)->where('article_id', $article->id)->first();
        if($instruction === null){
            $instruction = (new MediaArticleContentBlock)->create([
                'block_id' => $block_id,
                'article_id' => $article->id
            ]);
        }

        switch ($lang){
            case 'ru':
                $this->article_instruction = $instruction->ru;
                break;
            case 'ua':
                $this->article_instruction = $instruction->ua;
                break;
        }

        return response()->json(['trext' => $this->article_instruction], 200);
    }


    protected function updateArticleContentBlockInstruction(Request $request, $alias, $block_id, $lang){
        $article = MediaArticle::where('alias', $alias)->first();
        $instruction = MediaArticleContentBlock::where('block_id', $block_id)->where('article_id', $article->id)->first();
        return response()->json($instruction->update([$lang => $request->new_data]));
    }

}
