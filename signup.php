<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/signup.css" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>S'enregistrer</title>
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
        <header>Signup</header>
        <form action="process.php" method="post">
          <input type="text" name="nom" placeholder="Nom" required />
          <input type="text" name="prenom" placeholder="Prénom" required />
          <input type="email" name="email" placeholder="Adresse Email" autocomplete="false" required />
          <input type="password" name="password" placeholder="Mot de passe" autocomplete="false" required />
          <input type="date" name="date_naiss" placeholder="Date de naissance" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" required />
            <label for="signupCheck">J'accepte les termes et les conditions</label>
          </div>
          <input type="submit" name="signup" id="sign-up-button" value="S'inscrire" />
        </form>
      </div>

      <div class="form login">
        <header>Login</header>
        <br><br>
        <form action="process.php" method="post">
          <input type="email" name="email" placeholder="Adresse Email" required />
          <input type="password" name="password" placeholder="Mot de passe" required />
          <input type="submit" name="signin" id="login-in-button" value="Se connecter" />
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
  </body>
</html>
