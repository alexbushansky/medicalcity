
<nav class="navbar navbar-expand-lg navbar-light bg-light nav-block">

    <a class="navbar-brand" href="#"><img src="/views/img/logo.png" width="100px"  height="80px"></a>

    <div >
        Здравствуй, {{get|raw}}
    </div>
    <div class="head-center">
        <h2><strong>Кабинет Персонала</strong></h2>
    </div>

    <div class="head-left">
        <div class="row">

            <div class="col-lg-6">
                <img src="/views/img/avatar.png" height="80px" width="80px">
            </div>

            <div  class="col-lg-6">
                <a href="#">Ваш кабинет</a>

                <a href="/main/logout">Выход</a>
            </div>
        </div>
    </div>

    </div>

</nav>


<div class="day-table">
    <div class="calendar">
        <div id = "calendar-1"></div>
    </div>
    <table class = "dates" data-date="2019.01.01">
        <thead>
        <tr>
            <td width="100"></td>
            <td>2019.01.01</td>
        </tr>
        </thead>


        <tbody></tbody>

    </table>
</div>

<div class="light-box">
    <a href="#" class="close">Close</a>
    <textarea class="complaint"></textarea>


    <p>
    <input class="patient" type="text" name="patientName">
    </p>
    <p>
    <select id="doctors">
        <option>Выбрать врача</option>
    </select>
    </p>
    <button id = "save">Сохранить</button>
</div>

<div class="overlay">


</div>


