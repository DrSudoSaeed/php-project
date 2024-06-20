<?php
// The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed
if(isset($_GET['loginned'])){
	?>
	<script>
		Swal.fire({
		title: "آفرین",
		text: "با موفقیت وارد شدی:)",
		icon: "success"
		});
	</script>
<?php } ?>

<?php
if(isset($_GET['notuser'])){
		?>
	<script>
		Swal.fire({
		title: "اوه",
		text: "یوزر پسورد اشتباهه :(",
		icon: "error"
		});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['logout'])){
	?>
	<script>
		Swal.fire({
		title: "خروج",
		text: "از سایت خارج شدی",
		icon: "info",
		footer: '<a href="/pubg/login">وارد شوید؟</a>'
		});
	</script>
<?php } ?>

<?php
if(isset($_GET['error'])){
		?>
	<script>
		Swal.fire({
		title: "",
		text: "!نام کاربری باید حداقل 3 کاراکتر باشد",
		icon: "error"
		});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['usernamee'])){
		?>
	<script>
		Swal.fire({
		title: "",
		text: "!نام کاربری باید حداقل 3 و حداکثر 25 کاراکتر باشد",
		icon: "error"
		});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['passe'])){
		?>
	<script>
		Swal.fire({
		title: "",
		text: "! رمز عبور باید حداقل 3 و حداکثر 25 کاراکتر باشد",
		icon: "error"
		});
	</script>
		<?php
	}
?>
<?php
if(isset($_GET['emaile'])){
		?>
	<script>
		Swal.fire({
		title: "",
		text: "فرمت ایمیل اشتباه",
		icon: "error"
		});
	</script>
		<?php
	}
?>
<?php
if(isset($_GET['mobilee'])){
		?>
	<script>
		Swal.fire({
		title: "",
		text: "شماره تلفن باید 11رقم باشد",
		icon: "error"
		});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['signup'])){
		?>
	<script>
		Swal.fire({
		title: "",
		text: ":)ثبت نام شما با موفقیت انجام شد لطفا وارد شوید",
		icon: "success"
		});
	</script>
		<?php
	}
?>


<?php
if(isset($_GET['reset'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "success",
		title: "رمز عبور شما تغییر کرد:)",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['noreset'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "error",
		title: "رمز عبور شما تغییر نکرد:(",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['nonereset'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "error",
		title: "نام کاربری اشتباه است:(",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['nonepass'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "error",
		title: "رمزهایی که وارد کردید یکی نیستند",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['record'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "success",
		title: "آگهی شما ثبت شد",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['edit'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "success",
		title: "آگهی شما ویرایش شد",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['del'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "success",
		title: "آگهی پاک شد",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['active'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "success",
		title: "آگهی فعال شد",
		showConfirmButton: false,
		timer: 2000
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['noactive'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "error",
		title: "آگهی غیرفعال شد",
		showConfirmButton: false,
		timer: 2000
});
	</script>
		<?php
	}
?>

<?php
if(isset($_GET['copy'])){
		?>
	<script>
		Swal.fire({
		position: "end-top",
		icon: "success",
		title: "لینک آگهی کپی شد",
		showConfirmButton: false,
		timer: 1500
});
	</script>
		<?php
	}
?>



<?php
if(isset($_GET['email'])){
	$email = $_GET['email'];
?>
<script>
async function chengeEmail() {
const { value: email } = await Swal.fire({
  title: "تغییر ایمیل کاربر",
  input: "email",
  inputLabel: "ایمیل قبلی : <?php echo $email; ?>",
  inputPlaceholder: "ایمیل جدید را وارد کنید",
  showCloseButton: true,
  showCancelButton: true,
  inputAttributes: {
    maxlength: "22",
    autocapitalize: "off",
    autocorrect: "off"
  }
  
});
if (email) {
	window.location.replace(`http://localhost/pubg/users/?role=super&userAdmin=saeed&mail=<?=$email?>&newMail=${email}`);
}
}
chengeEmail();
	</script>
<?php } ?>

<?php
if(isset($_GET['password'])){
	$password = $_GET['password'];
?>
<script>
async function chengePass() {
const { value: password } = await Swal.fire({
  title: "تغییر رمز کاربر",
  input: "password",
  inputLabel: "رمز قبلی : <?php echo $password; ?>",
  inputPlaceholder: "رمز جدید را وارد کنید",
  showCloseButton: true,
  showCancelButton: true,
  inputAttributes: {
    maxlength: "30",
    autocapitalize: "off",
    autocorrect: "off"
  }
  
});
if (password) {
	window.location.replace(`http://localhost/pubg/users/?role=super&userAdmin=saeed&pass=<?=$password?>&newPass=${password}`);
}
}
chengePass();
	</script>
<?php } ?>

<?php
if(isset($_GET['usernames'])){
	$username = $_GET['usernames'];
?>
<script>
async function chengeUsername() {
const { value: username } = await Swal.fire({
  title: "تغییر ایدی کاربر",
  input: "text",
  inputLabel: "ایدی قبلی : <?php echo $username; ?>",
  inputPlaceholder: "ایدی جدید را وارد کنید",
  showCloseButton: true,
  showCancelButton: true,
  inputAttributes: {
    maxlength: "20",
    autocapitalize: "off",
    autocorrect: "off"
  }
  
});
if (username) {
	window.location.replace(`http://localhost/pubg/users/?role=super&userAdmin=saeed&userN=<?=$username?>&newUsername=${username}`);
}
}
chengeUsername();
	</script>
<?php } ?>

<?php
if(isset($_GET['mobile'])){
	$mobile = $_GET['mobile'];
?>
<script>
async function chengeMobile() {
const { value: mobile } = await Swal.fire({
  title: "تغییر شماره کاربر",
  input: "number",
  inputLabel: "شماره قبلی : <?php echo $mobile; ?>",
  inputPlaceholder: "شماره جدید را وارد کنید",
  showCloseButton: true,
  showCancelButton: true,
  inputAttributes: {
    maxlength: "11",
    autocapitalize: "off",
    autocorrect: "off"
  }
  
});
if (mobile) {
	window.location.replace(`http://localhost/pubg/users/?role=super&userAdmin=saeed&call=<?=$mobile?>&newMobile=${mobile}`);
}
}
chengeMobile();
	</script>
<?php } ?>

<?php if(isset($_GET['roleu'])){
	if($_SESSION['role'] == "super"){
	$role = $_GET['roleu'];
	$usernames = $_GET['usernrole'];
?>
	
<script>
async function chengeRole(){
	const inputOptions = new Promise((resolve) => {
  setTimeout(() => {
    resolve({
      "user": "user",
      "admin": "admin",
      "super": "super"
    });
  }, 500);
});
const { value: role } = await Swal.fire({
  title: "انتخاب نقش",
  input: "radio",
  showCloseButton: true,
  showCancelButton: true,
  inputOptions,
  inputValidator: (value) => {
    if (!value) {
      return "باید یکی را انتخاب کنید";
    }
  }
});
if (role) {
  window.location.replace(`http://localhost/pubg/users/?role=super&userAdmin=saeed&usernrole=<?=$usernames?>&roles=<?=$role?>&newRole=${role}`);
  Swal.fire({ html: `نقش جدید کاربر: ${role}` });
}
}
<?php }else header("Location: /pubg"); ?>
chengeRole();
</script>
<?php } ?>
