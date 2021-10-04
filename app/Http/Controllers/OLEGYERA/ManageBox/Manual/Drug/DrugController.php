<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Drug;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\DrugLabel;
use Fresh\Medpravda\DrugSetting;
use Fresh\Medpravda\DrugInstruction;
use Fresh\Medpravda\DrugInstructionUa;
use Fresh\Medpravda\DrugInstructionAdaptive;
use Fresh\Medpravda\DrugDepSubstance;
use Fresh\Medpravda\DrugInstructionAdaptiveUa;
use Fresh\Medpravda\DrugDep;
use Fresh\Medpravda\Repositories\ManualRepository;

class DrugController extends ApiController
{
    private $repository;

    public function __construct(DrugSetting $setting, Drug $drug, DrugDep $drug_dep, DrugInstruction $drug_instruction, DrugInstructionUa $drug_instruction_u, DrugInstructionAdaptive  $drug_instruction_adaptive, DrugInstructionAdaptiveUa  $drug_instruction_adaptive_u, DrugDepSubstance $drug_dep_substance, DrugLabel $drug_label)
    {
        $this->repository = new ManualRepository(new Drug());

        $this->setting = $setting;
        $this->drug = $drug;
        $this->drug_dep = $drug_dep;
        $this->drug_dep_substance = $drug_dep_substance;
        $this->drug_i = $drug_instruction;
        $this->drug_i_u = $drug_instruction_u;
        $this->drug_i_a = $drug_instruction_adaptive;
        $this->drug_i_a_u = $drug_instruction_adaptive_u;
        $this->drug_label = $drug_label;
    }


    protected function getDrugs(Request $request){
        return response()->json(['drugs' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => Drug::count()], 200);
    }

    protected function getDrug($alias){
        return $this->repository->getAcrossAlias($alias);
    }

    protected function verifyDrug(Request $request){
        $drug = Drug::where($request->item_name, $request->item)->first();
        if(!empty($drug)){
            return response()->json('Препарат с таким названием уже существует.', 409);
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

    protected function createDrug(Request $request){
        $settings = $this->setting->create();
        $response = $this->drug->create([
            'title' => $request->title,
            'utitle' => $request->utitle,
            'alias' => $this->createAlias($request->title),
            'image_id' => 1,
            'setting_id' => $settings->id,
            'creator_id' => \Auth::user()->id
        ]);
        $drug_dep = $this->drug_dep->create([
            'drug_id' => $response->id,
        ]);

        $this->drug_i->create(['drug_id' => $response->id]);
        $this->drug_i_u->create(['drug_id' => $response->id]);
        $this->drug_i_a->create(['drug_id' => $response->id]);
        $this->drug_i_a_u->create(['drug_id' => $response->id]);


        return response()->json($response);
    }

    protected function updateDrugImage(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            if(empty($request->id)){
                $drug->update(['image_id' => 1]);
            }else{
                $drug->update(['image_id' => $request->id[0]]);
            }
            return response()->json(['drug' => $drug, 'image' => $drug->image]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function deleteDrug($id){
        $drug = Drug::findOrFail($id);
        $drug->instruction->delete();
        $drug->instruction_adaptive->delete();
        $drug->instruction_ua->delete();
        $drug->instruction_adaptive_ua->delete();

        foreach ($drug->dependency->substances as $item){
            $item->delete();
        }

        $drug->dependency->delete();
        $setting_mem = $drug->setting;
        $drug->delete();
        $setting_mem->delete();
        return response()->json(true, 200);
    }

    protected function updateDrugTitle(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            if(empty(Drug::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->title) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $drug->update(
                    [
                        'title' => $request->title,
                    ]
                );
                return response()->json(['drug' => $drug]);
            }else{
                return response()->json(['errors' => ['title' => ['Препарат с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateDrugUTitle(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            if(empty(Drug::where('utitle', $request->utitle)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->utitle) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->utitle) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $drug->update(
                    [
                        'utitle' => $request->utitle,
                    ]
                );
                return response()->json(['drug' => $drug]);
            }else{
                return response()->json(['errors' => ['utitle' => ['Препарат с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateDrugDosage(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            $dosage = $request->dosage;
            if(mb_strlen($request->dosage) >= 200){
                return response()->json(['errors' => ['dosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $drug->update(
                [
                    'dosage' => $dosage,
                ]
            );
            return response()->json(['drug' => $drug]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateDrugUDosage(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            $udosage = $request->udosage;
            if(mb_strlen($request->udosage) >= 200){
                return response()->json(['errors' => ['udosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $drug->update(
                [
                    'udosage' => $udosage,
                ]
            );
            return response()->json(['drug' => $drug]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateDrugRegistration(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            $registration = $request->registration;
            if(mb_strlen($request->registration) >= 200){
                return response()->json(['errors' => ['registration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $drug->update(
                [
                    'registration' => $registration,
                ]
            );
            return response()->json(['drug' => $drug]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateDrugURegistration(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            $uregistration = $request->uregistration;
            if(mb_strlen($request->uregistration) >= 200){
                return response()->json(['errors' => ['uregistration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $drug->update(
                [
                    'uregistration' => $uregistration,
                ]
            );
            return response()->json(['drug' => $drug]);
        }
        else{
            return response()->json(false, 404);
        }
    }



    protected function SwitchDrugSetting(Request $request, $alias){
        $drug = Drug::where('alias', $alias)->first();
        if(!empty($drug)){
            if($request->category == 'show'){
                $drug->update([$request->category => $request->switch]);
                return response()->json(['drug' => $drug]);
            }else{
                $drug->setting->update([$request->category => $request->switch]);
                return response()->json(['setting' => $drug->setting]);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function createDrugLabel(Request $request, $id){
        return $this->drug_label->create(['drug_id' => $id, 'title' => $request->ua, 'utitle' => $request->ru]);
    }

    protected function deleteDrugLabel($id){
        DrugLabel::find($id)->delete();
        return response()->json(true, 200);
    }

    protected function getDrugLabels($id){
        return DrugLabel::where('drug_id', $id)->orderBy('created_at', 'desc')->get();
    }
}
