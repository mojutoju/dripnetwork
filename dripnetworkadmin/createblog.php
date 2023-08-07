<?php include('dbc/connect.php'); 
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
    <script src="//cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>
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



.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter.warning{
    background-color: orange;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }


            
.items{
        display: flex;
        overflow-x: auto;
    }
    
    .items::-webkit-scrollbar{
        display: none;
    } 
    
    .items .options{
        min-width: 300px;
       
       
        margin: 10px;
        border-radius: 10px;
           
        position: relative;
    
    }
    





    </style>



<script src="js/sweetalert.min.js"> </script>
    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    

<?php include('navbar.php'); ?>



<div class="container">

<h2 style="color:white;">
Create <strong style="color:yellow;"> Blog Posts </strong>
</h2>

<hr style="color:white; background: white;">



<?php
    if(isset($_POST['blog'])){
        
        $title = $_POST['title'];
        
        $authorname = $_POST['authorname'];
    
        $editor1 = $_POST['editor1'];
           $file = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $type=$_FILES['file']['type'];
$limit_size = 9000;
    $tmp_name = $_FILES['file']['tmp_name'];
    $fp      = fopen($tmp_name, 'r');

    $content = fread($fp, filesize($tmp_name));

    $content = addslashes($content);

    fclose($fp);

$allowed =  array('jpg','png','svg', 'jpeg', 'gif');//allowed types
$ext = pathinfo($file, PATHINFO_EXTENSION);//extension checking

if(!in_array($ext,$allowed) )
{

   
   ?>
   
   
   
    
<script>
   
    swal({
          text: "Error",
  title: "Invalid format make sure you upload a clear jpg, png format. ",

  icon: "error",
  button: "Close",
});


</script>  


<?php

}
else
{

  if($_FILES['file']['size'] <= $limit_size)
  {
   ?>
   
   
    
<script>
   
    swal({
          text: "Image Size is less than 2mb ",
  title: "Invalid Size ",

  icon: "error",
  button: "Close",
});

</script>  

   
   
   
   
   <?php




  }else{

  



    if($file){
    $location = "blogs/$file";
    move_uploaded_file($tmp_name, $location);

$insert = mysqli_query($dbc, "INSERT INTO `dripnetwork_blogs` VALUES (NULL, '$title', '$authorname',  '$file', '$size', '$content', '$type', '$location',  '$editor1', now())  ");


 if($insert){
      
      ?>
      
     
<script>
   
    swal({
          text: "Success",
  title: " <?php echo $title; ?> Blog Posted  ",

  icon: "success",
  button: "Close",
});

</script>  
  
      <?php
   
  } else{
    
  }


} }


}}





?>

<form name="blog" method="POST" action="createblog.php"  enctype="multipart/form-data">
        
        
        <div class="form-group">
            
            <label style="color:white;"> Title </label>
            <input type="text" class="form-control"  style="background-color: black; color:white;" placeholder="Title of the Blog Post" name="title" required>
        </div>
        
        
      <br>

        
        <div class="form-group">
            
              <label style="color:white;"> Author Name</label>
                <input type="text"  name="authorname" class="form-control" required="" placeholder="Author Name" style="background-color: black; color:white;"  />
            </div>
       
            <br>
        
          <div class="form-group">
          <label style="color:white;"> Upload Blog Post Cover </label>
            <input type="file" class="form-control" name="file" style="background-color: black; color:white;"  required>
        </div>
        
        <br>
             
            <div class="form-group">

                 
           
<textarea name="editor1" class="form-control" rows="5" cols="10" style="background-color: black; color:white;"  required></textarea>
                 <script>
                       var editor = CKEDITOR.replace( 'editor1', {
   
    filebrowserUploadUrl: 'ck_upload.php',
      filebrowserUploadMethod: "form"

                     
  
} );
                    
                </script>
                
                
            </div>
        
        
        <br>
        
        
        
        
        
        <input type="submit" class="btn btn" style="background-color: yellow; border-radius: 13px; color:black; font-weight: 800;" value="Create Blog Post" name="blog">
        
        
        </form>
    





<script>
        CKEDITOR.replace( 'description' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Description Field is Required' );
                e.preventDefault();
            }
        });
    </script>
    

 
    <script>
        $(document).ready(function () {
        $('#pick').change(function () {
            if ($('#pick').val() == 'Not Free') {
                $('#target').show();
            }
            else {
                $('#target').hide();
            }
        });
    });
    

    $(document).ready(function () {
        $('#pick').change(function () {
            if ($('#pick').val() == 'Not Free') {
                $('#targetz').show();
            }
            else {
                $('#targetz').hide();
            }
        });
    });
    
         
      if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
 
    </script>
  </body>
</html>
