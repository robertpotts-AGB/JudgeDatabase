$(document).ready(function(){

    // show html form when 'upload product' button was clicked
    $(document).on('click', '#.upload-product-button', function(){
       alert("Click");

        var upload_product_php= `
        
        <p>
    A template file can be downloaded from here:

</p>

<form class="form-horizontal" action="" method="post" name="uploadCSV"
      enctype="multipart/form-data">
    <div class="input-row">
        <label class="col-md-4 control-label">Choose CSV File</label> <input
                type="file" name="file" id="file" accept=".csv">
        <button type="submit" id="submit" name="import"
                class="btn-submit">Import</button>
        <br />

    </div>
    <div id="labelError"></div>
</form>
        
       `;

        // inject html to 'page-content' of our app
        $("#page-content").html(upload_product_php);

// chage page title
        changePageTitle("upload Product");

    });
});