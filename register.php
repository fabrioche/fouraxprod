<?php

require_once("req_connect.php");
require ("functions.php");
if (isset($_POST["username"])) {
    $username = nl2br($_POST["username"]);
} else {
    $username = NULL;
}
if (isset($_POST["email"])) {
    $email = nl2br($_POST["email"]);
} else {
    $email = NULL;
}
if (isset($_POST["password"])){
     $mdp = create_hash($_POST["password"]);
} 




if (isset($_POST["ok"])) {
   $req = mysqli_query($bdd,"INSERT INTO compte VALUES('', '$username', '$email', '$mdp')");
   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <title>Inscription</title>
    </head>
    <body>
        <div class="container">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav">
                    <li class="brand">Fouraxprod</li>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div>
        </div>
        
            <div class='row'>
                <div class='span5'>
                    <form class="form-signin " action="register.php" method="post">
                        <h2 class="form-signin-heading">Please sign in</h2>
                        <label for="username"><input type="text" class="input-block-level" id="username" name="username" placeholder="Username" size='50' /></label>
                        <label for="email"><input type="email" class="input-block-level" id="email" name="email" placeholder="Email" size='50'/></label>
                        <label for="password"><input type="password" class="input-block-level" id="password" name="password" placeholder="Password" size='50'/></label>
                        <button class="btn btn-large btn-primary" type="submit" id="ok" name="ok">Sign in</button>
                    </form>
                </div>
            </div>
        </div><!--fin container-->
    </body>
</html>
