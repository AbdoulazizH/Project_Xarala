<?php
require_once('config.php'); // Fichier de configuration pour la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_produit = $_POST["nom_produit"];
    $quantite = $_POST["quantite"];
    
    // Vérifier si le produit existe déjà dans la base de données
    $query = "SELECT id, quantite FROM produits WHERE nom_produit = '$nom_produit'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nouvelle_quantite = $row['quantite'] + $quantite;
        $produit_id = $row['id'];
        
        // Mettre à jour la quantité du produit
        $update_query = "UPDATE produits SET quantite = '$nouvelle_quantite' WHERE id = '$produit_id'";
        mysqli_query($conn, $update_query);
    } else {
        // Insérer un nouveau produit dans la base de données
        $insert_query = "INSERT INTO produits (nom_produit, quantite) VALUES ('$nom_produit', '$quantite')";
        mysqli_query($conn, $insert_query);
    }
    
    // Rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock - Enregistrer une Entrée</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 5px;
        }
        .form-container input[type="text"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-container button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestion de Stock</h1>
        <div class="form-container">
            <h2>Enregistrer une entrée</h2>
            <form method="post">
                <input type="text" name="nom_produit" placeholder="Nom du produit" required><br>
                <input type="number" name="quantite" placeholder="Quantité" required><br>
                <button type="submit">Enregistrer l'entrée</button>
            </form>
        </div>
    </div>
    <div class="nav" style="text-align: center; background-color: #f0f0f0; padding: 20px;">
         <a href="enregistrer_sortie.php"  style="display: block; margin-bottom: 10px; text-decoration: none; color: #4B0082;">Enregistrer une sortie</a>
        <a href="verifier_stock.php" style="display: block; margin-bottom: 10px; text-decoration: none; color: #2F4F4F;">Vérifier le stock</a>
    </div>
</body>
</html>
