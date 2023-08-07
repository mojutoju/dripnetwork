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
    


    th, tr{
        color:white;
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
View <strong style="color:yellow;"> Blog Post </strong>
</h2>

<hr style="color:white; background: white;">

      
<?php
              
              if(isset($_GET['blog_id'])){
                  
                  
                  $id = $_GET['blog_id'];
                  
                $select = mysqli_query($dbc,"SELECT * FROM `dripnetwork_blogs` WHERE `blog_id` = '$id' ");
if(mysqli_num_rows($select) > 0){
    $u = 1;
 while($rows = mysqli_fetch_assoc($select)){
$title = $rows['title'];
$authorname = $rows['authorname'];
$id = $rows['blog_id'];
$file = $rows['file'];
$editor1 = $rows['editor1'];
$date = $rows['date'];

                  
                  
              
              
              ?>
                
      
                
                 <p style="font-size:14px; color:white;">  <a href="dashboard.php" style="color:white;"> Home  </a> > <a href="manageblog.php" style="color:white;"> Blog</a> > <a href="#" style="color:white;"> <?php echo $title; ?></a>    </p>  
                 <hr style="color:white; background: white;">
    
   
    
    
    
        
        <h3 style="font-weight:800; color:white;"> <?php echo $title; ?>  </h3>
    
        <p style="font-style:italic; color:white;"> Posted on <?php echo date('d-M-Y', strtotime($date)); ?> </p>
        
        <hr style="color:white; background: white;">
      
      <img src="blogs/<?php echo $file; ?>" class="img-fluid img-thumbnail">
      
      
      
      <br><br>
      
      <p style="font-style:italic; color:white;"> Author : <?php echo $authorname; ?> </p>
      
       <div class="card" style="padding:20px;">
       <h3 style="color:black;"> Description</h3>
       <hr>
       
        <p style="color:white;"> <?php echo htmlspecialchars_decode ($editor1); ?> </p>
        
 </div>
        
 
    
    
    
    
             
              <?php $u++; }}} ?>





</div>


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

         
      if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
 
    </script>
  </body>
</html>

