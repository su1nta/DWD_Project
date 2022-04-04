<?php
    session_start();
    require_once 'dbconnect.inc.php';

    $fullname= mysqli_real_escape_string($con, $_POST['fullname']) ;
    $email=mysqli_real_escape_string($con, $_POST['email']);
    $uname=mysqli_real_escape_string($con, $_POST['uname']);
    $pwd=mysqli_real_escape_string($con, $_POST['pass']);
    $rpwd=mysqli_real_escape_string($con, $_POST['repass']);

    require_once 'functions.inc.php';
        if(pwdNotMatch($pwd, $rpwd)==true){
            header('location:signup.php?error=passwordsDoesntMatch');
            exit();
        }
       if(emailExists($con, $email)!==true){
            header("location:signup.php?error=emailexist");
            exit();
        }
        if(unameExists($con, $uname)!==true){
            header("location:signup.php?error=unameexist");
            exit();
        }
    
    $hashpwd= password_hash($pwd, PASSWORD_DEFAULT);
    $ip=$_SERVER['REMOTE_ADDR'];

    $sql="INSERT INTO userdetails (fullname, email, uname, pwd, ip, vis) VALUES ('$fullname', '$email', '$uname', '$hashpwd','$ip', '1');";
    $_SESSION["uname"]=$uname;
    $result=mysqli_query($con, $sql);
    header("location: login.php?error=none");
?>