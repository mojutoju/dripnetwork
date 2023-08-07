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
    





    </style>



<script src="js/sweetalert.min.js"> </script>
    
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
  </head>
  <body>
    

<?php include('navbar.php'); ?>



<div class="container">

<h2 style="color:white;">
Edit <strong style="color:yellow;"> Packages </strong>
</h2>

<hr style="color:white; background: white;">



<?php
if(isset($_GET['package_id'])){
    $id = $_GET['package_id'];

    $select = mysqli_query($dbc,"SELECT * FROM `dripnetwork_packages` WHERE `package_id` = '$id' ");
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
$amount = $rows['amount'];
$currency = $rows['currency'];


?>


<?php
if(isset($_POST['packages'])){

    
  $packagename = $_POST['packagename'];
  $file = $_FILES['file']['name'];
  $size = $_FILES['file']['size'];
  $designated_date = $_POST['designated_date'];
  $capacity = $_POST['capacity'];
  $type=$_FILES['file']['type'];
$limit_size = 9000;
$packagetype = $_POST['packagetype'];
$currency = $_POST['currency'];
$amount = $_POST['amount'];
$description = mysqli_real_escape_string($dbc, $_POST['description']);

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
  $location = "packages/$file";
  move_uploaded_file($tmp_name, $location);

  $update = mysqli_query($dbc, "UPDATE `dripnetwork_packages` SET `packagename` = '$packagename' ,  `file` = '$file' , `size` = '$size', `content` = '$content', `type` = '$type', `path` = '$location', `packagetype` = '$packagetype', `currency` = '$currency', 
  `amount` = '$amount' , `description` = '$description' ,  `designated_date` = '$designated_date', `capacity` = '$capacity' WHERE `package_id` = '$id'   ");

  if($update){

    ?>

   
<script>
   
    swal({
          text: "Success",
  title: " <?php echo $packagename; ?> Package Updated  ",

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



<form name="packages" method="POST" action="editpackages.php?package_id=<?php echo $id; ?>" enctype="multipart/form-data" >
<div class="row">
<div class="col-md-6 mb-3">
<div class="form-group">
    <label style="color:white;"> Package Name </label>
<input type="text" class="form-control" style="background-color:black; color:white;"  name="packagename" value="<?php echo $packagename; ?>">
</div>

</div>




<div class="col-md-6 mb-3">
<div class="form-group">
    <label style="color:white;"> Upload Photo </label>
<input type="file" class="form-control" style="background-color:black; color:white;"  name="file" required>
</div>

</div>



<div class="col-md-4 mb-3">


<div class="form-group">
    <label style="color:white;"> Package Type </label>
    

<select name="packagetype" class="form-control" id = "pick"   style="background-color:black; color:white;"  required>
    <option value=""> - Select Package Type -</option>
 
<option value="Free"> Free </option>
<option value="Not Free"> Not Free </option>
</select>



  </div>


</div>


<div class="col-md-4 mb-3"  id="targetz" style="display:none;" >


<div class="form-group">
  <label style="color:white; "> Currency Type  </label>
<select class="form-control" name="currency" style="background-color:black; color:white;" >
<option value=""> - Currency Type -  </option>
<option value="AFA">Afghan Afghani</option>
    <option value="ALL">Albanian Lek</option>
    <option value="DZD">Algerian Dinar</option>
    <option value="AOA">Angolan Kwanza</option>
    <option value="ARS">Argentine Peso</option>
    <option value="AMD">Armenian Dram</option>
    <option value="AWG">Aruban Florin</option>
    <option value="AUD">Australian Dollar</option>
    <option value="AZN">Azerbaijani Manat</option>
    <option value="BSD">Bahamian Dollar</option>
    <option value="BHD">Bahraini Dinar</option>
    <option value="BDT">Bangladeshi Taka</option>
    <option value="BBD">Barbadian Dollar</option>
    <option value="BYR">Belarusian Ruble</option>
    <option value="BEF">Belgian Franc</option>
    <option value="BZD">Belize Dollar</option>
    <option value="BMD">Bermudan Dollar</option>
    <option value="BTN">Bhutanese Ngultrum</option>
    <option value="BTC">Bitcoin</option>
    <option value="BOB">Bolivian Boliviano</option>
    <option value="BAM">Bosnia-Herzegovina Convertible Mark</option>
    <option value="BWP">Botswanan Pula</option>
    <option value="BRL">Brazilian Real</option>
    <option value="GBP">British Pound Sterling</option>
    <option value="BND">Brunei Dollar</option>
    <option value="BGN">Bulgarian Lev</option>
    <option value="BIF">Burundian Franc</option>
    <option value="KHR">Cambodian Riel</option>
    <option value="CAD">Canadian Dollar</option>
    <option value="CVE">Cape Verdean Escudo</option>
    <option value="KYD">Cayman Islands Dollar</option>
    <option value="XOF">CFA Franc BCEAO</option>
    <option value="XAF">CFA Franc BEAC</option>
    <option value="XPF">CFP Franc</option>
    <option value="CLP">Chilean Peso</option>
    <option value="CNY">Chinese Yuan</option>
    <option value="COP">Colombian Peso</option>
    <option value="KMF">Comorian Franc</option>
    <option value="CDF">Congolese Franc</option>
    <option value="CRC">Costa Rican ColÃ³n</option>
    <option value="HRK">Croatian Kuna</option>
    <option value="CUC">Cuban Convertible Peso</option>
    <option value="CZK">Czech Republic Koruna</option>
    <option value="DKK">Danish Krone</option>
    <option value="DJF">Djiboutian Franc</option>
    <option value="DOP">Dominican Peso</option>
    <option value="XCD">East Caribbean Dollar</option>
    <option value="EGP">Egyptian Pound</option>
    <option value="ERN">Eritrean Nakfa</option>
    <option value="EEK">Estonian Kroon</option>
    <option value="ETB">Ethiopian Birr</option>
    <option value="EUR">Euro</option>
    <option value="FKP">Falkland Islands Pound</option>
    <option value="FJD">Fijian Dollar</option>
    <option value="GMD">Gambian Dalasi</option>
    <option value="GEL">Georgian Lari</option>
    <option value="DEM">German Mark</option>
    <option value="GHS">Ghanaian Cedi</option>
    <option value="GIP">Gibraltar Pound</option>
    <option value="GRD">Greek Drachma</option>
    <option value="GTQ">Guatemalan Quetzal</option>
    <option value="GNF">Guinean Franc</option>
    <option value="GYD">Guyanaese Dollar</option>
    <option value="HTG">Haitian Gourde</option>
    <option value="HNL">Honduran Lempira</option>
    <option value="HKD">Hong Kong Dollar</option>
    <option value="HUF">Hungarian Forint</option>
    <option value="ISK">Icelandic KrÃ³na</option>
    <option value="INR">Indian Rupee</option>
    <option value="IDR">Indonesian Rupiah</option>
    <option value="IRR">Iranian Rial</option>
    <option value="IQD">Iraqi Dinar</option>
    <option value="ILS">Israeli New Sheqel</option>
    <option value="ITL">Italian Lira</option>
    <option value="JMD">Jamaican Dollar</option>
    <option value="JPY">Japanese Yen</option>
    <option value="JOD">Jordanian Dinar</option>
    <option value="KZT">Kazakhstani Tenge</option>
    <option value="KES">Kenyan Shilling</option>
    <option value="KWD">Kuwaiti Dinar</option>
    <option value="KGS">Kyrgystani Som</option>
    <option value="LAK">Laotian Kip</option>
    <option value="LVL">Latvian Lats</option>
    <option value="LBP">Lebanese Pound</option>
    <option value="LSL">Lesotho Loti</option>
    <option value="LRD">Liberian Dollar</option>
    <option value="LYD">Libyan Dinar</option>
    <option value="LTL">Lithuanian Litas</option>
    <option value="MOP">Macanese Pataca</option>
    <option value="MKD">Macedonian Denar</option>
    <option value="MGA">Malagasy Ariary</option>
    <option value="MWK">Malawian Kwacha</option>
    <option value="MYR">Malaysian Ringgit</option>
    <option value="MVR">Maldivian Rufiyaa</option>
    <option value="MRO">Mauritanian Ouguiya</option>
    <option value="MUR">Mauritian Rupee</option>
    <option value="MXN">Mexican Peso</option>
    <option value="MDL">Moldovan Leu</option>
    <option value="MNT">Mongolian Tugrik</option>
    <option value="MAD">Moroccan Dirham</option>
    <option value="MZM">Mozambican Metical</option>
    <option value="MMK">Myanmar Kyat</option>
    <option value="NAD">Namibian Dollar</option>
    <option value="NPR">Nepalese Rupee</option>
    <option value="ANG">Netherlands Antillean Guilder</option>
    <option value="TWD">New Taiwan Dollar</option>
    <option value="NZD">New Zealand Dollar</option>
    <option value="NIO">Nicaraguan CÃ³rdoba</option>
    <option value="NGN">Nigerian Naira</option>
    <option value="KPW">North Korean Won</option>
    <option value="NOK">Norwegian Krone</option>
    <option value="OMR">Omani Rial</option>
    <option value="PKR">Pakistani Rupee</option>
    <option value="PAB">Panamanian Balboa</option>
    <option value="PGK">Papua New Guinean Kina</option>
    <option value="PYG">Paraguayan Guarani</option>
    <option value="PEN">Peruvian Nuevo Sol</option>
    <option value="PHP">Philippine Peso</option>
    <option value="PLN">Polish Zloty</option>
    <option value="QAR">Qatari Rial</option>
    <option value="RON">Romanian Leu</option>
    <option value="RUB">Russian Ruble</option>
    <option value="RWF">Rwandan Franc</option>
    <option value="SVC">Salvadoran ColÃ³n</option>
    <option value="WST">Samoan Tala</option>
    <option value="SAR">Saudi Riyal</option>
    <option value="RSD">Serbian Dinar</option>
    <option value="SCR">Seychellois Rupee</option>
    <option value="SLL">Sierra Leonean Leone</option>
    <option value="SGD">Singapore Dollar</option>
    <option value="SKK">Slovak Koruna</option>
    <option value="SBD">Solomon Islands Dollar</option>
    <option value="SOS">Somali Shilling</option>
    <option value="ZAR">South African Rand</option>
    <option value="KRW">South Korean Won</option>
    <option value="XDR">Special Drawing Rights</option>
    <option value="LKR">Sri Lankan Rupee</option>
    <option value="SHP">St. Helena Pound</option>
    <option value="SDG">Sudanese Pound</option>
    <option value="SRD">Surinamese Dollar</option>
    <option value="SZL">Swazi Lilangeni</option>
    <option value="SEK">Swedish Krona</option>
    <option value="CHF">Swiss Franc</option>
    <option value="SYP">Syrian Pound</option>
    <option value="STD">São Tomé and Príncipe Dobra</option>
    <option value="TJS">Tajikistani Somoni</option>
    <option value="TZS">Tanzanian Shilling</option>
    <option value="THB">Thai Baht</option>
    <option value="TOP">Tongan pa'anga</option>
    <option value="TTD">Trinidad & Tobago Dollar</option>
    <option value="TND">Tunisian Dinar</option>
    <option value="TRY">Turkish Lira</option>
    <option value="TMT">Turkmenistani Manat</option>
    <option value="UGX">Ugandan Shilling</option>
    <option value="UAH">Ukrainian Hryvnia</option>
    <option value="AED">United Arab Emirates Dirham</option>
    <option value="UYU">Uruguayan Peso</option>
    <option value="USD">US Dollar</option>
    <option value="UZS">Uzbekistan Som</option>
    <option value="VUV">Vanuatu Vatu</option>
    <option value="VEF">Venezuelan BolÃ­var</option>
    <option value="VND">Vietnamese Dong</option>
    <option value="YER">Yemeni Rial</option>
    <option value="ZMK">Zambian Kwacha</option>
  </select>
  </div> 









  
</div>



<div class="col-md-4 mb-3" id="target" style="display:none;" >

<div class="form-group">


<label style="color:white;"> Amount </label>
    <input  class="form-control" type="text" name="amount" value="<?php echo $amount; ?>" style="background-color:black; color:white;" >


</div>

</div>


<br>



</div>

<div class="form-group">

<textarea  rows="10" name="description" placeholder="Type Here..." class="form-control" style="background-color:black; color:white;" required><?php echo $description; ?></textarea>

</div>

<br>

<div class="row">


<div class="col-md-6 mb-3">

<div class="form-group">

<label style="color:white;"> Expiration Date </label>
<input type="date" class="form-control" name="designated_date" style="background-color: black; color:white;" value="<?php echo $designateddate; ?>">
</div>


</div>




<div class="col-md-6 mb-3">

<div class="form-group">

<label style="color:white;"> Vote Capacity </label>
<input type="number" class="form-control" name="capacity" style="background-color: black; color:white;" min="10"  value="<?php echo $capacity; ?>">
</div>


</div>


</div>



<br>

<div class="form-group">

<input type="submit" class="btn btn" name="packages" value="Edit Package" style="background-color: yellow; border-radius: 13px; color:black; font-weight: 800;">
  
</div>

</form>






<?php
$u++; }}}
?>



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
