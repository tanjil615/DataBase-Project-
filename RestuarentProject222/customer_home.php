<?php
   include("connection.php");
   session_start();
   if($_SESSION['customer_login_status']!="logged in" and ! isset($_SESSION['email']) )
    header("Location:customer_home.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
   $_SESSION['customer_login_status']="logged out";
   unset($_SESSION['cus_id']);
   header("Location:index.php");    
   }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- cdn -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
         integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
         crossorigin="anonymous" />
      <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat&family=Roboto&display=swap"
         rel="stylesheet">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="grid.css">
      <link rel="stylesheet" href="cart.css">
      <style>
         .container .user-profile{
   padding:20px;
   text-align: center;
   border:var(--border);
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border-radius: 5px;
   margin:20px auto;
   max-width: 500px;
}

.container .user-profile p{
   margin-bottom: 10px;
   font-size: 25px;
   color:var(--black);
}

.container .user-profile p span{
   color:var(--red);
}

.container .user-profile .flex{
   display: flex;
   justify-content: center;
   flex-wrap: wrap;
   gap:10px;
   align-items: flex-end;
}
      </style>   
   </head>
   <body>
      <div class="container2">
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
                        <li><a href="#">Home</a></li>
                        <li><a href="customer_change_password.php">Change Password</a></li>
                        <li><a href="?sign=out" class="active">Logout</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </header>
         <!-- header ends  --> 
         <div class="container">

<div class="user-profile">

   <?php
      $select_customer = mysqli_query($con, "SELECT * FROM `customer`") or die('query failed');
      if(mysqli_num_rows($select_customer) > 0){
         $fetch_customer = mysqli_fetch_assoc($select_customer);
      };
   ?>

   <p> Name : <span><?php echo $fetch_customer['name']; ?></span> </p>
   <p> Email : <span><?php echo $fetch_customer['email']; ?></span> </p>
   <p> Mobile No. : <span>+880<?php echo $fetch_customer['mobile']; ?></span> </p>

</div></div>
         <main>
<hr>
<section style="background-color: rgb(46, 45, 41);background-image: unset;text-align:center;margin-top:-5px;width:70%;margin:0 auto;padding:10px;">
<a href="shopping cart/products.php"><h style="font-size: 32px;color: rgb(255, 255, 255);line-height: 36pt;">Browse All Tanjil's Recepie's</h></a>
</section> 
<hr>

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

         <footer class="col-lg-12">
            <div class="row">
               <div class="col-lg-6">
                  <p>&copy; All right reserved by Tanjil'S Restaurant</p>
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
   </body>
</html>