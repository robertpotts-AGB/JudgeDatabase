$(document).ready(function(){


// when a 'read products' button was clicked
$(document).on('click', '.readJLO-products-button', function(){
showJLOProducts();
});
});

// function to show list of products
function showJLOProducts(){
// get list of products from the API
$.getJSON("/JudgeDatabase/api/shootrecords/readregion.php", function(data){
// html for listing products
var read_products_html=`
<!-- when clicked, it will load the create shootrecords form -->
<div id='create-product' class='btn btn-primary pull-right m-b-15px create-shootrecords-button'>
    <span class='glyphicon glyphicon-plus'></span> Create Shoots
</div>
<div id='upload-product' class='btn btn-primary pull-right m-b-15px upload-shootrecords-button'>
    <span class='glyphicon glyphicon-list'></span> Upload Shoots
</div>

  <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
        <span class='glyphicon glyphicon-list'></span> My Shoots
    </div>
<!-- start table -->
<table class='table table-bordered table-hover'>

    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Name</th>
        <th class='w-5-pct'>Date</th>
        <th class='w-5-pct'>Event Name</th>
        <th class='w-5-pct'>Event Round</th>
        <th class='w-3-pct'>Rules</th>
        <th class='w-5-pct'>Event Level</th>
        <th class='w-5-pct'>Event Type</th>
        <th class='w-3-pct'>Role</th>
        <th class='w-3-pct'>Event Options</th>
        <th class='w-3-pct'>Status</th>
       <!-- <th class='w-10-pct text-align-center'>Action</th> -->
    </tr>`;

    // loop through returned list of data
    $.each(data.records, function(key, val) {

    // creating new table row per record
    read_products_html+=`
    <tr>
        <td>` + val.display_name + `</td>
        <td>` + val.EvDate + `</td>
        <td>` + val.EvName + `</td>
        <td>` + val.EvRound + `</td>
        <td>` + val.EvOrg + `</td>
        <td>` + val.EvLevel + `</td>
        <td>` + val.EvDiscipline + `</td>
        <td>` + val.EvRole + `</td>
        <td>` + val.EvOptional + `</td>
        <td>` + val.EvStatus + `</td>



  

    </tr>`;
    });
    // end table
    read_products_html+=`</table>`;
// inject to 'page-content' of our app
$("#page-content").html(read_products_html);
// chage page title
changePageTitle("My Shoots");

});
}