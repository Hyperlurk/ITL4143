<?php  


session_start();
include "config.php";
include "style.php";

if (isset($_POST['register'])) {
	$duplicate = mysqli_query($con, "SELECT * FROM securedlogin where username = '".$_POST['uname']."' OR password = '".$_POST['pass']."'");
	if (mysqli_num_rows($duplicate) > 0) {

		echo "<script>alert('Username or Email has already taken')</script>";
		/*$fname = $_POST['fname'];
		$uname = $_POST['uname'];
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		$cpass	= $_POST['cpass'];
		$utype = $_POST['utype'];*/
	}	
	else{
		if (!empty($_POST['uname']) && !empty($_POST['pass'])) {
			$newpass= password_hash($_POST['pass'], PASSWORD_DEFAULT);

			$query = mysqli_query($con, "INSERT INTO securedlogin (username, password) VALUES('".$_POST['uname']."' , '".md5($newpass)."')");
			echo "<script>alert('Registration Successful')</script>";
			echo "<script>window.location.href='LoginHere'</script>";

		}
		else{
			echo "<script>alert('Pls fill out empty registration')</script>";
		}

	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<div class="container">
        <div class="login-form">
            <form action="" method="post">

                <label for="username">Username</label>
                <input type="text" name="uname">

                <label for="username">Password</label>
                <input type="password" name="pass">

                <input type="submit" class="login" name="register" value="register">
                
      

            </form>
        </div>
    </div>

</body>
</html>