<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Restaurant</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
         integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
         crossorigin="anonymous" />
      <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat&family=Roboto&display=swap"
         rel="stylesheet">
      <link rel="stylesheet" href="style.css">
         <!-- custom css file link  -->
      <link rel="stylesheet" href="shopping cart/css/style.css">
      <style>
         .about-us-contents p {
            font-size: 1.8rem;
            text-align: justify;
            margin-bottom: 10px;
         }
         .about-us-contents h3 {
            font-size: 3.5rem;
            margin-top: 25px;
            margin-bottom: 25px;
            font-weight: bolder;
         }
         .about-us-contents {
            text-align: center;
            padding: 25px;
         }
         .banner-contents h1 {
            width: 100%;
            margin-top:230px;
            font-size: 7rem;
            background: coral;
            border-radius: 5px;
            padding: 20px;
            font-family: 'Handlee', cursive;
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
            color: white;
            z-index: 2;
            font-weight: bold;
            border: 3px solid #f1f1f1;
         }
         #banner-section {
            background-image: url(Images/photo-1611315764615-3e788573f31e.jfif);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(3px);
            -webkit-filter: blur(3px);
         }
         .btn:hover,
         .option-btn:hover,
         .delete-btn:hover{
            background-color: #fff;
         }
         nav ul li a {
            display: block;
            text-decoration: none;
            color: white;
            line-height: 70px;
            padding: 0 20px;
            text-transform: uppercase;
            font-size: 1.4rem;
            font-family: 'Roboto', sans-seri;
            transition: .5s;
         }
         nav ul li a:hover {
            text-decoration: none;
         }
         .icon-style {
            color: white;
            width: 38px;
            height: 38px;
            line-height: 35px;
            border-radius: 60%;
            border: 2px solid white;
            margin: 0 10px;
            transition: 0.5s;
            text-align: center;
            font-size: 15px;
         }
         .h5, h5 {
            font-size: 1.50rem;
         }
         .contact-details p, address {
            font-size: 1.3rem;
         }
      </style>
   </head>
   <body>
      <div class="container2">
      <!-- header starts  -->
      <header>
         <div class="row">
            <div class="col-lg-4">
               <div class="logo-div">
                  <a href="#">
                  <i class="logo fas fa-utensils fa-3x"></i>  
                  </a>
               </div>
            </div>
            <div class="col-lg-8">
               <nav>
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <li><a href="#about-us">About Us</a></li>
                     <li><a href="#menu-section">Food Menu</a></li>
                     <li><a href="#contact">Contact</a></li>
                     <li><a href="sign-in.php">Login</a></li>
                     <li><a href="sign-up.php">Registration</a></li>
                  </ul>
               </nav>
            </div>
         </div>
      </header>
      <!-- header ends  -->
      <main>
         <!--banner section start-->
         <section id="banner-section"></section>
            <div class="banner-contents">
               <h1>Tanjil'S Restaurant</h1>
            </div>
            </section>
<hr>
<section style="background-color: rgb(46, 45, 41);background-image: unset;text-align:center;width: 50%;margin: 0 auto;">
<h style="font-size: 34px;color: rgb(255, 255, 255);line-height: 36pt;">Order Online & Save Some Time!</h>
</section>       
         <!--banner section end-->  
         
         


         <div class="container" style="margin-top:20px;">

<section class="products">

   <h1 class="heading" style="margin-bottom:45px;">all products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($con, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="shopping cart/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" onclick="myFunction()" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>


</div> 
<!--about section start-->
<section id="about-us">
            <div class="row">
               <div class="col-lg-12">
                  <div class="about-us-contents">
                     <h3>About Us</h3>
                     <hr>
                     <p>Craving some delicious food? Maybe you’re in the mood for a juicy steak? No matter what kind of meal you have in mind, Tanjil's Restaurant is ready to prepare it for you.
                        Since 2018, Tanjil's Restaurant has been the go-to diner for residents of Chattogram, BD. Our diner serves breakfast all day, in addition to wholesome and flavorful dining options for lunch and dinner. From burgers to salads, seafood to pastas, you’ll find all kinds of hearty meals prepared fresh at Tanjil's Restaurant. Our diner also has a full bakery with delicious baked goods and other treats, including our famous cheesecake. Sounds delicious, right?
                        
                        We’re here to serve you the best food around, whenever you’re looking for a great restaurant in Chattogram, BD.
                     </p>
                     <hr>
                  </div>
               </div>
         </section>
         <!--about section ends-->

<section style="background-color: rgb(46, 45, 41);background-image: unset;text-align:center;margin-top:-5px;width:70%;margin:0 auto;">
<h style="font-size: 25px;color: rgb(255, 255, 255);line-height: 36pt;">Proudly Serving The Greater Chattogram Area for over 5 Years!</h>
</section>       
         <br><br>
         <!--contact sec start-->
         <section id="contact">
         <div class="row">
         <div class="col-lg-8">
         <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14759.34874754474!2d91.78309839784696!3d22.359775679363448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd88d335fb413%3A0xf9a552264523059c!2sGravy%20Dine%20Restaurant!5e0!3m2!1sen!2sbd!4v1625137787290!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         </div>
         <div class="col-lg-4">
         <div class="contact-details">
         <h3>Contact Details</h3><br>
         <div>
         <h5>Tanjil'S Restaurant</h5>
         <address>
         gec road , Chattogram
         </address> <br>
         </div>
         <div>
         <h5>PHONE: </h5>
         <p>+8801829781730</p><br>
         </div>
         <div>
         <h5>Opening Hours: </h5>
         <p>Tue-Sun: 5pm to 11am
         Inc.Bank Holidays
         </p>
         </div>
         </div>
         </div>
         </div>
         </section>
         <!--contact sec end-->
      </main>
      <footer>
      <div class="row">
      <div class="col-lg-6">
      <p style="font-size: 15px;">&copy; All right reserved by Tanjil'S Restaurant</p>
      </div>
      <div class="col-lg-6">
      <div class="social-menus">
      <a href="#"><i class="icon-style fas fa-arrow-up"></i></a>
      <a href="#"><i class="icon-style fab fa-facebook-f"></i></a>
      <a href="#"><i class="icon-style fab fa-youtube"></i></a>
      <a href="#"><i class="icon-style fab fa-instagram"></i></a>
      </div>
      </div>
      </div>
      </footer>
      </div>

      <script>
function myFunction() {
  alert("You Need to Sign in to Order this food.");
}
</script>      
   </body>
</html>
