<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\Web;
use Fresh\Medpravda\Http\Controllers\Controller;

use Illuminate\Support\Arr;
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
    protected $breadcrumbs = [];


    //adriver props
    protected $targeting_url = null;
    protected $branding_url = null;


    private $renderPack = [];



    public function Render()
    {
        header('Vary: User-Agent');

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


    public function getLastMod($item){
        $last_mods = [$item->updated_at, $item->instruction->updated_at, $item->instruction_ua->updated_at, $item->instruction_adaptive->updated_at, $item->instruction_adaptive_ua->updated_at];
        $hight_val = null;

        foreach ($last_mods as $last_mod){
            if($hight_val != null){
                if($hight_val < $last_mod){
                    $hight_val = $last_mod;
                }
            }else{
                $hight_val = $last_mod;
            }
        }
        return $hight_val;
    }
}
