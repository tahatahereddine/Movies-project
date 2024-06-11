<?php
include 'functions.php';
include 'db.php';
include 'header.php';

if($_GET['critere'] == 'top'){
    $sql = "SELECT * FROM film ORDER BY Rating DESC LIMIT 12;";
                   $resultat = mysqli_query($conn, $sql);
                   $nbr_ligne = mysqli_num_rows($resultat);
                   echo '<div class="section">
                   <div class="container pb-5">
                     <div class="row">
                       <div class="col-12">
                       <br><br>
                           <h3 class="font-weight-bold text-uppercase text-light" style="color:black !important;
                           padding-top:20px">Top IMdB</h3>
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
                
                
                include 'footer.php';





?>