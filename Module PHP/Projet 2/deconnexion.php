<?php
// La session de déconnexion de la page de connexion de l'utilisateur

session_start(); // Démarre la session
session_destroy(); // Détruit la session
header("Location: login.php"); // Redirige vers la page de connexion
?>
