<?php
require('../db/connect.php');
$sql="
SELECT
COUNT(orders.pro_id) AS count_pro_id,
project.name
FROM
orders LEFT JOIN project
ON
orders.pro_id=project.id
GROUP BY
orders.pro_id
";
$result = $conn->query($sql);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Menu', 'Qty'],
          <?php
          foreach ($result as $key => $value) {
            echo"
            ['".$value['name']."',".$value['count_pro_id']."],
            
            ";
          }
          ?>
        ]);

        var options = {
          title: 'Menu Order per day',
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>