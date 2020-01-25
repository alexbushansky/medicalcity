

getAppointment();
var time="";
$('.touch').click(function () {
    time = $(this).attr('data-time');


    $("#save").click(function() {

        var data =
            {
                complaint :$('.complaint').val(),
                idPatient : $(".patient").attr('data-id'),
                idDoctor : $("#doctors option:selected").attr('value'),
                date :  $(".day-table table").attr('data-date'),
                time:time.replace("-",":")
            };


        $('.complaint').val("");
        $(".patient").val("");
        $("#doctors").val($("#doctors option:first").val());




        if(data.complaint!=="" && data.idPatient!==undefined && data.idDoctor!==undefined) {
            console.log(data);
            var json = JSON.stringify(data);
            $.ajax({
                url: "/ajax/ajax.appointmentToDoctor.php",
                type: "post",
                data:  {info:json},
                success: function (data) {
                   if(data==true)
                   {
                       getAppointment();

                       $(".light-box").removeClass("show");
                       $(".overlay").hide();
                   }
                   else
                   {
                       $(".light-box").stop().addClass("animated rubberBand error");
                       setTimeout(function () {
                           $(".light-box").removeClass("animated rubberBand")
                       },2000)
                   }
                }
            })
        }
        else
        {
            alert("Заполните все поля!")
            $('.complaint').val(data.complaint);
        }
    });
});


function getAppointment() {
    var date = $(".day-table table").attr('data-date');
    $.ajax({
        url:"/ajax/ajax.getAppointments.php",
        type:"post",
        async:true,
        data: "date="+date,
        success: function (data) {

            if(data.length!=0)
            {
                $('.touch').html("");
                var app = JSON.parse(data);
                $.each(app,function (key,value) {
                    var marker = '<span data-id ="'+value.id+'"class="marker">'+value.first_name+' '+
                        value.last_name+' ( '+ value.d_surname + ' - ' + value.name+' )</span>';
                        var arr = value.time.split(":");
                        console.log(marker);
                        console.log(arr[0]+" "+arr[1]);
                    $('td[data-time='+arr[0]+'-'+arr[1]+']').append(marker);
                })

            }
        }
    })
}





