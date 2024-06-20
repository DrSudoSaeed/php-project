<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once("../config/loader.php");
if(isset($_POST['reset'])){
    $key = $_POST['key'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    // select passwprd
    $sql = "SELECT * FROM users WHERE (username= '".$key."' OR mobile= '".$key."' OR email= '".$key."') AND (password='".$old_pass."')";
    $result = $conn->query($sql);
    $result->execute();
    $data = $result->fetchAll(mode: PDO::FETCH_OBJ); 

    // update passwprd
    $sql = "UPDATE users SET  password= '".$new_pass."' WHERE (username= '".$key."' OR mobile= '".$key."' OR email= '".$key."') AND (password= '".$old_pass."')";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($data)header("Location: ../index.php?reset=true");
    else header("Location: reset-pass.php?noreset=true");
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
        <h1>تغییر رمز عبور</h1>
        <br>
        <input type="text" name="key" placeholder="Enter your Email or mobile">
        <input type="password" name="old_pass" placeholder="Enter your old pass">
        <input type="password" name="new_pass" placeholder="Enter your new pass">
        <br>
        <a href="reset2.php">فراموش کردم</a>
        <div style="display: inline;">
            <button type="submit" name="reset">بازیابی رمز</button>
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