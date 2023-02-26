<?php
   ob_start(); 
   session_start();
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
      <!--css for desktop-->
      <title>blog</title>
   </head>
   <body>
      <div class="container2">
         <!-- header starts  -->
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
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="sign-in.php" class="active">Login</a></li>
                        <li><a href="sign-up.php">Registration</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
         </header>
         <!-- header ends  -->       
         <div id="container_2" style="font-family: Calibri, Helvetica, sans-serif;background-image: url('images/bg_signup.jpg');">
            <br><br>
            <form action="sign-in.php" method="POST" enctype="multipart/form-data" class="shadow-sm bg-white rounded" style="padding: 40px;border: 1px solid #cccccc80;width:30%;margin:0 auto;background:#fff;">
               <!-- Email input -->
               <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Email address"/>
               </div>
               <!-- Password input -->
               <div class="form-outline mb-4">                
                  <input type="password" name="pass" class="form-control form-control-lg" placeholder="Password"/>
               </div>
               <!-- 2 column grid layout for inline styling -->
               <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                     <!-- Checkbox -->
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" checked />
                        <label class="form-check-label"> Remember me </label>
                     </div>
                  </div>
                  <div class="col">
                     <!-- Simple link -->
                     <a href="#!">Forgot password?</a>
                  </div>
               </div>
               <!-- Submit button -->
               <button type="submit" class="btn-primary btn-block mb-4 py-2" name="ok">Sign in</button>
               <!-- Register buttons -->
               <div class="text-center">
                  <p>Not a member? <a href="sign-up.php">Register</a></p>
               </div>
            </form>
            <br><br>
         </div>
         <!--container_2--->
         <!--contact sec start-->

         <!--contact sec end-->
         <footer>
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
<?php
   include("connection.php");
   if(isset($_POST['ok']))
   {
   	$email=$_POST['email'];
   	$pass=$_POST['pass'];
   
   	$sql="select email,password from admin where email='$email' and password='$pass'";
       $sql1="select email,password from  customer where email='$email' and password='$pass'";
               $r=mysqli_query($con,$sql);
               $r1=mysqli_query($con,$sql1);
               if(mysqli_num_rows($r)>0)
               {
                   $_SESSION['email']=$email;
                   $_SESSION['admin_login_status']="logged in";
                   header("Location:admin_home.php");
               }            
               else if(mysqli_num_rows($r1)>0)
               {
                   $_SESSION['email']=$email;
                   $_SESSION['customer_login_status']="logged in";
                   header("Location:customer_home.php");
               }
               else
               {
                   echo "<p style='color: red;'>Incorrect UserId or Password</p>";
               }	
   }
   ?>
