<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    hello
</body>
</html>

<?php
}else{
    header("Location: LoginPage.php");
    exit();
}

?>