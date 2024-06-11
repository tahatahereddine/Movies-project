<?php
  include 'functions.php';
  include 'db.php';
  include 'header.php';
?>

    <div class="section">
        <div class="section-dark" style="background-image: url('bground.jpg') !important; background-position: center; background-size: cover;">
            <div class="container py-sm-5 mb-sm-5">

                <div class="row pt-5">
                    <div class="col-12 text-center mb-5">
                        <h1 class="presentation-title font-weight-bold text-light">Movie<wbr>Flix<wbr>.com</h1>
                    </div>
                    <div class="col-sm-6 offset-sm-3">
                        <div class="mx-auto">
                            <div>
                              <div class="autocomplete auto-start">
                                <form action="chercher.php" method="POST">
                                  <div class="input-group">
                                    <input type="text" name="film" placeholder="Trouver un film" autocomplete="off" class="form-control">
                                    <ul id="autocomplete-results" class="autocomplete-results" style="display: none;"></ul>
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-danger search">
                                        rechercher
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                      </div>
                    </div>
                    <div class="col-12 text-center">
                        <h2 class="h4 mt-5 text-light">Votre interface au cinema</h2>
                    </div>
                </div>
            </div>


            <div class="container pb-5">
              <div class="row">
                <div class="col-12">
                    <h3 class="font-weight-bold text-uppercase text-light titre">Classement top 12</h3>
                </div>
              </div>
              <div class="row justify-content-center">
                  <?php
                   $sql = "SELECT * FROM film ORDER BY Rating DESC LIMIT 12;";
                   $resultat = mysqli_query($conn, $sql);
                   $nbr_ligne = mysqli_num_rows($resultat);

                   if($nbr_ligne > 0){
                    while($ligne = mysqli_fetch_assoc($resultat)){
                      afficher_film($ligne['ID_Film'], $ligne['Nom_film']);
                    }}
                  ?>
            </div>
        </div>
    </div>

    <?php 
    $sql = "SELECT * FROM film ORDER BY Annee_film DESC LIMIT 12;";
    $titre = "Derniers Titres";
    afficher_section($conn, $sql, $titre);
    ?>

    <?php 
    $sql = "SELECT * FROM film ORDER BY Annee_film LIMIT 12;";
    $titre = "Films Classiques";
    afficher_section($conn, $sql, $titre);
    ?>
        
            
        </div>
    </div>

<?php include 'footer.php';
?>
  </html>