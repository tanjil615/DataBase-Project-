<?php
   session_start();
   if($_SESSION['admin_login_status']!="logged in" and ! isset($_SESSION['email']) )
    header("Location:admin_change_password.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['admin_login_status']="logged out";
	unset($_SESSION['email']);
   header("Location:index.php");    
   }
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
    </head>

    <body>
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
        <a href="product.php" class="list-group-item list-group-item-action py-2 ripple">
          <span>Products</span>
        </a>
        <a href="admin_change_password.php" class="list-group-item list-group-item-action py-2 ripple active">
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
    <div id="container_2" style="font-family: Calibri, Helvetica, sans-serif;margin-top: 60px;">
            <br><br>
            <form action="admin_change_password.php" method="POST" enctype="multipart/form-data" class="shadow-sm bg-white rounded" style="padding: 40px;border: 1px solid #cccccc80;width:30%;margin-left:560px;margin-top:90px;background:#fff;">
               <!-- Email input -->
               <div class="form-outline mb-4">
                  <input type="password" name="op" class="form-control form-control-lg" placeholder="Old Password"/>
               </div>
               <!-- Password input -->
               <div class="form-outline mb-4">                
                  <input type="password" name="np" class="form-control form-control-lg" placeholder="New Password"/>
               </div>
               <div class="form-outline mb-4">                
                  <input type="password" name="c_np" class="form-control form-control-lg" placeholder="Confirm Password"/>
               </div>
               
               <!-- Submit button -->
               <button type="submit" class="btn mb-2 py-3" name="submit">Submit</button>
            
            </form>
            <br><br>
         </div>
        <footer style="background-color:#fff;color:#6a6868;margin-top:30px;">
          <d style="margin-left:260px;background-color:#fff">Tanjil's Restuarent 2022. All Rights Reserved.</d>
        </footer>
        </body>
</html>

<?php
include("connection.php");
if(isset($_POST['submit']))
{
 $op=$_POST['op'];
 $np=$_POST['np'];
 $c_np=$_POST['c_np'];

$sql="select password from admin where password='$op'";
$r=mysqli_query($con,$sql);
$num=mysqli_fetch_array($r);

if($num>0)
{
 $sql="update admin set password='$np'";
 $con=mysqli_query($con,$sql);
   echo '
   <script type="text/javascript">
      window.alert("Password Changed Successfully !!")
      window.location.href="admin_change_password.php";
   </script>';
}
else
{
   echo '
   <script type="text/javascript">
      window.alert("Old Password not matched !!")
      window.location.href="admin_change_password.php";
   </script>';
}
}
?>