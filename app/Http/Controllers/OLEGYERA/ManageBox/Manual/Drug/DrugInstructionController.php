<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Drug;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Support\Arr;

use Fresh\Medpravda\DepTerm;
use Fresh\Medpravda\Drug;
use Illuminate\Http\Request;

class DrugInstructionController extends ApiController
{
    private $drug_instruction;

    protected function getDrugColumn($alias, $type, $column){
        switch ($type){
            case 'ru':
                $this->drug_instruction = $this->VerifyTerms(Drug::where('alias', $alias)->first()->instruction[$column], 'ru', $alias, $type, $column);
                break;
            case 'adaptive_ru':
                $this->drug_instruction = $this->VerifyTerms(Drug::where('alias', $alias)->first()->instruction_adaptive[$column], 'ru', $alias, $type, $column);
                break;
            case 'ua':
                $this->drug_instruction = $this->VerifyTerms(Drug::where('alias', $alias)->first()->instruction_ua[$column], 'ua', $alias, $type, $column);
                break;
            case 'adaptive_ua':
                $this->drug_instruction = $this->VerifyTerms(Drug::where('alias', $alias)->first()->instruction_adaptive_ua[$column], 'ua', $alias, $type, $column);
                break;
        }
         return response()->json(['trext' => $this->drug_instruction], 200);
    }

    protected function updateDrugColumn(Request $request, $alias, $type, $column){
        return response()->json($this->UpdateDrugColumnScript($request->new_data, $alias, $type, $column), 200);
    }

    protected function UpdateDrugColumnScript($new_data, $alias, $type, $column){
        switch ($type){
            case 'ru':
                $drug_status = Drug::where('alias', $alias)->first()->instruction->update([$column => $new_data]);
                break;
            case 'adaptive_ru':
                $drug_status = Drug::where('alias', $alias)->first()->instruction_adaptive->update([$column => $new_data]);
                break;
            case 'ua':
                $drug_status = Drug::where('alias', $alias)->first()->instruction_ua->update([$column => $new_data]);
                break;
            case 'adaptive_ua':
                $drug_status = Drug::where('alias', $alias)->first()->instruction_adaptive_ua->update([$column => $new_data]);
                break;
        }
        return $drug_status;
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
            $this->UpdateDrugColumnScript($instruction, $alias, $type, $column);
        }

        return $instruction;
    }


}
