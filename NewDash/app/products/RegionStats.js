$(document).ready(function(){


// when a 'read products' button was clicked
    $(document).on('click', '.RegionStats-button', function(){
        showJLOStats();

        changePageTitle("Statistics");
        $("#page-content").html("");
    });
});

// function to show list of products
function showJLOStats() {
// get list of products from the API
    $.post("/JudgeDatabase/api/shootrecords/GraphCalcs.php", function (data) {
// html for listing products
        console.log(data);
        var evorg = [];
        var orgtotal = [];

        for (var i in data) {
            evorg.push(data[i].EvOrg);
            orgtotal.push(data[i].OrgTotal);
        }

        var chartdata = {
            labels: evorg,
            datasets: [
                {
                    label: 'Organisation',
                    backgroundColor: '#49e2ff',
                    borderColor: '#46d5f1',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: orgtotal
                }
            ]
        };

        var graphTarget = $("#myChart");

        var barGraph = new Chart(graphTarget, {
            type: 'bar',
            data: chartdata
        });
    });
}
