<?php
session_start();
if(isset($_POST['signOut'])){
	$_SESSION['signedIn']=false;
	session_destroy();
}
if(!isset($_POST['username'])){

}
else{
$servername = "localhost";
$username = "root";
$password = "iit123";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	if($row['username']==$_POST['username'] and $row['password']==$_POST['password']){
    		session_start();
			$_SESSION['signedIn'] = true;
			mysqli_close($conn);
			header("Location: homePage.php");
    	}
    }
    echo "<script>alert(\"No account matched your credentials!\");</script>";   
} else {
    echo "<script>alert(\"No account matched your credentials!\");</script>";
}
mysqli_close($conn);
}
?>

<html>
<head>
    <title>Sign In to Yasin's Blog</title>
</head>

<body>
    <h1> Welcome to Yasin's World </h1>
    <form action="signIn.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Sign In">
    </form>
    <a href="signUp.php"> Don't have an account? </a>
</body>
</html>

