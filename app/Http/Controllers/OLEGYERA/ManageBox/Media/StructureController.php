<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Media;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\MediaStructure;
use Fresh\Medpravda\MediaStructureBlock;
use Fresh\Medpravda\MediaStructureSetting;
use Fresh\Medpravda\Repositories\MediaRepository;
use Fresh\Medpravda\MediaArticleContentBlock;


class StructureController extends ApiController
{
    /**
     * @var MediaStructure
     */
    private $structure;
    /**
     * @var MediaRepository
     */
    private $repository;
    /**
     * @var MediaStructureSetting
     */
    private $setting;

    public function __construct(MediaStructure $structure, MediaStructureSetting $setting)
    {
        $this->structure = $structure;
        $this->setting = $setting;
        $this->repository = new MediaRepository(new MediaStructure());
    }

    protected function search(Request $request){
        $structures = MediaStructure::where('title', 'like', '%' . $request->search . '%')->orWhere('alias', 'like', '%' . $request->search . '%')->orderBy('updated_at', 'desc')->take(30)->get();
        return response()->json($structures, 200);
    }

    protected function verifyStructure(Request $request){
        $media = MediaStructure::where($request->item_name, $request->item)->first();
        if(!empty($media)){
            return response()->json('Структура с таким названием уже существует.', 409);
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

    protected function createStructure(Request $request){

        $response = $this->structure->create([
            'title' => $request->title,
            'alias' => $this->createAlias($request->title),
        ]);

        $this->setting->create([
            'media_structure_id' => $response->id,
        ]);
        return response()->json($response, 200);


    }

    protected function getStructures(Request $request, $layer = null){
        $structures = $this->repository->search($request, true, 'desc', null, $request->filter, false);
        return response()->json(['structures' => $structures, 'count' => MediaStructure::count()], 200);
    }

    protected function getStructure($alias){
        return $this->repository->getGroupAlias($alias);
    }


    protected function getStructureBlocks($alias){
        return MediaStructure::where('alias', $alias)->first()->blocks;
//        ()->orderBy('created_at', 'desc')->get()
    }

    protected function createStructureBlock(Request $request, $alias){
        $mediaStructure = MediaStructure::where('alias', $alias)->first();
        return (new MediaStructureBlock())->create(['media_structure_id' => $mediaStructure->id, 'required' => false, 'title' => $request->ru, 'utitle' => $request->ua]);
    }

    protected function deleteStructureBlock($id){
        $instructions = MediaArticleContentBlock::where('block_id', $id)->get();
        foreach ($instructions as $instruction){
            $instruction->delete();
        }
        MediaStructureBlock::find($id)->delete();
        return response()->json(true, 200);
    }



    protected function updateStructureTitle(Request $request, $alias){
        $media = MediaStructure::where('alias', $alias)->first();
        if(!empty($media)){
            if(empty(MediaStructure::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->title) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $media->update(
                    [
                        'title' => $request->title,
                        'alias' => $this->createAlias($request->title),
                    ]
                );
                return response()->json(['structure' => $media]);
            }else{
                return response()->json(['errors' => ['title' => ['Препарат с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function SwitchStructureSetting(Request $request, $alias){
        $mediaSetting = MediaStructure::where('alias', $alias)->first()->setting;
        if(!empty($mediaSetting)){
                $mediaSetting->update([$request->category => $request->switch]);
                return response()->json($mediaSetting);
        }
        else{
            return response()->json(false, 404);
        }
    }






}
