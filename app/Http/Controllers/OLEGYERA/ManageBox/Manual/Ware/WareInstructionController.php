<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\Manual\Ware;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\ManageBox\ApiController;

use Illuminate\Support\Arr;

use Fresh\Medpravda\DepTerm;
use Fresh\Medpravda\WareNew;
use Illuminate\Http\Request;

class WareInstructionController extends ApiController
{
    private $bad_instruction;

    protected function getWareColumn($alias, $type, $column){
        switch ($type){
            case 'ru':
                $this->bad_instruction = $this->VerifyTerms(WareNew::where('alias', $alias)->first()->instruction[$column], 'ru', $alias, $type, $column);
                break;
            case 'adaptive_ru':
                $this->bad_instruction = $this->VerifyTerms(WareNew::where('alias', $alias)->first()->instruction_adaptive[$column], 'ru', $alias, $type, $column);
                break;
            case 'ua':
                $this->bad_instruction = $this->VerifyTerms(WareNew::where('alias', $alias)->first()->instruction_ua[$column], 'ua', $alias, $type, $column);
                break;
            case 'adaptive_ua':
                $this->bad_instruction = $this->VerifyTerms(WareNew::where('alias', $alias)->first()->instruction_adaptive_ua[$column], 'ua', $alias, $type, $column);
                break;
        }
        return response()->json(['trext' => $this->bad_instruction], 200);
    }

    protected function updateWareColumn(Request $request, $alias, $type, $column){
        return response()->json($this->UpdateWareColumnScript($request->new_data, $alias, $type, $column), 200);
    }

    protected function UpdateWareColumnScript($new_data, $alias, $type, $column){
        switch ($type){
            case 'ru':
                $bad_status = WareNew::where('alias', $alias)->first()->instruction->update([$column => $new_data]);
                break;
            case 'adaptive_ru':
                $bad_status = WareNew::where('alias', $alias)->first()->instruction_adaptive->update([$column => $new_data]);
                break;
            case 'ua':
                $bad_status = WareNew::where('alias', $alias)->first()->instruction_ua->update([$column => $new_data]);
                break;
            case 'adaptive_ua':
                $bad_status = WareNew::where('alias', $alias)->first()->instruction_adaptive_ua->update([$column => $new_data]);
                break;
        }
        return $bad_status;
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
            $this->UpdateWareColumnScript($instruction, $alias, $type, $column);
        }
        return $instruction;
    }


}
