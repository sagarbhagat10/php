<?php
session_start();

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

<h1>home</h1>
<div><h4>Welcome <?php echo $_SESSION['username']; ?></h4></div>
<div><a href="logout.php">Logout</a></div>


</body>
<html>