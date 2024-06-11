<?php
include 'db.php';
include 'header.php';
include 'info.php';

$id = $_GET['id']; 
$film = getFilm($conn, $id);
if($film === false){
    echo "<br><br><br><h2 color='red'>Film Introuvable</h2>";
    sleep(3);
    header("location: index.php");
    exit();
}
$nomFilm = $film['Nom_film'];
$annee = $film['Annee_film'];
$genre = $film['Genre'];
$rating = $film['Rating'];
$pays = $film['Pays'];
$production = $film['Production_company'];
$duration = $film['duration'].' min';
$description = $film['description'];

$realisateur = getRealisateur($conn, $film['ID_Realisateur']);
?>
<link rel="stylesheet" href="styles/moreinfo.css">

<div class="container-div">
        <div class="header-div">
            <img src=<?="images/".$id.".jpg"?> alt="Movie Image" class="movie-image">
            <div class="movie-info">
                <h1 class="movie-title"><?=$nomFilm?>
                <?php if(isset($_SESSION['id'])){
                    if(estfavoris($conn, $id, $_SESSION['id']) === false){
                        echo '<a href="ajouterfav.php?id='.$id.'&uid='.$_SESSION['id'].'" class="favorite-button">Ajouter aux favoris</a>';
                    }else{
                        echo '<a href="supprimerfav.php?id='.$id.'&uid='.$_SESSION['id'].'" class="favorite-button-fav">favoris</a>';
                    }
                }
                ?></h1>
                <p class="imdb-rating">IMDB Rating: <span style='color:orange;'><?=$rating?></span></p>
                <p class="description"><?=$description?></p>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <p><strong>Date: </strong><?=$annee?></p>
                <p><strong>Genre: </strong><?=$genre?></p>
                <p><strong>realisateur: </strong><?=$realisateur?></p>
            </div>
            <div class="column">
                <p><strong>Duration: </strong><?=$duration?></p>
                <p><strong>Pays: </strong><?=$pays?></p>
                <p><strong>Production: </strong><?=$production?></p>
            </div>
        </div>
        <!-- <div class="columns">
            <p><strong>Acteurs: </strong><?="NULL"?></p>
        </div> -->
    </div>

