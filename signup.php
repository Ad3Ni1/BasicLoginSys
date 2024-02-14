<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="signup-check.php" method="post">
        <h2>Sign up</h2>
        <?php if (isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php }else if (isset($_GET['success'])){ ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>



        <label>Name</label>
        <?php if (isset($_GET['name'])){ ?>
            <input type="text"
                   name="name" 
                   placeholder="Name"
                   value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type="text"
                   name="name"
                   placeholder="Name"><br>
        <?php } ?> 
        
        <label>Username</label>
        <?php if (isset($_GET['uname'])){ ?>
            <input type="text"
                   name="uname" 
                   placeholder="User Name"
                   value="<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
            <input type="text"
                   name="uname"
                   placeholder="User Name"><br>
        <?php } ?>  
        
        <label>Password</label>
        <input type="password"
               name="pword" 
               placeholder="Password"> <br>

        <label>Confirm Password</label>
        <input type="password" 
               name="con_pword" 
               placeholder="Confirm Password"> <br>

        <button type="submit">Sign up</button>
        <a href="LoginPage.php" class="ca">Alreay have an account?</a>
    </form>
    
</body>
</html>