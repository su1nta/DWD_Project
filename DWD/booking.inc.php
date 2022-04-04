<?php
    $sshid=NULL;
    $schid=NULL;
    $smid=NULL;
    $stime=NULL;
    $savseat=NULL;
    session_start();
    require_once 'dbconnect.inc.php';
    $sshid=$_GET['shid'];
    $schid=$_GET['chid'];
    $smid=$_GET['mid'];
    $stime=$_GET['time'];
    $savseat=$_GET['avseat'];
    $suname=$_SESSION["uname"];
    $seatsno=$_POST['seatsno'];

    $sql="SELECT uid from userdetails WHERE uname='$suname';";
    $rs=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($rs);
    $suid=$row['uid'];

    $savseatnum=(int)$savseat;
    $remseat=$savseatnum-(int)$seatsno;
    $sql2="UPDATE shows SET avseat='$remseat' WHERE shid='$sshid' AND chid='$schid' AND mid='$smid' AND time='$stime';";
    $rs2=mysqli_query($con, $sql2);

    $sql3="INSERT INTO `booking` (`uid`,`mid`,`chid`,`shid`,`seatsno`,`time`) VALUES ('$suid','$smid','$schid','$sshid','$seatsno','$stime');";
    $rs3=mysqli_query($con,$sql3);
    header("location:index.php?book=success");
?>