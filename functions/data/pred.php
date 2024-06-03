<?php
// Read the interactive plot JSON data
$plot_json = file_get_contents('../../plot.json');

// Display the interactive plot using Plotly's JavaScript library
echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <div id="plotly-chart"></div>
    <script>
        var plotlyData = $plot_json;
        Plotly.newPlot('plotly-chart', plotlyData.data, plotlyData.layout);
    </script>
</body>
</html>
HTML;
?><script>
var plotlyData = $plot_json;
Plotly.newPlot('plotly-chart', plotlyData.data, plotlyData.layout);

document.getElementById('plotly-chart').on('plotly_hover', function(data){
    var point = data.points[0];
    alert(`Month: ${point.x}<br>Sales: ${point.y}`);
});
</script>