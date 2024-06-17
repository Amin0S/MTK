<?php
    // Inclure le code de connexion à la base de données
    require_once('connexion.php');

    // Vérifier si l'ID du produit à supprimer est spécifié
    if (isset($_GET['id'])) {
        $idProduit = $_GET['id'];

        // Requête SQL pour supprimer le produit correspondant à l'ID spécifié
        $query = "DELETE FROM produits WHERE id = $idProduit";

        // Exécution de la requête
        if (mysqli_query($connexion, $query)) {
            echo "Le produit a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du produit : " . mysqli_error($connexion);
        }
    } else {
        echo "ID du produit non spécifié.";
    }
?>