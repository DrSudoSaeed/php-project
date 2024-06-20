<?php 
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once('login/config/loader.php');

$validationMsg = [];
$validationMsgSuccess = ["message"=>"", "class"=>""];
$validationError = false;
$lvl_validate = filter_var( $lvl, FILTER_VALIDATE_INT );
$price_validate = filter_var( $price1, FILTER_VALIDATE_INT );

if($lvl == ""){
    echo "<p class='alert alert-danger'>مقدار لول خالی است</p>";
    $validationError = true;

} else if(strlen($lvl) > 3 || $lvl_validate === false){
    echo "<p class='alert alert-danger'>لول فقط باید عدد باشد</p>";
    $validationError = true;
}

if($name == ""){
    echo "<p class='alert alert-danger'>مقدار نام خالی است</p>";
    $validationError = true;

} else if(strlen($name) > 20){
    echo "<p class='alert alert-danger'>نام حداکثر 20کاراکتر باشد</p>";
    $validationError = true;
}

if($rank == ""){
     echo "<p class='alert alert-danger'>مقدار رنک خالی است</p>";
    $validationError = true;

} else if(strlen($rank) > 20){
    echo "<p class='alert alert-danger'>رنک حداکثر 20کاراکتر باشد</p>";
    $validationError = true;

}
if($linked == ""){
     echo "<p class='alert alert-danger'>مقدار لینک خالی است</p>";
    $validationError = true;

} else if(strlen($linked) > 50){
    echo "<p class='alert alert-danger'>لینک حداکثر 50کاراکتر باشد</p>";
    $validationError = true;

}
if($linktree == ""){
     echo "<p class='alert alert-danger'>مقدار لینک3 خالی است</p>";
    $validationError = true;

} else if(strlen($linktree) > 15){
    echo "<p class='alert alert-danger'>لینک3 حداکثر 15کاراکتر باشد</p>";
    $validationError = true;

}
if($skinu == ""){
     echo "<p class='alert alert-danger'>مقدار اسکین ویژه خالی است</p>";
    $validationError = true;

} else if(strlen($skinu) > 200){
    echo "<p class='alert alert-danger'>اسکین ویژه حداکثر 200کاراکتر باشد</p>";
    $validationError = true;

}
if($price1 == 0 || $price1 == ""){
     echo "<p class='alert alert-danger'>مقدار قیمت خالی است</p>";
    $validationError = true;

} else if(strlen($price1) > 11 || $price_validate === false){
    echo "<p class='alert alert-danger'>قیمت فقط باید عدد باشد</p>";
    $validationError = true;

}
if($formacc == ""){
     echo "<p class='alert alert-danger'>مقدار توضیحات خالی است</p>";
    $validationError = true;

} else if(strlen($formacc) > 1000){
    echo "<p class='alert alert-danger'>نام حداکثر 1000کاراکتر باشد</p>";
    $validationError = true;

}
?>