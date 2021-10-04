<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Fresh\Medpravda\MediaArticle;

//use Fresh\Medpravda\DepForm;
//use Fresh\Medpravda\DepSubstance;
//use Fresh\Medpravda\DepPharma;
//use Fresh\Medpravda\DepATX;
//use Fresh\Medpravda\DepTag;
//use Fresh\Medpravda\DepFabricatorLocation;
//use Fresh\Medpravda\ArticleDepSubstance;
//use Fresh\Medpravda\ArticleDepTag;

use Fresh\Medpravda\MediaCategory;
use Fresh\Medpravda\MediaStructure;
//use Fresh\Medpravda\DepInname;
use Illuminate\Http\Request;

class ArticleDependencyController extends ApiController
{


    protected function getArticleDependency(Request $request, $alias){
        $article = MediaArticle::where('alias', $alias)->first();
        if(!empty($article)){
            $category = $article->dependency->category;
            $structure = $article->dependency->structure;
            if($structure){
                $structure->setting;
            }

            return response()->json([
                'article_category' => $category,
                'article_structure' => $structure,

                'article_dep_have' => [
                    'categories' => (MediaCategory::count() != 0),
                    'structures' => (MediaStructure::count() != 0)
                ],

            ]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateArticleCategory(Request $request, $alias){
        $article = MediaArticle::where('alias', $alias)->first();
        $article->dependency->update(['category_id' => $request->data['id']]);
        return response()->json($article->dependency->category);
    }

    protected function updateArticleStructure(Request $request, $alias){
        $article = MediaArticle::where('alias', $alias)->first();
        $article->dependency->update(['structure_id' => $request->data['id']]);
        $structure = $article->dependency->structure;
        if($structure){
            $structure->setting;
        }
        return response()->json($structure);
    }
}
