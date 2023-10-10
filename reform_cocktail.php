<?php
require('../db/connect.php');
date_default_timezone_set('Asia/Bangkok');

$name=isset($_POST['name'])?$_POST['name']:'';
$price=isset($_POST['price'])?$_POST['price']:'';
$active=isset($_POST['active'])?$_POST['active']:'';
$key=isset($_POST['key'])?$_POST['key']:'';
$cate_id=isset($_POST['cate_id'])?$_POST['cate_id']:'';

$picname=isset($_FILES['pic']['name'])?$_FILES['pic']['name']:'';
$tmp_name=isset($_FILES['pic']['tmp_name'])?$_FILES['pic']['tmp_name']:'';
$picname_new=date('dmyHis')."_".$picname;

if (is_uploaded_file($tmp_name)) {
   move_uploaded_file($tmp_name,'../images/'.$picname_new);
}else{
    $picname_new='none.jpg';
}

$sql="
INSERT INTO project(
    project.name,
    project.price,
    project.pic,
    project.active,
project.key,
project.cate_id
)VALUES(
    '{$name}',
    '{$price}',
    '{$picname_new}',
    '{$active}',
    '{$key}',
    '{$cate_id}'
    )

";

$result=$conn->query($sql);
if ($result) {
    header('location:index.php');
}else{
    header('location:form_cocktail.php');
}
?>