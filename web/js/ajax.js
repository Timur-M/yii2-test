$(function(){

    

    $('#receiver_selector').change(function() {
        let id = $(this).find('option:selected').val();
        $.ajax({
            url: '/employee/ajax_get_employee',
            type: 'POST',
            dataType: 'JSON',
            data: {id:id},
            success: function (json) {
                console.log(json);
                if(json){
                    let content  = 'Роль: '+json.role_name+'<br>';
                        content += 'e-mail: '+json.employee_email;
                    $('#receiver_info').html(content);
                } else {
                    $('#receiver_info').html('');
                }
            }
        });
    });

});