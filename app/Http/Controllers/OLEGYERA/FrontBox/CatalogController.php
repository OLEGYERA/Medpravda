<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use Fresh\Medpravda\Drug;
use Fresh\Medpravda\BadNew;
use Fresh\Medpravda\WareNew;
use Fresh\Medpravda\CosmeticNew;
use Fresh\Medpravda\DepInname;
use Fresh\Medpravda\DepPharma;
use Fresh\Medpravda\DepBadPharma;
use Fresh\Medpravda\DepFabricator;


use Fresh\Medpravda\DepATX;
use Fresh\Medpravda\ClassBad;
use Fresh\Medpravda\ClassWare;
use Fresh\Medpravda\ClassCosmetic;


use Fresh\Medpravda\Repositories\CatalogRepository;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class CatalogController extends BasicController
{
    protected $repository;
    protected $description;

    public function drugRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new Drug(),'drug', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель препаратов | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель препаратов на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);
        return $this->renderBasic();
    }

    public function drugRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new Drug(), 'drug', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель препаратов | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель препаратов на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function drugUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new Drug(), 'drug', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик препаратів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик препаратів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function drugUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new Drug(), 'drug', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик препаратів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик препаратів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function badRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;
        $this->repository = new CatalogRepository(new BadNew(), 'bad', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель диетических добавок | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель диетических добавок на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function badRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new BadNew(), 'bad', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель диетических добавок | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель диетических добавок на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function badUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new BadNew(), 'bad', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик дієтичних добавок | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик дієтичних добавок на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function badUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new BadNew(), 'bad', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик дієтичних добавок | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик дієтичних добавок на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function wareRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new WareNew(), 'ware', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель изделий медицинского назначения | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель изделий медицинского назначения на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function wareRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new WareNew(), 'ware', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель изделий медицинского назначения | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель изделий медицинского назначения на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function wareUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new WareNew(), 'ware', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик виробів медичного призначення | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик виробів медичного призначення на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function wareUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new WareNew(), 'ware', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик виробів медичного призначення | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик виробів медичного призначення на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function cosmeticRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель косметических средств | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель косметических средств на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function cosmeticRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель косметических средств | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель косметических средств на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function cosmeticUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик косметичних засобів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик косметичних засобів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function cosmeticUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик косметичних засобів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик косметичних засобів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function innameRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель международных названий препаратов | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель международных названий препаратов на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function innameRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель международных названий препаратов | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель международных названий препаратов на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function innameUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик міжнародних назв препаратів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик міжнародних назв препаратів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function innameUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if ($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик міжнародних назв препаратів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик міжнародних назв препаратів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function drugInnameRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        $this->title =  'Алфавитный указатель: ' . $val . ' | Мед. Издание Medpravda';
        $this->description = $val . '. Алфавитный указатель международных названий препаратов на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function drugInnameRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        $this->title =  'Алфавитный указатель: ' . $val . ' | Мед. Издание Medpravda';
        $this->description = $val . '. Алфавитный указатель международных названий препаратов на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function drugInnameUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        $this->title =  'Алфавітний покажчик: ' . $val . ' | Мед. видання Medpravda';
        $this->description = $val . '. Алфавітний покажчик міжнародних назв препаратів на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function drugInnameUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepInname(), 'inname', $this->is_mobile, $this->lang);
        $this->title =  'Алфавітний покажчик: ' . $val . ' | Мед. видання Medpravda';
        $this->description = $val . '. Алфавітний покажчик міжнародних назв препаратів на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function pharmaRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель фармакотерапевтических групп для препаратов | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель фармакотерапевтических групп для препаратов на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function pharmaRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавитный указатель фармакотерапевтических групп для препаратов | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель фармакотерапевтических групп для препаратов на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function pharmaUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик фармакотерапевтичних груп для препаратів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик фармакотерапевтичних груп для препаратів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function pharmaUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if ($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->title = $val . ': Алфавітний покажчик фармакотерапевтичних груп для препаратів | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик фармакотерапевтичних груп для препаратів на Medpravda.ua';
        $this->content = $this->repository->alphabetDataContent($val);

        return $this->renderBasic();
    }

    public function drugPharmaRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        if(DepPharma::where('alias', $val)->first() == null) abort(404);
        $nameOfVal = DepPharma::where('alias', $val)->first()->title;
        $this->title =  'Алфавитный указатель: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавитный указатель фармакотерапевтических групп для препаратов на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function drugPharmaRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        $this->content = $this->repository->ResultDataContent($val);
        $nameOfVal = DepPharma::where('alias', $val)->first()->title;
        if(DepPharma::where('alias', $val)->first() == null) abort(404);
        $this->title =  'Алфавитный указатель: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавитный указатель фармакотерапевтических групп для препаратов на Medpravda.ua';

        return $this->renderBasic();
    }

    public function drugPharmaUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        $this->content = $this->repository->ResultDataContent($val);
        if(DepPharma::where('alias', $val)->first() == null) abort(404);
        $nameOfVal = DepPharma::where('alias', $val)->first()->utitle;
        $this->title =  'Алфавітний покажчик: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавітний покажчик фармакотерапевтичних груп для препаратів на Medpravda.ua';

        return $this->renderBasic();
    }

    public function drugPharmaUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepPharma(), 'pharma', $this->is_mobile, $this->lang);
        if(!empty(DepPharma::where('alias', $val)->first())){
            $nameOfVal = DepPharma::where('alias', $val)->first()->utitle;
        }else{
            abort(404);
        }
        $this->title =  'Алфавітний покажчик: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавітний покажчик фармакотерапевтичних груп для препаратів на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);
        return $this->renderBasic();
    }

    public function pharmaBadRu(){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $this->content = $this->repository->alphabetDataContent(null);
        $this->title =  'Алфавитный указатель групп диетических добавок | Мед. Издание Medpravda';
        $this->description = 'Алфавитный указатель групп диетических добавок на Medpravda.ua';

        return $this->renderBasic();
    }

    public function pharmaBadRuMobile(){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $this->content = $this->repository->alphabetDataContent(null);
        $this->title =  'Алфавитный указатель групп диетических добавок | Мед. Издание Medpravda';
        $this->description = 'Алфавитный указатель групп диетических добавок на Medpravda.ua';

        return $this->renderBasic();
    }

    public function pharmaBadUa(){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $this->content = $this->repository->alphabetDataContent(null);
        $this->title =  'Алфавітний покажчик груп дієтичних добавок | Мед. Издание Medpravda';
        $this->description = 'Алфавітний покажчик груп дієтичних добавок на Medpravda.ua';

        return $this->renderBasic();
    }

    public function pharmaBadUaMobile()
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $this->content = $this->repository->alphabetDataContent(null);
        $this->title =  'Алфавітний покажчик груп дієтичних добавок | Мед. Издание Medpravda';
        $this->description = 'Алфавітний покажчик груп дієтичних добавок на Medpravda.ua';

        return $this->renderBasic();
    }

    public function badPharmaBadRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $nameOfVal = DepBadPharma::where('alias', $val)->first()->title;
        $this->title =  'Алфавитный указатель: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавитный указатель групп диетических добавок на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function badPharmaBadRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $nameOfVal = DepBadPharma::where('alias', $val)->first()->title;
        $this->title =  'Алфавитный указатель: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавитный указатель групп диетических добавок на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function badPharmaBadUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $nameOfVal = DepBadPharma::where('alias', $val)->first()->utitle;
        $this->title =  'Алфавітний покажчик: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавітний покажчик груп дієтичних добавок на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function badPharmaBadUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepBadPharma(), 'pharma_bad', $this->is_mobile, $this->lang);
        $nameOfVal = DepBadPharma::where('alias', $val)->first()->utitle;
        $this->title =  'Алфавітний покажчик: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавітний покажчик груп дієтичних добавок на Medpravda.ua';
        $this->content = $this->repository->ResultDataContent($val);

        return $this->renderBasic();
    }

    public function fabricatorRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->content = $this->repository->alphabetDataContent($val);
        $this->title = $val . ': Алфавитный указатель производителей | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель производителей на Medpravda.ua';

        return $this->renderBasic();
    }

    public function fabricatorRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->content = $this->repository->alphabetDataContent($val);
        $this->title = $val . ': Алфавитный указатель производителей | Мед. Издание Medpravda';
        $this->description = $val . ': Алфавитный указатель производителей на Medpravda.ua';

        return $this->renderBasic();
    }

    public function fabricatorUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->content = $this->repository->alphabetDataContent($val);
        $this->title = $val . ': Алфавітний покажчик виробників | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик виробників на Medpravda.ua';

        return $this->renderBasic();
    }

    public function fabricatorUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        //verificator
        $status = $this->repository->alphabetValVerification($val);
        if($status['status'] == 'redirect') return redirect()->route($status['route'], ['val' => $status['val']]);
        //end_verificator
        $this->content = $this->repository->alphabetDataContent($val);
        $this->title = $val . ': Алфавітний покажчик виробників | Мед. видання Medpravda';
        $this->description = $val . ': Алфавітний покажчик виробників на Medpravda.ua';

        return $this->renderBasic();
    }

    public function listFabricatorRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        $this->content = $this->repository->ResultDataContent($val);
        $nameOfVal = DepFabricator::where('alias', $val)->first()->title;
        $this->title =  'Алфавитный указатель: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавитный указатель производителей на Medpravda.ua';

        return $this->renderBasic();
    }

    public function listFabricatorRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        $this->content = $this->repository->ResultDataContent($val);
        $nameOfVal = DepFabricator::where('alias', $val)->first()->title;
        $this->title =  'Алфавитный указатель: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавитный указатель производителей на Medpravda.ua';

        return $this->renderBasic();
    }

    public function listFabricatorUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        $this->content = $this->repository->ResultDataContent($val);
        $nameOfVal = DepFabricator::where('alias', $val)->first()->utitle;
        $this->title =  'Алфавітний покажчик: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавітний покажчик виробників на Medpravda.ua';

        return $this->renderBasic();
    }

    public function listFabricatorUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new DepFabricator(), 'fabricator', $this->is_mobile, $this->lang);
        $this->content = $this->repository->ResultDataContent($val);
        $nameOfVal = DepFabricator::where('alias', $val)->first()->utitle;
        $this->title =  'Алфавітний покажчик: ' . $nameOfVal . ' | Мед. Издание Medpravda';
        $this->description = $nameOfVal . ' Алфавітний покажчик виробників на Medpravda.ua';

        return $this->renderBasic();
    }



    public function drugATXRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new Drug(), 'drug_atx', $this->is_mobile, $this->lang, new DepATX());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = DepATX::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': ATC-классификация препаратов | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' ATC-классификация препаратов на Medpravda.ua';
        }else{
            $this->title =  'ATC-классификация препаратов | Мед. Издание Medpravda';
            $this->description = 'ATC-классификация препаратов на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function drugATXRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new Drug(), 'drug_atx', $this->is_mobile, $this->lang, new DepATX());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = DepATX::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': ATC-классификация препаратов | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' ATC-классификация препаратов на Medpravda.ua';
        }else{
            $this->title =  'ATC-классификация препаратов | Мед. Издание Medpravda';
            $this->description = 'ATC-классификация препаратов на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function drugATXUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new Drug(), 'drug_atx', $this->is_mobile, $this->lang, new DepATX());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = DepATX::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': ATC-класифікація препаратів | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' ATC-класифікація препаратів на Medpravda.ua';
        }else{
            $this->title =  'ATC-класифікація препаратів | Мед. Издание Medpravda';
            $this->description = 'ATC-класифікація препаратів на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function drugATXUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new Drug(), 'drug_atx', $this->is_mobile, $this->lang, new DepATX());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = DepATX::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': ATC-класифікація препаратів | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' ATC-класифікація препаратів на Medpravda.ua';
        }else{
            $this->title =  'ATC-класифікація препаратів | Мед. Издание Medpravda';
            $this->description = 'ATC-класифікація препаратів на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function badATXRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new BadNew(), 'bad_atx', $this->is_mobile, $this->lang, new ClassBad());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassBad::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Классификация диетических добавок | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' Классификация диетических добавок на Medpravda.ua';
        }else{
            $this->title =  'Классификация диетических добавок | Мед. Издание Medpravda';
            $this->description = 'Классификация диетических добавок на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function badATXRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new BadNew(), 'bad_atx', $this->is_mobile, $this->lang, new ClassBad());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassBad::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Классификация диетических добавок | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' Классификация диетических добавок на Medpravda.ua';
        }else{
            $this->title =  'Классификация диетических добавок | Мед. Издание Medpravda';
            $this->description = 'Классификация диетических добавок на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function badATXUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new BadNew(), 'bad_atx', $this->is_mobile, $this->lang, new ClassBad());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassBad::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Класифікація дієтичних добавок | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' Класифікація дієтичних добавок на Medpravda.ua';
        }else{
            $this->title =  'Класифікація дієтичних добавок | Мед. Издание Medpravda';
            $this->description = 'Класифікація дієтичних добавок на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function badATXUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new BadNew(), 'bad_atx', $this->is_mobile, $this->lang, new ClassBad());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassBad::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Класифікація дієтичних добавок | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' Класифікація дієтичних добавок на Medpravda.ua';
        }else{
            $this->title =  'Класифікація дієтичних добавок | Мед. Издание Medpravda';
            $this->description = 'Класифікація дієтичних добавок на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function wareATXRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new WareNew(), 'ware_atx', $this->is_mobile, $this->lang, new ClassWare());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassWare::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Классификация изделий медицинского назначения | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' Классификация изделий медицинского назначения на Medpravda.ua';
        }else{
            $this->title =  'Классификация изделий медицинского назначения | Мед. Издание Medpravda';
            $this->description = 'Классификация изделий медицинского назначения на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function wareATXRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new WareNew(), 'ware_atx', $this->is_mobile, $this->lang, new ClassWare());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassWare::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Классификация изделий медицинского назначения | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' Классификация изделий медицинского назначения на Medpravda.ua';
        }else{
            $this->title =  'Классификация изделий медицинского назначения | Мед. Издание Medpravda';
            $this->description = 'Классификация изделий медицинского назначения на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function wareATXUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new WareNew(), 'ware_atx', $this->is_mobile, $this->lang, new ClassWare());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassWare::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Класифікація виробів медичного призначення | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' Класифікація виробів медичного призначення на Medpravda.ua';
        }else{
            $this->title =  'Класифікація виробів медичного призначення | Мед. Издание Medpravda';
            $this->description = 'Класифікація виробів медичного призначення на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function wareATXUaMobile($val = null){
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new WareNew(), 'ware_atx', $this->is_mobile, $this->lang, new ClassWare());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassWare::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Класифікація виробів медичного призначення | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' Класифікація виробів медичного призначення на Medpravda.ua';
        }else{
            $this->title =  'Класифікація виробів медичного призначення | Мед. Издание Medpravda';
            $this->description = 'Класифікація виробів медичного призначення на Medpravda.ua';
        }
        return $this->renderBasic();
    }

    public function cosmeticATXRu($val = null){
        $this->lang = 'ru';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic_atx', $this->is_mobile, $this->lang, new ClassCosmetic());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassCosmetic::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Классификация косметических средств | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' Классификация косметических средств на Medpravda.ua';
        }else{
            $this->title =  'Классификация косметических средств | Мед. Издание Medpravda';
            $this->description = 'Классификация косметических средств на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function cosmeticATXRuMobile($val = null){
        $this->lang = 'ru';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic_atx', $this->is_mobile, $this->lang, new ClassCosmetic());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassCosmetic::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Классификация косметических средств | Мед. Издание Medpravda';
            $this->description = $nameOfVal->title . ' Классификация косметических средств на Medpravda.ua';
        }else{
            $this->title =  'Классификация косметических средств | Мед. Издание Medpravda';
            $this->description = 'Классификация косметических средств на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function cosmeticATXUa($val = null){
        $this->lang = 'ua';
        $this->is_mobile = false;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic_atx', $this->is_mobile, $this->lang, new ClassCosmetic());

        $this->content = $this->repository->atxDataContent($val);
        if($val != null){
            $nameOfVal = ClassCosmetic::where('class', $val)->first();
            $this->title =  $nameOfVal->class. ': Класифікація косметичних засобів | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' Класифікація косметичних засобів на Medpravda.ua';
        }else{
            $this->title =  'Класифікація косметичних засобів | Мед. Издание Medpravda';
            $this->description = 'Класифікація косметичних засобів на Medpravda.ua';
        }

        return $this->renderBasic();
    }

    public function cosmeticATXUaMobile($val = null)
    {
        $this->lang = 'ua';
        $this->is_mobile = true;

        $this->repository = new CatalogRepository(new CosmeticNew(), 'cosmetic_atx', $this->is_mobile, $this->lang, new ClassCosmetic());

        $this->content = $this->repository->atxDataContent($val);
        if ($val != null) {
            $nameOfVal = ClassCosmetic::where('class', $val)->first();
            $this->title = $nameOfVal->class . ': Класифікація косметичних засобів | Мед. Издание Medpravda';
            $this->description = $nameOfVal->utitle . ' Класифікація косметичних засобів на Medpravda.ua';
        } else {
            $this->title = 'Класифікація косметичних засобів | Мед. Издание Medpravda';
            $this->description = 'Класифікація косметичних засобів на Medpravda.ua';
        }

        return $this->renderBasic();
    }
}
