<?php
    session_start();
    require_once 'dbconnect.inc.php';

    $uname=$_POST['username'];
    $pwd=$_POST['password'];

    $sql="SELECT uid,pwd FROM userdetails WHERE uname='$uname';";
    $rs=mysqli_query($con, $sql);
    $row=mysqli_fetch_assoc($rs);

    $result=password_verify($pwd,$row["pwd"]);
    if($result){
        $_SESSION["uname"]=$uname;
        $_SESSION["uid"]=$row['uid'];
        header("location:index.php?error=nonel");
    }
    else{
        header("location:login.php?error=invalidunpwd");
    }
?>