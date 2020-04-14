$(document).ready(function(){

    // show html form when 'create shootrecords' button was clicked
    $(document).on('click', '.create-shootrecords-button', function(){
// load list of categories
        $.getJSON("/JudgeDatabase/api/shootrecords/read.php", function(data){
// build categories option html
// loop through returned list of data
            var categories_options_html=`<select name='category_id' class='form-control'>`;
            $.each(data.records, function(key, val){
                categories_options_html+=`<option value='` + val.id + `'>` + val.name + `</option>`;
            });
            categories_options_html+=`</select>`;
            // we have our html form here where shootrecords information will be entered
// we used the 'required' html5 property to prevent empty fields
            var create_product_html=`
 
    <!-- 'read products' button to show list of products -->
    <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
        <span class='glyphicon glyphicon-list'></span> My Shoots
    </div>
    <!-- 'create shootrecords' html form -->
<form id='create-shootrecords-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <!-- name field -->
 
        <tr>
            <td>Shoot Date</td>
            <td><input type='date' name='EvDate' class='form-control' required /></td>
        </tr>
        <!-- name field -->
        <tr>
            <td>Shoot Name</td>
            <td><input type='text' name='EvName' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Shoot Round</td>
            <td><input type='text' name='EvRound' class='form-control' required /></td>
        </tr>
        <!-- price field -->
        <tr>
            <td>Shoot Rules</td>
            <td><input type='text' name='EvOrg' class='form-control' required /></td>
        </tr>
 
        <!-- description field -->
       <tr>
            <td>Event Level</td>
            <td><input type='text' name='EvLevel' class='form-control' required /></td>
        </tr>
          <tr>
            <td>Event Type</td>
         
            <td><select name='EvDiscipline' class='form-control' required>
                <option value="Target">Target</option>
                <option value="Field">Field</option>
                <option value="Clout">Clout</option>
                <option value="Flight">Flight</option></select></td>
        </tr>
          <tr>
            <td>Event Options</td>
            <td><input type='text' name='EvOptional' class='form-control' required /></td>
        </tr>
          <tr>
            <td>Event Status</td>
            <td><input type='text' name='EvStatus' class='form-control' required /></td>
        </tr>
          <tr>
            <td>Event Role</td>
            <td><input type='text' name='EvRole' class='form-control' required /></td>
        </tr>
 
        <!-- categories 'select' field -->
       
        <!-- button to submit form -->
        <tr>
            <td></td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-plus'></span> Create Shoot Entry
                </button>
            </td>
        </tr>
 
    </table>
</form>`;
            // inject html to 'page-content' of our app
            $("#page-content").html(create_product_html);

// chage page title
            changePageTitle("Create Product");
        });

    });

// will run if create shootrecords form was submitted
    $(document).on('submit', '#create-shootrecords-form', function(){
// get form data
        var form_data=JSON.stringify($(this).serializeObject());
// submit form data to api
        $.ajax({
            url: "/JudgeDatabase/api/shootrecords/create.php",
            type : "POST",
            contentType : 'application/json',
            data : form_data,
            dataType:"text",
            success : function(result) {
                // shootrecords was created, go back to products list
                showProducts();
            },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);
            }



        });

        return false;
    });

});