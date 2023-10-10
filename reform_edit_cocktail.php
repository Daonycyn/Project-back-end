<?php

require('../db/connect.php');
date_default_timezone_set('Asia/Bangkok');

$id=isset($_POST['id'])?$_POST['id']:'';
$name=isset($_POST['name'])?$_POST['name']:'';
$price=isset($_POST['price'])?$_POST['price']:'';
$picname_old=isset($_POST['$picname_old'])?$_POST['picname_old']:'';
$active=isset($_POST['active'])?$_POST['active']:'';
$key=isset($_POST['key'])?$_POST['key']:'';
$cate_id=isset($_POST['cate_id'])?$_POST['cate_id']:'';

$picname=isset($_FILES['pic']['name'])?$_FILES['pic']['name']:'';
$tmp_name=isset($_FILES['pic']['tmp_name'])?$_FILES['pic']['tmp_name']:'';
$picname_new=date('dmyHis')."_".$picname;

if (is_uploaded_file($tmp_name)) {
    move_uploaded_file($tmp_name,'../images/'.$picname_new);
 if
    ( $picname_old !== 'none.jpg');{
     unlink('../images/'.$picname_old);
    }
 }else {
    $picname_new=$picname_old;
 }
 $sql="
 UPDATE project SET
 project.name='{$name}',
 project.price='{$price}',
 project.pic='{$picname_new}',
 project.active='{$active}',
 project.key='{$key}',
 project.cate_id='{$cate_id}'
 WHERE
 project.id='{$id}'
";
$result= $conn->query($sql);
if ($result) {
    header('location:index.php');
}else{
    header('location:form_edit_cocktail.php? id='.$id);
}
?>