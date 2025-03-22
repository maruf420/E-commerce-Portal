<?php 
include("admin_inc/db.php");
$id=$_GET['did'];
$d="DELETE FROM categories1 WHERE cid='$id'";
$con->query($d);
header("location:listcategory.php");
?>
<?php 
include("admin_inc/db.php");
$id=$_GET['did'];
$d="DELETE FROM product WHERE pid='$id'";
$con->query($d);
header("location:listproduct.php");
?>