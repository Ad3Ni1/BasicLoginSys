<?php

if (isset($_POST['uname']) && isset($_POST['pword'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname =  valdiate($_POST['uname']);
    $pass = validate($_POST['pword']);

    if (empty($uname)){

    }else if(empty($pass)){

    }else{
        echo "Logged in";
    }
}else{
    header("Location: LoginPage.php")
}