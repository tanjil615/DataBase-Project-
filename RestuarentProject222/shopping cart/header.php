<head>   
   <style>
   .logo{
    width: 70px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    color: white;
    border-radius: 80%;
    border: 2px solid white;
   }   
   :root{
   --blue:#2980b9;
   --red:tomato;
   --orange:orange;
   --black:#333;
   --white:#fff;
   --bg-color:#eee;
   --dark-bg:
   rgba(0,0,0,.7);
   --box-shadow:0 .5rem 1rem
   rgba(0,0,0,.1);
   --border: .1rem solid #2980b940;
}
   </style>
</head>
<header class="header">

   <div class="flex">

      <a href="#" class="logo"><i class="logo fas fa-utensils fa-3x"></i></a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <a href="products.php">products</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($con, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> cart <button><span><?php echo $row_count; ?></span></button> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>