<?php
function getFilm($conn, $id){
    $sql = "SELECT * FROM film WHERE ID_Film = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: index.php?error=infointrouvable");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultat)) {
        return $row;
    } else {
        $resultat = false;
        return $resultat;
    }

    mysqli_stmt_close($stmt);
}

function getRealisateur($conn, $id){
    $sql = "SELECT * FROM realisateur WHERE ID_Realisateur = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        return "";
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultat)) {
        return $row['Prenom_Realisateur'].' '.$row['Nom_Realisateur'];
    } else {
        $resultat = false;
        return $resultat;
    }

    mysqli_stmt_close($stmt);
}

function estfavoris($conn, $id, $uid){
    $sql = "SELECT * FROM aimer WHERE ID_User = ? AND ID_Film = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        return "";
    }

    mysqli_stmt_bind_param($stmt, "ii", $uid, $id);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    if(mysqli_fetch_assoc($resultat)) {
        return true;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}
?>