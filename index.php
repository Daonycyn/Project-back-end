<?php
require('../db/connect.php');
$sql = "
SELECT
    project.id,
    project.name,
    project.price,
    project.pic,
    project.active,
    project.key,
    categories_project.cate_name
FROM
    project LEFT JOIN categories_project
    ON
    project.cate_id=categories_project.id

";

$ddsearch=isset($_POST['ddsearch'])?$_POST['ddsearch']:'';
if ( $ddsearch !='') {
    $sql .="
    WHERE
project.cate_id='{$ddsearch}'
    ";
}

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="menu-admin">
        <a href="form_cocktail.php">
            <button type="button" class="btn btn-outline-info">เพิ่มสินค้า</button>
        </a>
        </div>
        <div class="menu-admin">
        <a href="table_report.php">
            <button type="button" class="btn btn-outline-info">รายงานผลแบบตาราง</button>
        </a>
        </div>
        <div class="menu-admin">
        <a href="pie_report.php">
            <button type="button" class="btn btn-outline-info">รายงานผลแบบกราฟ</button>
        </a>
        </div>
        <form action="index.php" method="post">
        <select name="ddsearch" id="">
            
            <option value="">ค้นหาหมวด</option>
            <option <?php if($ddsearch == '1'){echo"selected";} ?> value="1">cocktail</option>
            <option <?php if($ddsearch == '2'){echo"selected";} ?> value="2">mocktail</option>
           
        </select>
        <input type="submit" value="ค้นหา">
        </form>
        <table id="example" class="table table-hover">
            <thead>
                <tr>
                    <th>PDF</th>
                    <th>รหัส</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>รูป</th>
                    <th>สถานะ</th>
                    <th>ตำแหน่ง</th>
                    <th>หน้า</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
<?php
foreach ($result as $key => $value) {
   echo"
   <tr>
   <td>
    <a href='pdf.php?id=".$value['id']."' target='_blank'>pdf</a>
    </td>
   <td>".$value['id']."</td>
   <td>".$value['name']."</td>
   <td>".$value['price']."</td>
   <td>
   <img width='50px'src='../images/".$value['pic']."'>
   </td>
   <td>".$value['active']."</td>
   <td>".$value['key']."</td>
   <td>".$value['cate_name']."</td>

   <td>
   <a href='form_edit_cocktail.php?id=".$value['id']."'>
   <img  src='../images/pencil-square.svg'>
   </a>
   </td>

   <td>
   <a href='del.php?id=".$value['id']."&img=".$value['pic']."'>
   <img  src='../images/trash3.svg'>
   </a>
   </td>

   </tr>
   ";
}
?>
            </tbody>
        </table>

    </div>
    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
      </script>
</body>
</html>