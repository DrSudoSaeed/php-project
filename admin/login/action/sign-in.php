<?php
require_once('../config/loader.php');
session_start();

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

        if ($hasuser) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['mobile'] = $user['mobile'];
            $_SESSION['role'] = $user['role'];
            header("Location: /pubg/admin/index.php?loginned=ok");
        } else {
            header("Location: ../login.php?notuser=ok");
        }
       
        
    } catch (PDOEception $e) {
        echo "Your eror message is :".$e->getMessage();
    }
}