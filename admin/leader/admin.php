<?php
require_once "../login/config/loader.php";
// ----------------------------------------------------------- //
if(isset($_GET['delete'])) {
    $sql = "DELETE FROM accounts WHERE id=?";
    $delete = $conn->prepare($sql);
    $delete->bindValue(1, $_GET['delete']);
    $del =$delete->execute();
    if($del) header("Location: /pubg/admin/leader/admin.php?role=".$_SESSION['role']."&userAdmin=".$_SESSION['username']."&del=ok");
}
// ----------------------------------------------------------- //
$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);
$result->execute();
$data = $result->fetchAll(mode: PDO::FETCH_OBJ); 
// ----------------------------------------------------------- //
$sql = "SELECT * FROM `users` WHERE username='".$_GET['userAdmin']."' AND"." role='".$_GET['role']."'";
$admin = $conn->query($sql);
$admin->execute();
$res = $admin->fetchAll(mode: PDO::FETCH_ASSOC);
// ----------------------------------------------------------- //
// echo $res[0]['username'];
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

?>
<!-- ---------------------------------------------------- -->
<?php if($_SESSION['role'] == "admin" || $_SESSION['role'] == "super" && $_GET['userAdmin'] == $_SESSION['username']){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../login/assets/css/base.css">
    <?php require_once "../../login/config/styleLoad.php"; ?>
    <style>
        body{
            direction: rtl;
            text-align: right;
        }
    </style>
    <title>پنل ادمین</title>
</head>
<body>
    <h3>پنل مدیریت ادمین</h3>
    <p class="alert alert-info">آیدی ادمین: <b style="color: red;"><?= $_SESSION['role'] ?></b></p>
    <?php if($_SESSION['role'] == "super"){ ?>
    <a class="btn btn-danger" href="/pubg/admin">بازگشت</a>
    <?php }else{?>
        <a class="btn btn-danger" href="/pubg">بازگشت</a>
    <?php } ?>
    <hr>
<?php if($data){ ?>
    <?php ?>
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
        <td><img src="../../uploads/<?= $item->img ?>" class="rounded mx-auto d-block" style="width: 8rem; border-radius: 10px;" alt="Responsive image"></td>
        <td><?= $item->name ?></td>
        <td><?= $item->formacc ?></td>
        <td><?= $item->price ?></td>
        
        <?php if($item->vaz == "yes"){ ?>
            
            <td>
            <a class="btn btn-success" href="">وضعیت فعلی <b style="color:black;">(فعال)</b></a>
            <a href="<?=$link?>&id=<?= $item->id ?>&status=no&noactive=ok" class="btn btn-danger"   >غیرفعال شود</a>
            </td>
        <?php }else{ ?>
            <td>
                <a class="btn btn-danger" href="">وضعیت فعلی <b style="color:black;">(غیرفعال)</b></a>
                <a href="<?=$link?>&id=<?= $item->id ?>&status=yes&active=ok" class="btn btn-success"  >فعال شود</a>
            </td>
        <?php } ?>
        <td>
            <a href="/pubg/detail.php?url=<?= $item->id ?>" class="btn btn-primary">نمایش</a>
            <a href="/pubg/admin/leader/admin.php?role=admin&userAdmin=<?= $_SESSION['username'] ?>&delete=<?= $item->id ?>" class="btn btn-danger">حذف</a> 
            <a href="/pubg/edit.php?url=<?= $item->id ?>" class="btn btn-warning">ویرایش</a>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>


<?php }else{ ?>
<h2 class="alert alert-danger">هیج آگهی وجود ندارد ادمین عزیز</h2>
<?php } ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require_once "../../login/config/error.php"; ?>
</html>
<?php }else header("Location: /pubg/index.php"); ?>