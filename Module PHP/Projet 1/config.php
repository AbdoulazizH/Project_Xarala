<?php
$hostname = "localhost"; // Nom d'hôte de la base de données
$username = "root"; // Nom d'utilisateur de la base de données
$password = ""; // Mot de passe 
$database = "gestion_stock"; // Nom de la base de données

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}
?>
