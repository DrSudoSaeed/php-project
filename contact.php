<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
require_once "login/config/loader.php";


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // validation
    // ["message"=>"", "class"=>""];
    // $validationMsg["message"] = "!مقدار نام خالی است";
    // $validationMsg["class"] = "danger";

    $validationMsg = [];
    $validationMsgSuccess = ["message"=>"", "class"=>""];
    $validationError = false;
    if($name == ""){
        array_push( $validationMsg, ["message"=>"!مقدار نام خالی است", "class"=>"danger"]);
        $validationError = true;
    } else if(strlen($name) < 3){
        $validationMsg["message"] = "مقدار نام باید حداقل 3 کاراکتر باشد";
        $validationMsg["class"] = "danger";
        $validationError = true;
    }

    if($mobile == ""){
        array_push( $validationMsg, ["message"=>"!مقدار موبایل خالی است", "class"=>"danger"]);
        $validationError = true;
    } else if(!validate_mobile($mobile)){
         array_push( $validationMsg, ["message"=>"شماره موبایل باید 11 رقمی باشد", "class"=>"danger"]);
         $validationError = true;
    }
    if($email == ""){
        array_push( $validationMsg, ["message"=>"!مقدار ایمیل خالی است", "class"=>"danger"]);
        $validationError = true;
    } else if(!isValidEmail($email)){
         array_push( $validationMsg, ["message"=>"ایمیل شما معتبر نیست", "class"=>"danger"]);
         $validationError = true;
    }
    if($message == ""){
        array_push( $validationMsg, ["message"=>"!مقدار پیام خالی است", "class"=>"danger"]);
        $validationError = true;
    }


    if(!$validationError){
        $sql = "INSERT INTO contact SET name=? , mobile=? , email=? , message=?";
        $result = $conn->prepare($sql);
        $result->bindValue(1, $name);
        $result->bindValue(2, $mobile);
        $result->bindValue(3, $email);
        $result->bindValue(4, $message);
        $result->execute();
        if ($result){
            $validationMsgSuccess["message"] = 'فرم شما ارسال شد.';
            $validationMsgSuccess["class"] = "success";

        }
        else echo '<p class="alert alert-success">فرم شما ارسال نشد!</p>';
        //    
        // }else echo '<p class="alert alert-danger">link is alerday exsist</p>';
}
}

function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{11}+$/', $mobile);
}

function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>تماس با ما</title>
    <style>
        *{
            font-family: DanaFaNum !important;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;        }

        #shorten-form {
            max-width: 400px;
            margin: auto;
        }

        #shorten-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        #shorten-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        #shorten-result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div>
<?php require_once 'nav.php'; ?>
</div>

    <h2>تماس با ما</h2>
<form method="post" id="shorten-form">
    <input class="input-group-text"  type="name" name="name" style="text-align: right" id="shorten-input" placeholder="نام" >
    <input class="input-group-text" type="mobile" name="mobile" style="text-align: right" id="shorten-input" maxlength="11" placeholder="موبایل" >
    <input class="input-group-text" type="email" name="email" style="text-align: right" id="shorten-input"  placeholder="ایمیل">
    <textarea style="text-align: right" name="message" id="shorten-input" rows="10"></textarea>
    <br>
        <button class="btn btn-success" type="submit" name="submit">ارسال</button>
    </form>
   
    <?php
    if(isset($_POST['submit'])){
        if($validationError == false) echo '<p class="alert alert-'.$validationMsgSuccess["class"].'">'.$validationMsgSuccess["message"].'</p>';
        else{
            if(count($validationMsg) >= 1) echo '<ul dir="rtl" class="alert alert-'.$validationMsg[0]["class"].'">';
            foreach($validationMsg as $item) echo '<li>'.$item["message"].'</li>';
            if(count($validationMsg) >= 1) echo '</ul>';
        }
    }
    ?>

<br><br>
<br><br>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>