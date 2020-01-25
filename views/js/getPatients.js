


$(".touch").click(function () {



    $.ajax({
        url: "/ajax/ajax.patient.php",
        type: "post",
        data: {get_patient:true},
        success: function (data) {

            let patient = JSON.parse(data);

            let numbers=[];

            $.each(patient,function (key,value) {


               value.info=value.number+" - "+value.first_name+" "+value.last_name;

                numbers.push(value);

            });

            $('.patient').autocomplete({source:[{
                    titleKey:'info',
                    valueKey:'info',
                    data:numbers,
                }]}).on('selected.xdsoft',function(e,datum){
                     $('.patient').attr('data-id',datum.id);
            });


        },
        error: function () {

        }
    });
});

    $('#save').click(function () {
        $('.patient').attr('data-id');
    });


