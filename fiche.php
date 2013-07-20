<?php
session_start();
require ("req_connect.php");

$req = mysqli_query($bdd, "SELECT nom_genre FROM genre") or die(mysqli_error());

while ($row = mysqli_fetch_assoc($req)) {
    $resut_ligne[] = $row;
}
//    $nom_genre=$row["nom_genre"];
//    $id_genre=$row["id_genre"];
//    for ($i =0;  $i<= 15 ; $i++)
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
                <form>
                    <fieldset>
                        <legend>Fiche du Film</legend>
                        <label>Titre</label>
                        <input type="text" placeholder="Type something…">
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
                                    foreach ($resut_ligne as $row) {
                                        echo '<label for="genre" class="radio text-left">
                                        <input type="radio" name="nom_genre" id="genre" value="">' . $row["nom_genre"] . '
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
                        <input type="text" placeholder="11/07/2013">
                        <label>Résumé</label>
                        <textarea rows="3" name="resume"></textarea>
                        <label>Commentaire</label>
                        <textarea rows="3" name="commentaire"></textarea>
                        <label>Réalisateur</label>
                        <button type="submit" class="btn">Submit</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>
