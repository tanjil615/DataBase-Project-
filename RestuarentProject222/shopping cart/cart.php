<?php

include '../connection.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

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


<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($con, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>৳ <?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>৳ <?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>
<br><br><br><br><br><br><br><br><br><br>
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