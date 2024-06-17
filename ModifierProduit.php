<?php
    // Inclure le code de connexion à la base de données
    require_once('connexion.php');
    require_once('header.php');

    // Vérifier si un produit a été modifié avec succès
    if (isset($_GET['modifie'])) {
        echo "<div class='alert alert-success'>Le produit a été modifié avec succès.</div>";
    }

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs des champs du formulaire
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $image = $_POST["image"];
        $categorie = $_POST["categorie"];
        $avis = $_POST["avis"];
        $prix = $_POST["prix"];

        // Requête de mise à jour du produit dans la base de données
        $requete = "UPDATE produits SET nom='$nom', image='$image', categorie='$categorie', avis='$avis', prix='$prix' WHERE id=$id";

        // Exécution de la requête de mise à jour
        mysqli_query($connexion, $requete);

        // Redirection vers la page ListeProduit.php avec un paramètre pour indiquer la modification réussie
        echo "<script>window.location = 'ListeProduit.php?modifie=1';</script>";
        exit(); // Terminer le script après la redirection
    }

    // Vérifier si l'ID du produit est fourni dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Requête de récupération des informations du produit à modifier
        $requeteProduit = "SELECT * FROM produits WHERE id=$id";

        // Exécution de la requête
        $resultatProduit = mysqli_query($connexion, $requeteProduit);

        // Vérifier si le produit existe dans la base de données
        if (mysqli_num_rows($resultatProduit) > 0) {
            $produit = mysqli_fetch_assoc($resultatProduit);
?>

<!-- Le reste du code HTML pour afficher le formulaire de modification -->
<div class="container">
    <h2>Modifier le produit :</h2>
    <form method="post" action="ModifierProduit.php">
        <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
        <div class="form-group">
            <label for="nom">Nom du produit :</label>
            <input type="text" name="nom" class="form-control" value="<?php echo $produit['nom']; ?>">
        </div>
        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" name="image" class="form-control" value="<?php echo $produit['image']; ?>">
        </div>
        <div class="form-group">
            <label for="categorie">Catégorie :</label>
            <input type="text" name="categorie" class="form-control" value="<?php echo $produit['categorie']; ?>">
        </div>
        <div class="form-group">
            <label for="avis">Avis :</label>
            <input type="text" name="avis" class="form-control" value="<?php echo $produit['avis']; ?>">
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" name="prix" class="form-control" value="<?php echo $produit['prix']; ?>">
        </div>
        <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
    </form>
</div>

<?php
        } else {
            echo "Produit non trouvé.";
        }
    } else {
        echo "ID du produit non spécifié.";
    }
    require_once('footer.php');

?>
