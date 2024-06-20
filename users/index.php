<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once "../login/config/loader.php";

if($_GET['role'] != $_SESSION['role'])header("Location: /pubg");
if($_GET['userAdmin'] != $_SESSION['username'])header("Location: /pubg");
// ----------------------------------------------------------- //
$links = "/pubg/users/?role=".$_SESSION['role']."&userAdmin=".$_SESSION['username'];
// ----------------------------------------------------------- //
if(isset($_GET['delete'])) {
    $sql = "DELETE FROM users WHERE id=?";
    $delete = $conn->prepare($sql);
    $delete->bindValue(1, $_GET['delete']);
    $del =$delete->execute();
    if($del) header("Location: /pubg/users/index.php?role=".$_SESSION['role']."&userAdmin=".$_SESSION['username']."&del=ok");
}
// ----------------------------------------------------------- //
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$result->execute();
$data = $result->fetchAll(mode: PDO::FETCH_OBJ); 

$query = "SELECT * FROM `users` WHERE role";
$stmt = $conn->query($query);
$stmt->execute();
$roles = $stmt->fetchAll(PDO::FETCH_OBJ);
// ----------------------------------------------------------- //
$sql = "SELECT * FROM `users` WHERE username='".$_GET['userAdmin']."' AND"." role='".$_GET['role']."'";
$admin = $conn->query($sql);
$admin->execute();
$res = $admin->fetchAll(mode: PDO::FETCH_ASSOC);
// ----------------------------------------------------------- //
$link = "/pubg/admin/leader/admin.php?role=admin&userAdmin=".$_SESSION['username'];
// ----------------------------------------------------------- //
if(isset($_GET['status'])){
    $sql = "UPDATE accounts SET vaz='".$_GET['status']."' WHERE id=".$_GET['id'];
    $sts = $conn->query($sql);
    $ok = $sts->execute();
    $status = "";
    if($_GET['status'] == "yes"){
        $status = "active";
    } else $status = "noactive";
    if($status == "active"){
        if($ok) header("Location: $link&active=ok");
    } else if($ok) header("Location: $link&noactive=ok");
}

if(isset($_GET['newMail'])){
    $newMail = $_GET['newMail'];
    $email = $_GET['mail'];
    $sql = "UPDATE users SET  email= '".$newMail."' WHERE email= '".$email."'";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($ok) header("Location: $links");
}

if(isset($_GET['newPass'])){
    $newPass = $_GET['newPass'];
    $password = $_GET['pass'];
    $sql = "UPDATE users SET  password= '".$newPass."' WHERE password= '".$password."'";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($ok) header("Location: $links");
}

if(isset($_GET['newUsername'])){
    $newUsername = $_GET['newUsername'];
    $username = $_GET['userN'];
    $sql = "UPDATE users SET  username= '".$newUsername."' WHERE username= '".$username."'";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($ok) header("Location: $links");
}

if(isset($_GET['newMobile'])){
    $newMobile = $_GET['newMobile'];
    $mobile = $_GET['call'];
    $sql = "UPDATE users SET  mobile= '".$newMobile."' WHERE mobile= '".$mobile."'";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($ok) header("Location: $links");
}


if(isset($_GET['newRole'])){
    $newRole = $_GET['newRole'];
    $usernrole = $_GET['usernrole'];
    $role = $_GET['roles'];
    $sql = "UPDATE users SET  role= '".$newRole."' WHERE username='".$usernrole."' AND role= '".$role."'";
    $stmt = $conn->query($sql);
    $ok = $stmt->execute();
    if($ok) header("Location: $links");
}

