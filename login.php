<?php
session_start();
//connected to database
$db = mysqli_connect("localhost","root","","author");

if(isset($_POST['login-btn'])){
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);

$password = md5($password);
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($db, $sql);
if(mysqli_num_rows($result) == 1){
$_SESSION['message'] = "you are now logged in";
$_SESSION['username'] = $username;
header("location:home.php");	
} 
else{
$_SESSION['message'] = "username/password combination are incorrect";

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

<form method="post" action="login.php">
<h3>Login form</h3>
User Name:<input type="text" id="username" name="username"><br>
password:<input type="password" id="password" name="password"><br>
<input type="submit" name="login-btn" value="Login">
<input type="submit" value="Register">
</form>
</body>
<html>