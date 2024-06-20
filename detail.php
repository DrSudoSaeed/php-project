<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('login/config/loader.php');
$keys_get = array_keys($_GET);
if(isset($keys_get[1])){
    header("Location: /pubg");
}
if($keys_get == NULL){
}elseif($keys_get[0] == "url" || $keys_get[0] == "copy"){
}else{ 
  header("Location: /pubg");
}
$filter = filter_var( $_GET[ 'url' ], FILTER_VALIDATE_INT );

if(!isset($_GET['url']) != 1){
if($filter === false) header("Location: index.php"); 
?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>خریداکانت پابجی</title>
  <link rel="stylesheet" href="login/assets/css/detail.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
  <?php require_once "login/config/styleLoad.php"; ?>
</head>
<body style="background-image:url('login/assets/images/wickedbackground.png');">
<div>
<?php require_once 'nav.php'; ?>
</div>
<!-- -------------------------------------------------------- -->
<?php
    $sql = "SELECT * FROM accounts WHERE id='".$_GET['url']."'";
    $haslink = $conn->query($sql);
    $haslink->execute();
    $data = $haslink->fetchAll(mode: PDO::FETCH_OBJ); 
?>
<!-- -------------------------------------------------------- -->

<h1 id="shorten-input" >خرید اکانت پابجی</h1>

<?php foreach($data as  $items): ?>
    <img src="uploads/<?= $items->img ?>" class="rounded mx-auto d-block" style="width: 18rem; border-radius: 10px;" alt="Responsive image">
    <div class="form-group">
        <label id="shorten-input"><span  name="name" type="text" ><?= $items->name ?></span><b>  : <span style="color: red;">* </span> نام اکانت</b> </label>
    </div>
    <div class="form-group">
        <label id="shorten-input"><span  name="lvl" type="text" ><?= $items->lvl ?></span> <b>: لول اکانت</b> </label>
    </div>
    <div class="form-group">
        <label id="shorten-input"><span  name="rank" type="text" ><?= $items->rank ?></span><b> : رنک اکانت</b> </label>
    </div>
    <div class="form-group">
        <label id="shorten-input"><span  name="linked" type="text"><?= $items->linked ?></span><b> : لینک های اکانت</b> </label>
    </div>
    <div class="form-group">
        <label id="shorten-input"><span  name="linktree" type="text"><?= $items->linktree ?></span><b> : لینک سه دارد اکانت</b> </label>
    </div>
    <div class="form-group">
        <label id="shorten-input"><b> اسکین های مهم اکانت</b> : <span  name="skinu" type="text"><?= $items->skinu ?></span></label>
    </div>
    <div class="form-group">
        <label id="shorten-input"><span  name="price" type="text"><?= $items->price ?></span><b>  : <span style="color: red;">* </span> قیمت اکانت</b> </label>
  
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><b> : <span style="color: red;">* </span>توضیحات کامل</b></label>
        <br>
        <br><td class="form-control" name="formacc"  style="text-align: right;" rows="3" disabled><?= $items->formacc ?></td>

    </div>
    <br><br>
    <?php if($items->vaz == "yes"){ ?>
        <a class="btn btn-primary" href="">خرید</a>
    <?php }else{ ?>
        <h4 class="alert alert-danger">.این اکانت فروخته شده نمی توانید خرید کنید</h4>
    <?php } ?>

<a id="showCode" class="btn btn-dark" style="cursor: pointer" href="/pubg/detail.php?url=<?= $_GET['url'] ?>&copy=ok" onclick="copy_text()">کپی لینک</a>
<script>
        var pre = document.getElementById("showCode");
        function copy_text(){
            navigator.clipboard.writeText("http://localhost/pubg/detail.php?url=<?= $items->id ?>");
        }
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<!-- -------------------------------------------------------- -->
    <?php endforeach; ?>
<!-- -------------------------------------------------------- -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once "login/config/error.php"; ?>
</html>
<?php }else header("Location: index.php"); ?>