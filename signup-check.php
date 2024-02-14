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

    $user_data = 'uname' . $uname. '&name' . $name;

    //echo $user_data;

    if (empty($name)){
        header("Location: signup.php?error=Name is required &$user_data");
        exit();
    }else if (empty($uname)){
        header("Location: signup.php?error=User name is required &$user_data");
        exit();
    }else if(empty($pass)){
        header("Location: signup.php?error=Password is required &$user_data");
        exit();
    }else if(empty($con_pass)){
        header("Location: signup.php?error=Confirm password is needed &$user_data");
        exit();
    }else if($pass !== $con_pass){
        header("Location: signup.php?error=Password and Confirm Password does not match &$user_data");
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
                header("Location: signup.php?error=Incorrect username or password");
                exit();
            }

        }else{
            header("Location: signup.php?error=Incorrect username or password");
            exit();
        }
    }
}else{
    header("Location: signup.php");
    exit();
}
?>