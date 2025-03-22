<div class="box">
	<?php
	$session_email=$_SESSION['customer_email'];
	$select_customer="select * from customers where customer_email='$session_email'";
	$run_cust=mysqli_query($con, $select_customer);
	$row_customer=mysqli_fetch_array($run_cust);
	$customer_id=$row_customer['customer_id'];
	$ip_add=getUserIp();
	$select_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($con,$select_cart);
	$count=mysqli_num_rows($run_cart);



	 ?>
	<p class="text-muted">Currently you have <?php echo $count ?> items to checkout</p>
	<div class="table-respon"></div>
	<table class="table">
	  <thead>
		<tr>
		  <th colspan="2">Product</th>
		  <th>Quantity</th>
		  <th>Unit Price</th>
		  <th>Size</th>
		  <th colspan="1">Sub Total</th>
		</tr>
	  </thead>
	  <tbody>
	   <?php
	   $total=0;
	   while ($row=mysqli_fetch_array($run_cart)) {
		 $pro_id=$row['p_id'];
		 $pro_size=$row['size'];
		 $pro_qty=$row['qty'];
		 $get_product="select * from products where product_id='$pro_id'";
		 $run_pro=mysqli_query($con,$get_product);
		 while ($row=mysqli_fetch_array($run_pro)) {
		   $p_title=$row['product_title'];
		   $p_img1=$row['product_img1'];
		   $p_price=$row['product_price'];
		   $sub_total=$row['product_price']*$pro_qty;
		   $total += $sub_total; 

		

		 ?>
		<tr>
		  <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
		  <td><?php echo $p_title ?></td>
		  <td><?php echo $pro_qty ?></td>
		  <td>INR <?php echo $p_price ?></td>
		  <td><?php echo $pro_size ?></td>
		  <td>INR <?php echo $sub_total ?></td>
		</tr>
		<?php } } ?>
	 </tfoot>
	</table>
<div class="box-footer">
	  <div class="pull-left">
	   <h4>Total Price</h4>
	  </div>
	  <div class="pull-right">
		<h4>INR <?php echo $total; ?></h4>
	  </div>
	  <br><br>
		<p class="lead-text-center">
			<a href="order.php?c_id=<?php echo $customer_id ?>"><span>Order Placed</span></a>
		</p>
	
	</div>
  </form>
</div>

	
</div>

