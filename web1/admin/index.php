<?php
session_start();
include("includes/db.php");

include("functions/functions.php");

if(isset($_POST))
  ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elect Shop</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
  
 
</head>
<body>

<!-- header section starts  -->

<header>

<div class="header-1">

    <a href="index.php" class="logo" > <img src="website/all/logo.1.png" alt="Logo image" class="hidden-xs">  </a>
                               
<div class="col-md-6 offer">
    <a href="#" class="btn btn-sucess btn-sm">
          <?php

        if (!isset($_SESSION['customer_email'])){
        echo "Welcome Guest";
      }else{
      echo "Welcome: " .$_SESSION['customer_email'] . "";
    }


        ?>
    </a>
<a id="pr" href="#"> Shopping Cart Total Price: ₹ <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
</div>
  
</div> 

<div class="header-2">
   

<nav class="navbar"> 


     <ul >
        <li>
            
            <li><a class="active" href="index.php">HOME</a></li>
             
            <li><a href="pro.php">SHOP</a></li>
            <li><a href="#arrival">SMART PHONES</a></li>
            <li><a href="#parlor">HEADSETS</a></li>
            <li><a href="#garment">SMART WATCHES</a></li>
            <li><a href="#use"> LAPTOPS</a></li>
            <li><a href="#deal">DEAL</a></li>
            <li><a href="contactus.php">CONTACT</a></li>
            <li><a href="#footer">ABOUT</a></li>
            
 
       <div class="col-md-6">
        <ul class="menu">
            <li>
                         <div class="collapse clearfix" id="search">
                             <form class="navbar-form" method="get" action="result.php">
                                 <div class="input-group">
                                     <input type="text" name="user_query" placeholder="search" class="form-control" required="">
                                     <button type="submit" value="search" name="search" class="btn btn-primary">
                                         <i class="fa fa-search"></i>
                                     </button>
                                 </div>
                             </form>
                         </div>
                   </li>



                <li>
                  <a href="cart.php" class="">
                    <i class="fa fa-shopping-cart"></i>
                      <span><?php item(); ?> items in cart</span>
                        </a>
                </li>
                   

                   <li>
                   <a  href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li>
                   <li>
                    <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>My Account</a>";

                         } else{
                    
                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                
                         }

                    ?>
                   </li> 

                   <li>
                   <a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
                   <li>
                     <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a>";

                         } else{
                    
                    echo "<a href='logout.php'>Logout</a>";
                
                         }

                    ?></li>
             </ul>
       </div>
</ul>
    
    
           
    
       
    
<!-- header section ends -->

<!-- home section starts  -->
<section class="home" id="home">

<div class="slideshow-container">
    
<h1 class="heading"> <span>BEST OFFERS FOR YOU</span> </h1>
<!-- dynamic hairstyle images section starts  -->

<?php
$get_slider="select * from slider LIMIT 0,1";
$run_slider= mysqli_query($con,$get_slider);
while ($row= mysqli_fetch_array($run_slider)) {
  $slider_name= $row['slider_name'];
  $slider_image= $row['slider_image'];
   $slider_url= $row['slider_url'];

  echo "<div class='mySlides fade'>
  <a href='$slider_url'><img src='admin_area/slider_images/$slider_image'  width='1400' height='400'></a>

</div>
  ";
}

    ?>
<?php
$get_slider="select * from slider LIMIT 1,10";
$run_slider= mysqli_query($con,$get_slider);
while ($row= mysqli_fetch_array($run_slider)) {
  $slider_name= $row['slider_name'];
  $slider_image= $row['slider_image'];
   $slider_url= $row['slider_url'];
  echo "<div class='mySlides fade '>
  <a href='$slider_url'><img src='admin_area/slider_images/$slider_image' width='1400' height='400'></a>
        </div>";
}

    ?>


<!-- dynamic hairstyle images section End  -->

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div  style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  

</div>



</section>




<!-- home section ends -->
<!-- new this week section start -->
<!-- hot start -->

<div class="hot">    
    <div class="box">
        <div class="container">
            <div class="col-md-121">
                <h2>Latest this Week</h2>
           
          <!-- dynamic latest this week images section start  -->
          <div class=" col-sm-4" >
          <div class="row">
                   <?php

                   getPro();


                     ?>
 </div>
</div><!-- hot End -->
 </div>
         </div>
    </div>
</div>
          <!-- dynamic latest this week images section End  -->


                   
      


<!-- new this week section End -->


<!--saloon product section starts  -->

<!-- pro Start  -->
<section class="arrival" id="arrival">

<h1 class="heading"> <span>SMART PHONES</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=23"> <img src="website/all/ad.jpg"  alt=""></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=23"><h3>Android Phones</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- pro End  -->
    
    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=24">  <img src="website/all/px.jpg" alt=""></a>
        </div>
        <div class="info">
          <a href="pro.php?p_cat=24">  <h3>Google Pixel Phones</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=25"> <img src="website/all/ip.jpg" alt=""></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=25"> <h3>Apple Iphones</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

    <div class="box">
        <div class="image">
            <a href="pro.php?p_cat=26"><img src="website/all/un.jpg" alt=""></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=26"><h3>Under ₹15,000</h3></a>
        
        </div>
        <div class="overlay">
    </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=27"> <img src="website/all/un30.jpg"  alt=""></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=27"><h3>Under ₹30,000</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=28"> <img src="website/all/5g.jpg"  alt=""></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=28"><h3>5G Phones</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

    </div>
