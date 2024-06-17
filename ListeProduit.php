<?php
    // Inclure le code de connexion à la base de données
    require_once('connexion.php');
    require_once('header.php');

    // Vérifier si un produit a été supprimé avec succès
    if (isset($_GET['supprime'])) {
        echo "<div class='alert alert-success'>Le produit a été supprimé avec succès.</div>";
    }

    // Vérifier si un produit a été modifié avec succès
    if (isset($_GET['modifie'])) {
        echo "<div class='alert alert-success'>Le produit a été modifié avec succès.</div>";
    }

    // Requête de récupération des produits depuis la base de données
    $requeteProduits = "SELECT * FROM produits";

    // Exécution de la requête
    $resultatProduits  = mysqli_query($connexion, $requeteProduits);

    // Vérifier s'il y a des produits
    if (mysqli_num_rows($resultatProduits ) > 0) {
       // Afficher les produits
       while ($produit  = mysqli_fetch_assoc($resultatProduits)) {
          echo "<div class='card'>";
          echo "<div class='card-body'>";
          echo "<h5 class='card-title'>Produit ID : " . $produit['id'] . "</h5>";
          echo "<p class='card-text'><strong>Nom du produit :</strong> " . $produit['nom'] . "</p>";
          echo "<p class='card-text'><strong>Image de produit :</strong><img src='img/" . $produit['image'] . "' class='card-img-top' alt='Image du produit'>";
          echo "<p class='card-text'><strong>Catégorie :</strong> " . $produit['categorie'] . "</p>";
          echo "<p class='card-text'><strong>Avis :</strong> " . $produit['avis'] . "</p>";
          echo "<p class='card-text'><strong>Prix :</strong> " . $produit['prix'] . "</p>";

          // Bouton de suppression
          echo "<a class='btn btn-danger' href='SupprimerProduit.php?id=" . $produit['id'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce produit ?\")'>Supprimer</a>";

          // Bouton de modification
          echo "<a class='btn btn-primary' href='ModifierProduit.php?id=" . $produit['id'] . "'>Modifier</a>";

          echo "</div>";
          echo "</div>";
          echo "<br>";
          echo "<hr>";
       }
    } else {
       echo "Aucun produit trouvé.";
    }

    // Inclure le code footer.php
    require_once('footer.php');
?>