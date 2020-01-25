$(".touch").click(getDoctors());


function getDoctors(){
    $.ajax({
        url: "/ajax/ajax.staff.php",
        type: "post",
        data: {get_doctors:true},
        success: function (data) {
            var doctors = JSON.parse(data);
            $.each(doctors,function (key,value) {
                $('#doctors').append('<option value="'+value.id+'">'+value.first_name+' '+value.third_name+' '+ value.last_name+' - '+value.prof+'</option>')
            })
        },
        error: function () {

        }
    });
}






