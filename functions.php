<?php

function create_hash($mdp) {

    $salt = 'descaracteresaupif';
    $salt = '$2y$07$' . $salt . '$';
    $password = $mdp;
    $hash = crypt($password, $salt);
    return $hash;
}

function get_user_pwd($bdd, $username) {
    $username = mysqli_real_escape_string($bdd,$username);
    $mdp = mysqli_query($bdd, "SELECT mdp FROM compte WHERE username='$username'") or die(mysql_error());
    $row = mysqli_fetch_assoc($mdp);
    return $row["mdp"];
}

function check_pwd($bdd,$username, $mdp) {
    $real_pwd = create_hash($mdp);
    $pwd = get_user_pwd($bdd, $username);
    if ($real_pwd == $pwd) {
        return true;
    } else {
        return false;
    }
}

?>
