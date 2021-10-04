<?php

namespace Fresh\Medpravda\Http\Controllers\SiteView;
use Fresh\Medpravda\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $template;
    protected $data;
    protected $lang;

    protected $contentTitle;
    protected $contentType;
    protected $contentTypeData;
    protected $contentTypeCategory;

    public $content;



    public function __construct () {
        $this->template = env('APP_RESOURCE_PATH') . 'SiteView.';
    }

    protected function generateBreadCrumbs () {
        $breadcrumbs = [['title' => 'Препараты', 'alias' => null], ['title' => $this->contentTitle, 'alias' => null]];
        return view($this->template . 'default.module.breadcrumb.' .  $this->lang)->with('breadcrumbs', $breadcrumbs)->render();
    }

    protected function render () {
        $this->data = Arr::add($this->data, 'header', view($this->template . 'default.header.' . $this->lang)->render());

        if ($this->content) {
            switch ($this->contentType){
                case 3:
                    $tripleContent = view($this->template . 'default.ctriple.' . $this->lang)->with([
                        'breadcrumb' => $this->generateBreadCrumbs(),
                        'content' => $this->content,
                        'type' => $this->contentTypeData,
                        'category' => $this->contentTypeCategory
                    ]);
                    $this->data = Arr::add($this->data, 'content', $tripleContent);
                    break;
            }
        }
        header('Vary: User-Agent');
        return view($this->template . 'default.layout')->with($this->data);
    }

    protected function getLastMod($item){
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
