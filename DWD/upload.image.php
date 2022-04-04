<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image upload</title>
</head>
<body>
    <?php
        require_once 'dbconnect.inc.php';
    ?>
    <form action="upload.image.php" method="POST" enctype="multipart/form-data" style="display:flex;flex-direction:column; width:20%; justify-content:center;">
            <h2>Upload Image</h2>
            <label for="fileselect">Filename:</label>
            <input type="file" name="photo" id="fileselect">
            <input type="text" name="mname" placeholder="Movie Name">
            <input type="text" name="mcat" placeholder="Movie Category">
            <input type="text" name="mrel_dt" placeholder="Movie Release Date">
            <input type="text" name="mlang" placeholder="Movie Language">
            <input type="text" name="mrat" placeholder="Movie Rating">
            <input type="text" name="mdef" placeholder="Movie Defintion">
            <input type="text" name="mabout" placeholder="about">
            <button type="submit" name="submit">Upload</button>
    </form>

    <?php
        if(isset($_FILES["upropic"])){
            $filename=$_FILES["upropic"]["name"];
        }
        $mname=$_POST['mname'];
        $mcat=$_POST['mcat'];
        $mrel_dt=$_POST['mrel_dt'];
        $mlang=$_POST['mlang'];
        $mrat=$_POST['mrat'];
        $mdef=$_POST['mdef'];
        $mabout=$_POST['mabout'];
        $mimage="Images/movies/".$filename;
        $sql="INSERT INTO movies (mname, mimage, mcat, mrel_dt, mlang, mdef, mabout) VALUES ('$mname', '$mimage', '$mcat', '$mrel_dt', '$mlang', '$mdef', '$mabout');";
        $rs=mysqli_query($con, $sql);
        echo "Image Uploaded.";
    ?>
</body>
</html>