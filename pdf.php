<?php
require('../db/connect.php');
$id=isset($_GET['id'])?$_GET['id']:'';
$sql="
SELECT
project.id,
    project.name,
    project.price,
    project.pic,
    categories_project.cate_name
FROM
    project LEFT JOIN categories_project
    ON
    project.cate_id=categories_project.id
    WHERE project.id = '{$id}'
";
$result=$conn->query($sql);

foreach ($result as $key => $value) {
   $name=$value['name'];
   $price=$value['price'];
   $pic=$value['pic'];
   $cate_name=$value['cate_name'];
}
?>
<?php
$data ='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body{
  
    font-family: "Garuda";
}
.container{
width: 100%;
margin:0px;
text-align: center;
}

    </style>
</head>
<body>
<div class="container">
<h4>ชื่อสินค้า : '. $name.'</h4>
<br><br>
<h4>หมวด : '. $cate_name.'</h4>
<br><br>
<img width="400px" src="../images/' .$pic.'" >
<br>
<h4>ราคา : '. $price.' บาท</h4>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro molestiae eaque assumenda nihil natus deserunt repellat tempore incidunt dolores, impedit architecto magnam quaerat totam, non quis consectetur! Quisquam, quaerat vel.</p>
    </div>
</body>
</html>
';
?>
<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($data);
$mpdf->Output();
?>
