<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
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
                        <li><a href="customer_home.php">Home</a></li>
                        <li><a href="customer_change_password.php">Change Password</a></li>
                        <li><a href="?sign=out" class="active">Logout</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </header>
         <!-- header ends  -->     
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

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