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

        //password hashing
        $pass = md5($pass);

        $sql_uname_check = "SELECT * FROM users WHERE user_name = '$uname' ";
        $result_uname_check = mysqli_query($conn, $sql_uname_check);

        if (mysqli_num_rows($result_uname_check) > 0){
            header("Location: signup.php?error=User name is already taken try another &$user_data");
            exit();
        }else{
            $sql_register = "INSERT INTO users(user_name, password, name) 
            VALUES('$uname', '$pass', '$name')";
            $result_register = mysqli_query($conn, $sql_register);
            if ($result_register){
                header("Location: signup.php?success=Your account has been signed up");
                exit();
            }else{
                header("Location: signup.php?error=Uknown error occured");
                exit();
            }
        }
    }
}else{
    header("Location: signup.php");
    exit();
}
?>