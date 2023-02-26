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
                                <li><a href="sign-in.php">Login</a></li>
                                <li><a href="sign-up.php" class="active">Registration</a></li>
                            </ul>
                        </nav>
    
                    </div>
                </div>
            </header>
            <!-- header ends  -->

      <!---container_1--->
      <div id="container_2" style="font-family: Calibri, Helvetica, sans-serif;">
  <section class="vh-100 bg-image" style="background-image: url('images/bg_signup.jpg');">
  <div class="align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="shadow-sm bg-white rounded">
            <div class="p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="sign-up.php" method="post" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                  <input type="text" name="name" class="form-control form-control-lg" placeholder="Your Full Name"/>
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4 ml-3">
                    <input class="form-check-input" type="radio" name="gender" value="Male" />
                    <label class="form-check-label">Male</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" value="Female" />
                    <label class="form-check-label">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input class="form-check-input" type="radio" name="gender" value="Other" />
                    <label class="form-check-label">Other</label>
                  </div>

                </div> 
                
                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example9">Date Of Birth</label>
                  <input type="date" name="dob" class="form-control form-control-md" />
                </div>                 

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Your Email"/>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="pass" class="form-control form-control-lg" placeholder="Your Password"/>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="mobile" class="form-control form-control-lg" placeholder="Your Mobile Number"/>
                </div>                

                <div class="form-outline mb-4">
                  <textarea type="text" name="address" class="form-control form-control-lg" placeholder="Your Current Address"></textarea>
                </div>
                
                
                
                <div class="justify-content-center py-0">
                  <div class="col-md-14 mb-3">
                  
                    <select class="form-control form-control-lg mb-2" style="margin-top: -11px;margin-left: -14px;width: 107%;" name="loc">
                      <option>Choose Your Location</option>
                      <option value="Dhaka">Dhaka</option>
                      <option value="Chattogram">Chattogram</option>
                      <option value="Rajshahi">Rajshahi</option>
                      <option value="Khulna">Khulna</option>
                      <option value="Borishal">Borishal</option>
                    </select>

                  </div>
                </div>

          
                <div class="row align-items-center py-0">
                <div class="col-md-4 ps-5">
                    <h5 class="mb-0">Profile Image</h5>
                </div>
                <div class="col-md-8 pe-5">
                    <input class="form-control form-control-lg" name="pic" type="file" />
                  </div>
                </div> <br>               

                <div class="form-check justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" style="position:relative;">
                  <label class="form-check-label" for="form2Example3g">
                    <span style="margin-left:10px;font-size:20.5px">I agree all statements in Terms of service.</span>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn-success btn-block btn-lg text-body" name="ok">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="sign-in.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>
              <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

         <!---survey-form--->
      </div>
      <!--container_2--->




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
	//echo "";
	// to receive value from the input fields
	$name=$_POST['name'];
	$gender=$_POST['gender'];
  $dob=$_POST['dob'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$mobile=$_POST['mobile'];
  $address=$_POST['address'];
  $loc=$_POST['loc'];

	echo $name;
	$num=rand(100,1000);
	$cus_id="c-".$num;                
	
	//image upload code
	$ext= explode(".",$_FILES['pic']['name']);      
    $c=count($ext);
    $ext=$ext[$c-1]; 
	//echo $ext;
    $date=date("D:M:Y");
	//echo $date;
    $time=date("h:i:s");
	echo $date.$time.$cus_id;
    $image_name=md5($date.$time);  
    $image=$image_name.".".$ext;
	//echo $image;
	 
	
	
	$query="insert into customer values('$cus_id','$name','$gender',$dob,'$email','$pass','$mobile','$address','$loc','$image')";
	
	if(mysqli_query($con,$query))
	{
		echo " Successfully inserted!";
		if($image !=null){
	                move_uploaded_file($_FILES['pic']['tmp_name'],"uploadimages/$image");
                    }
    }
	else
	{
		echo "error!".mysqli_error($con);
	}
}
?>
