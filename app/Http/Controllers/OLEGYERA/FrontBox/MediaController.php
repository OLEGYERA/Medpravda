<?php

namespace Fresh\Medpravda\Http\Controllers\Olegyera\FrontBox;

use Fresh\Medpravda\Drug;

use Illuminate\Http\Request;
use Fresh\Medpravda\Http\Controllers\OLEGYERA\FrontBox\BasicController;

class MediaController extends BasicController
{
    public function showMedia($alias){

        $this->lang = 'ru';
        $this->is_mobile = false;
        $this->breadcrumbs = [['title' => 'Медиатека', 'alias' => null], ['title' => 'Статья', 'alias' => null]];

        switch ($alias){
            case 'delikatniy-uhod-za-kozhey-rebenka':
                $this->title =  'Деликатный уход за кожей ребенка. Медиатека | Мед. Издание Medpravda';
                $this->description = 'Медиатека. Деликатный уход за кожей ребенка на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-1.desktop.ru')->render();
                break;
            case 'komu-neobhodim-irrigator':
                $this->title =  'Кому необходим ирригатор? Медиатека | Мед. Издание Medpravda';
                $this->description = 'Медиатека. Кому необходим ирригатор? на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-2.desktop.ru')->render();
                break;
            case 'ortop-selyki-dlya-obuvi':
            	$this->title =  'Ортоп - стельки для обуви. Медиатека | Мед. Издание Medpravda';
                $this->description = 'Медиатека. Ортоп - стельки для обуви на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-3.desktop.ru')->render();
                break;
            default:
                abort(404);
                break;
        }



        return $this->renderBasic();
    }

    public function showMediaMobile($alias){

        $this->lang = 'ru';
        $this->is_mobile = true;
        $this->breadcrumbs = [['title' => 'Медиатека', 'alias' => null], ['title' => 'Статья', 'alias' => null]];

        switch ($alias){
            case 'delikatniy-uhod-za-kozhey-rebenka':
                $this->title =  'Деликатный уход за кожей ребенка. Медиатека | Мед. Издание Medpravda';
                $this->description = 'Медиатека. Деликатный уход за кожей ребенка на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-1.mobile.ru')->render();
                break;
            case 'komu-neobhodim-irrigator':
                $this->title =  'Кому необходим ирригатор? Медиатека | Мед. Издание Medpravda';
                $this->description = 'Медиатека. Кому необходим ирригатор? на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-2.mobile.ru')->render();
                break;
            case 'ortop-selyki-dlya-obuvi':
            	$this->title =  'Ортоп - стельки для обуви. Медиатека | Мед. Издание Medpravda';
                $this->description = 'Медиатека. Ортоп - стельки для обуви на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-3.mobile.ru')->render();
                break;
            default:
                abort(404);
                break;
        }

        return $this->renderBasic();
    }

    public function showMediaUa($alias){
        $this->lang = 'ua';
        $this->is_mobile = false;
        $this->breadcrumbs = [['title' => 'Медіатека', 'alias' => null], ['title' => 'Стаття', 'alias' => null]];

        switch ($alias){
            case 'delikatniy-uhod-za-kozhey-rebenka':
                $this->title =  'Делікатний догляд за шкірою дитини. Медіатека | Мед. Издание Medpravda';
                $this->description = 'Медіатека. Делікатний догляд за шкірою дитини на Medpravda.ua';;
                $this->content = view('OLEGYERA.FrontBox.Media.media-1.desktop.ua')->render();
                break;
            case 'komu-neobhodim-irrigator':
                $this->title =  'Кому потрібен іригатор? Медіатека | Мед. Издание Medpravda';
                $this->description = 'Медіатека. Кому потрібен іригатор? на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-2.desktop.ua')->render();
                break;
            case 'ortop-selyki-dlya-obuvi':
            	$this->title =  'Ортоп - устілки для взуття. Медіатека | Мед. Издание Medpravda';
                $this->description = 'Медіатека. Ортоп - устілки для взуття на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-3.desktop.ua')->render();
                break;
            default:
                abort(404);
                break;
        }

        return $this->renderBasic();
    }

    public function showMediaUaMobile($alias){

        $this->lang = 'ua';
        $this->is_mobile = true;
        $this->breadcrumbs = [['title' => 'Медіатека', 'alias' => null], ['title' => 'Стаття', 'alias' => null]];

        switch ($alias){
            case 'delikatniy-uhod-za-kozhey-rebenka':
                $this->title =  'Делікатний догляд за шкірою дитини. Медіатека | Мед. Издание Medpravda';
                $this->description = 'Медіатека. Делікатний догляд за шкірою дитини на Medpravda.ua';;
                $this->content = view('OLEGYERA.FrontBox.Media.media-1.mobile.ua')->render();
                break;
            case 'komu-neobhodim-irrigator':
                $this->title =  'Кому потрібен іригатор? Медіатека | Мед. Издание Medpravda';
                $this->description = 'Медіатека. Кому потрібен іригатор? на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-2.mobile.ua')->render();
                break;
            case 'ortop-selyki-dlya-obuvi':
            	$this->title =  'Ортоп - устілки для взуття. Медіатека | Мед. Издание Medpravda';
                $this->description = 'Медіатека. Ортоп - устілки для взуття на Medpravda.ua';
                $this->content = view('OLEGYERA.FrontBox.Media.media-3.mobile.ua')->render();
                break;
            default:
                abort(404);
                break;
        }

        return $this->renderBasic();
    }
}
