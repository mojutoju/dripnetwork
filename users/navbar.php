<?php include('dbc/connect.php'); 
session_start();
?>
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
    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="../docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="../assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="../assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="../assets/img/favicons/manifest.json">
<link rel="mask-icon" href="../assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="../assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
body{
    font-family: 'Helvetica';
    background: #131313;

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



    </style>



<?php

if($_SESSION["login"] != null){
    $uname = $_SESSION["login"];

}
else{
 echo " <script> window.location.href = 'login.php'; </script>";
}
   ?>
   
   
   
   
<?php
$select = mysqli_query($dbc,"SELECT * FROM `dripnetwork_users` WHERE `username` = '".$_SESSION['login']."' ");
if(mysqli_num_rows($select) > 0){
    $j = 1;
 while($rows = mysqli_fetch_assoc($select)){
$uname = $rows['username'];
$fname = $rows['fname'];
$lname = $rows['lname'];
$email = $rows['email'];


?>


    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar  mb-4" style="background-color: #131313;">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php"> <img src="../img/logotrans.svg" class="img-fluid" width="120px"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="background-color: yellow;" >
      <i class="fa fa-bars"> </i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mx-auto mb-2 mb-md-0">
      
      
      <li class="nav-item dropdown">
		   <a class="nav-link " href="#" data-bs-toggle="dropdown" style="color:white;">  <i class="fa fa-user"> </i> Welcome <strong style="color:yellow;"> <?php echo $uname; ?> </strong> </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="editprofile.php"> Edit Profile </a></li>
			  <li><a class="dropdown-item" href="settings.php"> Settings </a></li>
			
		    </ul>
		</li>



        <li class="nav-item dropdown">
		   <a class="nav-link  " href="#" data-bs-toggle="dropdown" style="color:white;">  <i class="fa fa-group"> </i> Users </a>
		    <ul class="dropdown-menu">
		
			  <li><a class="dropdown-item" href="manageusers.php"> Manage Users </a></li>
              
		    </ul>
		</li>




        <li class="nav-item dropdown">
		   <a class="nav-link " href="#" data-bs-toggle="dropdown" style="color:white;">  <i class="fa fa-gift"> </i> Packages </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="createpackages.php"> Create Packages </a></li>
			  <li><a class="dropdown-item" href="managepackages.php"> Manage Packages </a></li>
			
		    </ul>
		</li>


        
        <li class="nav-item dropdown">
		   <a class="nav-link " href="#" data-bs-toggle="dropdown" style="color:white;">  <i class="fa fa-list"> </i> Blog </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="createblog.php"> Create Blog Posts </a></li>
			  <li><a class="dropdown-item" href="manageblog.php"> Manage Blog Posts </a></li>
			
		    </ul>
		</li>


        
        <li class="nav-item dropdown">
		   <a class="nav-link " href="#" data-bs-toggle="dropdown" style="color:yellow;">  <i class="fa fa-key"> </i> Votes </a>
		    <ul class="dropdown-menu">
			  
			  <li><a class="dropdown-item" href="#"> Manage Votes </a></li>
			
		    </ul>
		</li>

  
        <li class="nav-item dropdown">
		   <a class="nav-link " href="#" data-bs-toggle="dropdown" style="color:yellow;">  <i class="fa fa-envelope"> </i> Newsletters </a>
		    <ul class="dropdown-menu">
			  
			  <li><a class="dropdown-item" href="newsletters.php"> Send Newsletters  </a></li>

			<li><a class="dropdown-item" href="#"> Manage Subscribers </a></li>
              
		    </ul>
		</li>


      </ul>
      <form class="d-flex">
       <a href="opt.php?action=logout" class="btn btn" style="background:yellow; color:black;"> Log Out </a>
      </form>
    </div>
  </div>
</nav>

<script src="../assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="js/mdb.js"> </script>

<script>

$(document).ready(function () {

(function ($) {

    $('#filter').keyup(function () {

        var rex = new RegExp($(this).val(), 'i');
        $('.searchable tr').hide();
        $('.searchable tr').filter(function () {
            return rex.test($(this).text());
        }).show();

    })

}(jQuery));

});


  </script>

     <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  


      <?php 
$j++; }}
      ?>
  </body>
</html>
