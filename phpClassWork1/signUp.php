<?php
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

$sql = "INSERT INTO user (username, password) 
        VALUES ('$_POST[username]', '$_POST[password]')";

if (mysqli_query($conn, $sql)) {
    session_start();
	$_SESSION['signedIn'] = true;
	mysqli_close($conn);
	header("Location: homePage.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>



<html>
<head>
    <title>Sign Up for Yasin's Blog</title>
    <script>
        function checkConfirmPassword(a,b)
        {
            if(a.value==b.value)
            {
                return true;
            }
            else
            {
                alert("Password doesn't match");
                return false;
            }
        }
    </script>
</head>

<body>
    <h1> Welcome to Yasin's World </h1>
    <form action="signUp.php" onsubmit="return checkConfirmPassword(password, confirmPassword)"  method="post">

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br>

        <input type="submit" value="Sign Up">

    </form>
    <a href="signIn.php"> Already have an account? </a>
</body>
</html>

