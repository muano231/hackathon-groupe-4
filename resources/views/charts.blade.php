<html>
<head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages': ['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var items = undefined;
            var data = undefined;
            let div = document.getElementById('root');
            let studies = JSON.parse('{!! json_encode($studies) !!}');
            //  foreach
            for (let i = 0; i < studies.length; i++) {
                let study = studies[i];
                div.innerHTML += '<div id="chart_'+i+'" class="chart"></div>';
                data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Slices');

                console.log(study);
                data.addRows(study);


                // Set chart options
                var options = {
                    'title': 'Campaigns',
                    'width': 400,
                    'height': 300
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById("chart_"+i.toString()));
                chart.draw(data, options);
            }
        }
    </script>
</head>

<body>
<!--Div that will hold the pie chart-->
<h2>Charts</h2>
<div id="root" style="display:flex;flex-direction: column">

</div>
</body>
</html>
