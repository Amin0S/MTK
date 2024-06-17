<?php
// Début de session
session_start();

// Fonction pour ajouter un produit au panier
function ajouterAuPanier($produit_id, $quantite) {
    // Vérifier si le panier existe dans la session
    if (!isset($_SESSION['panier'])) {
        // Créer le panier s'il n'existe pas
        $_SESSION['panier'] = array();
    }

    // Vérifier si le produit existe déjà dans le panier
    if (isset($_SESSION['panier'][$produit_id])) {
        // Le produit existe, mettre à jour la quantité
        $_SESSION['panier'][$produit_id] += $quantite;
    } else {
        // Le produit n'existe pas, l'ajouter avec la quantité spécifiée
        $_SESSION['panier'][$produit_id] = $quantite;
    }
}

// Exemple d'utilisation de la fonction ajouterAuPanier
if (isset($_POST['ajouter_au_panier'])) {
    $produit_id = $_POST['produit_id'];
    $quantite = $_POST['quantite'];

    // Appeler la fonction ajouterAuPanier
    ajouterAuPanier($produit_id, $quantite);

    // Redirection vers la page ListeProduit.php après l'ajout au panier
    header("Location: ListeProduit.php");
    exit();
}
?>