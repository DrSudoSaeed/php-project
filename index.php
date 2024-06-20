<?php

// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed

require_once('login/config/loader.php');
require_once('redirect.php');
$keys_get = array_keys($_GET);
if($keys_get == NULL){
}elseif($keys_get[0] == "loginned" || $keys_get[0] == "logout"){
}else{ 
  header("Location: /pubg");
}
?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <?php require_once "login/config/styleLoad.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>خرید و فروش اکانت پابجی</title>
  
  
  <link rel="stylesheet" href="login/assets/css/index.css">
 
</head>
<style>
.fa-instagram {
  background: #125688;
  color: white;
}
</style>
<body> 
<div>
<?php require_once 'nav.php'; ?>
</div>
<?php require_once 'box.php'; ?>
        <br><br><br><br><br>
<h2 class="alert alert-danger">The developer of this project is Saeed.
Copying is possible with reference to the source.
Ways of communication with Saeed :
email: drsudosaeed@gmail.com
telegram: @iioove
instagram: sudosaeed
</h2>
    <br><br><br><br><br>
<a class="btn btn-primary" href="contact.php">تماس با ما</a>
<br><br><br><br><br>


<a href="" class="fa fa-instagram"></a><br>


<a href="https:/t.me/iioove"><img id="telbtn" style="
   
        bottom: 70px;
        width: 100px;
    position: fixed;
    left: 10px;
    bottom: 10px;
    width: 150px;
    z-index: 600;
" src="background/telegrambtn.png" alt="کانال تلگرام پابجی "></a>
<!-- -------------------------------------------------------- -->
</body>
<script src='box/js/jquery-3.1.1.min.js'></script>
<script src='box/js/bootstrap.min.js'></script>
<script src='box/js/rebound.js'></script>
<script src="box/js/scripts.js"></script>
<script src="login/assets/script/darkmode.js"></script>
<?php 
require_once "login/config/error.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
