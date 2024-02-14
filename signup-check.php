<?php
session_start();
include "db_conn.php";
if (isset($_POST['name']) && isset($_POST['uname']) 
    && isset($_POST['pword']) && isset($_POST['con_pword'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $uname =  validate($_POST['uname']);
    $pass = validate($_POST['pword']);
    $con_pass = validate($_POST['con_pword']);

    if (empty($uname)){
        header("Location: LoginPage.php?error=User name is required");
        exit();
    }else if(empty($pass)){
        header("Location: LoginPage.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE user_name = '$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] === $uname && $row['password'] === $pass){
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: homepage.php");
                exit();

            }else{
                header("Location: LoginPage.php?error=Incorrect username or password");
                exit();
            }

        }else{
            header("Location: LoginPage.php?error=Incorrect username or password");
            exit();
        }
    }
}else{
    header("Location: LoginPage.php");
    exit();
}
?>