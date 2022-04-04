<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/signup-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <link rel="icon" href="Images/favicon.ico">
    <title>Signup</title>
</head>
<body>
<div class="wrapper">
<div class="header">
            <div class="container">
               <a href="index.php"><div class="logo">
                    <p>Originals</p>
                </div></a>
                <div class="buttons">
                  <div class="button1">
                        <p>Kolkata</p>
                    </div>
                    <div class="button2 active" id="button2" onclick="profileMenuInvoke()">
                    <a href="signup.php"><p>&nbsp;&nbsp;&nbsp;SignUp</p></a>
                          <div class="profilemenu" id="profilemenu">
                            <ul>
                                <li><p>link</p></li>
                                <li><p>link</p></li>
                                <li><p>link</p></li>
                                <li><p>link</p></li>
                                <li><p>link</p></li>
                            </ul>
                        </div>
                    </div>
                    <a href="login.php"><div class="button2">
                        <p>LogIn</p>
                    </div></a>
                    <div class="button3" onclick="mobileMenuInvoke()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="msearch" id="msearch">
            <form action="nothing.php">
                <input type="text" placeholder="Search movie, theatre, genre...">
                <input type="submit" value="Search">
            </form>
        </div>


        
        <div class="logincontainer">
        <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="passwordsDoesntMatch"){
                            echo "Passwords Doesn't match!";
                        }else if($_GET["error"]=="emailexist"){
                            echo "Email already exists.";
                        }else if($_GET["error"]=="unameexist"){
                            echo "Username already exists.";
                        }else if($_GET["error"]=="none"){
                            echo "Signed up Successfully.";
                        }
                    }
                ?>
            <form class="loginform" action="signup.inc.php" method="POST">
                <input type="text" name="fullname" placeholder="Full Name" required="required">
                <input type="email" name="email" placeholder="Email" required="required">
                <input type="text" name="uname" placeholder="Set Username" required="required">
                <input type="password" name="pass" placeholder="Create Password" required="required">
                <input type="password" name="repass" placeholder="Re-enter Password" required="required">

                <button type="submit" name="submit">Sign-up</button>
            </form>
        </div>
    </div>
    <?php require_once 'footer.inc.php'; ?>
</body>
</html>