<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('login/config/loader.php');
require_once('redirect.php');

$filter = filter_var( $_GET[ 'url' ], FILTER_VALIDATE_INT );
if($filter === false) header("Location: index.php");

if(isset($_GET['url'])) {
    $sql = "SELECT * FROM accounts WHERE id=?";
    $sel = $conn->prepare($sql);
    $sel->bindValue(1, $_GET['url']);
    $sel->execute();
}

$sql = "SELECT * FROM accounts WHERE id='".$_GET['url']."'";
$haslink = $conn->query($sql);
$haslink->execute();
$data = $haslink->fetchAll(mode: PDO::FETCH_OBJ);

if(isset($_POST['edit'])){
    $lvl = $_POST['lvl'];
    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $linked = $_POST['linked'];
    $linktree = $_POST['linktree'];
    $skinu = $_POST['skinu'];
    $price1 = $_POST['price'];
    $formacc = $_POST['formacc'];

    require_once("./validation.php");
    if($validationError){
        $validationError = true;
    }
    if(!$validationError){
        $query = "UPDATE `accounts` SET `lvl` = ".$lvl.", `name` = '".$name."', `rank` = '".$rank."', `skinu` = '".$skinu."', `linked` = '".$linked."', `linktree` = '".$linktree."', `formacc` = '".$formacc."', `price` = ".$price1." WHERE `id` = '".$_GET['url']."'";
        $stmt = $conn->query($query);
        $ok = $stmt->execute();
        if($ok) header("Location: /pubg/panel/index.php?username=".$_SESSION['username']."&edit=ok");
    }
}
?>
<?php if(isset($_GET['url'])){ ?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <?php require_once "login/config/styleLoad.php"; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ویرایش آگهی</title>
  <link rel="stylesheet" href="login/assets/css/create.css">

</head>
<body style="background-image:url('login/assets/images/wickedbackground.png');">
<div>
<?php require_once 'nav.php'; ?>
</div>
<!-- -------------------------------------------------------- -->

<?php foreach($data as  $items): ?>
<?php if($items->vaz == "yes"){ ?>
    <h1 class="alert alert-dark" id="shorten-input" >ویرایش آگهی</h1>
    <form method="post"  id="shorten-input">
    <div class="form-group">
        <label id="shorten-input"><b>: <span style="color: red;">* </span> نام اکانت</b></label>
        <input type="text" class="form-control" id="shorten-input" name="name" value="<?= $items->name?>" placeholder="نام">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: لول اکانت</b></label>
        <input class="form-control" id="shorten-input" name="lvl" type="text" value="<?= $items->lvl?>" placeholder="لول">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: رنک اکانت</b></label>
        <input class="form-control" id="shorten-input" name="rank" type="text" value="<?= $items->rank?>" placeholder="رنک">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: لینک های اکانت</b></label>
        <input class="form-control" id="shorten-input" name="linked" type="text" value="<?= $items->linked?>" placeholder="لینک ها">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: لینک سه دارد اکانت</b></label>
        <input class="form-control" id="shorten-input" name="linktree" type="text" value="<?= $items->linktree?>" placeholder="لینک 3">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: اسکین های مهم اکانت</b></label>
        <input class="form-control" id="shorten-input" name="skinu" type="text" value="<?= $items->skinu?>" placeholder="اسکین مهم">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: <span style="color: red;">* </span> قیمت اکانت</b></label>
        <input class="form-control" id="shorten-input" name="price" type="text" value="<?= $items->price?>" placeholder="قیمت">
    <br>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><b>: <span style="color: red;">* </span>توضیحات کامل</b></label>
        <br>
        <br><textarea class="form-control" name="formacc" id="exampleFormControlTextarea1"  style="text-align: right;" rows="3"><?= $items->formacc ?></textarea>
    </div>
    <br><br>
        <button class="btn btn-primary" name="edit" type="submit">ثبت آگهی</button>
<br><br>
    </form>
<!-- -------------------------------------------------------- -->
<?php }else header("Location: index.php");  ?>
<?php endforeach; ?>
<!-- -------------------------------------------------------- -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once "login/config/error.php"; ?>
</html>
<?php }else header("Location: index.php"); ?>
