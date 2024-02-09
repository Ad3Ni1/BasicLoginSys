<?php

if (isset($_POST['uname']) && isset($_POST['pword'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname =  validate($_POST['uname']);
    $pass = validate($_POST['pword']);

    if (empty($uname)){
        header("Location: LoginPage.php?error=User name is required");
        exit();
    }else if(empty($pass)){
        header("Location: LoginPage.php?error=Password is required");
        exit();
    }else{
        echo "Logged in";
    }
}else{
    header("Location: LoginPage.php");
    exit();
}
?>