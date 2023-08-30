<?php
session_start(); // Démarre la session

if (!isset($_SESSION["user_id"])) { // Vérifie si l'utilisateur est authentifié
    header("Location: login.php"); // Redirige vers la page de connexion si non authentifié
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Restreinte</title>
</head>
<body>
    <h2>Bienvenue sur la page restreinte</h2>
    <p>Ceci est le contenu accessible uniquement aux utilisateurs authentifiés.</p>
    <a href="deconnexion.php">Se déconnecter</a> <!-- Lien pour se déconnecter -->
</body>
</html>
