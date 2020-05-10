$(document).ready(function(){

    // show list of shootrecords on first load
    showlevel();
// when a 'read products' button was clicked
    $(document).on('click', '.read-level-button', function(){
        showlevel();

        return false;
        $("#page-content1").html("");
        $("#page-content2").html("");
        $("#page-content3").html("");
        $("#page-content4").html("");
        $("#page-content5").html("");
    });
});

// function to show list of products
function showlevel(){

// get list of products from the API
    $.getJSON("/JudgeDatabase/api/shootrecords/NextLvelCalc.php", function(data){
        // html for listing products



        var read_products_html=`
    <!-- when clicked, it will load the create shootrecords form -->
    
   
<!-- start table -->
<table id='table1' class='table table-bordered table-hover data-table'>
 
    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Item</th>
        <th class='w-5-pct' data-field="w">Next Level</th>
        <th class='w-5-pct' data-field="h">Your Statistics</th>
       
    </tr>`;

// loop through returned list of data

$.each(data.records, function(key, val) {
 
    // creating new table row per record
    read_products_html+=`
            <tr>
            <td></td>
            <td>` + val.LvName + `</td>
            
            </tr>
            <tr>
            <td> Minimum Days </td>
            <td>` + val.LvMinDays + `</td>
            <td>` + val.TotalDays + `</td>
            </tr>
            <td> Minimum World Record shoots </td>
            <td>` + val.LvWRS + `</td>
            <td>` + val.WRS + `</td>
            </tr>
            <tr>
             <td> Minimum RS Shoots </td>
            <td>` + val.LvRS + `</td>
             <td>` + val.UKRS + `</td>
            </tr>
            <tr>
             <td> Minimum Indoors </td>
            <td>` + val.LvIndoor + `</td>
             <td>` + val.Indoor + `</td>
            </tr>
            <tr>
             <td> Minimum events as COJ </td>
            <td>` + val.LvCOJ + `</td>
             <td>` + val.COJ + `</td>
            </tr>
            <tr>
             <td> Minimum Head to Head events </td>
            <td>` + val.LvH2H + `</td>
             <td>` + val.H2H + `</td>
            </tr>
            <tr>
             <td> Minimum Confrence Attendance</td>
            <td>` + val.LvNatConf + `</td>
             <td>` + val.Conference + `</td>
            </tr>
                              
        </tr>`;

}); 
// end table

read_products_html+=`</table>`;

// inject to 'page-content' of our app
$("#page-content").html(read_products_html);
// chage page title
changePageTitle("Current Status");

    });


}
