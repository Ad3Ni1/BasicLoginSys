<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    include "db_conn.php";

    if (isset($_POST['old-pass']) && isset($_POST['new-pass']) 
    && isset($_POST['confirm-new-pass'])){

        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $OldPass = validate($_POST['old-pass']);
        $NewPass =  validate($_POST['new-pass']);
        $ConNewPass =  validate($_POST['confirm-new-pass']);

        if(empty($OldPass)){
            header("Location: SecurityPage.php?error=Fill in the Old Password area");
            exit();
        }else if(empty($NewPass)){
            header("Location: SecurityPage.php?error=Fill in the New Password area");
            exit();
        }else if($NewPass !== $ConNewPass){
            header("Location: SecurityPage.php?error=The confirmation password does not match");
            exit();
        }else{
            //password hashing
            $OldPass = md5($OldPass);
            $NewPass = md5($NewPass);
            $id = $_SESSION['id'];

            $sql = "SELECT password FROM users WHERE id='$id' AND password='$OldPass'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){

                $sql_2 = "UPDATE users SET password = '$NewPass' WHERE id='id'";
                mysqli_query($conn, $sql_2);
                header("Location: SecurityPage.php?success=Your password has been updated");
                exit();

            }else{
                header("Location: SecurityPage.php?error=That is not your old password");
                exit();
            }


        }


    }else{
        header("Location: SecurityPage.php");
        exit();
    }

}else{
    header("Location: LoginPage.php");
    exit();
}
?>