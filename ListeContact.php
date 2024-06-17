<?php
require_once('connexion.php');
require_once('header .php');
?>

<h2>Liste des contacts :</h2>

<?php
if (isset($_POST['nom']) && isset($_POST['login']) && isset($_POST['telephone']) && isset($_POST['localisation']) && isset($_POST['email']) && isset($_POST['typemsg']) && isset($_POST['message'])) {
    // Récupérer les données de l'URL
    $nom = $$_POST['nom'];
    $login = $_POST['login'];
    $telephone = $_POST['telephone'];
    $localisation = $_POST['localisation'];
    $email = $_POST['email'];
    $typemsg = $_POST['typemsg'];
    $message = $_POST['message'];

    // Afficher les données ajoutées
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Nouveau contact ajouté :</h5>";
    echo "<p class='card-text'><strong>Nom :</strong> " . $nom . "</p>";
    echo "<p class='card-text'><strong>Login :</strong> " . $login . "</p>";
    echo "<p class='card-text'><strong>Téléphone :</strong> " . $telephone . "</p>";
    echo "<p class='card-text'><strong>Localisation :</strong> " . $localisation . "</p>";
    echo "<p class='card-text'><strong>Email :</strong> " . $email . "</p>";
    echo "<p class='card-text'><strong>Type de message :</strong> " . $typemsg . "</p>";
    echo "<p class='card-text'><strong>Message :</strong> " . $message . "</p>";

    // Bouton de suppression
    echo "<a class='btn btn-danger' href='SupprimerContact.php?id=" . $contact['id'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce contact ?\")'>Supprimer</a>";

    // Bouton de modification
    echo "<a class='btn btn-primary' href='ModifierContact.php?id=" . $contact['id'] . "'>Modifier</a>";

    echo "</div>";
    echo "</div>";
    echo "<br>";
    echo "<hr>";
    
}
// Requête de récupération des contacts depuis la base de données
$requeteContacts = "SELECT * FROM contact";

// Exécution de la requête
$resultatContacts = mysqli_query($connexion, $requeteContacts);

// Vérifier s'il y a des contacts
if (mysqli_num_rows($resultatContacts) > 0) {
   // Afficher les contacts
   while ($contact = mysqli_fetch_assoc($resultatContacts)) {
      echo "<div class='card'>";
      echo "<div class='card-body'>";
      echo "<h5 class='card-title'>Contact ID : " . $contact['id'] . "</h5>";
      echo "<p class='card-text'><strong>Nom :</strong> " . $contact['nom'] . "</p>";
      echo "<p class='card-text'><strong>Login :</strong> " . $contact['login'] . "</p>";
      echo "<p class='card-text'><strong>Téléphone :</strong> " . $contact['telephone'] . "</p>";
      echo "<p class='card-text'><strong>Localisation :</strong> " . $contact['localisation'] . "</p>";
      echo "<p class='card-text'><strong>Email :</strong> " . $contact['email'] . "</p>";
      echo "<p class='card-text'><strong>Type de message :</strong> " . $contact['typemsg'] . "</p>";
      echo "<p class='card-text'><strong>Message :</strong> " . $contact['message'] . "</p>";

      // Bouton de suppression
      echo "<a class='btn btn-danger' href='SupprimerContact.php?id=" . $contact['id'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce contact ?\")'>Supprimer</a>";

      // Bouton de modification
      echo "<a class='btn btn-primary' href='ModifierContact.php?id=" . $contact['id'] . "'>Modifier</a>";

      echo "</div>";
      echo "</div>";
      echo "<br>";
      echo "<hr>";
   }
} else {
   echo "Aucun contact trouvé.";
}

// Inclure le code footer.php
require_once('footer.php');
?>