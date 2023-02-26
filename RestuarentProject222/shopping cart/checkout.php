<?php

include '../connection.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($con, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($con, "INSERT INTO `orders`(name, number, email, method, city, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$city','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$city.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

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
                     <li><a href="products.php">Products</a></li>
                     
                     <li><a href="#contact">Contact</a></li>
                     
                     
                  </ul>
               </nav>
            </div>
         </div>
      </header>
      <!-- header ends  -->

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>
   <?php
      $select_customer = mysqli_query($con, "SELECT * FROM `customer`") or die('query failed');
      if(mysqli_num_rows($select_customer) > 0){
         $fetch_customer = mysqli_fetch_assoc($select_customer);
      };
   ?>
      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="<?php echo $fetch_customer['name']; ?>" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="<?php echo $fetch_customer['mobile']; ?>" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="<?php echo $fetch_customer['email']; ?>" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">bkash</option>
               <option value="paypal">credit card</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="<?php echo $fetch_customer['address']; ?>" name="address" required>
         </div>
         
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="<?php echo $fetch_customer['loc']; ?>" name="city" required>
         </div>
         
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. Bangladesh" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>