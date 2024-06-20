<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('../config/loader.php');
// ========================== signin Validate ========================= //
function loginValidate($validate=false){
    global $key;
    global $password;
    if($key == ""){
        header("Location: ../index.php?usernamee=ok");
        return $validate = true;     
    } else if(strlen($key) < 3){
        header("Location: ../index.php?usernamee=ok");
        return $validate = true;     
    }
    if($password == ""){
        header("Location: ../index.php?passe=ok");
        return $validate = true;    
    } else if(strlen($password) < 3){
        header("Location: ../index.php?passe=ok");
        return $validate = true;    
    }
}
// ========================== signup Validate ========================= //
function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{11}+$/', $mobile);
}

function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function signup($ve=false){
    global $username;
    global $password;
    global $email;
    global $mobile;
    if($username == ""){
        header("Location: ../index.php?usernamee=ok");
        return $ve = true;
    } 
    elseif(strlen($username) < 3 || strlen($username) > 25){
        header("Location: ../index.php?usernamee=ok");
        return $ve = true;
    }
    if($password == ""){
        header("Location: ../index.php?passe=ok");
        return $ve = true;
    }
    elseif(strlen($password) < 3 || strlen($password) > 25){
        header("Location: ../index.php?passe=ok");
        return $ve = true;
    }
    if($email == ""){
        header("Location: ../index.php?emaile=ok");
        return $ve = true;
    }
    elseif(!isValidEmail($email)){
        header("Location: ../index.php?emaile=ok");
        return $ve = true;
    }
    if($mobile == ""){
        header("Location: ../index.php?mobilee=ok");
        return $ve = true;
    }
    elseif(!validate_mobile($mobile)){
        header("Location: ../index.php?mobilee=ok");
        return $ve = true;
    }
}