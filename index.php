<?php
session_start();
require_once("req_connect.php");
require ("functions.php");


$username=$_POST["username"];
if (isset($_POST["mdp"])){
     $mdp = get_user_pwd($bdd,$_POST["password"]);
} 
if (isset($_POST["logok"])) {
    $username = $_POST["username"];
    echo get_user_pwd($bdd, $username);
    echo check_pwd($bdd,$username,$mdp);
    
}
if (check_pwd($bdd,"test","toto") == true){
   echo "c'est le bon mdp";
} else {
   echo "ce n'est pas le bon mdp";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <title>Ma dvd-thèque interactive</title>
    </head>
    <body>
        <div class="container">
            <!--            <div class="navbar navbar-fixed-top">
                            <div class="navbar-inner">
                                <ul class="nav">-->
            <li class="brand">Fouraxprod</li>
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Catégories <b class="caret"></b> </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Dompteurs</a></li>
                    <li><a href="#">Zoos</a></li>
                    <li><a href="#">Chasseurs</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Autres témoignages</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav pull-right ">
            <li><a href="register.php">Créer un compte</a></li>
            <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Se Connecter <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <form action="index.php" method="post">
                            <legend class="text-center">Connexion</legend>                                         
                            <label>Username</label>
                            <input type="text" placeholder="Type something…" id="username" name="username">
                            <label>Password</label>
                            <input type="password" placeholder="Type something…" id="mdp" name="mdp">
                            <li class="text-center"><button type="submit" class="btn" name="logok">Submit</button>
                            </li>
                        </form>
                    </li>
                    <li class="divider"></li>
                    <li class="text-center"><h4><a href="#">Se déconnecter</a></h4></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<li class="divider"></li>
<div class="row page-header text-center">

    <h1>Bienvenue chez Grogro</h1>
</div>
<div class="text-center">
    <ul class="thumbnails">
        <li class="span4 text-center">
            <a href="#" class="thumbnail">

                <img src="IMG_0427.JPG" class="img-rounded " alt="toto">
            </a>
        </li>
        <li class="span4 text-center">
            <a href="#" class="thumbnail">
                <img src="IMG_0423.JPG" class="img-rounded " alt="toto">
            </a></li>
        <li class="span4 text-center">
            <a href="#" class="thumbnail">
                <img src="IMG_0424.JPG" class="img-rounded " alt="toto">
            </a>
        </li>
        <li class="span4 text-center">
            <a href="#" class="thumbnail">
                <img src="IMG_0425.JPG" class="img-rounded " alt="toto">
            </a>
        </li>
        <li class="span4 text-center">
            <a href="#" class="thumbnail">
                <img src="IMG_0426.JPG" class="img-polaroid " alt="toto">
            </a>
        </li>
        <li class="span4 text-center">
            <a href="#" class="thumbnail">
                <img src="IMG_0422.JPG" class="img-polaroid " alt="toto">
            </a>
        </li>

    </ul>
</div>        
<li class="divider"></li>
<div class="navbar ">
    <div class="navbar-inner ">
        <ul class="nav">
            <li class="brand">Contact</li>
        </ul>
        <ul class="nav pull-right ">
            <li class="brand">Fabrioche</li>
        </ul>
    </div>
</div>
</div>
</body>
</html>
