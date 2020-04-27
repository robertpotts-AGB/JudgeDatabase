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
            <td><select name='EvRound' class='form-control' required >
                <option value="">...Select</option>
                <option value="OnTarget">Ontarget</option>
                <option value="1440/Metrics">1440 and Metrics I-V</option>
                <option value="2x1440/Metrics">Double 1440 and Metrics I-V</option>
                <option value="720">70/60/50 Meter round</option>
                <option value="2x720"> Double 70/60/50 Meter round</option>
                <option value="York/Hereford/Bristols">York/Hereford/Bristols</option>
                 <option value="Nationals">Nationals</option>
                <option value="Metrics">Metrics I-V</option>
                <option value="American">American</option>
                <option value="Albion/Windsors">St George/Albion/Windsors</option>
                <option value="Stafford">Stafford</option>
                <option value="Vegas">Vegas</option>
                <option value="Short Metrics">Short Metrics</option>
                <option value="Long Metrics">Long Metrics</option>
                <option value="Worcester">Worcester</option>
                <option value="WA18">WA 18 Meter Round</option>
                <option value="WA25">WA 25 Meter Round</option>
                <option value="Portsmouth">Portsmouth</option>
                <option value="Training">Training</option>
              </select></td>
        </tr>
        <!-- price field -->
        <tr>
            <td>Shoot Rules</td>
             <td><select name='EvOrg' class='form-control' required>
                <option value="">...Select</option>
                <option value="AGB">AGB</option>
                <option value="WA">WA</option>
                <option value="Training">Training</option>
              </select></td>
        </tr>
 
        <!-- description field -->
       <tr>
            <td>Event Level</td>
             <td><select name='EvLevel' class='form-control' required>
                <option value="">...Select</option>
                <option value="International">International</option>
                <option value="National">National</option>
                <option value="Regional">Regional</option>
                <option value="County">County</option>
                <option value="Club">Club</option>
              </select></td>
        </tr>
          <tr>
            <td>Event Type</td>
            <td><select name='EvDiscipline' class='form-control' required>
                <option value="">...Select</option>
                <option value="Target">Target</option>
                <option value="Field">Field</option>
                <option value="3D">3D</option>
                <option value="Clout">Clout</option>
                <option value="Flight">Flight</option>
                <option value="Seminar">Seminar</option>
                <option value="Conference">Conference</option>
                <option value="Other CPD">Other CPD</option>
                </select></td>
        </tr>
          <tr>
            <td>Optional Event Information</td>
            <td><select name='EvOptional' class='form-control' required >
             <option value="">...Select</option>
             <option value="H2H">Head to Head event</option></select></td>
             <option value="H2H">Indoor</option></select></td>
               
               
        </tr>
          <tr>
            <td>Event Status</td>
         
             <td><select name='EvStatus' class='form-control' required>
                <option value="">...Select</option>
                <option value="WRS">World Record Status / Arrowhead</option>
                <option value="UKRS">UK Record Status / Tassel Award</option>
                <option value="Non-Record">Non-Record Status</option>
              </select></td>
        </tr>
          <tr>
            <td>Event Role</td>
            <td><select name='EvRole' class='form-control' required>
                <option value="">...Select</option>
                <option value="COJ">Chair of Judges</option>
                <option value="DOS">Director of Shooting</option>
                <option value="Judge">Judge / Field Captain</option>
                <option value="Trainer">Trainer</option>
                <option value="Attendee">Attendee</option>
              </select></td>
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
            changePageTitle("Create Shoot");
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