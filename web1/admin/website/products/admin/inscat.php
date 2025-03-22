<?php
include("admin_inc/db.php");
//  if(isset($_POST['submit'])){
    $p=$_POST['parent'];
    $n=$_POST['cname'];
  

$buf=$_FILES['cimage']['tmp_name'];
$fn=time().$_FILES['cimage']['name'];
$img_des="product_img/".$fn;
move_uploaded_file($buf,"product_img/".$fn);
$ins="INSERT INTO categories1 SET parent='$p',cname='$n',cimage='$fn'";
// echo($ins);die;
$con->query($ins);
header("location:listcategory.php");

mysqli_query($con,"INSERT INTO `categories1`( `parent`, `cname`, `cimage`) VALUES ($p,$n,$img_des)");
//  }
?>