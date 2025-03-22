<?php
include("admin_inc/db.php");
// if(isset($_POST['save'])){
    $n=$_POST['pname'];
    $p=$_POST['price'];
    $d=$_POST['pdescription'];

$buf=$_FILES['pimage']['tmp_name'];
$fn=time().$_FILES['pimage']['name'];
move_uploaded_file($buf,"product_img/".$fn);
$ins="INSERT INTO product SET pname='$n',price='$p',pdescription='$d',pimage='$fn'";
// echo($ins);die;
$con->query($ins);
header("location:listproduct.php");
// }
?>