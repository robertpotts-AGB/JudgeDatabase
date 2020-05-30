$(document).ready(function(){

    // show html form when 'upload shootrecords' button was clicked
    $(document).on('click', '.upload-JLO-button', function(){
        $("#page-content1").html("");
        $("#page-content2").html("");
        $("#page-content3").html("");
        $("#page-content4").html("");
        $("#page-content5").html("");
        var upload_product_php= `
        
        <p>
   J07 files can be uploaded to the system without any modification however please save the data sheet of the J07 as a CSV file before attempting the upload.
</p>
<p>
Please make sure you use the Judges correct Archery GB number. If you have uploaded shoots, but they do not appear, please contact support@archerygb.org with the Archery GB number you used and a copy of the J07. <u>DO NOT</u> attempt to re-upload the J07. 
</p>
<p>

If using the template it is important you only copy the data into the rows below the 'New Data Below here' text (row 9 onwards in excel) and ignore the other items above this line

<a href="/JudgeDatabase/NewDash/app/assets/J07.csv">Download Template</a>

</p>

<form action="../api/shootrecords/JLOimport.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        Judges Archery GB Number:<input type="Text" id="AGB_Number" name="AGB_Number" autocomplete="off" />
        </p>
        <input type="file" id="file" name="file" accept=".csv," autocomplete="off" />
        
    </div>
    <input type="submit" name="btn_upload" class="btn btn-success" value="Upload">
</form>
        
       `;

        // inject html to 'page-content' of our app
        $("#page-content").html(upload_product_php);

// chage page title
        changePageTitle("Upload Shoots for another Judge");

    });
});