<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <div class="dropdown">
          <button class="dropbtn">Genre</button>
          <div class="dropdown-content">
            <a href="filtrer.php?critere=genre&g=Action">Action</a>
            <a href="filtrer.php?critere=genre&g=Animation">Animation</a>
            <a href="filtrer.php?critere=genre&g=Comedy">Comedy</a>
            <a href="filtrer.php?critere=genre&g=True+Story">Histoire Vraie</a>
            <a href="filtrer.php?critere=genre&g=Sci-Fi">Science Fiction</a>
            <a href="filtrer.php?critere=genre&g=Drama">Drama</a>

          </div>
        </div>


        <a href="filtrer.php?critere=top">Top IMdB</a>

        <div class="dropdown">
          <button class="dropbtn">Pays</button>
          <div class="dropdown-content">
            <a href="filtrer.php?critere=pays&p=USA">États-Unis</a>
            <a href="filtrer.php?critere=pays&p=Germany">Allemend</a>
            <a href="filtrer.php?critere=pays&p=United+Kingdom">Angleterre</a>
            <a href="filtrer.php?critere=pays&p=France">France</a>
          </div>
        </div>

        <a href="about.php">A propos</a>
      </nav>

  


      <div class="user-options">
        <?php
          if(isset($_SESSION['id'])){
              echo "<a href='profile.php' id='profile'><img width='14px' src='images/profile.png'></img>".$_SESSION['prenom']."</a>";
              echo "<a href='deconnecter.php' id='deconnecter'>Se deconnecter</a>";
          }else{
              echo "<a href='signup.php' id='sign-up'>S'enregistrer </a>";
          }
              
        ?>
      </div>
      
    </header>