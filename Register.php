<?php
session_start();
//connected to database
$db = mysqli_connect("localhost","root","","author");

if(isset($_POST['register-btn'])){

$username = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$password2 = mysql_real_escape_string($_POST['password2']);

if($password == $password2){

$password = md5($password);
$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
mysqli_query($db, $sql);
$_SESSION['message'] = "you are now logged in";
$_SESSION['username'] = $username;
header("location:home.php");
	
}else{
	$_SESSION['message'] = "The Two Password do not matched";
	
}
}
?>

<!doctype html>
<html>
<head>

</head>
<body>
<div class=header>

<h4>Registertation form</h4>

</div>

<div>
if(isset($_SESSION['message'])) {
	echo "<div>" $_SESSION['message'] "</div>";
	unset($_SESSION['message']);
	
}
</div>

<div>
<?php
if(isset($_SESSION['m']))
?>
</div>

<form method="post" action="Register.php">
<h3>Registration form</h3>
User Name:<input type="text" id="username" name="username"><br>
Email:<input type="email" id="email" name="email"><br>
password:<input type="password" id="password" name="password"><br>
password again:<input type="password" id="password2" name="password2"><br>
<input type="submit" name="register-btn" value="Register">
<input type="submit" value="Reset">
</form>
</body>
<html>