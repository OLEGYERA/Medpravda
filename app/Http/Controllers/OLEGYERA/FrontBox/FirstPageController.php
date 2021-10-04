<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;

use Fresh\Medpravda\BadSetting;
use Fresh\Medpravda\CosmeticSetting;

use Fresh\Medpravda\Medicine;
use Fresh\Medpravda\Umedicine;
use Fresh\Medpravda\Amedicine;
use Fresh\Medpravda\Uamedicine;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\DrugSetting;
use Fresh\Medpravda\DrugDep;
use Fresh\Medpravda\DepSeo;
use Fresh\Medpravda\DrugInstruction;
use Fresh\Medpravda\DrugInstructionUa;
use Fresh\Medpravda\DrugInstructionAdaptive;
use Fresh\Medpravda\DrugInstructionAdaptiveUa;

use Fresh\Medpravda\DepFabricator;

use Fresh\Medpravda\Bad;
use Fresh\Medpravda\BadUa;
use Fresh\Medpravda\BadAdapted;
use Fresh\Medpravda\BadUaAdapted;

use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\ClassBad;
use Fresh\Medpravda\BadDep;
use Fresh\Medpravda\DepBadPharma;
use Fresh\Medpravda\BadInstruction;
use Fresh\Medpravda\BadInstructionUa;
use Fresh\Medpravda\BadInstructionAdaptiveUa;
use Fresh\Medpravda\BadInstructionAdaptive;


use Fresh\Medpravda\Cosmetic;
use Fresh\Medpravda\CosmeticUa;
use Fresh\Medpravda\CosmeticAdapted;
use Fresh\Medpravda\CosmeticUaAdapted;

use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\ClassCosmetic;
use Fresh\Medpravda\CosmeticDep;
use Fresh\Medpravda\CosmeticInstruction;
use Fresh\Medpravda\CosmeticInstructionUa;
use Fresh\Medpravda\CosmeticInstructionAdaptiveUa;
use Fresh\Medpravda\CosmeticInstructionAdaptive;




use Fresh\Medpravda\Aimage;
use Fresh\Medpravda\Substance;
use Fresh\Medpravda\DepSubstance;
use Fresh\Medpravda\DrugDepSubstance;




