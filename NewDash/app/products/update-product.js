$(document).ready(function(){

    // show html form when 'update product' button was clicked
    $(document).on('click', '.update-product-button', function(){
        // get product id
        var id = $(this).attr('data-id');
        // read one record based on given product id
        $.getJSON("http://localhost/JudgeDatabase/api/product/read_one.php?id=" + id, function(data){

            // values will be used to fill out our form
            var name = data.EvName;
            var round = data.EvRound;
            var id = data.ID;
            var date = data.EvDate;
            var optional = data.EvOptional;
            var disc = data.EvDiscipline;
            var status = data.EvStatus;
            var role = data.EvRole;
            var org = data.EvOrg;
            var level = data.EvLevel;

            // store 'update product' html to this variable
            var update_product_html=`
    <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
        <span class='glyphicon glyphicon-list'></span> My Shoots
    </div>
      <!--  }); -->
        <!-- build 'update product' html form -->
<!-- we used the 'required' html5 property to prevent empty fields -->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Date</td>
              <td><input value=\"` + date + `\" type='Date' name='EvDate' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input value=\"` + name + `\" type='text' name='EvName' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Round</td>
            <td><input value=\"` + round + `\" type='text' name='EvRound' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input value=\"` + disc + `\" type='text' name='EvDiscipline' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><input value=\"` + status + `\" type='text' name='EvStatus' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input value=\"` + role + `\" type='text' name='EvRole' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Rules</td>
            <td><input value=\"` + org + `\" type='text' name='EvOrg' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Level</td>
            <td><input value=\"` + level + `\" type='text' name='EvLevel' class='form-control' required /></td>
        </tr>
        <tr>
            <td>Optional</td>
            <td><textarea name='EvOptional' class='form-control' required>` + optional + `</textarea></td>
        </tr>
        
       
 
        <!-- categories 'select' field -->
       
 
        <tr>
 
            <!-- hidden 'product id' to identify which record to delete -->
            <td><input value=\"` + id + `\" name='ID' type='hidden' /></td>
 
            <!-- button to submit form -->
            <td>
                <button type='submit' class='btn btn-info'>
                    <span class='glyphicon glyphicon-edit'></span> Update Product
                </button>
            </td>
 
        </tr>
 
    </table>
</form>`;

// inject to 'page-content' of our app
            $("#page-content").html(update_product_html);

// chage page title
            changePageTitle("Update Product");

        });
    });


        // will run if 'create product' form was submitted
        $(document).on('submit', '#update-product-form', function(){

            // get form data
            var form_data=JSON.stringify($(this).serializeObject());
            // submit form data to api
            $.ajax({
                url: "/JudgeDatabase/api/product/update.php",
                type : "POST",
                contentType : 'application/json',
                async: false,
                data : form_data,
                dataType:"text",
                success : function(result) {
                    // product was created, go back to products list
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