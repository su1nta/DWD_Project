<?php
function pwdNotMatch($pwd, $rpwd){
    if($pwd==$rpwd){
        return false;
    }
    else{
        return true;
    }
}

function emailExists($con, $email){
    $sql="SELECT uname FROM userdetails WHERE email=$email;";
    $rs=mysqli_query($con, $sql);
    if(mysqli_num_rows($rs)>0){
        return false;
    }
    else{
        return true;
    }
}
function unameExists($con, $uname){
    $sql="SELECT uname FROM userdetails WHERE uname=$uname;";
    $rs=mysqli_query($con, $sql);
    if(mysqli_num_rows($rs)>0){
        return false;
    }
    else{
        return true;
    }
}
?>