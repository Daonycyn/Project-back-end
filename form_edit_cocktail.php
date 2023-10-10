<?php
require('../db/connect.php');
$id=isset($_GET['id'])?$_GET['id']:'';
$sql="
SELECT
project.id,
project.name,
project.price,
project.pic,
project.active,
project.key,
project.cate_id,
categories_project.cate_name
FROM
    project LEFT JOIN categories_project
    ON
    project.cate_id=categories_project.id

WHERE
project.id='{$id}'
";
$result=$conn->query($sql);

foreach ($result as $key => $value) {
    $name = $value['name'];
    $price = $value['price'];
    $pic = $value['pic'];
    $active = $value['active'];
    $key= $value['key'];
    $cate_id=$value['cate_id'];
    $cate_name=$value['cate_name'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form action="reform_edit_cocktail.php" method="post" enctype="multipart/form-data">
   
    <label for="id">รหัส</label><br>
<input class="form-control" type="number" name="id" value="<?php echo $id;?>" readonly><br><br>
    
<label for="name">ชื่อสินค้า</label><br>
    <input class="form-control" type="text" name="name" id="name"><br><br>

    <label for="price" >ราคา</label><br>
    <input type="number" class="form-control" name="price" id="price"><br><br>

    <label for="pic" class="input-group-text" >อัพโหลดรูปภาพ</label><br>
    <input type="file" class="form-control" name="pic"><br><br>
    
    <input class="form-control" type="text" name="picname_old" value="<?php echo $pic ?>"readonly><br>
<img width="200px" src="../images/<?php echo $pic;?>"> <br><br>

    <label for="active">สถานะ</label><br>
    <input 
    <?php
    if ($active == 'active' ) {
        echo"checked";
    }
    ?>
    type="radio" name="active" value="active"><span>ใช้งาน</span><br><br>
    <input 
    <?php
    if ($active == 'notctive' ) {
        echo"checked";
    }
    ?>
     type="radio" name="active" value="notactive"><span>ไม่ใช้งาน</span><br><br>
    

     <label for="key">ตำแหน่ง</label><br>
    <input 
    <?php
    if ($key == 'left' ) {
        echo"checked";
    }
    ?>
    type="radio" name="key" value="left"><span>ซ้าย</span><br><br>
    <input 
    <?php
    if ($active == 'right' ) {
        echo"checked";
    }
    ?>
     type="radio" name="key" value="right"><span>ขวา</span><br><br>




    <label for="cate_id">หน้า</label><br>
    <input 
    <?php
    if ($cate_id == '1' ) {
        echo"checked";
    }
    ?>
    type="radio" name="cate_id" value="1"><span>cocktail</span><br><br>
    <input 
    <?php
    if ($cate_id == '2' ) {
        echo"checked";
    }
    ?>
     type="radio" name="cate_id" value="2"><span>mocktail</span><br><br>
    

     
     <button type="submit">บันทึก</button>
    </form>
    </div>
    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>