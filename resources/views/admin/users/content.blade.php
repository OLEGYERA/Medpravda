<div class="breadcrumb">
    <span>Пользователи</span>
</div>

<div class="top__nav">
    {!! Form::open(['url' => route('users_create'),'class'=>'form-horizontal','method'=>'GET']) !!}
    {!! Form::button('Добавить нового пользователя', ['class' => 'btn btn__full','type'=>'submit']) !!}
    {!! Form::close() !!}
</div>


<!-- START PAGINATION DIV -->
<div class="pagination">
    @if(is_object($users) && !empty($users->lastPage()) && $users->lastPage() > 1)
        @if($users->lastPage() > 1)
            @if($users->currentPage() !== 1)
                <a rel="prev" href="{{ $users->url(($users->currentPage() - 1)) }}"
                   class="prev">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @else
            @endif
            @if($users->currentPage() >= 3)
                <a class="pagin" href="{{ $users->url($users->url(1)) }}">1</a>
            @endif
            @if($users->currentPage() >= 4)
                <a class="pagin">...</a>
            @endif
            @if($users->currentPage() !== 1)
                <a class="pagin" href="{{ $users->url($users->currentPage()-1) }}">{{ $users->currentPage()-1 }}</a>
            @endif
            <a class="pagin active">{{ $users->currentPage() }}</a>
            @if($users->currentPage() !== $users->lastPage())
                <a class="pagin" href="{{ $users->url($users->currentPage()+1) }}">{{ $users->currentPage()+1 }}</a>
            @endif
            @if($users->currentPage()+1 < $users->lastPage())
                <a class="pagin" href="{{ $users->url($users->currentPage()+2) }}">{{ $users->currentPage()+2 }}</a>
            @endif
            @if($users->currentPage()+2 < $users->lastPage())
                <a class="pagin" href="{{ $users->url($users->currentPage()+3) }}">{{ $users->currentPage()+3 }}</a>
            @endif
            @if($users->currentPage()+3 < $users->lastPage())
                <a class="pagin" href="{{ $users->url($users->currentPage()+4) }}">{{ $users->currentPage()+4 }}</a>
            @endif
            @if($users->currentPage() < ($users->lastPage()-5))
                {{--<li><a href="#">...</a></li>--}}
                <span>...</span>
            @endif
            @if($users->currentPage() < ($users->lastPage()-4))
                <a class="pagin" href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
            @endif
            @if($users->currentPage() !== $users->lastPage())
                <a rel="next" href="{{ $users->url(($users->currentPage() + 1)) }}"
                   class="next">
                    <img src="{{asset('assets/admin/imgs/arrow.svg')}}" alt="1">
                </a>
            @endif
        @endif
    @endif
</div>
<!-- END PAGINATION DIV -->


<!-- START CONTENT -->
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Почта</th>
        <th>Роль</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($users))
        @foreach($users as $user)
            <tr>
                <td class="text__center">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text__center">{{ $user->role->name }}</td>
                <td>
                    {!! Form::open(['url' => route('users_update',['users'=> $user->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Редактировать', ['class' => 'btn btn-white','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
                <td>
                    {!! Form::open(['url' => route('delete_user',['users'=> $user->id]),'class'=>'form-horizontal','method'=>'GET']) !!}
                    {!! Form::button('Удалить', ['class' => 'btn btn__red','type'=>'submit']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
