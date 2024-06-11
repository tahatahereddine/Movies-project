<?php
include 'functions.php';
include 'db.php';
include 'header.php';

if($_GET['critere'] == 'top'){
    $sql = "SELECT * FROM film ORDER BY Rating DESC LIMIT 12;";
    afficher_section($conn, $sql, 'Top IMdB');

} elseif($_GET['critere'] == 'genre'){
    $g = $_GET['g'];
    $sql = "SELECT * FROM film WHERE Genre = '".$g."';";
    // traduire le genre en francais
    if($g=='True Story') $g = 'Faits Réels';
    elseif($g=='Comedy') $g = 'Comédie';
    elseif($g=='Drama') $g = 'Drame';
    elseif($g=='Sci-Fi') $g = 'Science Fiction';

    afficher_section($conn, $sql, 'Films de '.$g);
} elseif($_GET['critere'] == 'pays')   {
    $p = $_GET['p'];
    $sql = "SELECT * FROM film WHERE Pays = '".$p."';";
    // traduire les pays en francais
    if($p=='USA') $p = 'États-Unis';
    elseif($p=='United Kingdom') $p = 'Angleterre';
    elseif($p=='Germany') $p = 'Allemand';
    elseif($p=='y') $p = 'y';

    afficher_section($conn, $sql, 'Films de: '.$p);
}      
                
                
include 'footer.php';
?>