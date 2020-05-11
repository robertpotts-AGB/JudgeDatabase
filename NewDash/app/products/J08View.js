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
<table class='table table-bordered table-hover table-sm'>
 
    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>AGB ID</th>
        <th class='w-5-pct'>Name</th>
        <th class='w-5-pct'>Total Days</th>
       
            <th class='w-3-pct'>WA</th>
            <th class='w-5-pct'>AGB</th>
            <th class='w-5-pct'>Training</th>
            <th class='w-5-pct'>International</th>
            <th class='w-5-pct'>National</th>
            <th class='w-5-pct'>Regional</th>
            <th class='w-5-pct'>County</th>
            <th class='w-5-pct'>Club</th>
            <th class='w-5-pct'>WRS</th>
            <th class='w-5-pct'>UKRS</th>
            <th class='w-5-pct'>COJ</th>
            <th class='w-5-pct'>Judge</th>
                      
            
    
  
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
            <td>` + val.International + `</td>
            <td>` + val.National + `</td>
            <td>` + val.Regional + `</td>
            <td>` + val.County + `</td>
            <td>` + val.Club + `</td>
            <td>` + val.WRS + `</td>
            <td>` + val.UKRS + `</td>
            <td>` + val.COJ + `</td>
            <td>` + val.Judge + `</td>
      
            
      
                  
                  
 
            <!-- 'action' buttons -->
            <td>
                <!-- read shootrecords button -->
              <button class='btn btn-primary m-r-5px read-one-shootrecords-button' data-id='` + val.ID + `'>
                    <span class='glyphicon glyphicon-eye-open'></span> Read
                </button>
 
                <!-- edit button -->
               
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