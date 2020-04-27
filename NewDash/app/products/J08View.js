$(document).ready(function(){

    // show list of shootrecords on first load

// when a 'read products' button was clicked
    $(document).on('click', '.J08-view-button', function(){
        J08View();
        $("#page-content1").html("");
        $("#page-content2").html("");
        $("#page-content3").html("");
        $("#page-content4").html("");
        $("#page-content5").html("");
    });
});

// function to show list of products
function J08View(){

// get list of products from the API
    $.getJSON("/JudgeDatabase/api/shootrecords/J08view.php", function(data){
        // html for listing products

        var read_products_html=`
    <!-- when clicked, it will load the create shootrecords form -->
    
  
    
<!-- start table -->
<table class='table table-bordered table-hover'>
 
    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Date</th>
        <th class='w-5-pct'>Event Name</th>
        <th class='w-5-pct'>Event Round</th>
        <th class='w-3-pct'>Rules</th>
        <th class='w-5-pct'>Event Level</th>
        <th class='w-5-pct'>Event Level</th>
  
        <th class='w-10-pct text-align-center'>Action</th>
    </tr>`;
     
// loop through returned list of data
$.each(data.records, function(key, val) {
 
    // creating new table row per record
    read_products_html+=`
        <tr>
            <td>` + val.AGBNo + `</td>
            <td>` + val.display_name + `</td>
            <td>` + val.TotalDays + `</td>
            <td>` + val.WA + `</td>
            <td>` + val.AGB + `</td>
            <td>` + val.Training + `</td>
         
                  
                  
 
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