use Auth;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class FirstPageController extends BasicController
{
    protected $lang;

    public function startRu($lang = null){
        $this->lang = 'ru';
        $this->content = view('OLEGYERA.FrontBox.Start.ru')->render();
        return $this->renderBasic();
    }

    public function startUa($lang = null){
        $this->lang = 'ua';
        $this->content = view('OLEGYERA.FrontBox.Start.ua')->render();
        return $this->renderBasic();
    }


    public function prescriptionRu(){
        $this->lang = 'ru';
        $this->title =  'Соглашение с пользователем о получении информации о рецептурных препараты | Мед. Издание Medpravda';
        $this->description = 'В данном разделе сайта, компания ООО «ДИДЖИО» предоставляет информацию о рецептурных препараты.';
        $this->breadcrumbs = [['title' => 'Информация об использовании рецептурных препаратов', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.recipes.desktop.ru')->render();
        return $this->renderBasic();
    }

    public function prescriptionRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title =  'Соглашение с пользователем о получении информации о рецептурных препараты | Мед. Издание Medpravda';
        $this->description = 'В данном разделе сайта, компания ООО «ДИДЖИО» предоставляет информацию о рецептурных препараты.';
        $this->breadcrumbs = [['title' => 'Рецептурные препараты', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.recipes.desktop.ru')->render();
        return $this->renderBasic();
    }



    public function prescriptionUa(){
        $this->lang = 'ua';
        $this->title =  'Угода з користувачем про отримання інформації про рецептурні препарати | Мед. видання Medpravda';
        $this->description = 'В даному розділі сайту компанія ТОВ «ДІДЖІО» надає інформацію про рецептурні препарати.';
        $this->breadcrumbs = [['title' => 'Інформація про використання рецептурних препаратів', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.recipes.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function prescriptionUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title =  'Соглашение с пользователем о получении информации о рецептурных препараты | Мед. Издание Medpravda';
        $this->description = 'В данном разделе сайта, компания ООО «ДИДЖИО» предоставляет информацию о рецептурных препараты.';
        $this->breadcrumbs = [['title' => 'Інформація про використання рецептурних препаратів', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.recipes.desktop.ua')->render();
        return $this->renderBasic();
    }

    public function termsRu(){
        $this->lang = 'ru';
        $this->title =  'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ | Мед. Издание Medpravda';
        $this->description = 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ.';
        $this->breadcrumbs = [['title' => 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.terms.ru')->render();
        return $this->renderBasic();
    }

    public function termsRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title =  'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ | Мед. Издание Medpravda';
        $this->description = 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ.';
        $this->breadcrumbs = [['title' => 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.terms.ru')->render();
        return $this->renderBasic();
    }

    public function termsUa(){
        $this->lang = 'ua';
        $this->title =  'УГОДА З КОРИСТУВАЧЕМ | Мед. Издание Medpravda';
        $this->description = 'УГОДА З КОРИСТУВАЧЕМ.';
        $this->breadcrumbs = [['title' => 'УГОДА З КОРИСТУВАЧЕМ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.terms.ua')->render();
        return $this->renderBasic();
    }

    public function termsUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title =  'УГОДА З КОРИСТУВАЧЕМ | Мед. Издание Medpravda';
        $this->description = 'УГОДА З КОРИСТУВАЧЕМ.';
        $this->breadcrumbs = [['title' => 'УГОДА З КОРИСТУВАЧЕМ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.terms.ua')->render();
        return $this->renderBasic();
    }

    public function agrementRu(){
        $this->lang = 'ru';
        $this->title =  'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ | Мед. Издание Medpravda';
        $this->description = 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ.';
        $this->breadcrumbs = [['title' => 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.agrement.ru')->render();
        return $this->renderBasic();
    }

    public function agrementRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->title =  'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ | Мед. Издание Medpravda';
        $this->description = 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ.';
        $this->breadcrumbs = [['title' => 'ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.agrement.ru')->render();
        return $this->renderBasic();
    }

    public function agrementUa(){
        $this->lang = 'ua';
        $this->title =  'УГОДА З КОРИСТУВАЧЕМ | Мед. Издание Medpravda';
        $this->description = 'УГОДА З КОРИСТУВАЧЕМ.';
        $this->breadcrumbs = [['title' => 'УГОДА З КОРИСТУВАЧЕМ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.agrement.ua')->render();
        return $this->renderBasic();
    }

    public function agrementUaMobile(){
        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->title =  'УГОДА З КОРИСТУВАЧЕМ | Мед. Издание Medpravda';
        $this->description = 'УГОДА З КОРИСТУВАЧЕМ.';
        $this->breadcrumbs = [['title' => 'УГОДА З КОРИСТУВАЧЕМ', 'alias' => null]];

        $this->content = view('OLEGYERA.FrontBox.Pages.Static.agrement.ua')->render();
        return $this->renderBasic();
    }


    public function analize(){
//
//
//        dd('ready');

//        foreach (DepSubstance::all() as $item){
//            $item->title = mb_strtoupper(mb_substr( $item->title, 0, 1)) . mb_substr( $item->title, 1);
//            $item->utitle = mb_strtoupper(mb_substr( $item->utitle, 0, 1)) . mb_substr( $item->utitle, 1);
//            $item->alias = mb_strtoupper(mb_substr( $item->alias, 0, 1)) . mb_substr( $item->alias, 1);
//            $item->save();
//
//            echo 'Id: ' . $item->id . '<br>';
//
//        }


//        foreach (Aimage::where('id', '>', 18338)->get() as $item){
//
//            $medicine = Medicine::find($item->medicine_id);
//            $substance = Substance::find($item->substance_id);
//            if(!empty(Drug::where('alias', $medicine->alias)->first())){
//                $drug_dep_id = Drug::where('alias', $medicine->alias)->first()->dependency->id;
//                $dep_substance = DepSubstance::where('alias', $substance->alias)->first();
//                if(!empty($dep_substance)){
//                    $dep_substance_id = $dep_substance->id;
//                    $dds = new DrugDepSubstance();
//                    $dds->drug_dep_id = $drug_dep_id;
//                    $dds->substance_id = $dep_substance_id;
//
//                    $dds->save();
//                    echo 'Id: ' . $item->id . '<br>';
//                }
//            }
//
//
//        }
        dd(9310);
//        dd(Badnew::where('id', 336)->first()->dependency->pharma);
//        foreach(Badnew::all() as $item){
//            if($item->dependency->pharma_id == 56){
////                dd(1);
////                $item->dependency->pharma_id = 56;
////                $item->dependency->save();
//                echo 'Ru Old: ' . $item->instruction->pharm_group . '<br/>';
//            }
//            echo 'Ru Old: ' . $item->instruction->pharm_group . '<br/>';
//            echo 'Ru New: ' . $item->dependency->pharma->title . '<br/>';
//
//
//            echo '___________________________________________________________<br/>';
//            echo '-----------------------------------------------------------<br/>';
//            echo '___________________________________________________________<br/>';



//            $clearing_prop = strip_tags($item->instruction->pharm_group);
//            $clearing_prop = str_replace('&mdash;', '', $clearing_prop);
//            $clearing_prop = str_replace('.', '', $clearing_prop);
//            $clearing_prop = trim(str_replace('  ', ' ', $clearing_prop)). '.';
//
//            $clearing_prop_ua = strip_tags($item->instruction_ua->pharm_group);
//            $clearing_prop_ua = str_replace('&mdash;', '', $clearing_prop_ua);
//            $clearing_prop_ua = str_replace('.', '', $clearing_prop_ua);
//            $clearing_prop_ua = trim(str_replace('  ', ' ', $clearing_prop_ua)). '.';
//            dd($clearing_prop, $clearing_prop_ua);

//            $find_pharma = DepBadPharma::where('title', $clearing_prop)->first();
//
//            if(empty($find_pharma)){
//                $new_pharma = new DepBadPharma();
//                $new_pharma->title = $clearing_prop;
//                $new_pharma->utitle = $clearing_prop_ua;
//                $new_pharma->alias = $this->createAlias($clearing_prop);
//                $new_pharma->save();
//                $item->dependency->pharma_id = $new_pharma->id;
//                $item->dependency->save();
//            }else{
//                $item->dependency->pharma_id = $find_pharma->id;
//                $item->dependency->save();
//            }
//        }
//        foreach (Cosmetic::all() as $cosmetic){
//            $uacosmetic = CosmeticUa::where('slug', $cosmetic->slug)->first();
//            $acosmetic = CosmeticAdapted::where('slug', $cosmetic->slug)->first();
//            $auacosmetic = CosmeticUaAdapted::where('slug', $cosmetic->slug)->first();
////            $new_cosmetic = CosmeticNew::where('alias', $cosmetic->slug)->first();
////            dd($cosmetic);
////
////
//            $cosmetic_setting = new CosmeticSetting();
//            $cosmetic_setting->registration_life = $cosmetic->certified;
//            $cosmetic_setting->adverising = $cosmetic->advertising;
//            $cosmetic_setting->save();
//
//            echo 'ID-' . $cosmetic->id . ': Настройки созданны <br/>';
////
////
//            $new_cosmetic = new CosmeticNew();
//            $new_cosmetic->title = $cosmetic->title;
//            $new_cosmetic->utitle = $uacosmetic->title;
//            $new_cosmetic->alias = $cosmetic->slug;
//            $new_cosmetic->dosage = $cosmetic->dose;
//            $new_cosmetic->udosage = $uacosmetic->dose;
//            $new_cosmetic->registration = $cosmetic->reg;
//            $new_cosmetic->uregistration = $uacosmetic->reg;
//            $new_cosmetic->setting_id = $cosmetic_setting->id;
//            $new_cosmetic->creator_id = 46;
//            $new_cosmetic->save();
////
//            echo 'ID-' . $cosmetic->id . ': Основа препарата созданна <br/>';
////
//            $cosmetic_dep = new CosmeticDep;
//            $cosmetic_dep->cosmetic_id = $new_cosmetic->id;
//            $cosmetic_dep->fabricator_id = $cosmetic->fabricator_id;
//            $cosmetic_dep->class_id = $cosmetic->classification_id;
//            $cosmetic_dep->save();
//            echo 'ID-' . $cosmetic->id . ': Зависимости препарата созданна <br/>';
////
//            $cosmetic_instruction = new CosmeticInstruction;
//            $cosmetic_instruction->cosmetic_id = $new_cosmetic->id;
//            $cosmetic_instruction->composition = $cosmetic->consist;
//            $cosmetic_instruction->pharma_props = $cosmetic->pharm_prop;
//            $cosmetic_instruction->indications = $cosmetic->recommendations;
//            $cosmetic_instruction->special_indications = $cosmetic->special_instructions;
//            $cosmetic_instruction->contraindications = $cosmetic->contraindications;
//            $cosmetic_instruction->usage_and_dose = $cosmetic->app_mode;
//            $cosmetic_instruction->release_form = $cosmetic->packaging;
//            $cosmetic_instruction->storage_conditions = $cosmetic->saving;
//            $cosmetic_instruction->other = $cosmetic->additionally;
//
//            $cosmetic_instruction->save();
////
//            echo 'ID-' . $cosmetic->id . ': Инструкция препарата созданна <br/>';
////
//            $cosmetic_instruction_ua = new CosmeticInstructionUa;
//            $cosmetic_instruction_ua->cosmetic_id = $new_cosmetic->id;
//            $cosmetic_instruction_ua->composition = $uacosmetic->consist;
//            $cosmetic_instruction_ua->pharma_props = $uacosmetic->pharm_prop;
//            $cosmetic_instruction_ua->indications = $uacosmetic->recommendations;
//            $cosmetic_instruction_ua->special_indications = $uacosmetic->special_instructions;
//            $cosmetic_instruction_ua->contraindications = $uacosmetic->contraindications;
//            $cosmetic_instruction_ua->usage_and_dose = $uacosmetic->app_mode;
//            $cosmetic_instruction_ua->release_form = $uacosmetic->packaging;
//            $cosmetic_instruction_ua->storage_conditions = $uacosmetic->saving;
//            $cosmetic_instruction_ua->other = $uacosmetic->additionally;
////
//            $cosmetic_instruction_ua->save();
////
//            echo 'ID-' . $cosmetic->id . ': Инструкция Ua препарата созданна <br/>';
////
//            $cosmetic_instruction_adaptive = new CosmeticInstructionAdaptive();
//            $cosmetic_instruction_adaptive->cosmetic_id = $new_cosmetic->id;
//            $cosmetic_instruction_adaptive->composition = $acosmetic->consist;
//            $cosmetic_instruction_adaptive->pharma_props = $acosmetic->pharm_prop;
//            $cosmetic_instruction_adaptive->indications = $acosmetic->recommendations;
//            $cosmetic_instruction_adaptive->special_indications = $acosmetic->special_instructions;
//            $cosmetic_instruction_adaptive->contraindications = $acosmetic->contraindications;
//            $cosmetic_instruction_adaptive->usage_and_dose = $acosmetic->app_mode;
//            $cosmetic_instruction_adaptive->release_form = $acosmetic->packaging;
//            $cosmetic_instruction_adaptive->storage_conditions = $acosmetic->saving;
//            $cosmetic_instruction_adaptive->other = $acosmetic->additionally;
//
//            $cosmetic_instruction_adaptive->save();
////
//            echo 'ID-' . $cosmetic->id . ': Инструкция Adaptive препарата созданна <br/>';
//////
//            $cosmetic_instruction_adaptive_ua = new CosmeticInstructionAdaptiveUa();
//            $cosmetic_instruction_adaptive_ua->cosmetic_id = $new_cosmetic->id;
//            $cosmetic_instruction_adaptive_ua->composition = $auacosmetic->consist;
//            $cosmetic_instruction_adaptive_ua->pharma_props = $auacosmetic->pharm_prop;
//            $cosmetic_instruction_adaptive_ua->indications = $auacosmetic->recommendations;
//            $cosmetic_instruction_adaptive_ua->special_indications = $auacosmetic->special_instructions;
//            $cosmetic_instruction_adaptive_ua->contraindications = $auacosmetic->contraindications;
//            $cosmetic_instruction_adaptive_ua->usage_and_dose = $auacosmetic->app_mode;
//            $cosmetic_instruction_adaptive_ua->release_form = $auacosmetic->packaging;
//            $cosmetic_instruction_adaptive_ua->storage_conditions = $auacosmetic->saving;
//            $cosmetic_instruction_adaptive_ua->other = $auacosmetic->additionally;
////
//            $cosmetic_instruction_adaptive_ua->save();
////
//            echo 'ID-' . $cosmetic->id . ': Инструкция Adaptive Ua препарата созданна <br/>';
//
//            echo '___________________________________________________________<br/>';
//            echo '-----------------------------------------------------------<br/>';
//            echo '___________________________________________________________<br/>';
//        }
    }


    protected function createAlias($string){
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
            ' ' => '-', ',' => '',
        );
        return strtr($string, $converter);
    }
}


//        foreach (Fabricator::all() as $fabricator){
//            $dep_fabricator = new DepFabricator;
//            $dep_fabricator->id = $fabricator->id;
//            $dep_fabricator->title = $fabricator->title;
//            $dep_fabricator->utitle = $fabricator->utitle;
//            $dep_fabricator->alias = $fabricator->alias;
//            $dep_fabricator->save();
////dd($dep_fabricator);
//            echo $fabricator->title;
//        }
//        foreach (Form::all() as $form){
//            $dep_fabricator = new DepForm;
//            $dep_fabricator->id = $form->id;
//            $dep_fabricator->title = $form->name;
//            $dep_fabricator->utitle = $form->uname;
//            $dep_fabricator->alias = $form->alias;
//            $dep_fabricator->save();
////dd($dep_fabricator);
//            echo $dep_fabricator->title;
//        }

//        foreach (Innname::all() as $innname){
//            $dep_fabricator = new DepInname;
//            $dep_fabricator->id = $innname->id;
//            $dep_fabricator->title = $innname->title;
//            $dep_fabricator->save();
////dd($dep_fabricator);
//            echo $dep_fabricator->title;
//        }

//        foreach (Pharmagroup::all() as $pharmagroup){
//            $deP_pharmagroup = new DepPharma;
//            $deP_pharmagroup->id = $pharmagroup->id;
//            $deP_pharmagroup->title = $pharmagroup->title;
//            $deP_pharmagroup->utitle = $pharmagroup->utitle;
//            $deP_pharmagroup->alias = $pharmagroup->alias;
//            $deP_pharmagroup->save();
////dd($dep_fabricator);
//            echo $deP_pharmagroup->title;
//        }

//        foreach (Substance::all() as $pharmagroup){
//            $deP_pharmagroup = new DepSubstance;
//            $deP_pharmagroup->id = $pharmagroup->id;
//            $deP_pharmagroup->title = $pharmagroup->title;
//            $deP_pharmagroup->utitle = $pharmagroup->utitle;
//            $deP_pharmagroup->alias = $pharmagroup->alias;
//            $deP_pharmagroup->save();
////dd($dep_fabricator);
//            echo $deP_pharmagroup->title;
//        }




//        foreach (Medicine::where('id', '>', 10284)->orderBy('id', 'asc')->get() as $medicine){
//            $amedicine = Amedicine::where('alias', $medicine->alias)->first();
//            $umedicine = Umedicine::where('alias', $medicine->alias)->first();
//            $uamedicine = Uamedicine::where('alias', $medicine->alias)->first();
//            $drug_setting = new DrugSetting;
//            $drug_setting->registration_life = $medicine->certified;
//            $drug_setting->adverising = $medicine->advertising;
//            $drug_setting->save();
//
//            echo 'ID-' . $medicine->id . ': Настройки созданны <br/>';
//
////
//
//            $dep_seo = new DepSeo;
//            $dep_seo->save();
//            echo 'ID-' . $medicine->id . ': SEO cозданно <br/>';
//
//
//            $drug = new Drug;
//            $drug->title = $medicine->title;
//            $drug->utitle = $umedicine->title;
//            $drug->alias = $medicine->alias;
//            $drug->dosage = $medicine->dose;
//            $drug->udosage = $umedicine->dose;
//            $drug->registration = $medicine->reg;
//            $drug->uregistration = $umedicine->reg;
//            $drug->setting_id = $drug_setting->id;
//            $drug->seo_id = $dep_seo->id;
//            $drug->creator_id = 46;
//            $drug->save();
//            echo 'ID-' . $medicine->id . ': Основа препарата созданна <br/>';
//
//
//            $drug_dep = new DrugDep;
//            $drug_dep->drug_id = $drug->id;
//            $drug_dep->inname_id = $medicine->innname_id;
//            $drug_dep->pharma_id = $medicine->pharmagroup_id;
//            $drug_dep->form_id = $medicine->form_id;
//            $drug_dep->fabricator_id = $medicine->fabricator_id;
//            $drug_dep->atx_id = $medicine->classification_id;
//            $drug_dep->save();
//            echo 'ID-' . $medicine->id . ': Зависимости препарата созданна <br/>';
//
//
//
//
//            $drug_instruction = new DrugInstruction;
//            $drug_instruction->drug_id = $drug->id;
//            $drug_instruction->composition = $medicine->consist;
//            $drug_instruction->physical_chemical = $medicine->physicochemical_char;
//            $drug_instruction->pharma_props = $medicine->pharm_prop;
//            $drug_instruction->indications = $medicine->indications;
//            $drug_instruction->contraindications = $medicine->contraindications;
//            $drug_instruction->features = $medicine->application_features;
//            $drug_instruction->pregnancy = $medicine->pregnancy;
//            $drug_instruction->driver = $medicine->cars;
//            $drug_instruction->children = $medicine->children;
//            $drug_instruction->usage_and_dose = $medicine->app_mode;
//            $drug_instruction->overdose = $medicine->overdose;
//            $drug_instruction->side_effects = $medicine->side_effects;
//            $drug_instruction->interaction = $medicine->interaction;
//            $drug_instruction->time_life = $medicine->overdose;
//            $drug_instruction->storage_conditions = $medicine->shelf_life;
//            $drug_instruction->release_form = $medicine->packaging;
//            $drug_instruction->other = $medicine->additionally;
//            $drug_instruction->save();
//
//            echo 'ID-' . $medicine->id . ': Инструкция препарата созданна <br/>';
//
//
//            $drug_instruction_u = new DrugInstructionUa;
//            $drug_instruction_u->drug_id = $drug->id;
//            $drug_instruction_u->composition = $umedicine->consist;
//            $drug_instruction_u->physical_chemical = $umedicine->physicochemical_char;
//            $drug_instruction_u->pharma_props = $umedicine->pharm_prop;
//            $drug_instruction_u->indications = $umedicine->indications;
//            $drug_instruction_u->contraindications = $umedicine->contraindications;
//            $drug_instruction_u->features = $umedicine->application_features;
//            $drug_instruction_u->pregnancy = $umedicine->pregnancy;
//            $drug_instruction_u->driver = $umedicine->cars;
//            $drug_instruction_u->children = $umedicine->children;
//            $drug_instruction_u->usage_and_dose = $umedicine->app_mode;
//            $drug_instruction_u->overdose = $umedicine->overdose;
//            $drug_instruction_u->side_effects = $umedicine->side_effects;
//            $drug_instruction_u->interaction = $umedicine->interaction;
//            $drug_instruction_u->time_life = $umedicine->overdose;
//            $drug_instruction_u->storage_conditions = $umedicine->shelf_life;
//            $drug_instruction_u->release_form = $umedicine->packaging;
//            $drug_instruction_u->other = $umedicine->additionally;
//            $drug_instruction_u->save();
//
//            echo 'ID-' . $medicine->id . ': Инструкция UA препарата созданна <br/>';
//
//
//
//            $drug_instruction_a = new DrugInstructionAdaptive;
//            $drug_instruction_a->drug_id = $drug->id;
//            $drug_instruction_a->composition = $amedicine->consist;
//            $drug_instruction_a->pharma_props = $amedicine->pharm_prop;
//            $drug_instruction_a->indications = $amedicine->indications;
//            $drug_instruction_a->contraindications = $amedicine->contraindications;
//            $drug_instruction_a->features = $amedicine->application_features;
//            $drug_instruction_a->pregnancy = $amedicine->pregnancy;
//            $drug_instruction_a->driver = $amedicine->cars;
//            $drug_instruction_a->children = $amedicine->children;
//            $drug_instruction_a->usage_and_dose = $amedicine->app_mode;
//            $drug_instruction_a->overdose = $amedicine->overdose;
//            $drug_instruction_a->side_effects = $amedicine->side_effects;
//            $drug_instruction_a->interaction = $amedicine->interaction;
//            $drug_instruction_a->time_life = $amedicine->overdose;
//            $drug_instruction_a->storage_conditions = $amedicine->shelf_life;
//            $drug_instruction_a->release_form = $amedicine->packaging;
//            $drug_instruction_a->other = $amedicine->additionally;
//            $drug_instruction_a->save();
//
//            echo 'ID-' . $medicine->id . ': Инструкция A препарата созданна <br/>';
//
//            $drug_instruction_a_u = new DrugInstructionAdaptiveUa;
//            $drug_instruction_a_u->drug_id = $drug->id;
//            $drug_instruction_a_u->composition = $uamedicine->consist;
//            $drug_instruction_a_u->pharma_props = $uamedicine->pharm_prop;
//            $drug_instruction_a_u->indications = $uamedicine->indications;
//            $drug_instruction_a_u->contraindications = $uamedicine->contraindications;
//            $drug_instruction_a_u->features = $uamedicine->application_features;
//            $drug_instruction_a_u->pregnancy = $uamedicine->pregnancy;
//            $drug_instruction_a_u->driver = $uamedicine->cars;
//            $drug_instruction_a_u->children = $uamedicine->children;
//            $drug_instruction_a_u->usage_and_dose = $uamedicine->app_mode;
//            $drug_instruction_a_u->overdose = $uamedicine->overdose;
//            $drug_instruction_a_u->side_effects = $uamedicine->side_effects;
//            $drug_instruction_a_u->interaction = $uamedicine->interaction;
//            $drug_instruction_a_u->time_life = $uamedicine->overdose;
//            $drug_instruction_a_u->storage_conditions = $uamedicine->shelf_life;
//            $drug_instruction_a_u->release_form = $uamedicine->packaging;
//            $drug_instruction_a_u->other = $uamedicine->additionally;
//            $drug_instruction_a_u->save();
//
//            echo 'ID-' . $medicine->id . ': Инструкция A-UA препарата созданна <br/>';
//
//            echo '___________________________________________________________<br/>';
//            echo '-----------------------------------------------------------<br/>';
//            echo '___________________________________________________________<br/>';
//        }
//
//
//        dd('ready');
