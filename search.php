<?php 
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
$is_search = false;
require_once "login/config/loader.php";
    if(isset($_GET['a'])){
        $search = $_GET['a'];
        $query = $conn->prepare("SELECT * FROM accounts WHERE name LIKE :search OR formacc LIKE :search");
        $query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll();
        if($result){  
            require_once 'sbox.php';
    }else {
            echo "<h2 class='alert alert-danger'>چیزی پیدا نشد:(</h2>";
        }
    }
?>
<link rel="stylesheet" href="assets/css/search.css">
<form method="post">
<div class="search-box">
       <input class="search-txt" type="text" name="a" placeholder="متن جستجو">
</div>
    <?php if(isset($_POST['a']) != ""){ ?>
       <a class="search-btn" href="/pubg/search.php?a=<?=$_POST['a']?>">
           <i class="fa-solid fa-magnifying-glass"></i>
       </a>
       <?php } ?>
</form>  
