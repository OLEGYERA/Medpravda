@include('admin.ideas.nav')
<h1>Сценарии</h1>
<img src="{{ asset('/assets/images/index/scenarios.png') }}">
<hr>
<table class="table bg-info">
    <tr>
        <th>Название</th>
        <th>Шаг №1</th>
        <th>Шаг №2</th>
        <th>Шаг №3</th>
        <th>Шаг №4</th>
        <th>Шаг №5</th>
        <th>Редактировать</th>
    </tr>

    @forelse($scenarios as $scenario)
    <tr>
        <td>{{$scenario->title}}</td>
        <td>{{ $scenario->step1['option'] }}</td>
        <td>{{ $scenario->step2['option'] }}</td>
        <td>{{ $scenario->step3['option'] }}</td>
        <td>{{ $scenario->step4['option'] }}</td>
        <td>{{ $scenario->step5['option'] }}</td>
        <td>
            <a href="{{route('scenarios.edit', $scenario->id)}}" class="btn btn-sm btn-warning">
                Редактировать</a>
        </td>
    </tr>
    @empty
        <h2>Нет сценариев</h2>
    @endforelse
</table>