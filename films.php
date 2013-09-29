<?php
session_start();
require ("req_connect.php");
require ("functions.php");

//Si on l'utilisateur a cliqué sur le lien de déconnexion :
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy(); //Détruit la session sur le serveur
    $_SESSION = null;  //Vide la variable de session
}
if (isset($_SESSION["username"])) {
   
   $res = get_film_detail_user($bdd);
   $result = get_nom_role ($bdd);
   $genre = get_genre_user($bdd);
} else {
    $id_genre = $_GET["id_genre"];
    $res = get_film_genre($bdd, $id_genre);
    $genre = get_genre($bdd);
}

print_r($_GET);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <title>Mes films</title>
    </head>
    <body>
        <div class="container">
            <div class="navbar ">
                <div class="navbar-inner">
                    <ul class="nav">
                        <li class="brand">Fouraxprod</li>
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <?php if (isset($_SESSION['id_compte'])) {
                            echo
                            '<li class="active"><a href="fiche.php?id=' . $_SESSION['id_compte'] . '">Ajouter un film +</a></li>';
                        }
                        ?>
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Catégories <b class="caret"></b> </a>
                            <ul class="dropdown-menu">
<?php foreach ($genre as $value) {
    echo '<li class="divider"></li>
                               <li><a href="films.php?id_genre='.$value["id_genre"].'">'.$value["nom_genre"].'</a></li>';
}
?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav pull-right ">
<?php if (isset($_SESSION['id_compte'])) {
    echo
    '<li><a href="films.php?id=' . $_SESSION['id_compte'] . '">Mes films</a></li>';
}
?>
                        <li class="active dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Se Connecter <b class="caret"></b></a>
                            <ul class="dropdown-menu">
<?php if (isset($_SESSION['username'])) { ?>
                                    <li>
                                        <p>Vous êtes connecté en tant que <?= $_SESSION['username'] ?></p>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="text-center"><h4><a href="?action=logout">Se déconnecter</a></h4></li>
<?php } else { ?>
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
<?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--<li class="divider"></li>-->
            <div class="row page-header text-center">

                <h1>Bienvenue chez Grogro</h1>
            </div>
            <div class="text-center">
                <?php
                
                foreach ($res as $row) {
                    
                    
//               echo     '<li><a href="films.php?id_film=' . $row["id_film"] . '">' . $row["titre"] . '</a></li>';
                    echo $row["titre"] . '</br>';
                    echo $row["resume"] . '</br>';
                    echo $row["commentaire"] . '</br>';
                    echo $row["note"] . '</br>';
                    echo $row["annee"] . '</br>';
                      foreach ($result as $row){
                   echo '<p>'. $row["role"]. '</br></p>';
                   echo '<p>'.$row["nom"].'</br></p>';
                }
//                    if (file_exists('./photo/' . $row["id_film"] . '.jpg')) {
//                        echo '<img src="./photo/' . $row["id_film"] . '.jpg' . '" width="50" height="50"" />';
//                    } else {
//                        echo "img absente.";
//                    }
                    
                }
              
				
                ?>

            </div>        

            <div class="navbar">
                <div class="navbar-inner">
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
