<?php

function afficher_film($id, $nom){
    echo '<div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">';
    echo '<a href="#">';
    echo '<div class="image-container">';
    echo '<img src="./images/'.$id.'.jpg" alt="'.$nom.'">';
    echo '</div>
        <div class="sp-poster-title"><span class="nom">'.$nom.'</span></div>
        </a></div>';
}

function utilisateurExiste($conn, $email){
    $sql = "SELECT * FROM utilisateur WHERE Email_User = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
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


function creerUtilisateur($conn, $nom, $prenom, $date_naiss, $email, $mdp){
    $sql = "INSERT INTO utilisateur (ID_User, Nom_User, Prenom_User, Date_naiss, Email_User, mdp_User) 
    VALUES (NULL, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $nom, $prenom, $date_naiss, $email, $mdp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    session_start();
    $_SESSION['id'] = mysqli_insert_id($conn);;
    $_SESSION['prenom'] = $prenom;
    header("location: index.php");
    exit();
}

function connecterUtilisateur($conn, $email, $mdp){
    $existe = utilisateurExiste($conn, $email);

    if($existe === false){
        header("location: signup.php?error=nexistepas");
        exit();
    }

    $pwd = $existe['mdp_User'];
    $verfierMdp = strcmp($mdp, $pwd);

    if($verfierMdp != 0){
        header("location: signup.php?error=mdpfalse");
        exit();
    }else if($verfierMdp == 0) {
        session_start();
        $_SESSION['id'] = $existe['ID_User'];
        $_SESSION['prenom'] = $existe['Prenom_User'];
        header("location: index.php");
        exit();
    }
    
}
?>