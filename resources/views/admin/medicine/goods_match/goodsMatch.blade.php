<div class="breadcrumb">
    <a href="{{route('medicine_admin')}}">Препараты</a>
    <span>Связь аптечных препаратов.</span>
</div>

<div class="wrap__block medicine-mach-info">

    <div class="input__group">
        <input type="text" id="proiz" class="form-control" value="{{$fabricator->title}}" readonly>
        {{ Form::label('proiz', 'Производитель') }}
    </div>
    <div class="input__group">
        <input type="text" id="doz" class="form-control disabled" value="{{$medicines->dose}}"
               readonly>
        {{ Form::label('doz', 'Дозировка') }}
    </div>
    <div class="input__group">
        <input type="text" id="lekar" class="form-control" value="{{$medicines->docs_form}}"
               readonly>
        {{ Form::label('lekar', 'Лекарственная форма') }}
    </div>

</div>

<div class="wrap__block"> <!--белый блок-->
    <h2>Поиск аптечных препаратов</h2>
    {{Form::open([
                    'url' => route('goods.medicine.find.post'),
                    'method' => 'GET',
                    'id' => 'searchForm'
                ])}}

    <input type="hidden" id="hidden_medicine_id" name="medicine_id" value="{{$medicines->id}}">
    <div class="input__group"><!--обычный инпут-->
        <input type="text" name="searchInput" class="form-control" id="searchGoods"
               aria-describedby="Search" placeholder="Введите название препарата">
        <label for="search">Строка поиска</label>
    </div>
    {{Form::close()}}
</div>
{{--result table--}}
{!! Form::open([
    'url' => 'https://medpravda.ua/api/apteki_module/public/index.php/adm/add/relation',
    'method' => 'post',
    'id' => 'goodsAddTable'
]) !!}
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Производитель</th>
        <th>Название сети</th>
        <th>
            <label for="checkAll" style="position: static"><input type="checkbox" name="" value=""
                                                                  id="checkAll"> Выбрать все</label>
        </th>
    </tr>
    </thead>
    <tbody class="searchTableResult">
    {{--insert result here--}}
    </tbody>

</table>
<button type="submit" class="btn">Связать</button>
{!! Form::close() !!}

<hr style="margin-top: 20px">
<h2>Аптечные связанные препараты</h2>
@if(session()->has('delete_success'))
    <div class="alert alert-success fade in">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('delete_success') }}
    </div>
@endif

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Производитель</th>
        <th>Название сети</th>
        <th>Остача</th>
        <th>Удалить</th>
    </tr>
    </thead>

    <tbody class="tbody-goods">

    </tbody>
</table>