$filter = "";
if(isset($_POST['okfill'])){
    $filt = $_POST['filters'];
    if($filt == "all"){
        $filter = "all";
    }else if($filt == "super"){
        $filter = "super";
    }else if($filt == "admin"){
        $filter = "admin";
    }else if($filt == "user"){
        $filter = "user";
    }
}
$sql = "SELECT * FROM `users` WHERE role='".$filter."'";
$admin = $conn->query($sql);
$ok=$admin->execute();
$fil = $admin->fetchAll(mode: PDO::FETCH_OBJ);
if($filter== "")$filter = "all";
?>
<!-- ---------------------------------------------------- -->
<?php if($_SESSION['role'] == "admin" || $_SESSION['role'] == "super" && $_GET['userAdmin'] == $_SESSION['username']){ ?>
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
    </style>
    <title>پنل مدیریت کاربران</title>
</head>
<body>
    <h3>پنل مدیریت کاربران</h3>
    <p class="alert alert-info">آیدی شما: <b style="color: red;"><?= $_SESSION['username'] ?></b></p>
    <?php if($_SESSION['role'] == "super"){ ?>
    <a class="btn btn-danger" href="/pubg/admin">بازگشت</a>
    <?php }else{?>
        <a class="btn btn-danger" href="/pubg">بازگشت</a>
    <?php } ?>
    <hr>
    <?php if($_SESSION['role'] == "super"){ ?>
    <div style="width:50%;">
    <form method="post">
    <select class="form-control" name="filters">
        <option name="filter" value="all">همه</option>
        <option name="filter" value="super">سوپریوزرها</option>
        <option name="filter" value="admin">ادمین ها</option>
        <option name="filter" value="user">کاربران</option>
    </select>
    <br>
    <button class="btn btn-success" name="okfill" type="submit">فیلتر</button>
    </form>
    </div>
    <?php } ?>
    <hr>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">پروفایل</th>
        <th scope="col">نام</th>
        <th scope="col">ایمیل</th>
        <th scope="col">شماره</th>
        <th scope="col">رمز</th>
        <th scope="col">نقش</th>
        <th scope="col">تغییر نقش</th>
        <th scope="col">حذف حساب کاربر</th>
        </tr>
    </thead>
    <tbody>
    
    <?php if($filter == "all"){ ?>


        <?php foreach ($data as $key => $item): ?>
        <tr>
        <th scope="row"><?= ++$key ?></th>
        <?php if($item->profile){ ?>
        <th scope="row"><img  style="border-radius: 50%; width:50px;" src="profiles/<?=$item->profile?>" alt="yes"></th>
        <?php }else{ ?>
            <th><img  style="border-radius: 50%; width:50px;" src="profiles/avatar.png" alt="تنظیم کن"></th>
        <?php } ?>
        <!-- ******************************************************************* -->
        <?php if($_SESSION['role'] == 'super'){ ?>
        <td>
        <?php if($item->role == "super"){ ?>
        <a id="nokhat" onclick="chengeUsername();" href="<?= $links ?>&usernames=<?= $item->username ?>"><code style="color:black;"><?= $item->username ?></code> <i class="bi bi-patch-check-fill" style="color:blue;"></i></a>
            <?php }else{ ?>
        <a id="nokhat" onclick="chengeUsername();" href="<?= $links ?>&usernames=<?= $item->username ?>"><code style="color:black;"><?= $item->username ?></code></a>
            <?php } ?>
        </td>
        <!-- ******************************************************************* -->
        <td><a id="nokhat" onclick="chengeEmail();" href="<?= $links ?>&email=<?= $item->email ?>"><code><?= $item->email ?></code></a></td>
        <!-- ******************************************************************* -->
        <td><a id="nokhat" onclick="chengeMobile();" href="<?= $links ?>&mobile=<?= $item->mobile ?>"><code style="color:blue;"><?= $item->mobile ?></code></a></td>
        <!-- ******************************************************************* -->
        <td><a id="nokhat" onclick="chengePass();" href="<?= $links ?>&password=<?= $item->password ?>"><code><?= $item->password ?></code></a></td>
        <!-- ******************************************************************* -->
        <?php if($item->role == 'super'){ ?>
        <td class="btn btn-primary"><?= $item->role ?> <i class="bi bi-patch-check-fill" style="color:danger;"></i></td>
        <?php }elseif($item->role == 'admin'){ ?>
        <td class="btn btn-danger"><?= $item->role ?></td>
        <?php }else{ ?>
        <td class="btn btn-warning"><?= $item->role ?></td>
        <?php } ?>
        <?php if($_SESSION['role'] == "super"){ ?>
        <!-- ******************************************************************* -->
        <td><a class="btn btn-primary"  onclick="chengeRole();" href="<?= $links ?>&usernrole=<?=$item->username?>&roleu=<?= $item->role ?>">تغییر نقش کاربر</a></td>
        <!-- ******************************************************************* -->
        <?php if($item->role == "super"){ ?>
            <td><p class='alert alert-danger'>شما نمیتوانید سوپر یوزر هارا حذف کنید</p></td>
        <?php }else{ ?>
        <td><a href="<?=$links?>&delete=<?= $item->id ?>&del=ok" class="btn btn-danger">حذف</a></td>
        <?php } ?>
        <?php }else{ ?>
            <td class="alert alert-primary"><p class="btn btn-danger">شما دسترسی تغییر و حذف کاربران را ندارید:(</p></td>
        <?php } ?>
    
        <?php }else{ ?>
            <?php if($item->role =='super'){ ?>
            <td><code style="color:black;"><?= $item->username ?></code> <i class="bi bi-patch-check-fill" style="color:blue;"></i></td>
            <?php }else echo "<td>".$item->username."</td>"; ?>
            <?php if($item->role == "super"){ ?>
            <td ><p class='alert alert-danger'>Your unavailable <i style="color:black;" class="bi bi-eye-slash-fill"></i></p></td>
            <td ><p class='alert alert-danger'>Your unavailable <i style="color:black;" class="bi bi-eye-slash-fill"></i></p></td>
            <td ><p class='alert alert-danger'>Your unavailable <i style="color:black;" class="bi bi-eye-slash-fill"></i></p></td>
            <?php }else{ ?>
                <td><?=$item->password?></td>
                <td><?=$item->mobile?></td>
                <td><?=$item->email?></td>
            <?php } ?>
            <td><?= $item->role?></td>
            <?php if($_SESSION['role'] == "super"){ ?>
        <!-- ******************************************************************* -->
        <td><a class="btn btn-primary"  onclick="chengeRole();" href="<?= $links ?>&usernrole=<?=$item->username?>&roleu=<?= $item->role ?>">تغییر نقش کاربر</a></td>
        <!-- ******************************************************************* -->
        <?php if($item->role == "super"){ ?>
            <td><p class='alert alert-danger'>شما نمیتوانید سوپر یوزر هارا حذف کنید</p></td>
            
        <?php }else{ ?>
        <td><a href="<?=$links?>&delete=<?= $item->id ?>&del=ok" class="btn btn-danger">حذف</a></td>
        <?php } ?>
        <?php }else{ ?>
            <td><p class="btn btn-danger">شما دسترسی تغییر و حذف کاربران را ندارید:(</p></td>
            <td><--</td>
        <?php } ?>

        <?php } ?>
        <?php endforeach; ?>
    <?php }if($filter == "super"){ ?>
    <?php require_once "filters/supers.php"; ?>
    <?php }if($filter == "admin"){ ?>
    <?php require_once "filters/admins.php"; ?>
    <?php }if($filter == "user"){ ?>
    <?php require_once "filters/users.php"; ?>
    </tbody>
    </table>
<?php } ?>
<?php } ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once "../login/config/error.php"; ?>
</html>
