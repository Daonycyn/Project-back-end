<?php
require('../db/connect.php');
$sql="
SELECT
project.name,
orders.created,
orders.pro_id
FROM
orders LEFT JOIN project 
ON
orders.pro_id=project.id 
";
$result=$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <button>Excel</button>
        <br><br>
        <table  class="table table-hover" id="table2excel">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสินค้า</th>
                    <th>วันที่</th>
                    
                </tr>
            </thead>
<tbody>
<?php
$num=0;
foreach ($result as $key => $value) {
    echo"
    <tr>
    <td>".++$num."</td>
    <td>".$value['name']."</td>
    <td>".$value['created']."</td>
    
    </tr>
    ";
}
?>
</tbody>
        </table>
    </div>
    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./vendor/excel/src/jquery.table2excel.js"></script>
<script  >
    $(function(){
        $("button").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "SomeFile", //do not include extension
    fileext: ".xls" // file extension
  }); 
});

    });
    
    </script>

   

</body>
</html>