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
    background: url('../img/adminbanner.jpg');
    background-size: cover;
    background-position: center;
    height: 100%;
    min-height: 600px;
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






					
  <?php
if(isset($_POST['login'])){
 
  $uname = $_POST['username'];
  
  
  $password = mysqli_real_escape_string($dbc, $_POST['password']);
 $password = md5($password);

  $sql = mysqli_query($dbc, "SELECT * FROM `dripnetwork_admin` WHERE `username` = '".$uname."' AND `password` = '".$password."'  ");
  $num = mysqli_fetch_array($sql);

  if($num>0) {
 
    $_SESSION['login'] = $uname;
   $_SESSION['drip_id'] = $id;
   

?>


 
<script>
     
     swal({
           text: "Success",
   title: "Login Successful ",
 
   icon: "success",
   button: "Close",
 });

 </script>  
 


<?php
echo " <script> window.location.href = 'dashboard.php'; </script>";
  }else{
	  ?>

	   
<script>
     
     swal({
           text: "Error",
   title: "Login Details Incorrect ",
 
   icon: "error",
   button: "Close",
 });

 </script>  


	<?php
  }


}
?>
					
	

    
  <div class="main-container">

<div class="main">
    
    <div class="container">
    
   
    <br>
      <h3 style="color:white; text-align:center;"> Sign <strong style="color:orange;"> In </strong></h3>
            <p style="color:white; text-align:center;"> Login to access dashboard </p>
            <hr style="color:white; background-color:white;">
            
       
       
     


                    
                  <form name="login" method="POST" action="login.php">
        

        
        <div class="form-group">
            
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            
        </div>
        
        <br>
        
        <div class="form-group">
            
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            
        </div>
        
        <br>
        
        <div class="form-group">
                    <input type="submit" class="btn btn" style="color:white; background:orange;     width: 100%;
    height: 48px;
    font-stretch: normal;
    font-style: normal;
    line-height: 1.57;
    letter-spacing: -.11px;" value="Login" name="login"> 
    
    </div>
    
    &nbsp; &nbsp;
     
    </form>
                  
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
