<?php
    // Inclure le code header.php
    require_once('header.php');
?>

<h1>Dashboard</h1>

<?php
    session_start();

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['login_user'])) {
        $username = $_SESSION['login_user'];
        echo '<p>Bienvenue, ' . $username . ' !</p>';
        // Autres informations et fonctionnalités du tableau de bord
    } else {
        // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
        header("Location: connexion.php");
    }
?>

<?php
    // Inclure le code footer.php
    require_once('footer.php');
?>