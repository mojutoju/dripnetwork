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
  }
  
  
  .navbar-nav .nav-link {
    margin-right: 14px;
    margin-left: 14px;
}


.navbar-nav .nav-item  .nav-link :hover{
    
border-bottom:3px solid white;
}

.navbar{
    -webkit-box-shadow: -4px 11px 22px -3px rgba(0,0,0,0.28);
-moz-box-shadow: -4px 11px 22px -3px rgba(0,0,0,0.28);
box-shadow: -4px 11px 22px -3px rgba(0,0,0,0.28);
}




.navbar li a:hover {

border-bottom : 2px solid dodgerblue;
}
      
      
      .masthead {
  height: 50vh;
  min-height: 500px;
  background-image: url('img/banners1.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

      .vertical{
	height: 100%;
	position: absolute;
	border-left: 2px solid white;
      }
      
      
      .main{
          max-width: 1000px;
    padding: 50px 10px;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-content: center;
    align-items: center;
    margin: auto;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
    <script src="js/sweetalert.min.js"> </script>
  </head>
  <body style="background-color: black;">






	

    
  <div class="main-container">

<div class="main">
    
    <div class="container">
    
   
    <br>



      
    <div class="row">
        
        
        <div class="col-md-6 mb-2">
            
            <h3 style="color:yellow; font-weight:800;"> Congratulations </h3>
            <p style="color:white;"> Kindly make payment to become a fully registered user </p>
            <hr style="color:white; background-color:white;">
            
            
            <?php
            if(isset($_POST['signup'])){
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
$amount = 1;


            
            
            ?>
            
             <?php
							        $txref = $email."-".$phoneno; //this is a unique reference for each payment
							    ?>
            
            <form method="POST">
                  <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                <div class="row">
                    
                    
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" readonly>
                    </div>
                    
                    
                      
                     <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" readonly>
                    </div>
                    
                    
                      
    <div class="col-md-6 mb-2">
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" readonly>
                    </div>
                    
                    
                      
                   <div class="col-md-6 mb-2">
                        <input type="password" class="form-control" name="password"  value="<?php echo $password; ?>" readonly>
                    </div>
                    
                      
            <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" name="cpassword" value="<?php echo $confirmpassword; ?>" readonly>
                    </div>
                    
                    
                    <div class="col-md-6 mb-2">
                         <input type="text" class="form-control" name="phoneno" value="<?php echo $phoneno; ?>"   onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" readonly > 
                    </div>
                    
                    
                 
                    </div>
                    
                        
                    <input type="hidden" name="status" value="Paid">
                    
                    <label style="color:white;">
                        Amount to Pay
                    </label>
                    <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>" readonly >
                    
                    <br>
                   <button type="button" class="btn btn" style="background:yellow; color:black;" onClick="payWithRave()">Make Payment</button>
                    
                </div>
                  <script>
                                    const API_publicKey = "FLWPUBK-a30858e046b4421ad3ab82341deac890-X";
                                
                                    function payWithRave() {
                                        var x = getpaidSetup({
                                            PBFPubKey: API_publicKey,
                                            customer_email: "<?php echo $email; ?>",
                                            customer_firstname: "<?php echo $fname; ?>",
                                            customer_lastname: "<?php echo $lname; ?>",
                                            amount: <?php echo $amount; ?>,
                                            currency: "NGN",
                                            txref: "<?php echo $txref; ?>",
                                            onclose: function() {},
                                            callback: function(response) {
                                                var txref = response.tx.txRef; // collect txRef returned and pass to a server page to complete status check.
                                                console.log("This is the response returned after a charge", response);
                                                if (
                                                    response.tx.chargeResponseCode == "00" ||
                                                    response.tx.chargeResponseCode == "0"
                                                ) {
                                                    window.location.href = "paymentsuccess.php?fname=<?php echo $fname."&lname=".$lname."&email=".$email."&password=".$password."&cpassword=".$confirmpassword."&phoneno=".$phoneno."&status=".$status; ?>";     // redirect to a success page
                                                } else {
                                                    // redirect to a failure page.
                                                }
                                
                                                x.close(); // use this to close the modal immediately after payment.
                                            }
                                        });
                                    }
                                </script>
                                <!-- Rave Pay ends here -->
            
                
                
                
                
                
            </form>
            
            <?php } ?>
            <div class="col">
                
            </div>
            
            
            <div class="col-md-5 mb-2">
                
                
                
                
          <div class="card" style="height:50vh; background-image:url('../img/banners1.jpg'); background-size:cover; background-repeat:no-repeat; border-radius:12px; border:none;">
              
              <div class="text" style="    position: absolute;
    right: 0;
    left: 0;
    bottom: 0;
    padding: 20px; color: yellow;">
                 Drip Network
              </div>
          </div>
                
            </div>
            
        </div>
        
        
        
        
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
