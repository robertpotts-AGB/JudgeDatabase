$(document).ready(function(){


// when a 'read products' button was clicked
    $(document).on('click', '.JLOstats-products-button', function(){
        showJLOStats();
        showJLOStats2();
        showJLOStats3();
        showJLOStats4();
        showJLOStats5();
        changePageTitle("Statistics");
        $("#page-content").html("");
    });
    $(document).on('click', '.JLOstats-level-products-button', function(){
        showJLOStats2();
    });
    $(document).on('click', '.JLOstats-role-products-button', function(){
        showJLOStats3();
    });
    $(document).on('click', '.JLOstats-type-products-button', function(){
        showJLOStats4();
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
<class="well">Organisations</class>
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
        $("#page-content1").html(read_products_html);
// chage page title


    });
}

    function showJLOStats2(){
    $.getJSON("/JudgeDatabase/api/shootrecords/LevelCalc.php", function(data) {
// html for listing products
        var read_level_html = `
<!-- when clicked, it will load the create shootrecords form -->
<class="well">Event Level</class>
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
        $("#page-content2").html(read_level_html);
// chage page title



    });
}
function showJLOStats3(){
    $.getJSON("/JudgeDatabase/api/shootrecords/RoleCalc.php", function(data) {
// html for listing products
        var read_level_html = `
<!-- when clicked, it will load the create shootrecords form -->
<class="well">Event Role</class>
<!-- start table -->
<table class='table table-bordered table-hover'>

    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Role</th>
        <th class='w-5-pct'>Count</th>
        
       <!-- <th class='w-10-pct text-align-center'>Action</th> -->
    </tr>`;

        // loop through returned list of data
        $.each(data.records, function (key, val) {

            // creating new table row per record
            read_level_html += `
    <tr>
        <td>` + val.EvRole + `</td>
        <td>` + val.RoleTotal + `</td>
        

    </tr>`;
        });
        // end table
        read_level_html += `</table>`;
// inject to 'page-content' of our app
        $("#page-content3").html(read_level_html);
// chage page title



    });
}
function showJLOStats4(){
    $.getJSON("/JudgeDatabase/api/shootrecords/TypeCalc.php", function(data) {
// html for listing products
        var read_level_html = `
<!-- when clicked, it will load the create shootrecords form -->
<class="well">Event Types</class>
<!-- start table -->
<table class='table table-bordered table-hover'>

    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Type</th>
        <th class='w-5-pct'>Count</th>
        
       <!-- <th class='w-10-pct text-align-center'>Action</th> -->
    </tr>`;

        // loop through returned list of data
        $.each(data.records, function (key, val) {

            // creating new table row per record
            read_level_html += `
    <tr>
        <td>` + val.EvType + `</td>
        <td>` + val.TypeTotal + `</td>
        

    </tr>`;
        });
        // end table
        read_level_html += `</table>`;
// inject to 'page-content' of our app
        $("#page-content4").html(read_level_html);
// chage page title



    });
}
function showJLOStats5(){
    $.getJSON("/JudgeDatabase/api/shootrecords/StatusCalc.php", function(data) {
// html for listing products
        var read_level_html = `
<!-- when clicked, it will load the create shootrecords form -->
<class="well">Event Status</class>
<!-- start table -->
<table class='table table-bordered table-hover'>

    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>Status</th>
        <th class='w-5-pct'>Count</th>
        
       <!-- <th class='w-10-pct text-align-center'>Action</th> -->
    </tr>`;

        // loop through returned list of data
        $.each(data.records, function (key, val) {

            // creating new table row per record
            read_level_html += `
    <tr>
        <td>` + val.EvStatus + `</td>
        <td>` + val.StatusTotal + `</td>
        

    </tr>`;
        });
        // end table
        read_level_html += `</table>`;
// inject to 'page-content' of our app
        $("#page-content5").html(read_level_html);
// chage page title



    });
}