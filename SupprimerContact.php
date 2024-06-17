<?php
    // Inclure le code connexion.php
    require_once('connexion.php');

    // Vérifier si l'ID du contact est passé en paramètre dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Requête de suppression du contact
        $requete = "DELETE FROM contacts WHERE id = '$id'";

        // Exécution de la requête
        if (mysqli_query($connexion, $requete)) {
            echo "<script>alert('Le contact a été supprimé avec succès.');</script>";
        } else {
            echo "<script>alert('Erreur lors de la suppression du contact. Veuillez réessayer plus tard.');</script>";
        }
    }

    // Redirection vers la page ListeContact.php
    header("Location: ListeContact.php");
    exit();
?>