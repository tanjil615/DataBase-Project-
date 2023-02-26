<?php
   session_start();
   @include("connection.php");
   if($_SESSION['admin_login_status']!="logged in" and ! isset($_SESSION['email']) )
    header("Location:product.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
   $_SESSION['admin_login_status']="logged out";
   unset($_SESSION['email']);
   header("Location:index.php");    
   }
   //add_to_cart
   if(isset($_POST['add_product'])){
      $p_name = $_POST['p_name'];
      $p_price = $_POST['p_price'];
      $p_image = $_FILES['p_image']['name'];
      $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
      $p_image_folder = 'uploaded_img/'.$p_image;
   
      $insert_query = mysqli_query($con, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('query failed');
   
      if($insert_query){
         move_uploaded_file($p_image_tmp_name, $p_image_folder);
         $message[] = 'product add succesfully';
      }else{
         $message[] = 'could not add the product';
      }
   };
   
   if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      $delete_query = mysqli_query($con, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
      if($delete_query){
         header('location:product.php');
         $message[] = 'product has been deleted';
      }else{
         header('location:product.php');
         $message[] = 'product could not be deleted';
      };
   };
   
   if(isset($_POST['update_product'])){
      $update_p_id = $_POST['update_p_id'];
      $update_p_name = $_POST['update_p_name'];
      $update_p_price = $_POST['update_p_price'];
      $update_p_image = $_FILES['update_p_image']['name'];
      $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
      $update_p_image_folder = 'shopping cart/uploaded_img/'.$update_p_image;
   
      $update_query = mysqli_query($con, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");
   
      if($update_query){
         move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
         $message[] = 'product updated succesfully';
         header('location:product.php');
      }else{
         $message[] = 'product could not be updated';
         header('location:product.php');
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
      <link rel="stylesheet" href="shopping cart/css/style.css">
      <style>.table thead.thead-primary{background: #28a745;}.list-group-item.active{background-color: #28a745;border-color: #28a745;}
   .button-66 {
  background-color: #28a745;
  border-radius: 4px;
  border: 0;
  box-shadow: rgba(1,60,136,.5) 0 -1px 3px 0 inset,rgba(0,44,97,.1) 0 3px 6px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inherit;
  font-family: "Space Grotesk",-apple-system,system-ui,"Segoe UI",Roboto,Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 18px;
  font-weight: 700;
  line-height: 24px;
  margin: 0;
  min-height: 56px;
  min-width: 120px;
  padding: 16px 20px;
  position: relative;
  text-align: center;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  transition: all .2s cubic-bezier(.22, .61, .36, 1);
}

.button-66:hover {
  background-color: #111;
}

@media (min-width: 768px) {
  .button-66 {
    padding: 16px 44px;
    min-width: 150px;
  }
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
      
      <section class="display-product-table"  style="width:81%;float:right;margin-top: 105px;">
      <a href="add_new_product.php"><button type="submit" class="button-66" style="float:right;margin-right:35px;">Add New Food</button></a>
      <br><br><br>
<table>

   <thead>
      <th>product image</th>
      <th>product name</th>
      <th>product price</th>
      <th>action</th>
   </thead>

   <tbody>
      <?php
      
         $select_products = mysqli_query($con, "SELECT * FROM `products`");
         if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){
      ?>

      <tr>
         <td><img src="shopping cart/uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
         <td><?php echo $row['name']; ?></td>
         <td>$<?php echo $row['price']; ?>/-</td>
         <td>
            <a href="product.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
            <a href="product.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
         </td>
      </tr>

      <?php
         };    
         }else{
            echo "<div class='empty'>no product added</div>";
         };
      ?>
   </tbody>
</table>

</section>

<section class="edit-form-container">

<?php

if(isset($_GET['edit'])){
   $edit_id = $_GET['edit'];
   $edit_query = mysqli_query($con, "SELECT * FROM `products` WHERE id = $edit_id");
   if(mysqli_num_rows($edit_query) > 0){
      while($fetch_edit = mysqli_fetch_assoc($edit_query)){
?>

<form action="" method="post" enctype="multipart/form-data">
   <img src="shopping cart/uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
   <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
   <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
   <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
   <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
   <input type="submit" value="update" name="update_product" class="btn">
   <input type="reset" value="cancel" id="close-edit" onclick="history.back();" class="option-btn">
</form>

<?php
         };
      };
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
?>

</section>
      
      

      
   </body>

</html>