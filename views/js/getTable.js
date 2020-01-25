var hours = 9;
var minutes = 0;
var zero=0;
var date="";
var time="";


for(var i=0; i<=18; i++)
{

    $('table tbody').append(`<tr>
                                <td>`+hours+':'+minutes+zero+`</td>
                                <td data-time="`+hours+'-'+minutes+zero+`" class="touch"></td>
                                </tr>`);

    minutes+=3;
    if(minutes>=6)
    {
        hours++;
        minutes=0;

    }
}

// $('.day-table tr:nth-child(3) td:nth-child(2)').html(marker);



$("table").on('click','.marker',function (e) {
    e.stopPropagation();

    return false;
});







$("table").on('click','.touch',function (e) {

    $(".light-box").addClass("show");
    $(".overlay").show();

   date = $(this).parent().parent().parent().attr('data-date');

   time = $(this).attr('data-time');

});

$(".close").click(function () {
    $(".light-box").removeClass("show");
    $(".overlay").hide();
});

$("#calendar-1").ionCalendar({
    lang: "ru",
    sundayFirst: false,
    years: "50",
    format: "YYYY-MM-DD",
    onReady: function(date)
    {
        setDate(date);

    },
    onClick: function(date){

        setDate(date);
        getAppointment();

    }
});


function setDate(dateNow) {

    $(".day-table table").attr('data-date',dateNow);

    $("thead tr td:nth-child(2)").html(dateNow);
}



