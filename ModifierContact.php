<?php
    // Inclure le code de connexion
    require_once('connexion.php');
    require_once('header.php');

    // Vérifier si l'ID du contact est passé en paramètre dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Récupérer les informations du contact à partir de la base de données
        $requete = "SELECT * FROM contacts WHERE id = '$id'";
        $resultat = mysqli_query($connexion, $requete);

        // Vérifier si le contact existe
        if (mysqli_num_rows($resultat) > 0) {
            $row = mysqli_fetch_assoc($resultat);

            // Afficher le formulaire de modification avec les informations du contact pré-remplies
            echo "<form method='POST' action='TraitementModificationContact.php'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<div class='form-group'>";
            echo "<label for='nom'>Nom :</label>";
            echo "<input type='text' name='nom' value='" . $row['nom'] . "' class='form-control' id='nom'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='login'>Login :</label>";
            echo "<input type='text' name='login' value='" . $row['login'] . "' class='form-control' id='login'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='telephone'>Téléphone :</label>";
            echo "<input type='text' name='telephone' value='" . $row['telephone'] . "' class='form-control' id='telephone'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='localisation'>Localisation :</label>";
            echo "<input type='text' name='localisation' value='" . $row['localisation'] . "' class='form-control' id='localisation'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='email'>Email :</label>";
            echo "<input type='email' name='email' value='" . $row['email'] . "' class='form-control' id='email'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='typemsg'>Type de message :</label>";
            echo "<input type='text' name='typemsg' value='" . $row['typemsg'] . "' class='form-control' id='typemsg'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='message'>Message :</label>";
            echo "<textarea name='message' class='form-control' id='message'>" . $row['message'] . "</textarea>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Modifier</button>";
            echo "</form>";
        } else {
            echo "<div class='alert alert-danger'>Le contact n'existe pas.</div>";
        }
    }
?>

<?php
    require_once('footer.php');
?>