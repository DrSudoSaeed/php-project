<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('../config/loader.php');

if (isset($_POST['signup'])) {
    try {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        require_once "./validate.php";
        if(signup($ve=true)){
            signup($ve=true);
        }
        if(!signup($ve=false)){
            $query = "INSERT INTO users SET username=?, password=?, mobile=?, email=?";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(1, $username);
            $stmt->bindValue(2, $password);
            $stmt->bindValue(3, $mobile);
            $stmt->bindValue(4, $email);
            $stmt->execute();
            header('Location: ../index.php?signup=true');
        }
    } catch (PDOEception $e) {
        echo "Your eror message is :".$e->getMessage();
    }
}