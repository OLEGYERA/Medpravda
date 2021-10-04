<div class="two__column">
    <div>
        <h2>Слайды</h2>
    </div>
    <div>
        <a href="{{ route('landing_block_add_slider', ['block_id'=>$block->id, 'loc'=> $loc]) }}" class="btn btn__full">
            Добавить слайд
        </a>
    </div>
</div>


<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Картинка</th>
        <th>Видео</th>
        <th>Позиция</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
    @forelse($block->slider as $slide)
        <tr>
            <td class="text__center">{{ $slide->id }}</td>
            <td><img src="{{$slide->getImg()}}" class="img-responsive img-thumbnail landing"></td>
            <td>{{ $slide->video }}</td>
            <td class="text__center">{{ $slide->position }}</td>
            <td>
                <a href="{{ route('landing_block_edit_slider', ['slide_id'=>$slide->id, 'loc'=>'ru']) }}"
                   class="btn" title="Редактировать">Редактировать</a>
            </td>
            <td>
                {{Form::open([
                                        'url' => route('landing_block_delete_slider', ['slide_id'=>$slide->id, 'loc'=>'ru']),
                                        'method' => 'delete'])}}
                <button onclick="return confirm('Вы точно хотите это удалить?')" data-id="{{$slide->id}}"
                        type="submit" class="delete btn btn__red" title="Удалить слайд">Удалить
                </button>
                {{Form::close()}}
            </td>
        </tr>

    @empty
    @endforelse
    </tbody>
</table>










