<?php

function afficher_film($id, $nom){
    echo '<div class="col-6 col-sm-4 md-3 col-lg-2 mt-3">';
    echo '<a href="moreinfo.php?id='.$id.'">';
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

function getUser($conn, $id){
    $sql = "SELECT * FROM utilisateur WHERE ID_User = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
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

function afficher_section($conn, $sql, $titre){
    $resultat = mysqli_query($conn, $sql);
    $nbr_ligne = mysqli_num_rows($resultat);
    echo '<div class="section">
    <div class="container pb-5">
        <div class="row">
        <div class="col-12">
        <br><br>
            <h3 class="font-weight-bold text-uppercase text-light" style="color:black !important;
            padding-top:15px">'.$titre.'</h3>
        </div>
        </div>

        <div class="row justify-content-center">';
    if($nbr_ligne > 0){
    while($ligne = mysqli_fetch_assoc($resultat)){
        afficher_film($ligne['ID_Film'], $ligne['Nom_film']);
    }
    }
    echo '</div></div></div>'; 
}

function verifier_mdp($conn, $id, $old_mdp){
    $sql = "SELECT * FROM utilisateur WHERE ID_User = ? AND mdp_User = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "is", $id, $old_mdp);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    if(mysqli_fetch_assoc($resultat)) {
        return true;
    } else {
        return false;
    }
}
function changer_mdp($conn, $id, $old_mdp, $nouv_mdp){
    $sql = "UPDATE utilisateur SET mdp_User = ? WHERE ID_User = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $nouv_mdp, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function prenom_existe_deja($conn, $id, $prenom){
    $sql = "SELECT * FROM utilisateur WHERE ID_User = ? AND Prenom_User = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "is", $id, $prenom);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    if(mysqli_fetch_assoc($resultat)) {
        return true;
    } else {
        return false;
    }
}
function changer_prenom($conn, $id, $prenom){
    $sql = "UPDATE utilisateur SET Prenom_User = ? WHERE ID_User = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $prenom, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>