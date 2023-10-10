<?php
require('../db/connect.php');
$id=isset($_GET['id'])?$_GET['id']:'';
$pic=isset($_GET['pic'])?$_GET['pic']:'';

$sql ="
DELETE FROM project
WHERE
project.id='{$id}'

";
$result= $conn->query($sql);
if ($result) {
   if($pic != 'none.jpg'){
    unlink('../images/'.$pic);
}
header('location:index.php');
}else{
    header('location:index.php');
}
?>