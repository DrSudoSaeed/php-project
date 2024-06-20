<?php
require_once('../config/loader.php');

if (isset($_POST['signup'])) {
    try {
        // parametrs
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        // sql
        $query = "INSERT INTO users SET username=?, password=?, mobile=?, email=?, role='admin'";
        
        // stmt
        $stmt = $conn->prepare($query);

        // bind
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, $mobile);
        $stmt->bindValue(4, $email);
        // exe
        $stmt->execute();
        header('Location: ../index.php');
        // echo "created Account!";
    } catch (PDOEception $e) {
        echo "Your eror message is :".$e->getMessage();
    }
}