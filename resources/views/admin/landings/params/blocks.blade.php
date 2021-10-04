<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Статус</th>
        <th>Позиция</th>
        <th>Тип</th>
        <th>Редактировать</th>
    </tr>
    </thead>
    <tbody>
    @forelse($blocks as $block)
        <tr>
            <td>{{ $block->title }}</td>
            <td>
                {!! $block->approved ? '<img src="'.asset('assets/admin/imgs/img-yes.svg').'"
                                                             alt="confirm">' : '<img
                src="'.asset('assets/admin/imgs/img-no.svg').'" alt="cancel">' !!}
            </td>
            <td class="text__center">{{ $block->position }}</td>
            <td class="text__center">{{ $block->source }}</td>
            <td>
                <a href="{{ route('landing_block_edit', ['block_id'=>$block->id, 'loc'=>'ru']) }}" class="btn"
                   title="Редактировать">Редактировать</a>
            </td>
        </tr>
    @empty

    @endforelse
    </tbody>
</table>
