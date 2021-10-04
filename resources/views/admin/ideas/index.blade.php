@include('admin.ideas.nav')
<div class="">
    <h3>Текущий месяц</h3>
    <table class="table bg-info">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>URL</th>
            <th>План показов</th>
            <th>Факт показов</th>
            {{--<th>План кликов по баннеру</th>--}}
            <th>Факт кликов по баннеру</th>
            <th>utm_source</th>
            <th>utm_medium</th>
            <th>utm_campaign</th>
            <th>utm_content</th>
            <th>Дата старта</th>
            <th>Дата финиша</th>
            <th>Статус</th>
            <th>Клонировать</th>
        </tr>
        @forelse($topical as $item)
            <tr @if(1 !== $item->approved) class="bg-danger" @endif>
                <td>{{ $loop->iteration }}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->url}}</td>
                <td>{{$item->transition}}</td>
                <td>{{$item->clicked}}</td>
                <td>{{$item->banner_click}}</td>
                {{--<td>5000</td>--}}
                <td>{{$item->utm_source}}</td>
                <td>{{$item->utm_medium}}</td>
                <td>{{$item->utm_campaign}}</td>
                <td>{{$item->utm_content}}</td>
                <td>{{$item->start->format('d-m-Y')}}</td>
                <td>{{$item->stop->format('d-m-Y')}}</td>
                <td>
                    @if($item->approved && !$item->stoped)
                        <a class="btn btn-sm btn-danger change-status" data-id="{{$item->id}}"
                           data-status="null">
                            Стоп
                        </a>
                    @elseif($item->stoped)
                        <a class="btn btn-sm btn-dafault" data-id="{{$item->id}}">
                            Окончена
                        </a>
                    @else
                        <a class="btn btn-sm btn-success change-status" data-id="{{$item->id}}"
                           data-status="1">
                            Старт
                        </a>
                    @endif
                </td>
                <td>
                    <a href="{{route('greatidea.edit', $item->id)}}" class="btn btn-sm btn-warning">Клонировать</a>
                </td>
            </tr>
        @empty
            <h3>Нет актуальных компаний.</h3>
        @endforelse
        <hr>
        <tr class="lead">
            <td>Всего</td>
            <td>---</td>
            <td>---</td>
            <td>{{$topical->sum('transition')}}</td>
            <td>{{$topical->sum('clicked')}}</td>
            <td>{{$topical->sum('banner_click')}}</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
        </tr>
    </table>
    <hr>
    <h3>За прошлый месяц</h3>
    <table class="table bg-info">
        <tr>
            <th>Название</th>
            <th>URL</th>
            <th>План показов</th>
            <th>Факт показов</th>
            {{--<th>План кликов по баннеру</th>--}}
            <th>Факт кликов по баннеру</th>
            <th>utm_source</th>
            <th>utm_medium</th>
            <th>utm_campaign</th>
            <th>utm_content</th>
            <th>Дата старта</th>
            <th>Дата финиша</th>
            {{--<th>Статус</th>--}}
            <th>Клонировать</th>
        </tr>
        @forelse($overpast as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->url}}</td>
                <td>{{$item->transition}}</td>
                <td>{{$item->clicked}}</td>
                <td>{{$item->banner_click}}</td>
                {{--<td>5000</td>--}}
                <td>{{$item->utm_source}}</td>
                <td>{{$item->utm_medium}}</td>
                <td>{{$item->utm_campaign}}</td>
                <td>{{$item->utm_content}}</td>
                <td>{{$item->start->format('d-m-Y')}}</td>
                <td>{{$item->stop->format('d-m-Y')}}</td>
                {{--<td><a class="btn btn-sm btn-danger">Приостановить</a></td>--}}
                <td>
                    <a href="{{route('greatidea.edit', $item->id)}}" class="btn btn-sm btn-warning">Клонировать</a>
                </td>
            </tr>
        @empty
            <h3>Нет актуальных компаний.</h3>
        @endforelse
        <hr>
        <tr class="lead">
            <td>Всего</td>
            <td>---</td>
            <td>{{$overpast->sum('transition')}}</td>
            <td>{{$overpast->sum('clicked')}}</td>
            <td>{{$overpast->sum('banner_click')}}</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            {{--<td>---</td>--}}
            <td>---</td>
            <td>---</td>
        </tr>
    </table>
</div>