<?php
session_start(); // Démarre la session
include "connexion.php"; // Inclut le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifie si le formulaire a été soumis
    $login = $_POST["login"];
    $motDePasse = $_POST["motDePasse"];

    $query = "SELECT id, mot_de_passe FROM utilisateurs WHERE login = '$login'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) { // Si le login existe dans la base de données
        $row = $result->fetch_assoc();
        if (password_verify($motDePasse, $row["mot_de_passe"])) { // Vérifie le mot de passe haché
            $_SESSION["user_id"] = $row["id"]; // Enregistre l'ID de l'utilisateur dans la session
            header("Location: session.php"); // Redirige vers la page restreinte
        } else {
            echo "Mot de passe incorrect."; // Affiche un message si le mot de passe est incorrect
        }
    } else {
        echo "Login incorrect."; // Affiche un message si le login est incorrect
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="post" action="">
            Login: <input type="text" name="login"><br>
            Mot de passe: <input type="password" name="motDePasse"><br>
            <input type="submit" value="Se connecter">
        </form>
        <div style="margin-top: 50px;">
            <p>Pas encore de compte ?</p>
            <a href="inscription.php" style="text-decoration: none; color: #007bff;">Créer un compte</a>
        </div>
    </div>

    
    <style>
        body {
            font-family: Arial, serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            background-color: #fff;
            padding: 20px;
            height : 53%;
            padding : 30px 90px 30px 90px;
            border-radius: 8px;
            box-shadow: 10px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2{
            padding : auto;
            text-align: center;
        }
 	    input[type="text"],
        input[type="password"] {
            width: 97%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</body>
</html>
