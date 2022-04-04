<?php
    session_start();
    require_once 'dbconnect.inc.php';

    $propic=0;
    $upropic=0;
    $fullname=0;
    $mobno=0;
    $dob=0;
    $gender=0;
    $pincode=0;
    $addr=0;
    $city=0;
    $state=0;
    $uname=0;

    if(isset($_FILES["photo"])){
        $propic=$_FILES["photo"]["name"];
    }
    $upropic="Images/propics/".$propic;
    $fullname=$_POST['fullname'];
    $mobno=$_POST['mobno'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $pincode=$_POST['pincode'];
    $addr=$_POST['addr'];
    $landmark=$_POST['landmark'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $uname=$_SESSION["uname"];
    if(!empty($propic)){
        $sql="UPDATE userdetails SET upropic='$upropic' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "propic updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($fullname)){
        $sql="UPDATE userdetails SET fullname='$fullname' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "name updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($mobno)){
        $sql="UPDATE userdetails SET mobno='$mobno' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "mobile no updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($dob)){
        $sql="UPDATE userdetails SET dob='$dob' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "dob updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($gender)){
        $sql="UPDATE userdetails SET gender='$gender' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "gender updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($pincode)){
        $sql="UPDATE userdetails SET pincode='$pincode' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "pincode updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($addr)){
        $sql="UPDATE userdetails SET addr='$addr' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "address updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($landmark)){
        $sql="UPDATE userdetails SET landmark='$landmark' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "address updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($city)){
        $sql="UPDATE userdetails SET city='$city' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "city updated";
        header("location: edit-profile.php?update=success");
    }
    if(!empty($state)){
        $sql="UPDATE userdetails SET state='$state' WHERE uname='$uname';";
        $rs=mysqli_query($con, $sql);
        echo "state updated";
        header("location: edit-profile.php?update=success");
    }
    else{
        echo "update a data";
    }
?>