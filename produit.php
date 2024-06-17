<?php
    // Inclure le code de connexion à la base de données
    require_once('connexion.php');
    require_once('header.php');

    // Traitement du formulaire lorsque l'utilisateur soumet le formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs des champs du formulaire
        $nom = $_POST["nom"];
        $image = $_FILES["image"]["name"];
        $categorie = $_POST["categorie"];
        $avis = $_POST["avis"];
        $prix = $_POST["prix"];

        // Vérifier si le répertoire de destination existe
        $destination = "images/" . basename($image);
        if (!is_dir("images")) {
            mkdir("images"); // Créer le répertoire s'il n'existe pas
        }

        // Déplacer le fichier d'image téléchargé vers le dossier de destination
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            // Requête d'insertion du produit dans la base de données
            $requeteInsertion = "INSERT INTO produits (nom, image, categorie, avis, prix) VALUES ('$nom', '$image', '$categorie', '$avis', $prix)";
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    }
?>

<!-- Votre code HTML pour le formulaire d'ajout de produit ici -->
<h2>Ajouter un produit :</h2>
<form method="POST" action="ListeProduit.php">
    <div class="form-group">
        <label>Nom du produit :</label>
        <input type="text" name="nom" class="form-control" placeholder="Entrer le nom du produit" required>
    </div>
    <div class="form-group">
        <label>Image :</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Catégorie :</label>
        <input type="text" name="categorie" class="form-control" placeholder="Entrer la catégorie du produit" required>
    </div>
    <div class="form-group">
        <label>Avis :</label>
        <input type="text" name="avis" class="form-control" placeholder="Entrer l'avis sur le produit" required>
    </div>
    <div class="form-group">
        <label>Prix :</label>
        <input type="number" name="prix" class="form-control" placeholder="Entrer le prix du produit" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php
    // Inclure le code footer.php
    require_once('footer.php');
?>