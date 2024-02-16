<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Security Settings</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>Change Password</h2>
        <?php if (isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <label>Old Password</label>
        <input type="password" 
               name="old-pass" 
               placeholder="Old Password">
               <br>

        <label>New Password</label>
        <input type="password" 
               name="new-pass"
               placeholder="New Password">
               <br>

        <label>Confirm New Password</label>
        <input type="password"
               name="confirm-new-pass"
               placeholder="Confirm New Password">
               <br>

        <button type="submit">Apply Changes</button>
        <a href="homepage.php" class="ca">Home</a>
    </form>
</body>
</html>

<?php
}else{
    header("Location: LoginPage.php");
    exit();
}

?>