<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/style_home.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>MoviFlix</title>
  </head>

  <body>
    <header class="header">
      <a href="#" class="logo">MovieFlix</a>

      <nav class="navbar">
        <a href="index.php"">Acceuil</a>
        <a href="#">Genre</a>
        <a href="#">Top IMdB</a>
        <a href="#">Pays</a>
        <a href="#">About</a>
      </nav>
      <?php
        if(isset($_SESSION['loggedin'])){
            echo "<a href='profile.php' id='sign-up'>".$_SESSION['prenom']."</a>";
        }else{
            echo "<a href='signup.php' id='sign-up'>S'enregistrer </a>";
        }
            
      ?>
      
    </header>