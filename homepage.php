<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
    <nav class="home-nav">
        <a href="SecurityPage.php">Security Settings</a>
        <a href="logout.php">Logout</a>   
    </nav>

</body>
</html>

<?php
}else{
    header("Location: LoginPage.php");
    exit();
}

?>