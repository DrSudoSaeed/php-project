<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once("../config/loader.php");
if(isset($_POST['forget'])){
    $key = $_POST['key'];
    $new_pass = $_POST['new_pass'];
    $new_pass2 = $_POST['new_pass2'];
    if($new_pass == $new_pass2){
    // select passwprd
    $sql = "SELECT * FROM users WHERE (username= '".$key."' OR mobile= '".$key."' OR email= '".$key."')";
    $result = $conn->query($sql);
    $result->execute();
    $data = $result->fetchAll(mode: PDO::FETCH_OBJ); 

    // update passwprd
    $sql = "UPDATE users SET  password= '".$new_pass."' WHERE (username= '".$key."' OR mobile= '".$key."' OR email= '".$key."')";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($data)header("Location: ../index.php?reset=true");
    else header("Location: reset2.php?nonereset=true");
} else header("Location: reset2.php?nonepass=true");
}

?>

<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php require_once "../config/styleLoad.php"; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تغییر رمز عبور</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="container" id="container">

    <div class="form-container sign-in">
      <form method="POST">
        <h1>فراموشی رمز عبور</h1>
        <br>
        <input type="text" name="key" placeholder="Enter your Email or mobile or Username">
        <input type="password" name="new_pass" placeholder="Enter your new pass">
        <input type="password" name="new_pass2" placeholder="Enter your new pass">
        <br>
        <div style="display: inline;">
            <button type="submit" name="forget">بازیابی رمز</button>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="./assets/script/js/script.js"></script>
<?php 
require_once "../config/error.php";
?>
</html>