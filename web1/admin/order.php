<?php
session_start();
include("includes/db.php");

include("functions/functions.php");
  ?>

<?php
if (isset($_GET['c_id'])) {

$customer_id=$_GET['c_id'];
}

$ip_add=getUserIp();
$payment_mode="COD";
$invoice_no=mt_rand();
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($con, $select_cart);
while ($row_cart=mysqli_fetch_array($run_cart)) {
       $pro_id=$row_cart['p_id'];
       $size=$row_cart['size'];
       $qty=$row_cart['qty'];
       $get_product="select * from products where product_id='$pro_id'";
       $run_pro=mysqli_query($con, $get_product);

while ($row_pro=mysqli_fetch_array($run_pro)) {
	   $sub_total=$row_pro['product_price'] * $qty;
	   $insert_customer_order="insert into customer_order (customer_id, product_id, due_amount, invoice_no, qty, size, order_date, payment_mode) values ('$customer_id','$pro_id','$sub_total','$invoice_no','$qty','$size',NOW(),'$payment_mode')";
	   $run_cust_order=mysqli_query($con, $insert_customer_order);

	   //$insert_pending_order="insert into pending_order (customer_id,invoice_no,product_id,qty,size,payment_mode) values ('$customer_id','$invoice_no','$pro_id','$qty','$size','$payment_mode')";

	  // $run_pending_order=mysqli_query($con, $insert_pending_order);
	   
	   $delete_cart="delete from cart where ip_add='$ip_add'";
	   $run_del=mysqli_query($con, $delete_cart);
	   echo "<script>alert('Your order has been submitted, Thanks')</script>";
	   echo "<script>window.open('customer/my_account.php?my_order','_self')</script>";
}

}

  ?>
