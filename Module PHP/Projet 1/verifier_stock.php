<?php
require_once('config.php'); // Fichier de configuration pour la connexion à la base de données

// Sélectionner tous les produits depuis la base de données
$query = "SELECT * FROM produits";
$result = mysqli_query($conn, $query);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock - Vérifier le Stock</title>
    <link rel="stylesheet" href="styles.css">
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
        .table-container {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestion de Stock</h1>
        <div class="table-container">
            <table>
                <tr>
                    <th>Nom du produit</th>
                    <th>Quantité en stock</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nom_produit'] . "</td>";
                    echo "<td>" . $row['quantite'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    <div class="nav" style="text-align: center; background-color: #f0f0f0; padding: 20px;">
        <a href="enregistrer_entree.php" style="display: block; margin-bottom: 10px; text-decoration: none; color: #008B8B; border:20px;">Enregistrer une entrée</a>
        <a href="enregistrer_sortie.php" style="display: block; margin-bottom: 10px; text-decoration: none; color: #FF7F50;">Enregistrer une sortie</a>
    </div>
</body>
</html>

