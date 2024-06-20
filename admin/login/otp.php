<?php
include "phpmailer/class.phpmailer.php";
include "phpmailer/class.smtp.php";
echo !extension_loaded('openssl')?"Not Available":"Available";
echo "test";
if (isset($_POST["send-email"])) {
  $phpmailer = new PHPMailer();
  $phpmailer->isSMTP();
  $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = 'e6222e7456e398';
  $phpmailer->Password = '15f4d0190ad583';
  $phpmailer->addAddress("sqkfeov@hi2.in");
  $phpmailer->ContentType="text/html";
  $phpmailer->msgHTML("این ایمیل برای امتحان ارسال ایمیل می باشد، این ایمیل از طرف سایت بپرسم ارسال شده است");  $phpmailer->send();
  if(!$phpmailer->send()) 
    {
        echo "خطا: ایمیل ارسال نشد " . $phpmailer->ErrorInfo;
    } 
    else 
    {
        echo "ایمیل شما با موفقیت ارسال شد";
    }	  
  

}
  
//   $mail=new PHPMailer(true);
//   $mail->isSMTP();
//   // $mail->Host = 'smtp.gmail.com';
//   $mail->Host = "ssl://smtp.gmail.com"; 
//   $mail->SMTPAuth=true;
//   $mail->port=465; // 25
	  
//   $mail->Username = 'sydjfry42@gmail.com';
//   $mail->Password = 'saeed14160';
//   $mail->setFrom("sydjfry42@gmail.com","User");
//   $mail->addAddress("yaman14160@gmail.com");
//   $mail->CharSet= "UTF-8";
//   $mail->Subject="سلام";
//   $mail->ContentType="text/html";
//   $mail->msgHTML("این ایمیل برای امتحان ارسال ایمیل می باشد، این ایمیل از طرف سایت بپرسم ارسال شده است");  $mail->send();
//     if(!$mail->send()) 
//     {
//         echo "خطا: ایمیل ارسال نشد " . $mail->ErrorInfo;
//     } 
//     else 
//     {
//         echo "ایمیل شما با موفقیت ارسال شد";
//     }	  
  
// }

?>

<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="container" id="container">

    <div class="form-container sign-in">
      <form method="POST">
        <h1>OTP</h1>
        <br>
        <input type="email" placeholder="Enter your Email">
        <!-- <input type="number" placeholder="Enter your OTP"> -->
        <br>
        <a href="#">Forget your Password?</a>
        <div style="display: inline;">
            <button type="submit" name="send-email">Send to Mobile</button>
            <a style="margin-left: 15px;" href="otp.php">To Email</a>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="./assets/script/js/script.js"></script>
</html>