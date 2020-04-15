$(document).ready(function(){

    // show list of shootrecords on first load
    showProducts();
// when a 'read products' button was clicked
    $(document).on('click', '.read-products-button', function(){
        showProducts();
    });
});

// function to show list of products
function showProducts(){

// get list of products from the API
    $.getJSON("/JudgeDatabase/api/shootrecords/read.php", function(data){
        // html for listing products

        var read_products_html=`
    <!-- when clicked, it will load the create shootrecords form -->
    <div id='create-product' class='btn btn-success pull-right m-b-15px create-shootrecords-button'>
        <span class='glyphicon glyphicon-plus'></span> Add New Shoot
    </div>
     <div id='upload-product' class='btn btn-primary pull-right m-b-15px upload-shootrecords-button'>
        <span class='glyphicon glyphicon-list'></span> Upload J07
    </div>
    <div id='read-JLO' class='btn btn-danger pull-left m-b-15px readJLO-products-button'>
   <span class='glyphicon glyphicon-list'></span> JLO Shoots
   </div>
     <div id='personal-export' class='btn btn-primary pull-right m-b-15px personalexport-shootrecords-button'>
        <span class='glyphicon glyphicon-list'></span> Export My Shoots
    </div>
    
<!-- start table -->
<table class='table table-bordered table-hover'>
 
    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Date</th>
        <th class='w-5-pct'>Event Name</th>
        <th class='w-5-pct'>Event Round</th>
        <th class='w-3-pct'>Rules</th>
        <th class='w-5-pct'>Event Level</th>
        <th class='w-5-pct'>Event Type</th>
        <th class='w-3-pct'>Role</th>
        <th class='w-3-pct'>Event Options</th>
        <th class='w-3-pct'>Status</th>
        <th class='w-10-pct text-align-center'>Action</th>
    </tr>`;
     
// loop through returned list of data
$.each(data.records, function(key, val) {
 
    // creating new table row per record
    read_products_html+=`
        <tr>
            <td>` + val.EvDate + `</td>
            <td>` + val.EvName + `</td>
            <td>` + val.EvRound + `</td>
            <td>` + val.EvOrg + `</td>
            <td>` + val.EvLevel + `</td>
            <td>` + val.EvDiscipline + `</td>
            <td>` + val.EvRole + `</td>
            <td>` + val.EvOptional + `</td>
            <td>` + val.EvStatus + `</td>
                  
                  
 
            <!-- 'action' buttons -->
            <td>
                <!-- read shootrecords button -->
             <!--   <button class='btn btn-primary m-r-5px read-one-shootrecords-button' data-id='` + val.ID + `'>
                    <span class='glyphicon glyphicon-eye-open'></span> Read
                </button> -->
 
                <!-- edit button -->
                <button class='btn btn-info m-r-5px update-shootrecords-button' data-id='` + val.ID + `'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </button>
 
                <!-- delete button -->
                <button class='btn btn-danger delete-shootrecords-button' data-id='` + val.ID + `'>
                    <span class='glyphicon glyphicon-remove'></span> Delete
                </button>
            </td>
 
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