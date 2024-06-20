<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once "../login/config/loader.php";
//require_once('../redirect.php');
$keys_get = array_keys($_GET);
if($keys_get == NULL){}
// ------------------------- username ------------------------- //
if(isset($_GET['username'])) {
    $sql = "SELECT * FROM accounts WHERE username=?";
    $haslink = $conn->prepare($sql);
    $haslink->bindValue(1, $_SESSION['username']);
    $haslink->execute();
    $data = $haslink->fetch(mode: PDO::FETCH_OBJ);
}
// ------------------------- delete ------------------------- //
if(isset($_GET['delete'])) {
    $sql = "DELETE FROM accounts WHERE id=?";
    $delete = $conn->prepare($sql);
    $delete->bindValue(1, $_GET['delete']);
    $delete->execute();
    header( header: "Location: /pubg/panel/index.php?username=".$_SESSION['username']."&del=ok");
}
// --------------------- result accounts --------------------- //
$sql = "SELECT * FROM accounts WHERE username='".$_SESSION['username']."'";
$result = $conn->query($sql);
$result->execute();
$data = $result->fetchAll(mode: PDO::FETCH_OBJ); 
// ------------------------- status ------------------------- //
if(isset($_GET['status'])){
    if($_GET['status'] == "yes"){
        header("Location: /pubg/panel/index.php?username=".$_SESSION['username']);
    } else{
        $sql = "UPDATE accounts SET vaz='".$_GET['status']."' WHERE id=".$_GET['id'];
        $sts = $conn->query($sql);
        $ok = $sts->execute();
        if($ok) header("Location: /pubg/panel/index.php?username=".$_SESSION['username']."&noactive=ok");
    }
}
?>
<!-- ---------------------------------------------------- -->
<?php if($_SESSION['username']){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../login/assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <?php require_once "../login/config/styleLoad.php"; ?>

    <title>پنل کاربری</title>
</head>
<body dir="rtl">
<div>
<div>
<?php require_once '../nav.php'; ?>
<link style="background-size:10px;" rel="stylesheet" href="../assets/css/search.css">
</div>
<style>
    .skewed{
        background-image:url("../background/2.jpg");
    }
    body{
        background-image:url("");
    }

</style>
</div>
<br><br><br><br><br><br>
<?php if($data){ ?>
    
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">عکس</th>
        <th scope="col">نام</th>
        <th scope="col">توضیحات</th>
        <th scope="col">قیمت</th>
        <th scope="col">وضعیت</th>
        <th scope="col">عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $item): ?>
        <tr>
        <th scope="row"><?= ++$key ?></th>
        <td><img src="../uploads/<?= $item->img ?>" class="rounded mx-auto d-block" style="width: 8rem; border-radius: 10px;" alt="Responsive image"></td>
        <td><?= $item->name ?></td>
        <td><?= $item->formacc ?></td>
        <td><?= $item->price ?></td>
        <?php if($item->vaz == "yes"){ ?>
            
            <td>
            <a class="btn btn-success" href="">وضعیت فعلی <b style="color:black;">(فعال)</b></a>
            <a href="/pubg/panel/index.php?username=<?= $_SESSION['username'] ?>&id=<?= $item->id ?>&status=no" class="btn btn-danger"   >غیرفعال شود</a>
            </td>
            <td><a href="/pubg/detail.php?url=<?= $item->id ?>" class="btn btn-primary">نمایش</a> 
        <a href="/pubg/panel/index.php?username=<?= $_SESSION['username'] ?>&delete=<?= $item->id ?>&del=ok" class="btn btn-danger">حذف</a>
        <a href="/pubg/edit.php?url=<?= $item->id ?>" class="btn btn-warning">ویرایش</a>
        </td>
        <?php }else{ ?>
            <td>
                <a class="btn btn-danger" href="">وضعیت فعلی <b style="color:black;">(غیرفعال)</b></a>
            </td>
            <td><a href="/pubg/detail.php?url=<?= $item->id ?>" class="btn btn-primary">نمایش</a> 
        <a href="/pubg/panel/index.php?username=<?= $_SESSION['username'] ?>&delete=<?= $item->id ?>&del=ok" class="btn btn-danger">حذف</a>
        </td>
            
        <?php } ?>
        
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>


<?php }else{ ?>
<h2 class="alert alert-danger"> شما هیچ آگهی ثبت نکرده اید.<br> آیا می خواهید آگهی ثبت کنید؟
<a class="btn btn-primary" href="/pubg/create.php?username=<?= $_SESSION['username']?>">ثبت آگهی</a></h2><br>
<?php } ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once "../login/config/error.php"; ?>
</html>
<?php }else{ ?>
<?php header("Location: ../index.php"); ?>
<?php } ?>
