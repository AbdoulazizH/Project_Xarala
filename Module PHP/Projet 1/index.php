<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .nav {
            margin-bottom: 20px;
            text-align: center;
        }
        .nav a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 20px;
            color: #fff;
            background-color: #007BFF;
            border-radius: 5px;
            text-decoration: none;
        }
        .container h1{
            padding: 20px;
            margin-bottom: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>GESTION DE STOCK DE MAGASIN XamXam 🏬</h1>
        <div class="nav">
            <a href="enregistrer_entree.php" style="background: #008B8B;">Enregistrer une entrée</a>
            <a href="enregistrer_sortie.php" style="background: #4B0082;">Enregistrer une sortie</a>
            <a href="verifier_stock.php"  style="background: #2F4F4F;">Vérifier le stock</a>
        </div>
    </div>
</body>
</html>
