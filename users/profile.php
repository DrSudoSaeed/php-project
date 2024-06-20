<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once "../login/config/loader.php";
require_once('../redirect.php');

// ----------------------------------------------------------- //
$sql = "SELECT * FROM `users` WHERE username='".$_SESSION['username']."'";
$admin = $conn->query($sql);
$admin->execute();
$res = $admin->fetchAll(mode: PDO::FETCH_OBJ);


$is_image = false;
if(isset($_POST['prof'])){
    $target_dir = "profiles/";
    $check = 0;
    $target_file=0;
    $uploadOk=0;
    if(empty($_FILES['image']['tmp_name'])){
        echo "<p class='alert alert-danger'>پروفایل را انتخاب کنید.</p>";
    }else{
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);}
        if($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $uploadOk = 1;
                // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
              } else {
                //echo "Sorry, there was an error uploading your file.";
              }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
$profile = basename($_FILES["image"]["name"]);


if(!$is_image){
if($uploadOk){
    $sql = "UPDATE users SET  profile= '".$profile."' WHERE username= '".$_SESSION['username']."'";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($ok)header("Location: /pubg/users/profile.php");
}
}
}
?>
<!-- ---------------------------------------------------- -->
<?php if($_SESSION['username']){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../login/assets/css/base.css">
    <?php require_once "../login/config/styleLoad.php"; ?>
    <style>
        body{
            direction: rtl;
            text-align: right;
        }
        .tik {
            margin-top: 50px;
            margin-bottom:50px;
            margin-right: 100px;
            max-width: 5px;
            height: 1px;
    
        }
        .username {
            margin-top: 0px;
            margin-right: 50px;
            margin-bottom:0px;
            max-width: 5px;
            height: 1px;
        }
        #nokhat {
text-decoration:none;
color:red;
}
.semicircle {
  position: relative;
  background: #2c3e50;
  height: 50vh;
}

.semicircle::before {

  left: 50%;
  z-index: 10;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: inherit;
  transform: translateX(-50%) translateY(50%);
  bottom: 0px;
}
    </style>
    <title>پروفایل من</title>
</head>
<body>
<section class="semicircle"><br><br><br><h3 style="color:white;">پروفایل</h3>
<div>
<?php if($res){ ?>
    <?php if($res[0]->profile){?>
        <img  style="border-radius: 50%; width:100px; margin-right:590px; margin-top:286px;" src="profiles/<?=$res[0]->profile?>" alt="yes">
    <?php }else{ ?>
        <img  style="border-radius: 50%; width:100px; margin-right:590px; margin-top:286px;" src="profiles/avatar.png" alt="yes">
        <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">انتخاب پروفایل:</label>
            <input type="file" name="image" class="form-control">
            <button class="btn btn-primary" name="prof" type="submit">افزودن پروفایل</button>
        </div>
        </form>
    <?php } ?>
    </div>
</section>

    
    <br><br><br><br><br><br>

    <table class="table table-hover">
    <thead>
        <tr>
        
        <th scope="col">نام</th>
        <th scope="col">ایمیل</th>
        <th scope="col">شماره</th>
        <th scope="col">رمز</th>
        <th scope="col">نقش</th>
        </tr>
    </thead>
    <tbody>
        <td><?= $res[0]->username ?></td>
        <td><?= $res[0]->mobile ?></td>
        <td><?= $res[0]->email ?></td>
        <td><?= $res[0]->password ?></td>
        <td><?= $res[0]->role ?></td>
    </tbody>
    </table>


    <a class="btn btn-danger" href="/pubg">بازگشت</a>
<?php }else{ ?>
<h2 class="alert alert-danger">هیج آگهی وجود ندارد ادمین عزیز</h2>
<?php } ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once "../login/config/error.php"; ?>
</html>
<?php }else{ ?>
<?php  header("Location: /pubg"); ?>
<?php } ?>