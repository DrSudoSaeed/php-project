<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('../config/loader.php');

$isLogin = false;
$logins = "ok";
if (isset($_POST['signin'])) {
    try {
        
        // parametrs
        $key = $_POST['key'];
        $password = $_POST['password'];
            
        // sql
        $query = "SELECT * FROM `users` WHERE (username= :key OR mobile= :key OR email= :key) AND (password= :password) LIMIT 1";
        
        // stmt
        $stmt = $conn->prepare($query);

        // bind
        $stmt->bindValue(":key", $key);
        $stmt->bindValue(":password", $password);

        // exe
        $stmt->execute();
        $hasuser = $stmt->rowCount();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        require_once "./validate.php";
        if(loginValidate($validate=true)){
            loginValidate($validate=true);
            //header("Location: ../index.php?error=ok");
    }
    if(!loginValidate($validate=true)){
        if($hasuser){
            $validationError = false;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['mobile'] = $user['mobile'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login'] = true;
            $isLogin = true;
            if($isLogin){
                header("Location: /pubg?loginned=ok");
            }
            
            
        } else {
            header("Location: ../index.php?notuser=ok");
        //     if($validationError){
        //         $validationError = true;
        //         header("Location: ../index.php?error=ok");
        //     } elseif($hasuser==0){
        //         header("Location: ../index.php?notuser=ok");
        //     }
        // }
    }
}
    } catch (PDOEception $e) {
        echo "Your eror message is :".$e->getMessage();
    }
}