</section>

<!-- saloon products section ends -->
<!-- parlor products section starts -->

<section class="headset" id="parlor">

<h1 class="heading"> <span>HEADSETS</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=29"> <img src="website/all/h1.jpg"  alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=29"><h3>Boat EarBuds</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- pro End  -->
    
    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=30">  <img src="website/all/h2.jpg" alt="" width="250"></a>
        </div>
        <div class="info">
          <a href="pro.php?p_cat=30">  <h3>Negbands</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=31"> <img src="website/all/h3.jpg" alt="" height="10%" width="250" ></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=31"> <h3>Headphones </h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

    <div class="box">
        <div class="image">
            <a href="pro.php?p_cat=32"><img src="website/all/h4.jpg" alt=""width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=32"><h3>Apple Buds</h3></a>
        
        </div>
        <div class="overlay">
    </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=33"> <img src="website/all/h5.jpg"  alt=""width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=33"><h3>Samsung Buds</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

     <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=34"> <img src="website/all/h6.jpg"  alt=""width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=34"><h3>Gaming Headphones</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>


    </div>
</section>
<!-- parlor products section ends -->
<!-- garment products section start -->
<section class="garment" id="garment">

<h1 class="heading"> <span>SMART WATCHES</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=35"> <img src="website/all/w1.jpeg"  alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=35"><h3>Noise Watches</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- pro End  -->
    
    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=36">  <img src="website/all/w2.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
          <a href="pro.php?p_cat=36">  <h3>Galaxy Watches</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=37"> <img src="website/all/w3.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=37"> <h3>Rugged Watches</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

    <div class="box">
        <div class="image">
            <a href="pro.php?p_cat=38"><img src="website/all/w4.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=38"><h3>OnePlus Watches</h3></a>
        
        </div>
        <div class="overlay">
    </div>
    </div>
    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=39"> <img src="website/all/w5.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=39"> <h3>Apple Watches</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="pro.php?p_cat=40"> <img src="website/all/w6.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=40"> <h3>Boat Watches</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>


    </div>
</section>
<!--garment section ends-->
<section class="use" id="use">

<h1 class="heading"> <span>Laptops</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=41"> <img src="website/all/l1.jpeg"  alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=41"><h3>Microsoft Laptops</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- pro End  -->
    
    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=42">  <img src="website/all/l2.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
          <a href="pro.php?p_cat=42">  <h3>Touch Screen Laptops</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="pro.php?p_cat=43"> <img src="website/all/l3.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=43"> <h3>MacBooks</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

    <div class="box">
        <div class="image">
            <a href="pro.php?p_cat=44"><img src="website/all/l4.jpeg" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="pro.php?p_cat=44"><h3>Gaming Laptops</h3></a>
        
        </div>
        <div class="overlay">
    </div>
    </div>
    </div>
</section>


<!-- gallery section ends -->

<!-- deal section starts  -->



<!-- deal section ends -->

<!-- newsletter section starts  -->

<section class="newsletter" id="newsletter">

    <h1>Newsletter</h1>
    <p>Get In Touch For Latest Discounts And Updates</p>
    <form action="contactus.php" method="post">

                  
                        <input type="text" placeholder="Enter Your Name" ><br>
                   
                    
        <input type="email" placeholder="Enter Your Email">

                        <textarea type="txt" placeholder="Enter Your Message"></textarea>
                  
        <input type="submit" class="btn" >
    </form>

</section>

<!-- newsletter section ends -->

<!-- footer section starts  -->

<!-- footer section starts  -->



  <footer class="footer" id="footer">
     <div class="cuntainer">
        <div class="wolf">
           
            <div class="footer-ol">
                <h4>company</h4>
                <ul>
                    <li><a href="#">about us</a></li><br><br>
                    <li><a href="#">our services</a></li><br><br>
                    <li><a href="#">privacy policy</a></li><br><br>
                    <li><a href="#">affiliate program</a></li><br><br>
                </ul>
            </div>
            <div class="footer-ol">
                <h4>get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li><br><br>
                    <li><a href="#">shipping</a></li><br><br>
                    <li><a href="#">returns</a></li><br><br>
                    <li><a href="#">order status</a></li><br><br>
                    <li><a href="#">payment options</a></li><br><br>
                </ul>
            </div>
            <div class="footer-ol">
                <h4>Elect Store</h4>
                <ul>
                    <li><a href="pro.php?cat_id=7">Smart Phones</a></li><br><br>
                    <li><a href="pro.php?cat_id=7">Headsets</a></li><br><br>
                    <li><a href="pro.php?cat_id=7">Smart Watches</a></li><br><br>
                    <li><a href="pro.php?cat_id=7">Laptops</a></li><br><br>
                </ul>
            </div>
            <div class="footer-ol">
                <h4>follow us</h4>
                <div  class="social-links">
                    <a href="#"><i class="fab fa-facebook-f fa-x" style="color: #3b5998;"></i></a>
    

                </div>
            </div>
            <div class="pal">
                
            </div>
            <p class="credit">Copyright &copy; <span>2015-2024</span> | all rights reserved. | <span>Designed By GWS Tutor</span></p>
        </div>
     </div>
  </footer>

<!-- footer section ends -->
<!-- footer section ends -->

  </nav></div></header>  


<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js file link  -->
<script src="main/js.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";

}
</script>



</body>
</html>

