@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="traffic-light">
            <div class="light red"></div>
            <div class="light yellow"></div>
            <div class="light green"></div>
        </div>
        <button id="forward">Вперед</button>
    </div>
    <table id="log">
        <thead>
        <tr>
            <th>Время</th>
            <th>Сообщение</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
<script type="module">
    /**
     * Порядок переклюючения цветов
     */
    var colors = ['green', 'yellow', 'red', 'yellow'];

    /**
     * Длительности горения соответственных цветов
     */
    var intervals = [5000, 2000, 5000, 2000];

    /**
     * Сообщения соответствуюющие текущему цвету
     * и тому который горел раньше (в случае с желтым цветом)
     */
    var messages = {
        'green-yellow': 'Проезд на зеленый!',
        'yellow-red': 'Успели на желтый!',
        'red-yellow': 'Проезд на красный. Штраф!',
        'yellow-green': 'Слишком рано начали движение!'
    };

    var index = 0;
    var log = $('#log tbody');
    var interval;

    /**
     * Смена цветов светофора в соответствии с интервалами из условий задачи
     */
    function changeColor() {
        $('.light').removeClass('on');
        $('.' + colors[index]).addClass('on');
        clearInterval(interval);
        interval = setInterval(changeColor, intervals[index]);
        index = (index + 1) % colors.length;
    }

    /**
     * Обработка нажатия кннопки. Переменная message - сообщение которое будет отправлено серверу,
     * оно формируется исходя из того какой цвет сейчас горит на светофоре
     * Далее выполняем AJAX запрос на эндпоинт записи в лог, получаем ответ от сервера в котором содержится
     * дата-время созданной записи в БД и после этого делаем соответствующую запись в таблицу логов на странице
     */
    $('#forward').click(function() {
        var color = $('.light.on').attr('class').split(' ')[1];
        var message = messages[color + '-' + colors[index % colors.length]];
        $.ajax({
            url: '/forward',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { message: message },
            success: function(response) {
                log.prepend('<tr><td>' + response.time + '</td><td>' + message + '</td></tr>');
            }
        });
    });

    $(function() {
        changeColor();
    });
</script>
@endsection
