$(document).ready(function(){

    // show html form when 'upload product' button was clicked
    $(document).on('click', '.upload-product-button', function(){

        var upload_product_php= `
        
        <p>
   J07 files can be uploaded to the system, please save the data sheet of the J07 as a CSV file before attempting the upload.
   
   A csv version of the J07 can be downloaded using the template link below, if you prefer to copy the data from the J07 into this sheet. 

</p>

<form action="../api/product/import.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="file" id="file" name="file" accept=".csv," autocomplete="off" />
    </div>
    <input type="submit" name="btn_upload" class="btn btn-success" value="Upload">
</form>
        
       `;

        // inject html to 'page-content' of our app
        $("#page-content").html(upload_product_php);

// chage page title
        changePageTitle("Upload Shoots");

    });
});