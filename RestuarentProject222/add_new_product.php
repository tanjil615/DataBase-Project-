<?php
   session_start();
   include("connection.php");
   if($_SESSION['admin_login_status']!="logged in" and ! isset($_SESSION['email']) )
    header("Location:product.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
   $_SESSION['admin_login_status']="logged out";
   unset($_SESSION['email']);
   header("Location:index.php");    
   }

   if(isset($_POST['add_product'])){
      $p_name = $_POST['p_name'];
      $p_price = $_POST['p_price'];
      $p_image = $_FILES['p_image']['name'];
      $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
      $p_image_folder = 'uploaded_img/'.$p_image;
   
      $insert_query = mysqli_query($con, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');
   
      if($insert_query){
         move_uploaded_file($p_image_tmp_name, $p_image_folder);
         $msg = 'product add succesfully';
      }else{
         $msg = 'could not add the product';
      }
   };
   
   if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      $delete_query = mysqli_query($con, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
      if($delete_query){
         header('location:admin.php');
         $msg = 'product has been deleted';
      }else{
         header('location:admin.php');
         $msg = 'product could not be deleted';
      };
   };
   
   if(isset($_POST['update_product'])){
      $update_p_id = $_POST['update_p_id'];
      $update_p_name = $_POST['update_p_name'];
      $update_p_price = $_POST['update_p_price'];
      $update_p_image = $_FILES['update_p_image']['name'];
      $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
      $update_p_image_folder = 'uploaded_img/'.$update_p_image;
   
      $update_query = mysqli_query($con, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");
   
      if($update_query){
         move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
         $msg = 'product updated succesfully';
         header('location:admin.php');
      }else{
         $msg = 'product could not be updated';
         header('location:admin.php');
      }
   
   }
   
   //fetches a row as an associative array
   $email=$_SESSION['email'];
   $sql = "select * from admin where email='$email'"; 
    $r = $con->query($sql);
    $row= mysqli_fetch_array($r);   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Change Password</title>
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
      <link rel="stylesheet" href="admin_home.css">
      <link rel="stylesheet" href="A.style.css">
         <!-- custom css file link  -->
   <link rel="stylesheet" href="shopping cart/css/style.css">
      <style>.btn.btn-primary{background: #28a745;border-color: #28a745;}.table thead.thead-primary{background: #28a745;}label{float:left;}.list-group-item.active{background-color: #28a745;border-color: #28a745;}</style>
   </head>
   <body style="margin-top:-128px;">
   <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
      <header>
         <!-- Sidebar -->
         <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
               <div class="list-group list-group-flush mx-3 mt-4">
                  <a
                     href="#"
                     class="list-group-item list-group-item-action py-2 ripple"
                     aria-current="true"
                     >
                  </a>
                  <a href="admin_home.php" class="list-group-item list-group-item-action py-2 ripple">
                  <span>Dashboard</span>
                  </a>
                  <a href="product.php" class="list-group-item list-group-item-action py-2 ripple active">
                  <span>Products</span>
                  </a>
                  <a href="admin_change_password.php" class="list-group-item list-group-item-action py-2 ripple">
                  <span>Change Password</span>
                  </a>                
               </div>
            </div>
         </nav>
         <!-- Sidebar -->
         <!-- Navbar -->
         <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
               <!-- Toggle button -->
               <button
                  class="navbar-toggler"
                  type="button"
                  data-mdb-toggle="collapse"
                  data-mdb-target="#sidebarMenu"
                  aria-controls="sidebarMenu"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                  >
               <i class="fas fa-bars"></i>
               </button>
               <!-- Brand -->
               <a class="navbar-brand" href="#">
               <i class="logo fas fa-utensils fa-3x"></i> 
               </a>
               <!-- Right links -->
               <ul class="navbar-nav ms-auto d-flex flex-row">
                  <a href="?sign=out" style="text-decoration:none;color:aliceblue;">LOGOUT</a>
               </ul>
            </div>
            <!-- Container wrapper -->
         </nav>
         <!-- Navbar -->
      </header>

    
   


      <section style="width:81%;float:right;">

<form action="" method="post" class="add-product-form" enctype="multipart/form-data" style="margin-top:105px;">
   <h3>add a new product</h3>
   <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>




      <footer style="background-color:#fff;color:#6a6868;margin-top:217px;">
    
      </footer>
     
   </body>
</html>

