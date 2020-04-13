$(document).ready(function(){

    // show html form when 'upload product' button was clicked
    $(document).on('click', '.upload-product-button', function(){
       alert("Click");

        var upload_product_php= `
        
        <p>
    A template file can be downloaded from here:

</p>

<<form action="/api/product/import.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="file" id="file" name="file" accept=".csv," autocomplete="off" />
    </div>
    <input type="submit" name="btn_upload" class="btn btn-success" value="Upload">
</form>
        
       `;

        // inject html to 'page-content' of our app
        $("#page-content").html(upload_product_php);

// chage page title
        changePageTitle("upload Product");

    });
});