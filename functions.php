<?php

//Permet de hasher un mot de passe grâce à blowfish crypt
function create_hash($mdp) {
    $salt = 'descaracteresaupifselonmoi';
    $salt = '$2y$07$' . $salt . '$';
    $password = $mdp;
    $hash = crypt($password, $salt);
    return $hash;
}

function get_user_pwd($bdd, $username) {
    $username = mysqli_real_escape_string($bdd, $username);
    $mdp = mysqli_query($bdd, "SELECT mdp FROM compte WHERE username='$username'") or die(mysql_error());
    $row = mysqli_fetch_assoc($mdp);
    return $row["mdp"];
}

function check_pwd($bdd, $username, $mdp) {
    $real_pwd = create_hash($mdp);
    $pwd = get_user_pwd($bdd, $username);
    if ($real_pwd == $pwd) {
        $check = mysqli_query($bdd, "SELECT * FROM compte WHERE username='$username'") or die(mysqli_error());
        $row = mysqli_fetch_assoc($check);
        $_SESSION["id_compte"] = $row["id_compte"];
        return true;
    } else {
        return false;
    }
}

function add_user($bdd, $username, $email, $mdp) {
    $username = mysqli_real_escape_string($bdd, $username);
    $email = mysqli_real_escape_string($bdd, $email);
    $check = mysqli_query($bdd, "SELECT * FROM compte WHERE username='$username'") or die(mysqli_error());
    $row = mysqli_fetch_assoc($check);

    if ($row["username"] == $username) {
        return false;
    } else {
        $add = mysqli_query($bdd, "INSERT INTO compte VALUES('', '$username', '$email', '$mdp')");
        $check = mysqli_query($bdd, "SELECT * FROM compte WHERE username='$username'") or die(mysqli_error());
        $row = mysqli_fetch_assoc($check);
        $_SESSION["id_compte"] = $row["id_compte"];
        return true;
    }
}

function add_person($bdd, $nom) {
    $nom = mysqli_real_escape_string($bdd, $nom);
    $req = "INSERT INTO personne VALUES ('', '$nom')";
    mysqli_query($bdd, $req) or die(mysqli_error($bdd));
    return mysqli_insert_id($bdd);
}

function add_film_person($bdd, $nom_personne, $id_film, $id_role) {
    //Ajout de la personne et récupération de son id :
    $id_personne = add_person($bdd, $nom_personne);

    //Ajout du role de la personne dans la table film_role :
    $req = "INSERT INTO film_role VALUES ('$id_role','$id_film','$id_personne')";
    mysqli_query($bdd, $req) or die(mysqli_error($bdd) . " $req");
}

function add_film($bdd, $titre, $resume, $commentaire, $note, $annee, $id_compte, $id_genre) {
    $titre = mysqli_real_escape_string($bdd, $titre);
    $resume = mysqli_real_escape_string($bdd, $resume);
    $commentaire = mysqli_real_escape_string($bdd, $commentaire);
    $note = mysqli_real_escape_string($bdd, $note);
    $annee = mysqli_real_escape_string($bdd, $annee);
    $req = "INSERT INTO film (titre, resume, commentaire, note, annee, id_compte, id_genre)
          VALUES ('$titre', '$resume', '$commentaire', '$note', '$annee', '$id_compte', '$id_genre')";
    mysqli_query($bdd, $req) or die(mysqli_error($bdd));
    $last_id_film = mysqli_insert_id($bdd);
    return $last_id_film;
}

function get_film_user($bdd) {
    $id_compte = $_SESSION["id_compte"];
    $res = mysqli_query($bdd, "SELECT * FROM film WHERE id_compte='$id_compte'") or die(mysqli_error($bdd));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_film_detail_user($bdd) {
    $id_compte = $_SESSION["id_compte"];
    $res = mysqli_query($bdd, "SELECT titre,nom_genre,resume,commentaire,note,annee,id_film FROM film f 
                               INNER JOIN genre g
                               ON f.id_genre =g.id_genre
                               WHERE 
                               f.id_compte='$id_compte'
            ORDER BY f.id_film") or die(mysqli_error($bdd));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_film($bdd) {

    $res = mysqli_query($bdd, "SELECT * FROM film") or die(mysqli_error($bdd));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}



function get_genre_user($bdd) {
    $id_compte = $_SESSION["id_compte"];
    $res = mysqli_query($bdd, "SELECT * FROM genre g
        INNER JOIN film f ON g.id_genre = f.id_genre 
        WHERE f.id_compte='$id_compte'
            GROUP BY g.nom_genre") or die(mysqli_error($bdd));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_genre($bdd) {

    $res = mysqli_query($bdd, "SELECT g.nom_genre, g.id_genre FROM genre g
        INNER JOIN film f ON g.id_genre = f.id_genre 
        GROUP BY g.id_genre") or die(mysqli_error($bdd));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_film_genre($bdd, $id_genre) {
//    $id_genre = $_GET["id_genre"];
    $res = mysqli_query($bdd, "SELECT titre FROM film
            WHERE id_genre = '$id_genre'") or die(mysqli_error($bdd));
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_nom_role ($bdd){
    $res = mysqli_query($bdd, "SELECT p.nom, r.role FROM film_role fr
        INNER JOIN role r ON r.id_role = fr.id_role
INNER JOIN personne p ON p.id_pers = fr.id_pers
INNER JOIN film f ON fr.id_film = f.id_film
ORDER BY f.id_film") or die(mysqli_error($bdd));
      return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

?>
