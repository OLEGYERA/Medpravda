<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Bad;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Http\Request;

use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\BadSetting;
use Fresh\Medpravda\BadInstruction;
use Fresh\Medpravda\BadInstructionUa;
use Fresh\Medpravda\BadInstructionAdaptive;
use Fresh\Medpravda\BadInstructionAdaptiveUa;
use Fresh\Medpravda\BadDep;
use Fresh\Medpravda\Repositories\ManualRepository;

class BadController extends ApiController
{
    private $repository;

    public function __construct(BadSetting $setting, BadNew $bad, BadDep $bad_dep, BadInstruction $bad_instruction, BadInstructionUa $bad_instruction_u, BadInstructionAdaptive  $bad_instruction_adaptive, BadInstructionAdaptiveUa  $bad_instruction_adaptive_u)
    {
        $this->repository = new ManualRepository(new BadNew());

        $this->setting = $setting;
        $this->bad = $bad;
        $this->bad_dep = $bad_dep;
        $this->bad_i = $bad_instruction;
        $this->bad_i_u = $bad_instruction_u;
        $this->bad_i_a = $bad_instruction_adaptive;
        $this->bad_i_a_u = $bad_instruction_adaptive_u;
    }


    protected function getBads(Request $request){
        return response()->json(['bads' => $this->repository->search($request, true, 'desc', null, $request->filter), 'count' => BadNew::count()], 200);
    }

    protected function getBad($alias){
        return $this->repository->getAcrossAlias($alias);
    }

    protected function verifyBad(Request $request){
        $bad = BadNew::where($request->item_name, $request->item)->first();
        if(!empty($bad)){
            return response()->json('Бад с таким названием уже существует.', 409);
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

    protected function createBad(Request $request){
        $settings = $this->setting->create();
        $response = $this->bad->create([
            'title' => $request->title,
            'utitle' => $request->utitle,
            'alias' => $this->createAlias($request->title),
            'image_id' => 1,
            'setting_id' => $settings->id,
            'creator_id' => \Auth::user()->id
        ]);
        $bad_dep = $this->bad_dep->create([
            'bad_id' => $response->id,
        ]);

        $this->bad_i->create(['bad_id' => $response->id]);
        $this->bad_i_u->create(['bad_id' => $response->id]);
        $this->bad_i_a->create(['bad_id' => $response->id]);
        $this->bad_i_a_u->create(['bad_id' => $response->id]);


        return response()->json($response);
    }

    protected function updateBadImage(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            if(empty($request->id)){
                $bad->update(['image_id' => 1]);
            }else{
                $bad->update(['image_id' => $request->id[0]]);
            }
            return response()->json(['bad' => $bad, 'image' => $bad->image]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function deleteBad($id){
        $bad = BadNew::findOrFail($id);
        $bad->instruction->delete();
        $bad->instruction_adaptive->delete();
        $bad->instruction_ua->delete();
        $bad->instruction_adaptive_ua->delete();

        $bad->dependency->delete();
        $setting_mem = $bad->setting;
        $bad->delete();
        $setting_mem->delete();
        return response()->json(true, 200);
    }

    protected function updateBadTitle(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            if(empty(BadNew::where('title', $request->title)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->title) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->title) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $bad->update(
                    [
                        'title' => $request->title,
                    ]
                );
                return response()->json(['bad' => $bad]);
            }else{
                return response()->json(['errors' => ['title' => ['Бад с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateBadUTitle(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            if(empty(BadNew::where('utitle', $request->utitle)->where('alias', '!=', $alias)->first())){
                if(mb_strlen($request->utitle) <= 0){
                    return response()->json('Название не может быть пустым.', 422);
                }
                if(mb_strlen($request->utitle) >= 200){
                    return response()->json('Название не должно превышать 200 символов.', 422);
                }
                $bad->update(
                    [
                        'utitle' => $request->utitle,
                    ]
                );
                return response()->json(['bad' => $bad]);
            }else{
                return response()->json(['errors' => ['utitle' => ['Бад с таким названием уже существует.']]], 422);
            }
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateBadDosage(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            $dosage = $request->dosage;
            if(mb_strlen($request->dosage) >= 200){
                return response()->json(['errors' => ['dosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $bad->update(
                [
                    'dosage' => $dosage,
                ]
            );
            return response()->json(['bad' => $bad]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateBadUDosage(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            $udosage = $request->udosage;
            if(mb_strlen($request->udosage) >= 200){
                return response()->json(['errors' => ['udosage' => ['Дозировка должна быть меньше 200 символов.']]], 422);
            }
            $bad->update(
                [
                    'udosage' => $udosage,
                ]
            );
            return response()->json(['bad' => $bad]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateBadRegistration(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            $registration = $request->registration;
            if(mb_strlen($request->registration) >= 200){
                return response()->json(['errors' => ['registration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $bad->update(
                [
                    'registration' => $registration,
                ]
            );
            return response()->json(['bad' => $bad]);
        }
        else{
            return response()->json(false, 404);
        }
    }

    protected function updateBadURegistration(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            $uregistration = $request->uregistration;
            if(mb_strlen($request->uregistration) >= 200){
                return response()->json(['errors' => ['uregistration' => ['Регистрация должна быть меньше 200 символов.']]], 422);
            }
            $bad->update(
                [
                    'uregistration' => $uregistration,
                ]
            );
            return response()->json(['bad' => $bad]);
        }
        else{
            return response()->json(false, 404);
        }
    }



    protected function SwitchBadSetting(Request $request, $alias){
        $bad = BadNew::where('alias', $alias)->first();
        if(!empty($bad)){
            $bad->setting->update([$request->category => $request->switch]);
            return response()->json(['setting' => $bad->setting]);
        }
        else{
            return response()->json(false, 404);
        }
    }
}
