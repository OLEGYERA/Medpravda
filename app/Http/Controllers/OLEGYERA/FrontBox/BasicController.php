<?php

namespace Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox;
use Fresh\Medpravda\Drug;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;

class BasicController extends Controller
{

    protected $title;
    protected $description = null;
//    protected $fullWidth = false;
    protected $fullWidth = true;
    protected $targeting_url = null;
    protected $branding_url = null;
    protected $lang = null;
    protected $breadcrumbs = [];




    protected $template = 'main.index';
    protected $content = false;
    protected $lastModified = false;
    // seo description
    protected $description_default_seo;
    protected $vars;
    protected $css = null;
    protected $jss = null;
    protected $aside = null;
    protected $block = null;
    protected $slider = null;
    protected $seo = null;
    protected $loc = '';
    protected $background = false;
    // set last segment
    protected $last_segment = null;
    protected $module_price_section = null;

    //twitter meta tags
    protected $twitter_tags = null;


    public function renderBasic()
    {
        $this->vars = Arr::add($this->vars, 'title', $this->title);
        $this->vars = Arr::add($this->vars, 'description', $this->description);
        $this->vars = Arr::add($this->vars, 'fullWidth', $this->fullWidth);

        $this->vars = Arr::add($this->vars, 'targeting_url', $this->targeting_url);
        $this->vars = Arr::add($this->vars, 'branding_url', $this->branding_url);

        $this->vars = Arr::add($this->vars, 'header', view('OLEGYERA.FrontBox.COMPONENTS.headers.desktop.' . $this->lang)->with('breadcrumbs', $this->breadcrumbs)->render());

        $this->vars = Arr::add($this->vars, 'footer', view('OLEGYERA.FrontBox.COMPONENTS.footers.desktop.' . $this->lang)->render());

        $this->vars = Arr::add($this->vars, 'agent', new Agent());
        $this->vars = Arr::add($this->vars, 'jss', $this->jss);
        $this->vars = Arr::add($this->vars, 'css', $this->css);
        $this->vars = Arr::add($this->vars, 'twitter_tags', $this->twitter_tags);
        $this->vars = Arr::add($this->vars,'description_default_seo',$this->description_default_seo);

        if ($this->content) {
            $this->vars = Arr::add($this->vars, 'content', $this->content);
        }
        header('Vary: User-Agent');
        return view('OLEGYERA.FrontBox.basicBlade')->with($this->vars);
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
