<?php
session_start();
require ("req_connect.php");

$id_compte = $_SESSION["id_compte"];
$req = mysqli_query($bdd, "SELECT * FROM genre") or die(mysqli_error($bdd));
$row = mysqli_fetch_all($req);
if (isset($_POST["ok"])) {


    $titre = $_POST['titre'];
    $resume = $_POST['resume'];
    $commentaire = $_POST['commentaire'];
    $note = $_POST['note'];
    $id_genre = $_POST["id_genre"];
    $annee = $_POST['annee'];
    $req = mysqli_query($bdd, "INSERT INTO film (titre, resume, commentaire, note, annee, id_compte, id_genre)
        VALUES ('$titre', '$resume', '$commentaire', '$note', '$annee', '$id_compte', '$id_genre')") or die(mysqli_error($bdd));
    $last_id_film = mysqli_insert_id($bdd);

    $req1 = mysqli_query($bdd, "INSERT INTO personne(nom)
        VALUES ('$nom')") or die(mysqli_error($bdd));
}
//Si une image a été envoyée par le formulaire :
if (isset($_FILES["nom_media"])) {
    //Upload de l'image dans le répertoire ./photo
    $title = basename($_FILES['nom_media']['name']);
    $resultat = move_uploaded_file($_FILES['nom_media']['tmp_name'], "../photo/$title");
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
        <title>Film</title>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <li class="brand">Fouraxprod</li>
                    <ul class="nav">
                        <li class="active"><a href="index.php">Home</a></li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="active"><a  href="register.php">Se déconnecter</a></li>
                    </ul>
                </div>
            </div>
            <div >
                <form action="fiche.php" method="post" enctype="multipart/form-data">


                    <legend>Fiche du Film</legend>
                    <div class="span6">
                        <label>Titre</label>
                        <input type="text" placeholder="Type something…" name="titre">
                        <label>Genre</label>
                        <!-- Button to trigger modal -->
                        <a href="#myModal" role="button" class="btn" data-toggle="modal">Genre du film</a>
                        <!-- Modal -->
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Catégories</h3>
                            </div>
                            <div class="modal-body">
                        <!--    <p>One fine body…</p>-->
                                <div class="span3  ">
                                    <?php
                                    foreach ($req as $row) {
                                        echo '<label for="genre" class="radio text-left">
                                        <input type="radio" name="id_genre" id="genre" value="' . $row["id_genre"] . '">' . $row["nom_genre"] . '
                                    </label>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                <button class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <label>Année</label>
                        <input type="text" placeholder="11/07/2013" name="annee"/>
                        <label for="icone">Photo :</label>
                        <input type="file" name="img_film" id="img_film" />
                        <label>Résumé</label>
                        <textarea rows="3" name="resume"></textarea>
                        <label>Commentaire</label>
                        <textarea rows="3" name="commentaire"></textarea>
                    </div>
                    <div class="span5">
                        <label>Réalisateur</label>
                        <input type="text" name="nom" size="50"/>
                        <label>Scénariste</label>
                        <input type="text" name="nom" size="50"/>
                        <label>Acteur principal </label>
                        <input type="text" size="50" name="nom"/>
                        <label for="icone">Photo :</label>
                        <input type="file" name="img_acteur" id="img_acteur" />
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Autres acteurs
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse out">
                            <div class="accordion-inner">


                                <label>Autre acteur </label>
                                <input type="text" size="50" name="nom[]"/>
                                <input type="file" size="50" name="img_other[]"/>
                                <label>Autre acteur </label>
                                <input type="text" size="50" name="nom[]"/>
                                <input type="file" size="50" name="img_other[]"/>
                                <label>Autre acteur </label>
                                <input type="text" size="50" name="nom[]"/>
                                <input type="file" size="50" name="img_other[]"/>
                                <label>Autre acteur </label>
                                <input type="text" size="50" name="nom[]"/>
                                <input type="file" size="50" name="img_other[]"/>
                                <label>Autre acteur </label>
                                <input type="text" size="50" name="nom[]"/>
                                <input type="file" size="50" name="img_other[]"/>
                            </div>
                        </div>
                        </br>
                        <button type="submit" class="btn" name="ok">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
