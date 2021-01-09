$(document).ready(function(){

    // app html
    var app_html=`
        <div class='container'>
 
            <div class='page-header'>
                <h1 id='page-title' class="card card-body bg-light" >My Shoots</h1>
            </div>
            <div id='page-content'></div>
            <canvas id="myChart" width="400" height="400"></canvas>

            <div class='container'>
            <!-- this is where the contents will be shown. -->
            <table>
            <tr>
            <td>
             <div class="panel panel-default" id='page-content1'></div>
            </td>
            <td width="25%">
            
</td>
            <td>
              <div  class="panel panel-default" id='page-content3'></div>
            </td>
</tr>
 <tr>
            <td>
             <div  class="panel panel-default" id='page-content2'></div>
            </td>
            <td width="25%"></td>
            <td>
              <div class="panel panel-default" id='page-content4'></div>
            </td>
             <td width="25%"></td>
             <td>
              <div class="panel panel-default" id='page-content5'></div>
            </td>
</tr>
</table>
</div>
           
          
       
            
 
        </div>`;

    // inject to 'app' in index.html
    $("#app").html(app_html);

});

// change page title
function changePageTitle(page_title){

    // change page title
    $('#page-title').text(page_title);

    // change title tag
    document.title=page_title;
}

// function to make form values to json format
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};