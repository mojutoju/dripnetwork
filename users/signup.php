<?php include('dbc/connect.php'); ?>
<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>The Drip Network </title>
    <link rel="icon" href="../img/logotrans.svg" type="image/svg" />

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Helvetica:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="../assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="../assets/img/favicons/manifest.json">
<link rel="mask-icon" href="../assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="../assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>

body{
    font-family: 'Helvetica';

    height: 100%;
   
    background-repeat: no-repeat;

    height: 50vh;
  min-height: 1000px;
  background-image: url('../img/banners1.jpg');
  background-size: cover;
  background-position: center ;
  background-repeat: no-repeat;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

       
  .navbar-nav .nav-link {
    margin-right: 14px;
    margin-left: 14px;
}

.masthead {
  height: 80vh;
  min-height: 600px;
  background-image: url('img/banners1.jpg');
  background-size: cover;
  background-position: center ;
  background-repeat: no-repeat;
}

.vertical{
	height: 100%;
	position: absolute;
	border-left: 2px solid white;
      }
      
      
      .main{
   max-width: 500px;
    border-radius: 6px;
   
    margin: 50px auto;
  
      }
      
      .main-container{
             
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
   
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    overflow: auto;
    min-height: 100vh;
    box-sizing: border-box;
      }
      
      a:hover{
          color:blue;
      }
      

      

    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
    <script src="js/sweetalert.min.js"> </script>
  </head>
  <body>






	

    
  <div class="main-container">

<div class="main">
    
    <div class="container">
    
   
    <br>
      <h3 style="color:white; text-align:center;"> Sign <strong style="color:orange;"> Up </strong></h3>
            <p style="color:white; text-align:center;"> Sign Up and Pay N1,000 to become a  <strong style="color:yellow;"> contestant.</strong> </p>
            <hr style="color:white; background-color:white;">
            
       
       
     
<?php

if(isset($_POST['signup'])){

    $username = mysqli_real_escape_string($dbc, $_POST['username']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    
    $password = mysqli_real_escape_string($dbc, $_POST['password']);
    $password = md5($password);
    $confirmpassword = $_POST['cpassword'];
    $cpassword = mysqli_real_escape_string($dbc, $_POST['cpassword']);
    $phoneno =$_POST['phoneno'];

  $status = $_POST['status'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $status = "Not Paid";
  
  
                 
  $pic = mysqli_query($dbc, "SELECT * FROM dripnetwork_users WHERE email = '$email' AND username = '$username'  ");
  $row = mysqli_fetch_assoc($pic);
             $countrows = mysqli_num_rows($pic);
             if($countrows == 1){
        ?>
        
        
  <script>
     
      swal({
            text: "Error",
    title: "Sorry! User Exists",
  
    icon: "error",
    button: "Close",
  });
  </script>  
        
        <?php
  
             }else{
  
             
             
             
  if($pass != $cpass){
      
   ?>
   
   
  <script>
     
      swal({
            text: "Error",
    title: "Password does not match ",
  
    icon: "error",
    button: "Close",
  });
  </script>  
   
   
   <?php
      
  }else{
  
  
  $sql = mysqli_query($dbc, "INSERT INTO `dripnetwork_users` VALUES (NULL,'$fname', '$lname', '$email', '$password', '$cpassword', '$phoneno',  '$status', '$amount' , now())  ");
  if($sql){
      
      
      ?>
      
      
  <script>
     
      swal({
            text: "Success",
    title: "You have successfully registered, access your dashboard. ",
  
    icon: "success",
    button: "Close",
  });
  </script>  
  
  
  <?php
  
  $to = $email; 
  $from = 'noreply@noron-marque.com'; 
  $fromName = 'Noron Marque Admin'; 
   
  $subject = "Become a User"; 
   
  $htmlContent = "
      <html> 
      <head> 
          <title>Welcome to Noron Marque </title> 
      </head> 
      <body> 
  
   
   <div class='container'>
     
   <img src='https://serving.photos.photobox.com/820358506a99678561f3452f9cbc225c918ebc76de10646d89a9b2cf0978c63753fb01a0.jpg' class='img-fluid img-thumbnail'>
  
  <b> <h3 style='font-size:25px;'> Dear $fname, </h3> </b> 
  
  <h4>Thank you for creating an account with us, kindly access your dashboard to complete your registration payment.
  </h4>
  
  <h5 style='font-size:20px;'> Kindly take note of the following details. </h5> 
  
  
  <h3> Firstname : $fname </h3> 
  <h3> Lastname : $lname </h3>
  <h3> Email Address : $email </h3> 
  <h3> Password : $cpassword </h3> 
  <h3> Phone number : $phoneno</h3>
  <h3> State : $state </h3> 
  
  
  
  <img src='https://noron-marque.com/img/11.png' class='img-fluid' width='200'>
  
  <h4> Thank you, <br>
  Noron Marque
  </h4>
  
  <p style='letter-spacing:1.5px;'> For more information, visit our website <a style='letter-spacing:1.5px; font-weight:bold;' href='https://www.noron-marque.com'> Noron Marque </a>   </p>
  
  </div>
  
      </body> 
      </html>"; 
   
  // Set content-type header for sending HTML email 
  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
   
  // Additional headers 
  $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
  
   
  // Send email 
  if(mail($to, $subject, $htmlContent, $headers)){ 
   
   ?>
   
    
   <?php
   
   
   
  }else{ 
    
    
    ?>
    
        
  <script>
     
      swal({
            text: "Error",
    title: "Sorry! E-mail Delivery Failed",
  
    icon: "error",
    button: "Close",
  });
  </script>  
    
    <?php
  }
  
  }else{}
      
      
  }}}
  
  ?>    


                    
                  <form name="signup" method="POST" action="signup_preview.php">
        

        
        <div class="form-group">
            
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            
        </div>
        
        <br>
        



        
        <div class="form-group">
            
            <input type="text" class="form-control" name="fname" placeholder="First Name" required>
            
        </div>
        
        <br>


        
        
        <div class="form-group">
            
            <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
            
        </div>
        
        <br>
        

        
        
        <div class="form-group">
            
            <input type="email" class="form-control" name="email" placeholder="E-mail Address" required>
            
        </div>
        
        <br>


        <div class="form-group">
            
        <input type="text" class="form-control" name="phoneno" placeholder="Phone No e.g +234907574832"   onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" required> 
            
        </div>

        <br>
        
        


        <div class="form-group">
            
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            
        </div>
        
        <br>
        

        
        <div class="form-group">
            
            <input type="password" class="form-control" name="cpassword" placeholder=" Confirm Password" required>
            
        </div>


<input type="hidden" name="status" value="Not Paid">

        
        <br>
        
        <div class="form-group">
                    <input type="submit" class="btn btn" style="color:white; background:orange;     width: 100%;
    height: 48px;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.57;
    letter-spacing: -.11px;" value="Sign Up" name="signup"> 
    
    </div>
    
    &nbsp; &nbsp;
     
    </form>
                  


    <p style="color:white; text-align:center;"> Already a member ? <a href="login.php" style="color:orange; text-align:center;"> Click Here</a>  </p>
      
 

                  <p style="color:white; text-align:center;"> Go back to Landing Page ? <a href="../index.php" style="color:orange; text-align:center;"> Click Here</a>  </p>
      
 
    

        
        
    </div>
    
</div>

</div>



    
    <script>
    
    
         
      if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
 
</script>





  
  <script src="../assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



  </body>
</html>
