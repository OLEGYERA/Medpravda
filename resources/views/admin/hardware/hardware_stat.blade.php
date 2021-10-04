<div class="breadcrumb">
    <span>Статистика сервера</span>
</div>
<div class="wrap__block"> <!--белый блок-->
    <h2 class="description">Server Memory Usage:</h2>
    <p class="result">= {{$memory}} %</p>

    <hr>

    <h2 class="description">Server CPU Usage:</h2>

    <p class="result">= {{$cpu}} %</p>
    <button class="btn btn__full" onclick="document.location.reload()">Обновить</button>
</div>