<style>
    #draggablePanelList .panel-heading {
        cursor: move;
        text-align: center;
    }

    div {
        width: 100%
    }
</style>
@if($current_id=="1")
    <div class="breadcrumb">
        <span>Проблематика</span>
    </div>
@else
    <div class="breadcrumb">
        {!! $bread_crumb !!}
    </div>
@endif


<div class="top__nav">
    @foreach($main_categories as $m_category)
        <a href="{{route('problematic.list.index', $m_category->children->id)}}" class="btn">{{$m_category->children->title}}</a>
    @endforeach
</div>

<div class="">
    {!! Form::open([
   'route' => 'problematic.sort.menu'
 ]) !!}

    <ul id="draggablePanelList" class="list-unstyled">
        <li>
            <div class="problem-thead">
                <p style="width: 52px;" class="problem-inner-handle problem-border-right"></p>
                <p class="problem-inner-img"></p>
                <p style="width: 40vw;" class="problem-border-right">Название</p>
                <p style="width: 15vw" class="problem-border-right">URL</p>
                <p style="width: 200px" class="problem-border-right">Активный</p>
                <p style="width: 150px">
                    <a href="{{route('problematic.create.with_root', ['root_id' => $current_id])}}"
                       class="btn"
                    >Добавить</a>
                </p>
            </div>
        </li>
        @if(!empty($child_elements))

            @foreach($child_elements as $element)
                {!! Form::hidden('root', $current_id) !!}
                <li class="panel panel-info">

                    {!! Form::hidden('child_'.$element->children->id,$element->children->id) !!}
                    <div class="problem-inner">
                        <div class="problem-inner-handle panel-heading problem-border-right">&#8661;</div>
                        <div class="problem-inner-img">
                            @if(!$element->children->root_page)
                                <img src="../../../../assets/admin/imgs/problem-file.svg" alt="statya">
                            @else
                                <img src="../../../../assets/admin/imgs/problem-folder.svg" alt="Union">
                            @endif
                        </div>
                        <div class="problem-inner-name problem-border-right">
                            @if(!$element->children->root_page)
                                <span style="cursor: default">{{$element->children->title}}</span>
                            @else
                                <a href="{{route('problematic.list.index', ['root_id' => $element->children->id])}}">
                                    <span style="cursor: pointer">{{$element->children->title}}</span>
                                </a>
                            @endif
                        </div>
                        <div class="problem-inner-url problem-border-right">
                            <p>{{$element->children->alias}}</p>
                        </div>
                        <div class="problem-inner-active problem-border-right">
                            @if($element->children->approved)
                                <img src="https://medpravda.ua/assets/admin/imgs/img-yes.svg" alt="confirm">
                            @else
                                <img src="https://medpravda.ua/assets/admin/imgs/img-no.svg" alt="cancel">
                            @endif
                        </div>
                        <div class="problem-inner-options ">
                            <img src="https://medpravda.ua/assets/admin/imgs/problematic.svg" alt="add">
                            @if(!$element->children->root_page)
                                <div class="drop-menu-problem">
                                    <a class="btn btn__full btn-drop-redact"
                                       href="{{route('problematic.edit', ['id'=>$element->children->id ])}}">Редактировать </a>
                                    <a class="btn"
                                       href="{{route('problematic.edit', ['id'=>$element->children->id ])}}">Предпросмотр </a>
                                    <button type="button" data-id="{{$element->children->id}}"
                                            class="btn btn__red btn-drop-delete">Удалить
                                    </button>
                                </div>
                            @else
                                {{--<a class="btn btn-blue problematic-list-show" href="{{route('problematic.list.index', ['root_id' => $element->children->id])}}"></a>--}}
                                <div class="drop-menu-problem">
                                    <a class="btn btn__full btn-drop-redact"
                                       href="{{route('problematic.edit', ['id'=>$element->children->id ])}}">Редактировать </a>
                                </div>
                            @endif
                        </div>
                    </div>

                </li>
            @endforeach
        @else
            <li>
                <div>
                    нету вложенности
                </div>
            </li>
        @endif

    </ul>

    @if(!empty($child_elements))
        {{--<div style="margin: 20px 0">--}}
        {{--<button class="btn btn-blue" type="submit">Сохранить</button>--}}
        {{--</div>--}}
    @endif
</div>


{!! Form::close() !!}
