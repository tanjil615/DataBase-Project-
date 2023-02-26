<?php
   session_start();
   if($_SESSION['customer_login_status']!="logged in" and ! isset($_SESSION['email']) )
    header("Location:customer_change_password.php");
   
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['customer_login_status']="logged out";
	unset($_SESSION['email']);
   header("Location:index.php");    
   }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Change Password</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="customer_change_password.php">Change Password</a></li>
                        <li><a href="?sign=out" class="active">Logout</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </header>
         </div>
         
    <div id="container_2" style="font-family: Calibri, Helvetica, sans-serif;background-image: url('images/bg_signup.jpg');">
            <br><br>
            <form action="customer_change_password.php" method="POST" enctype="multipart/form-data" class="shadow-sm bg-white rounded" style="padding: 40px;border: 1px solid #cccccc80;width:30%;margin:0 auto;background:#fff;">
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
               <button type="submit" class="btn btn-primary btn-block mb-4 py-2" name="submit">Sign in</button>
            
            </form>
            <br><br>
         </div>

    </body>
</html>

<?php
include("connection.php");
if(isset($_POST['submit']))
{
 $op=$_POST['op'];
 $np=$_POST['np'];
 $c_np=$_POST['c_np'];

$sql="select password from customer where password='$op'";
$r=mysqli_query($con,$sql);
$num=mysqli_fetch_array($r);

if($num>0)
{
 $sql="update customer set password='$np'";
 $con=mysqli_query($con,$sql);
   echo '
   <script type="text/javascript">
      window.alert("Password Changed Successfully !!")
      window.location.href="customer_change_password.php";
   </script>';
}
else
{
   echo '
   <script type="text/javascript">
      window.alert("Old Password not matched !!")
      window.location.href="customer_change_password.php";
   </script>';
}
}
?>