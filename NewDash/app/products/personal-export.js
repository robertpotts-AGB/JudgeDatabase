$(document).ready(function() {

    // will run if the delete button was clicked
    $(document).on('click', '.personalexport-shootrecords-button', function () {

                $('#wait-animation').show();
                //var table="thcu_cabtemphpc";
                alert("Export in progress");
                document.location.href = '../api/shootrecords/CSVPersonalExport.php';
                $('#wait-animation').hide();
            });
});