<?php

namespace Fresh\Medpravda\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


use Fresh\Medpravda\WareNew;
use Fresh\Medpravda\WareInstruction;
use Fresh\Medpravda\WareInstructionAdaptive;
use Fresh\Medpravda\WareInstructionUa;
use Fresh\Medpravda\WareInstructionAdaptiveUa;

use Fresh\Medpravda\Amedicine;
use Fresh\Medpravda\Medicine;
use Fresh\Medpravda\Umedicine;
use Fresh\Medpravda\Uamedicine;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\DrugInstruction;
use Fresh\Medpravda\DrugInstructionAdaptive;
use Fresh\Medpravda\DrugInstructionUa;
use Fresh\Medpravda\DrugInstructionAdaptiveUa;

use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\BadInstruction;
use Fresh\Medpravda\BadInstructionAdaptive;
use Fresh\Medpravda\BadInstructionUa;
use Fresh\Medpravda\BadInstructionAdaptiveUa;

use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\CosmeticInstruction;
use Fresh\Medpravda\CosmeticInstructionAdaptive;
use Fresh\Medpravda\CosmeticInstructionUa;
use Fresh\Medpravda\CosmeticInstructionAdaptiveUa;

use Illuminate\Support\Facades\Mail;
use Fresh\Medpravda\Mail\LeadEmail;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function emailPotencia(Request $request){
        Mail::to('medpravda.qwer@gmail.com')->send(new LeadEmail($request));

        return response()->json('Success', 200);
    }


    public function returnIp(Request $request){
//        return '<a href="file:///media/olegyera/99ea16a7-f795-4e3c-88e9-0d3aaa20b505/besog/index.html">index</a>';
        return response()->json($request->ip());
    }


    public function exist(){
//        foreach (Drug::all() as $item){
//            $item->show = 1;
//            $item->save();
//        }
        dd(Drug::find(11));
//        $handle = fopen('exist.txt', "r");
//        while (!feof($handle)) {
//            $buffer = fgets($handle, 4096);
//            $drug = Drug::where('alias', trim(preg_replace('/\s\s+/', ' ', $buffer)))->first();
//            if($drug !== null){
//                $drug->show = 1;
//                $drug->save();
//                echo $drug->title . '\r\n';
//            }
//        }
//        fclose($handle);
    }


    public function reanalize(){
        dd(5);
        ini_set('max_execution_time', 180);
        foreach (Medicine::where('id', '>', 6799)->get() as $m){
            $um = Umedicine::where('alias', $m->alias)->first();
            $am = Amedicine::where('alias', $m->alias)->first();
            $uam = Uamedicine::where('alias', $m->alias)->first();

            $drug = Drug::where('alias', $m->alias)->first();
            if(!empty($drug)){
                echo '______________________START______________________<br/>';
                echo '______________________ID-' . $m->id . '______________________<br/>';

                $drug->instruction->time_life = $m->shelf_life;
                $drug->instruction->storage_conditions = $m->saving;
                $drug->instruction->security = $m->security;
                $drug->instruction->save();
                echo 'ру инструкция готова<br/>';


                $drug->instruction_adaptive->time_life = $am->shelf_life;
                $drug->instruction_adaptive->storage_conditions = $am->saving;
                $drug->instruction_adaptive->security = $am->security;
                $drug->instruction_adaptive->save();

                echo 'ру а-инструкция готова<br/>';



                $drug->instruction_ua->time_life = $um->shelf_life;
                $drug->instruction_ua->storage_conditions = $um->saving;
                $drug->instruction_ua->security = $um->security;
                $drug->instruction_ua->save();
                echo 'юа инструкция готова<br/>';


                $drug->instruction_adaptive_ua->time_life = $uam->shelf_life;
                $drug->instruction_adaptive_ua->storage_conditions = $uam->saving;
                $drug->instruction_adaptive_ua->security = $uam->security;
                $drug->instruction_adaptive_ua->save();
                echo 'юа а-инструкция готова<br/>';
                echo '______________________END______________________<br/><br/><br/><br/>';
            }
        }
        return true;
    }



    public function simAnal($type, $query){
        switch ($type){

            case 'bad':
                $bad_arr = ['composition',
                    'pharma_props',
                    'indications',
                    'special_indications',
                    'contraindications',
                    'usage_and_dose',
                    'storage_conditions',
                    'release_form',
                    'other'];
                foreach ($bad_arr as $title){
                    $bad_ru = BadInstruction::where($title, 'LIKE','%' . $query . '%')->get();
                    $bad_ua = BadInstructionUa::where($title, 'like', '%' . $query . '%')->get();
                    $bada_ru = BadInstructionAdaptive::where($title, 'like', '%' . $query . '%')->get();
                    $bada_ua = BadInstructionAdaptiveUa::where($title, 'like', '%' . $query . '%')->get();

                    $timly_arr = [];
                    if(count($bad_ru) != 0){
                        foreach ($bad_ru as $item){
                            $timely_item = BadNew::find($item->bad_id);
                            echo '<a href="' . route('ru.bad', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->title . ' (официальная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($bad_ua) != 0){
                        foreach ($bad_ua as $item){
                            $timely_item = BadNew::find($item->bad_id);
                            echo '<a href="' . route('ua.bad', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->utitle . ' (официальная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($bada_ru) != 0){
                        foreach ($bada_ru as $item){
                            $timely_item = BadNew::find($item->bad_id);
                            echo '<a href="' . route('ru.bad', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->title . ' (адаптированная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($bada_ua) != 0){
                        foreach ($bada_ua as $item){
                            $timely_item = BadNew::find($item->bad_id);
                            echo '<a href="' . route('ua.bad', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->utitle . ' (адаптированная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                }
                break;

            case 'ware':
                $ware_arr = ['composition',
                    'pharma_props',
                    'indications',
                    'special_indications',
                    'contraindications',
                    'usage_and_dose',
                    'storage_conditions',
                    'release_form',
                    'other'];
                foreach ($ware_arr as $title){
                    $ware_ru = WareInstruction::where($title, 'LIKE','%' . $query . '%')->get();
                    $ware_ua = WareInstructionUa::where($title, 'like', '%' . $query . '%')->get();
                    $warea_ru = WareInstructionAdaptive::where($title, 'like', '%' . $query . '%')->get();
                    $warea_ua = WareInstructionAdaptiveUa::where($title, 'like', '%' . $query . '%')->get();

                    $timly_arr = [];
                    if(count($ware_ru) != 0){
                        foreach ($ware_ru as $item){
                            $timely_item = WareNew::find($item->ware_id);
                            echo '<a href="' . route('ru.ware', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->title . ' (официальная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($ware_ua) != 0){
                        foreach ($ware_ua as $item){
                            $timely_item = WareNew::find($item->ware_id);
                            echo '<a href="' . route('ua.ware', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->utitle . ' (официальная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($warea_ru) != 0){
                        foreach ($warea_ru as $item){
                            $timely_item = WareNew::find($item->ware_id);
                            echo '<a href="' . route('ru.ware', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->title . ' (адаптированная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($warea_ua) != 0){
                        foreach ($warea_ua as $item){
                            $timely_item = WareNew::find($item->ware_id);
                            echo '<a href="' . route('ua.ware', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->utitle . ' (адаптированная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                }
                break;


            case 'cosmetic':
                $cosmetic_arr = ['composition',
                    'pharma_props',
                    'indications',
                    'special_indications',
                    'contraindications',
                    'usage_and_dose',
                    'storage_conditions',
                    'release_form',
                    'other'];
                foreach ($cosmetic_arr as $title){
                    $cosmetic_ru = CosmeticInstruction::where($title, 'LIKE','%' . $query . '%')->get();
                    $cosmetic_ua = CosmeticInstructionUa::where($title, 'like', '%' . $query . '%')->get();
                    $cosmetica_ru = CosmeticInstructionAdaptive::where($title, 'like', '%' . $query . '%')->get();
                    $cosmetica_ua = CosmeticInstructionAdaptiveUa::where($title, 'like', '%' . $query . '%')->get();

                    $timly_arr = [];
                    if(count($cosmetic_ru) != 0){
                        foreach ($cosmetic_ru as $item){
                            $timely_item = CosmeticNew::find($item->cosmetic_id);
                            echo '<a href="' . route('ru.cosmetic', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->title . ' (официальная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($cosmetic_ua) != 0){
                        foreach ($cosmetic_ua as $item){
                            $timely_item = CosmeticNew::find($item->cosmetic_id);
                            echo '<a href="' . route('ua.cosmetic', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->utitle . ' (официальная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($cosmetica_ru) != 0){
                        foreach ($cosmetica_ru as $item){
                            $timely_item = CosmeticNew::find($item->cosmetic_id);
                            echo '<a href="' . route('ru.cosmetic', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->title . ' (адаптированная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($cosmetica_ua) != 0){
                        foreach ($cosmetica_ua as $item){
                            $timely_item = CosmeticNew::find($item->cosmetic_id);
                            echo '<a href="' . route('ua.cosmetic', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->utitle . ' (адаптированная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                }
                break;

            case 'preparat':
                $preparat_arr = ['composition',
                    'pharma_props',
                    'indications',
                    'contraindications',
                    'security',
                    'features',
                    'pregnancy',
                    'driver',
                    'children',
                    'usage_and_dose',
                    'overdose',
                    'side_effects',
                    'interaction',
                    'time_life',
                    'storage_conditions',
                    'release_form',
                    'other'];
                foreach ($preparat_arr as $title){
                    $preparat_ru = DrugInstruction::where($title, 'LIKE','%' . $query . '%')->get();
                    $preparat_ua = DrugInstructionUa::where($title, 'like', '%' . $query . '%')->get();
                    $preparata_ru = DrugInstructionAdaptive::where($title, 'like', '%' . $query . '%')->get();
                    $preparata_ua = DrugInstructionAdaptiveUa::where($title, 'like', '%' . $query . '%')->get();

                    $timly_arr = [];
                    if(count($preparat_ru) != 0){
                        foreach ($preparat_ru as $item){
                            $timely_item = Drug::find($item->drug_id);
                            echo '<a href="' . route('ru.drug', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->title . ' (официальная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($preparat_ua) != 0){
                        foreach ($preparat_ua as $item){
                            $timely_item = Drug::find($item->drug_id);
                            echo '<a href="' . route('ua.drug', ['alias' => $timely_item->alias]) . '#official_instruction" target="_blank">' . $timely_item->utitle . ' (официальная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($preparata_ru) != 0){
                        foreach ($preparata_ru as $item){
                            $timely_item = Drug::find($item->drug_id);
                            echo '<a href="' . route('ru.drug', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->title . ' (адаптированная инструкция РУ) - ' . $title . '</a><br/>';
                        }
                    }
                    if(count($preparata_ua) != 0){
                        foreach ($preparata_ua as $item){
                            $timely_item = Drug::find($item->drug_id);
                            echo '<a href="' . route('ua.drug', ['alias' => $timely_item->alias]) . '#adaptive_instruction" target="_blank">' . $timely_item->utitle . ' (адаптированная инструкция ЮА) - ' . $title . '</a><br/>';
                        }
                    }
                }
                break;

            default:
                abort(404);
                break;
        }

    }
}
