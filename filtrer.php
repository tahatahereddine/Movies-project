<?php
include 'functions.php';
include 'db.php';
include 'header.php';

if(isset($_POST['film'])){
    echo $_POST['film'];
    $sql = "SELECT * FROM film WHERE Nom_film LIKE '%".$_POST['film']."%' LIMIT 24;";
    $resultat = mysqli_query($conn, $sql);
    $nbr_ligne = mysqli_num_rows($resultat);

    if($nbr_ligne > 0){
    echo '<div class="section">
            <div class="container pb-5">
              <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold text-uppercase text-light" style="color:black !important;
                    padding-top:20px">Titre similaire à "'.$_POST['film'].'"</h3>
                </div>
              </div>

              <div class="row justify-content-center">';
    while($ligne = mysqli_fetch_assoc($resultat)){
        afficher_film($ligne['ID_Film'], $ligne['Nom_film']);
    }
    }
    echo '</div></div></div>';  
}


include 'footer.php';





?>