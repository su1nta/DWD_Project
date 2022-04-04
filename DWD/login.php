<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/signup-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <title>LogIn</title>
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
                    <div class="button2" id="button2" onclick="profileMenuInvoke()">
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
                    <a href="login.php"><div class="button2 active">
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
                if($_GET["error"]=="invalidunpwd"){
                    echo "Invalid Username or Password";
                }
                if($_GET["error"]=="none"){
                    echo "Signed-up Successfully. Please Log-in.";
                }
            }
        ?>
            <form class="loginform" action="login.inc.php" method="POST">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>
    <?php require_once 'footer.inc.php'; ?>
</body>
</html>