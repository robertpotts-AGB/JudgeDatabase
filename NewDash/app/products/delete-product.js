$(document).ready(function(){

    // will run if the delete button was clicked
    $(document).on('click', '.delete-shootrecords-button', function(){
        // get the shootrecords id
        var product_id = $(this).attr('data-id');
        // bootbox for good looking 'confirm pop up'
        bootbox.confirm({

            message: "<h4>Are you sure?</h4>",
            buttons: {
                confirm: {
                    label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: '<span class="glyphicon glyphicon-remove"></span> No',
                    className: 'btn-primary'
                }
            },
            callback: function (result) {
                if(result==true){
                    // send delete request to api / remote server
                    $.ajax({
                        url: "/JudgeDatabase/api/shootrecords/delete.php",
                        type: "POST",
                        async: false,
                        dataType: 'json',
                        data: JSON.stringify({ID: product_id}),
                    });
                    showProducts();
                    }

                }

        });

    });


});