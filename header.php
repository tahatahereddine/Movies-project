<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_home.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <script src="js/bootstrap.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <title>MoviFlix</title>
  </head>

  <body>
    <header class="header">
      <a href="index.php" class="logo">MovieFlix</a>

      <nav class="navbar">
        <a href="index.php"">Acceuil</a>
        <a href="filtrer.php?critere=genre">Genre</a>
        <a href="filtrer.php?critere=genre">Top IMdB</a>
        <a href="filtrer.php?critere=genre">Pays</a>
        <a href="filtrer.php?critere=genre">About</a>
      </nav>

      <div class="user-options">
        <?php
          if(isset($_SESSION['id'])){
              echo "<a href='profile.php' id='profile'>".$_SESSION['prenom']."</a>";
              echo "<a href='deconnecter.php' id='deconnecter'>Se deconnecter</a>";
          }else{
              echo "<a href='signup.php' id='sign-up'>S'enregistrer </a>";
          }
              
        ?>
      </div>
      
    </header>