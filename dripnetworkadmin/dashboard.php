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



    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    

<?php include('navbar.php'); ?>

<?php
$blogs = "SELECT count(*) FROM `dripnetwork_blogs` WHERE 1 ";
$allblogs = mysqli_query($dbc, $blogs);
$totalblogs = mysqli_fetch_array($allblogs);

$packages = "SELECT count(*) FROM `dripnetwork_packages` WHERE 1 ";
$allpackages = mysqli_query($dbc, $packages);
$totalpackages = mysqli_fetch_array($allpackages);


?>




<div class="container">

<h2 style="color:white;">
Admin <strong style="color:yellow;"> Dashboard </strong>
</h2>

<hr style="color:white; background: white;">

<div class="items text-black">
           
                   
     
    
           <div class="options">
                  
           

           
    
      <div class="card-counter warning">
        <i class="fa fa-group"></i>
        <span class="count-numbers">12</span>
        <span class="count-name">Users</span>
      </div>
   

   </div>

   
   
   <div class="options" >
                  
           

      <div class="card-counter danger">
        <i class="fa fa-gift"></i>
        <span class="count-numbers"><?php echo reset($totalpackages); ?></span>
        <span class="count-name">Packages</span>
      </div>
      </div>
    

  
      <div class="options" >
                  
           

      <div class="card-counter success">
        <i class="fa fa-list"></i>
        <span class="count-numbers"><?php echo reset($totalblogs); ?> </span>
        <span class="count-name">Blog Posts</span>
      </div>
   </div>

   
   <div class="options" >
                  
           

      <div class="card-counter info">
        <i class="fa fa-key"></i>
        <span class="count-numbers">35</span>
        <span class="count-name">Votes</span>
     </div>
    </div>





    <div class="options" >
                  
           

                  <div class="card-counter primary">
                    <i class="fa fa-envelope"></i>
                    <span class="count-numbers">35</span>
                    <span class="count-name">Subscribers</span>
                 </div>
                </div>





  </div>




  <div class="row">

 



<div class="col-md-6 mb-3">
  
  <div class="card" style="border-radius: 12px; padding:16px; background-color: black; color:white;  box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;  ">
<br>


<div class="card-header" style="background-color: black; color: white;">

<h3 class="font-weight-bold"> <i class="fa fa-user-circle"> </i> Users </h3>





</div>


 

<div class="table-responsive">
  <table class="table">
<thead>
<tr>
<th scope="col">User ID</th>
<th scope="col"> Names</th>
<th scope="col">E-mail Address </th>
<th scope="col">Actions</th>
</tr>
</thead>
<tbody>
<tr>
<th scope="row">1</th>
<td>Mark</td>
<td>Otto - Otto</td>
<td>  <div class="dropdown">
<button type="button" class="btn btn btn-sm dropdown-toggle" data-toggle="dropdown" style="background-color:yellow; color:black; font-weight: 800;">
Actions
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="#">Edit</a>
<a class="dropdown-item" href="#">View</a>

<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Delete</a>
</div>
</div>
</td>
</tr>

</tbody>
</table>
</div>


  </div>



</div>










 



<div class="col-md-6 mb-3">
  
  <div class="card" style="border-radius: 12px; padding:16px; background-color: black; color:white;  box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;  ">
<br>


<div class="card-header" style="background-color: black; color: white;">

<h3 class="font-weight-bold"> <i class="fa fa-gift"> </i> Packages </h3>





</div>


 
<div class="table-responsive">
  <table class="table">
<thead>
<tr>
<th scope="col"> Package</th>
<th scope="col">Type </th>
<th scope="col"> Exp.Date </th>
<th scope="col"> Capacity </th>

<th scope="col">Actions</th>
</tr>
</thead>
    

<?php
$limit = 5;
$select = mysqli_query($dbc,"SELECT * FROM `dripnetwork_packages` WHERE 1 ORDER BY `packagename` LIMIT 0, $limit ");
if(mysqli_num_rows($select) > 0){
    $u = 1;
 while($rows = mysqli_fetch_assoc($select)){
$packagename = $rows['packagename'];
$file = $rows['file'];
$size = $rows['size'];
$content = $rows['content'];
$type = $rows['type'];
$path = $rows['path'];
$packageid = $rows['package_id'];
$description = $rows['description'];
$packagetype = $rows['packagetype'];
$designateddate = $rows['designated_date'];
$capacity = $rows['capacity'];
?>


<tbody class="searchable">
<tr>

<td><?php echo $packagename; ?></td>
<td> <?php echo $packagetype; ?> </td>
<td> <?php echo date('Y-m-d', strtotime($designateddate)); ?> </td>
<td> <?php echo $capacity; ?> </td>
<td>  
  
<!-- Split dropright button -->
<div class="btn-group dropright">
  <button type="button" class="btn btn" style="background-color: yellow; font-weight:800;">
  Actions
  </button>
  <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: yellow; font-weight:800;">
    <span class="sr-only">Toggle Dropright</span>
  </button>
  <div class="dropdown-menu">

  <ul style="list-style:none;">
   <li> <a href="editpackages.php?package_id=<?php echo $packageid; ?>" style="text-decoration:none; color: black;"> Edit </a> </li>
   <li> <a href="viewpackages.php?package_id=<?php echo $packageid; ?>" style="text-decoration:none; color: black;"> View </a> </li>
   <li> <a href="managepackages.php?package_id=<?php echo $packageid; ?> " style="text-decoration:none; color: black;"> Delete </a> </li>
 </ul>
  </div>
</div>
</td>
</tr>

<?php $u++; }} ?>

</tbody>
</table>
</div>



  </div>














  

</div>





<div class="col-md-6 mb-3">
  
  <div class="card" style="border-radius: 12px; padding:16px; background-color: black; color:white;  box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;  ">
<br>


<div class="card-header" style="background-color: black; color: white;">

<h3 class="font-weight-bold"> <i class="fa fa-list"> </i> Blog Posts </h3>





</div>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Title(s)</th>
          <th scope="col">Author(s)</th>
          <th scope="col">Date</th>
          <th scope="col">Actions</th>
        
     </tr>
    </thead>
    
    
           
        <?php

$limit = 5;
$select = mysqli_query($dbc,"SELECT * FROM `dripnetwork_blogs` WHERE 1 ORDER BY `blog_id` LIMIT 0, $limit ");
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
    
    
    
    
    
    
   <tbody class="searchable">
      <tr>
    
        <td> <?php echo $title; ?> </td>
    <td><?php echo $authorname; ?></td>
     
    <td><?php echo $date; ?></td>
     

 <td>
<div class="btn-group dropright">
  <button type="button" class="btn btn" style="background-color: yellow; font-weight:800;">
  Actions
  </button>
  <button type="button" class="btn btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: yellow; font-weight:800;">
    <span class="sr-only">Toggle Dropright</span>
  </button>
  <div class="dropdown-menu">

  <ul style="list-style:none;">
   <li> <a href="editblogpost.php?blog_id=<?php echo $id; ?>"  style="text-decoration:none; color: black;"  >  Edit </a> </li>
   <li> <a href="viewblogpost.php?blog_id=<?php echo $id; ?>" style="text-decoration:none; color: black;"> View </a> </li>
   <li> <a href="manageblog.php?blog_id=<?php echo $id; ?>" style="text-decoration:none; color: black;"> Delete </a> </li>
 </ul>
  </div>
</div>

 </td>
      
      </tr>
      
         <?php $u++; }} ?> 
    </tbody>
    
    </table> </div>



  </div>









</div>




</div>




  </body>
</html>
