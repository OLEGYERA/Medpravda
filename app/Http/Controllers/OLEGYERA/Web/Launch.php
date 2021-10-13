<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web;
use Fresh\Medpravda\Http\Controllers\Controller;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;


class Launch extends Controller
{
    //seo props


    protected $title;
    protected $description = null;


    //page props
    protected $Page = true;
    protected $fullWidth = true;
    protected $lang = null;


    //adriver props
    protected $targeting_url = null;
    protected $branding_url = null;


    private $renderPack = [];





    public function Render()
    {


        header('Vary: User-Agent');

        $this->renderPack = Arr::add($this->renderPack, 'isAdmin', $this->checkAdmin()); //check admin

        $this->renderPack = Arr::add($this->renderPack, 'title', $this->title);
        $this->renderPack = Arr::add($this->renderPack, 'description', $this->description);

        $this->renderPack = Arr::add($this->renderPack, 'fullWidth', $this->fullWidth);
        $this->renderPack = Arr::add($this->renderPack, 'lang', $this->lang);

        $this->renderPack = Arr::add($this->renderPack, 'targeting_url', $this->targeting_url);
        $this->renderPack = Arr::add($this->renderPack, 'branding_url', $this->branding_url);

        $this->renderPack = Arr::add($this->renderPack, 'header', view('OLEGYERA.Web.components.header.' . $this->lang)->render());
        $this->renderPack = Arr::add($this->renderPack, 'footer', view('OLEGYERA.Web.components.footer.' . $this->lang)->render());

        $this->renderPack = Arr::add($this->renderPack, 'DeviceAgent', new Agent());

        if ($this->Page) {
            $this->renderPack = Arr::add($this->renderPack, 'page', $this->Page);
        }

        return view('OLEGYERA.Web.Launch.PackBuilder')->with($this->renderPack);
    }




    private function checkAdmin(){
        return false;
        return Auth::check() ? Auth::user()->getAdminData() : false;
    }
}
