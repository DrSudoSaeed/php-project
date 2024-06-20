<!-- // The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed -->
<link rel="stylesheet" href="login/assets/css/index.css">
<link rel="stylesheet" href="assets/css/nav.css">
<section>
<div class="skewed">

  </div>
</section>

<nav style="direction: rtl;
    font-family: Vazir;
    text-align: right;
    margin-left: 60px;">
    <div style="position:fixed; ">
    <a href="/pubg">خانه</a>
    <?php if(isset($_SESSION['username'])){ ?>
            <a href="/pubg/login/logout.php"><b><?= $_SESSION['username'];  ?></b> خروج</a>
            <a href="/pubg/create.php?username=<?= $_SESSION['username']; ?>">ثبت اکانت</a>
            <a href="/pubg/panel/index.php">پنل کاربری</a>
            <a href="/pubg/users/profile.php">پروفایل من</a>
            <?php if($_SESSION['role'] == "admin"){ ?>
                <a href="/pubg/admin/index.php?role=super&userAdmin=<?=$_SESSION['username'] ?>">Panel</a>					
						<?php }  ?>
            <?php if($_SESSION['role'] == "super"){ ?>
									<a href="/pubg/admin/index.php?role=super&userAdmin=<?=$_SESSION['username'] ?>">Panel</a>
						<?php }  ?>
    <?php }else{ ?>
    <a href="login">ورود</a>
    <a href="login">ثبت اکانت</a>
    <a href="login">پنل کاربری</a>
    <a href="https://t.me/iioove">developer</a>
    <?php } ?>
    <div><?php require_once 'search.php'; ?></div>
<br>
<br><button onclick="myFunction()">dark mode</button>
    </div>
    <br><br><br><br><br><br><br>
</nav>
<br><br><br><br><br><br>
<script src="login/assets/script/darkmode.js"></script>
