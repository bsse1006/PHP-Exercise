<?php
	session_start();
	if($_SESSION['signedIn']==false){
	header("Location: signIn.php");
}
?>

<html>
<head>
<title> Yasin's Blog </title>
</head>
<body>
<h1> Welcome to Yasin's World </h1>
<form action="signIn.php" method="post">
	<input type="submit" name="signOut" value="Sign Out">
</form>
</body>
</html>