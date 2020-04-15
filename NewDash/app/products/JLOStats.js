$(document).ready(function(){


// when a 'read products' button was clicked
    $(document).on('click', '.JLOstats-products-button', function(){
        showJLOStats();
    });
    $(document).on('click', '.JLOstats-level-products-button', function(){
        showJLOStats2();
    });
});

// function to show list of products
function showJLOStats() {
// get list of products from the API
    $.getJSON("/JudgeDatabase/api/shootrecords/JLOCalcs.php", function (data) {
// html for listing products
        var read_products_html = `
<!-- when clicked, it will load the create shootrecords form -->
 
<!-- start table -->
<table class='table table-bordered table-hover'>

    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Organisation</th>
        <th class='w-5-pct'>Count</th>
        
       <!-- <th class='w-10-pct text-align-center'>Action</th> -->
    </tr>`;

        // loop through returned list of data
        $.each(data.records, function (key, val) {

            // creating new table row per record
            read_products_html += `
    <tr>
        <td>` + val.EvOrg + `</td>
        <td>` + val.OrgTotal + `</td>
        

    </tr>`;
        });
        // end table
        read_products_html += `</table>`;
// inject to 'page-content' of our app
        $("#page-content").html(read_products_html);
// chage page title
        changePageTitle("JLO Stats");

    });
}

    function showJLOStats2(){
    $.getJSON("/JudgeDatabase/api/shootrecords/LevelCalc.php", function(data) {
// html for listing products
        var read_level_html = `
<!-- when clicked, it will load the create shootrecords form -->

<!-- start table -->
<table class='table table-bordered table-hover'>

    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Level</th>
        <th class='w-5-pct'>Count</th>
        
       <!-- <th class='w-10-pct text-align-center'>Action</th> -->
    </tr>`;

        // loop through returned list of data
        $.each(data.records, function (key, val) {

            // creating new table row per record
            read_level_html += `
    <tr>
        <td>` + val.EvLevel + `</td>
        <td>` + val.LevelTotal + `</td>
        

    </tr>`;
        });
        // end table
        read_level_html += `</table>`;
// inject to 'page-content' of our app
        $("#page-content").html(read_level_html);


    });
}