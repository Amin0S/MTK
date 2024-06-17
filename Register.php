<?php
    // Inclure le code header.php
    require_once('header.php');
    require_once('connexion.php');
?>
<form action="action_page.php" style="border:1px solid #ccc" class="container">
    <h1 class="text-center">Inscription</h1>
    <p class="text-center">Veuillez remplir ce formulaire pour créer un compte.</p>
    <hr>

    <div class="form-group">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Entrer votre adresse email" name="email" required class="form-control">
    </div>

    <div class="form-group">
        <label for="psw"><b>password</b></label>
        <input type="password" placeholder="Entrer votre mot de passe" name="password" required class="form-control">
    </div>

    <div class="form-group">
        <label for="password-repeat"><b>Confirm Password</b></label>
        <input type="password" placeholder="Répéter votre mot de passe" name="password-repeat" required class="form-control">
    </div>

    <p>En créant un compte, vous acceptez nos <a href="#" style="color:dodgerblue">Conditions générales</a> et notre <a href="#" style="color:dodgerblue">Politique de confidentialité</a>.</p>

    <div class="clearfix">
        <button type="button" class="btn btn-secondary cancelbtn">Annuler</button>
        <button type="submit" class="btn btn-primary signupbtn">S'inscrire</button>
    </div>
</form>

<?php
    // Inclure le code header.php
    require_once('footer.php');
?>