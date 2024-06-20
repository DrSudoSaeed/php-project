<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('login/config/loader.php');
require_once('redirect.php');
// ------------------------------- Create Account ----------------------- //
if($_GET['username'] == "")header("Location: index.php");

if(isset($_POST['submit'])){
    $target_dir = "uploads/";
    if(empty($_FILES['image']['tmp_name'])){
        echo "<p class='alert alert-danger'>please upload form post:</p>";
    }else {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $uploadOk = 1;
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    $lvl = $_POST['lvl'];
    $name = $_POST['name'];
    $image = basename($_FILES["image"]["name"]);
    $rank = $_POST['rank'];
    $linked = $_POST['linked'];
    $linktree = $_POST['linktree'];
    $skinu = $_POST['skinu'];
    $price1 = (int)$_POST['price'];
    $price = $price1 + 100000;
    $formacc = $_POST['formacc'];
    $buylink = $_POST['buylink'];
    $username = $_GET['username'];
    $status = "active";
    require_once ('validation.php');
    
        

if(!$validationError){
    if($uploadOk){
        $query = "INSERT INTO accounts SET lvl=? , name=? , img=?, rank=?,  linked=?,  linktree=? , skinu=? , price=?, formacc=?, buylink=?,username=?";
        // stmt
        $stmt = $conn->prepare($query);

        // bind
        $stmt->bindValue(1, $lvl);
        $stmt->bindValue(2, $name);
        $stmt->bindValue(3, $image);
        $stmt->bindValue(4, $rank);
        $stmt->bindValue(5, $linked);
        $stmt->bindValue(6, $linktree);
        $stmt->bindValue(7, $skinu);
        $stmt->bindValue(8, $price);
        $stmt->bindValue(9, $formacc);
        $stmt->bindValue(10, $buylink);
        $stmt->bindValue(11, $username);
        $res = $stmt->execute();
        if($res){
            header('Location: index.php?record=ok');
        }
}
    }
}
}
?>
<!-- -------------------------------------------------------- -->
<?php if(!isset($_GET['username']) || $_GET['username'] != $_SESSION['username']){ ?>
    <?= header("Location: index.php") ?>
<?php }else{ ?>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ثبت اکانت</title>
  <link rel="stylesheet" href="login/assets/css/create.css">

</head>
<body  style="background-image:url('login/assets/images/wickedbackground.png');">

<div>
<?php require_once 'nav.php'; ?>
</div>

<br><br>
<!-- -------------------------------------------------------- -->
    
    <form method="post"  id="shorten-input" enctype="multipart/form-data">
    <h1 id="shorten-input" >ثبت اکانت پابجی</h1>
    <h4 style="color:white;">توجه کنید اگر اکانت شما بعد از به اشتراک گذاشتن فروش رفت از پنل کاربری اکانت(آگهی) خود را  غیرفعال کنید</h4>
    <div class="form-group">
        <label id="shorten-input"><b>: <span style="color: red;">* </span> نام اکانت</b></label>
        <input type="text" class="form-control" id="shorten-input" name="name" placeholder="نام">
    </div>
    <div class="form-group">
        <label for="image">عکس:</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: لول اکانت</b></label>
        <input class="form-control" id="shorten-input" name="lvl" type="text" placeholder="لول">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: رنک اکانت</b></label>
        <input class="form-control" id="shorten-input" name="rank" type="text" placeholder="رنک">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: لینک های اکانت</b></label>
        <input class="form-control" id="shorten-input" name="linked" type="text" placeholder="لینک ها">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: لینک سه دارد اکانت</b></label>
        <input class="form-control" id="shorten-input" name="linktree" type="text" placeholder="لینک 3">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: اسکین های مهم اکانت</b></label>
        <input class="form-control" id="shorten-input" name="skinu" type="text" placeholder="اسکین مهم">
    </div>
    <div class="form-group">
        <label id="shorten-input"><b>: <span style="color: red;">* </span> قیمت اکانت</b></label>
        <input class="form-control" id="shorten-input" name="price" type="text" placeholder="قیمت">
    <br>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1"><b>: <span style="color: red;">* </span>توضیحات کامل</b></label>
        <br>
        <br><textarea class="form-control" name="formacc" id="exampleFormControlTextarea1" style="text-align: right;" rows="3"></textarea>
    </div>
    <br><br>
    <input type="text" name="username" value="<?= $_GET['username']; ?>" hidden>
<!-- -------------------------------------------------------- -->
        <?php 
        $myChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $res = substr( str_shuffle($myChars), 5, 5 );
        ?>
<!-- -------------------------------------------------------- -->
        <input id="shorten-input" name="buylink" type="url" value="http://localhost/pubg/detail.php?url=<?php echo $res; ?>" placeholder="لینک" hidden>
        <button class="btn btn-primary" name="submit" type="submit">ثبت اکانت</button>
<br><br>
    </form>
<!-- -------------------------------------------------------- -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#exampleFormControlTextarea1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
</html>
<?php } ?>