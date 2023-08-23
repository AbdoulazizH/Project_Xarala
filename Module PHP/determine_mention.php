<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détermination de Mention</title>
    <!-- Inclusion des fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-capitalize">Calcul de la Mention</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="moyenne" class="form-label">Moyenne Générale au Baccalauréat</label>
                <input type="number" step="0" class="form-control" id="moyenne" name="moyenne" required>
            </div>
            <button type="submit" class="btn btn-primary text-center">Calculer de la mention d'un élève en école de niveau confondu la Mention</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $moyenne = $_POST["moyenne"];
                $decision = ($moyenne >= 10) ? "Admis" : "Éliminé";

                if ($moyenne >= 17) {
                    $mention = "Excellent";
                    $mentionColor = "success";
                } elseif ($moyenne >= 16) {
                    $mention = "Très Bien";
                    $mentionColor = "info";
                } elseif ($moyenne >= 14) {
                    $mention = "Bien";
                    $mentionColor = "primary";
                } elseif ($moyenne >= 12) {
                    $mention = "Assez Bien";
                    $mentionColor = "warning";
                } elseif ($moyenne >= 10) {
                    $mention = "Passable";
                    $mentionColor = "danger";
                } else {
                    $mention = "Non attribuée";
                    $mentionColor = "secondary";
                }
        ?>

        <div class="mt-4">
            <h2>Résultats de l'élève</h2>
            <p><strong>Moyenne :</strong> <?php echo $moyenne; ?></p>
            <p><strong>Décision :</strong> <?php echo $decision; ?></p>
            <p><strong>Mention :</strong> <span class="badge bg-<?php echo $mentionColor; ?> fs-6"><?php echo $mention; ?></span></p>
        </div>
        <?php } ?>
    </div>

    <style>
            body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }
        
        .form-label {
            font-weight: bold;
        }
        
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>

    <!-- Inclusion des scripts JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
