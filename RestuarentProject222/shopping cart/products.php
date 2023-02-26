<?php

@include '../connection.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../style.css">
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
         .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 2rem 0.75rem;
            font-size: 2rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            width: 146px;
            height: 70px;
         }
         .btn:hover,
         .option-btn:hover,
         .delete-btn:hover{
            background-color: #2980b9;
            color:#f1f1f1;
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
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>   
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
                     <li><a href="../customer_home.php">Home</a></li>
                     
                     
                     <li><a href="#contact">Contact</a></li>
                     <li>
                     <?php
      
      $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> cart <button style="margin-left: 5px;padding-left: 7px;padding-right: 7px;font-size: 16px;"><span><?php echo $row_count; ?></span></button> </a>   

                     </li>
                     
                  </ul>
               </nav>
            </div>
         </div>
      </header>
      <!-- header ends  -->


<div class="container" style="margin-top:80px;">

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
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>
<br><br><br><br><br><br><br>
</div>
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
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>