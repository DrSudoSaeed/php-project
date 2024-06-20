<?php
require_once "../login/config/loader.php";
if($_SESSION['role'] != "admin" && $_SESSION['role'] != "super"){
    header("Location: /pubg");
}
$show_list = true;
$message = "";

$sql = "SELECT * FROM contact";
$haslink = $conn->query($sql);
$haslink->execute();
$data = $haslink->fetchAll(mode: PDO::FETCH_OBJ);



if(isset($_GET['message_id'])) {
    $sql = "SELECT * FROM contact WHERE id=?";
    $haslink = $conn->prepare($sql);
    $haslink->bindValue(1, $_GET['message_id']);
    $haslink->execute();
    $data = $haslink->fetch(mode: PDO::FETCH_OBJ);
    $message = $data->message;
    $show_list = false;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body{
            direction: rtl;
            text-align: right;
        }
    </style>
    <title>پنل تیکت ها</title>
</head>
<body>
    <?php if(!$show_list){ ?>
    <div class="message-body">
        <p><?= $message ?></p>
        <hr>
        <a href="contact-list.php" class="btn btn-danger">بازگشت</a>
    </div>
    <?php }else{ ?>
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">نام</th>
        <th scope="col">موبایل</th>
        <th scope="col">ایمیل</th>
        <th scope="col">عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $item): ?>
        <tr>
        <th scope="row"><?= ++$key ?></th>
        <td><?= $item->name ?></td>
        <td><?= $item->mobile ?></td>
        <td><?= $item->email ?></td>
        <td><a href="?message_id=<?= $item->id ?>" class="btn btn-primary">نمایش</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <?php } ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>