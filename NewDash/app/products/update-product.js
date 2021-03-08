$(document).ready(function(){

    // show html form when 'update shootrecords' button was clicked
    $(document).on('click', '.update-shootrecords-button', function(){
        $("#page-content1").html("");
        $("#page-content2").html("");
        $("#page-content3").html("");
        $("#page-content4").html("");
        $("#page-content5").html("");
        // get shootrecords id
        var id = $(this).attr('data-id');
        // read one record based on given shootrecords id
        $.getJSON("/JudgeDatabase/api/shootrecords/read_one.php?id=" + id, function(data){

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

            // store 'update shootrecords' html to this variable
            var update_product_html=`
    <div id='read-products' class='btn btn-primary pull-right m-b-15px read-products-button'>
        <span class='glyphicon glyphicon-list'></span> My Shoots
    </div>
      <!--  }); -->
        <!-- build 'update shootrecords' html form -->
<!-- we used the 'required' html5 property to prevent empty fields -->
<form id='update-shootrecords-form' action='#' method='post' border='0'>
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
                 <td><select value=\"`+ round +`\" name='EvRound' class='form-control' required >
                <option value=\"`+round+`\">`+ round +`</option>
                <option value="OnTarget">Ontarget</option>
                <option value="1440/Metrics">1440 and Metrics I-V</option>
                <option value="2x1440/Metrics">Double 1440 and Metrics I-V</option>
                <option value="720">70/60/50 Meter round</option>
                <option value="2x720"> Double 70/60/50 Meter round</option>
                <option value="York/Hereford/Bristols">York/Hereford/Bristols</option>
                 <option value="Nationals">Nationals</option>
                 <option value="Westerns">Westerns</option>
                <option value="Metrics">Metrics I-V</option>
                <option value="American">American</option>
                <option value="Albion/Windsors">St George/Albion/Windsors</option>
                <option value="Warwicks">Warwicks</option>
                <option value="Stafford">Stafford</option>
                <option value="Vegas">Vegas</option>
                <option value="Short Metrics">Short Metrics</option>
                <option value="Long Metrics">Long Metrics</option>
                <option value="Worcester">Worcester</option>
                <option value="WA18">WA 18 Meter Round</option>
                <option value="WA25">WA 25 Meter Round</option>
                <option value="WACombined">WA Combined Round</option>
                <option value="Portsmouth">Portsmouth</option>
                <option value="Bray1">Bray 1</option>
                 <option value="Bray2">Bray 2</option>
                 <option value="Stafford">Stafford</option>
                 
                  <option value="FieldCheck">Field Check Day</option>
                   <option value="MixedUM">Mixed Unmarked / Marked</option>
                    <option value="Unmarked">Unmarked</option>
                     <option value="Marked">Marked</option>
                      <option value="12+12">12+12</option>
                        <option value="24+24">24+24</option>
                      
                
                <option value="Training">Training</option>
              </select></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><select name='EvDiscipline' class='form-control' required>
                <option value=\"` + disc + `\">` + disc + `</option>
                <option value="TGTOutdoor">Target Outdoor</option>
                <option value="TGTIndoor">Target Indoor</option>
                <option value="Field">Field</option>
                <option value="Clout">Clout</option>
                <option value="Flight">Flight</option></select></td>
        </tr>
        <tr>
            <td>Status</td>
          
            <td><select name='EvStatus' class='form-control' required>
                <option value=\"` + status + `\">` + status + `</option>
                <option value="WRS">World Record Status / Arrowhead</option>
                <option value="UKRS">UK Record Status / Tassel Award</option>
                <option value="Non-Record">Non-Record Status</option>
                 <option value="Training">Training</option>
              </select></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><select name='EvRole' class='form-control' required>
                <option value=\"` + role + `\">` + role + `</option>
                <option value="COJ">Chair of Judges</option>
                <option value="DOS">Director of Shooting</option>
                <option value="Judge">Judge</option>
                <option value="Trainer">Trainer</option>
                <option value="Attendee">Attendee</option>
              </select></td>
        </tr>
        <tr>
            <td>Rules</td>
            <td><select name='EvOrg' class='form-control' required>
                <option value=\"`+ org +`\">`+ org +`</option>
                <option value="AGB">AGB</option>
                <option value="WA">WA</option>
                <option value="Training">Training</option>
              </select></td>
        </tr>
        <tr>
            <td>Level</td>
         
            <td><select name='EvLevel' class='form-control' required>
                <option value=\"` + level + `\">` + level + `</option>
                <option value="International">International</option>
                <option value="National">National</option>
                <option value="Regional">Regional</option>
                <option value="County">County</option>
                <option value="Club">Club</option>
              </select></td>
        </tr>
        <tr>
            <td>Optional</td>
            <td><textarea name='EvOptional' class='form-control'>` + optional + `</textarea></td>
        </tr>
        
       
 
        <!-- categories 'select' field -->
       
 
        <tr>
 
            <!-- hidden 'shootrecords id' to identify which record to delete -->
            <td><input value=\"` + id + `\" name='ID' type='hidden' /></td>
 
            <!-- button to submit form -->
            <td>
                <button type='submit' class='btn btn-info'>
                    <span class='glyphicon glyphicon-edit'></span> Update Shoot
                </button>
            </td>
 
        </tr>
 
    </table>
</form>`;

// inject to 'page-content' of our app
            $("#page-content").html(update_product_html);

// chage page title
            changePageTitle("Update Shoot");

        });
    });


        // will run if 'create shootrecords' form was submitted
        $(document).on('submit', '#update-shootrecords-form', function(){

            // get form data
            var form_data=JSON.stringify($(this).serializeObject());
            // submit form data to api
            $.ajax({
                url: "/JudgeDatabase/api/shootrecords/update.php",
                type : "POST",
                contentType : 'application/json',
                async: false,
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