$(document).ready(function(){

    // show html form when 'create shootrecords' button was clicked
    $(document).on('click', '.create-shootrecords-button', function(){
// load list of categories

            // we have our html form here where shootrecords information will be entered
// we used the 'required' html5 property to prevent empty fields
            window.addEventListener( "pageshow", function ( event ) {
                var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
                if ( historyTraversal ) {
                    window.location.reload();
                }
            });
            var create_product_html=`
 
    <!-- 'read products' button to show list of products -->
   <!-- <div id='read-products' class='btn btn-success pull-right m-b-15px read-products-button'>
        <span class='glyphicon glyphicon-list'></span> My Shoots
    </div> ->
   <!-->

<form id='create-shootrecords-form' action='#' method='post'>
   
        <!-- name field -->
 
         <div class="input-group form-group">
            <div class="input-group-prepend">
                <label class="input-group-text">Shoot Date</label>
            </div>
                <input type='date' name='EvDate' class='form-control' required max="2022-01-01" min="2010-01-01" />
         </div>   
        <!-- name field -->
        <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text" id="evprepend">Shoot Name</label>
           </div>
            <input type='text' id="evname" name='EvName' class='form-control' aria-describedby="evpreend" required />
        </div>  
          
        <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Shoot Rules</label>
            </div>
             <select onChange="populateType('evrules','evtypes');" id="evrules" name='EvOrg' class='form-control' required>
                <option value="">...Select</option>
                <option value="AGB">AGB</option>
                <option value="WA">WA</option>
                <option value="Training">Training</option>
              </select>
        </div>
        <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Event Type</label>
            </div>
           <select id="evtypes"  onChange="populateRound('evrules','evtypes','evround');" name='EvDiscipline' class='form-control' required>
                <option id="select" value="">...Select</option>
                       
                </select>
        </div>
        
         <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Shoot Round</label>
            </div>
           <select name='EvRound'  id="evround" class='form-control' required >
                <option id="select1" selected value="">...Select</option>
                          
              </select>
        </div>
        <!-- price field -->
        
 
        <!-- description field -->
  <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Event Level</label>
            </div>
            <select name='EvLevel' class='form-control' required>
                <option value="">...Select</option>
                <option value="International">International</option>
                <option value="National">National</option>
                <option value="Regional">Regional</option>
                <option value="County">County</option>
                <option value="Club">Club</option>
              </select>
        </div>
         
          <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Optional Event Information</label>
            </div>
           <select name='EvOptional' class='form-control' >
             <option value="">...Select</option>
             <option value="H2H">Head to Head event</option>
             </select>
               
               
        </div>
           <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Event Status</label>
         </div>
             <select name='EvStatus' class='form-control' required>
                <option value="">...Select</option>
                <option value="WRS">World Record Status / Arrowhead</option>
                <option value="UKRS">UK Record Status / Tassel Award</option>
                <option value="Non-Record">Non-Record Status</option>
              </select>
        </div>
          <div class="input-group form-group">
        <div class="input-group-prepend">
            <label class="input-group-text">Event Role</label>
            </div>
            
            <select name='EvRole' class='form-control' required>
                <option value="">...Select</option>
                <option value="COJ">Chair of Judges</option>
                <option value="DOS">Director of Shooting</option>
                <option value="Judge">Judge / Field Captain</option>
                <option value="Trainer">Trainer</option>
                <option value="Attendee">Attendee</option>
              </select>
        </div>
 
        <!-- categories 'select' field -->
       
        <!-- button to submit form -->
     <div>
          
            <div>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-plus'></span> Create Shoot Entry
                </button>
            </div>
      </div>
 

</form>

  
<script>
                function populateType(s1,s2){
                    var s = document.getElementById(s1);
                    var s_a = document.getElementById(s2);


                    var select = document.getElementById(s2).options.length;
                    for (var i = select; i >0;i-- ) {
                        document.getElementById(s2).options.remove(i);
                        console.log(i);
                    }
                    document.getElementById('select').selected='selected';
                    var optionArray=[];
                    if(s.value == "Training"){
                        optionArray = ["Seminar|Seminar","Conference|Conference","Other CPD|Other CPD"];
                    }
                    else if(s.value == "AGB"){
                        optionArray = ["TGTOutdoor|Target Outdoor","TGTIndoor|Target Indoor","Field|Field","3D|3D","Clout|Clout","Flight|Flight"];
                    }
                    else if(s.value == "WA"){
                        optionArray = ["TGTOutdoor|Target Outdoor","TGTIndoor|Target Indoor","Field|Field","3D|3D","Clout|Clout","Flight|Flight"];
                    }
                    for(var option in optionArray){
                        var pair = optionArray[option].split("|");
                        var newOption = document.createElement("option");
                        newOption.value = pair[0];
                        newOption.innerHTML = pair[1];
                        s_a.options.add(newOption);
                    }
                }
            function populateRound(s1,s2,s3){
                    var evrule = document.getElementById(s1);
                    var evtype = document.getElementById(s2);
                    var evround = document.getElementById(s3);


                    var select = document.getElementById(s3).options.length;
                    for (var i = select; i >0;i-- ) {
                        document.getElementById(s3).options.remove(i);
                        console.log(i);
                    }
                    document.getElementById('select1').selected='selected';
                    var optionArray=[];
                    if(evrule.value =="WA")
                        {
                    if(evtype.value == "TGTOutdoor"){
                        optionArray = ["720|WA 70/60/50","2x720|Double WA 70/60/50" ,"WA1440|1440 and Metrics I-V","2x1440/Metrics|Double 1440 and Metrics I-V","900|WA900","ClubShoot|Club Shoot / Custom Round"];
                    }
                    else if(evtype.value == "TGTIndoor"){
                        optionArray = ["WA18|WA 18","WA25|WA 25","WACombined|WA Combined Round","Double18|Double 18m","Double25|Double 25m","ClubShoot|Club Shoot / Custom Round"];
                    }
                       else if(evtype.value == "Field"){
                        optionArray = ["Unmarked|Unmarked","Marked|Marked","12+12|12+12","24+24|24+24","ClubShoot|Club Shoot / Custom Round"];
                    }
                      else if(evtype.value == "3D"){
                        optionArray = ["3D|3D","ClubShoot|Club Shoot / Custom Round"];
                    }
                      else if(evtype.value == "Clout"){
                        optionArray = ["1xClout|One Way Clout","2xClout|Two Way Clout","ClubShoot|Club Shoot / Custom Round"];
                    }
                          else if(evtype.value == "Flight"){
                        optionArray = ["Flight|Flight","ClubShoot|Club Shoot / Custom Round"];
                    }
                  }
                    else if(evrule.value == "AGB")
                    { 
                        if(evtype.value == "TGTOutdoor"){
                        optionArray = ["York/Hereford/Bristols|York/Hereford/Bristols","Nationals|Nationals","Metrics|Metrics I-V","American|American","Albion/Windsors|St George/Albion/Windsors","Warwicks|Warwicks","Westerns|Westerns","Short Metrics|Short Metrics","Long Metrics|Long Metrics","ClubShoot|Club Shoot / Custom Round"];
                    }
                    else if(evtype.value == "TGTIndoor"){
                        optionArray = ["Stafford|Stafford","Portsmouth|Portsmouth","Bray1|Bray 1","Bray2|Bray 2","Worcester|Worcester","Vegas|Vegas","ClubShoot|Club Shoot / Custom Round"];
                    }
                      else if(evtype.value == "Field"){
                        optionArray = ["Unmarked|Unmarked","Marked|Marked","12+12|12+12","24+24|24+24","CourseInspection|Field Check Day","ClubShoot|Club Shoot / Custom Round"];
                    }
                      else if(evtype.value == "3D"){
                        optionArray = ["3D|3D","ClubShoot|Club Shoot / Custom Round"];
                    }
                      else if(evtype.value == "Clout"){
                        optionArray = ["1xClout|One Way Clout","2xClout|Two Way Clout","ClubShoot|Club Shoot / Custom Round"];
                    }
                          else if(evtype.value == "Flight"){
                        optionArray = ["Flight|Flight","ClubShoot|Club Shoot / Custom Round"];
                    }
                   
                    }
                     else if(evrule.value == "Training")
                    {
                         optionArray = ["Training|Training"];
                    }
                     
                    for(var option in optionArray){
                        var pair = optionArray[option].split("|");
                        var newOption = document.createElement("option");
                        newOption.value = pair[0];
                        newOption.innerHTML = pair[1];
                        evround.options.add(newOption);
                    }
                }
                    
            </script>

`
            ;
            // inject html to 'page-content' of our app
            $("#page-content").html(create_product_html);

// chage page title
            changePageTitle("Create Shoot");
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
                $("#flash").addClass("alert alert-success");
                var success_html=`<strong>Shoot Added!</strong> You have Successfully Submitted your Shoot information.
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
`;
                $("#flash").html(success_html);

            },
            error: function(xhr, resp, text) {
                // show error to console
                console.log(xhr, resp, text);

                $("#flash").addClass("alert alert-primary");
            }



        });

        return false;
    });

});