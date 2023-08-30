<?php
include "connexion.php"; // Inclut le fichier de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifie si le formulaire a été soumis
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $motDePasse = password_hash($_POST["motDePasse"], PASSWORD_BCRYPT); // Hache le mot de passe

    // Vérification si le login existe déjà
    $checkQuery = "SELECT id FROM utilisateurs WHERE login = '$login'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows == 0) { // Si le login n'existe pas déjà
        $insertQuery = "INSERT INTO utilisateurs (nom, prenom, login, mot_de_passe) VALUES ('$nom', '$prenom', '$login', '$motDePasse')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Inscription réussie !"; // Affiche un message de succès
            header("Location: login.php"); // Redirige vers la page de connexion après l'inscription
            exit();
        } else {
            echo "Erreur : " . $conn->error; // Affiche une erreur en cas de problème avec la requête SQL
        }
    } else {
        echo "Ce login existe déjà."; // Affiche un message si le login existe déjà dans la base de données
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form method="post" action="">
            Nom: <input type="text" name="nom"><br>
            Prénom: <input type="text" name="prenom"><br>
            Login: <input type="text" name="login"><br>
            Mot de passe: <input type="password" name="motDePasse"><br>
            Confirmer mot de passe: <input type="password" name="confirmation"><br>
            <input type="submit" value="S'inscrire">
        </form>
        <div>
            <p>Vous avez un compte ?</p>
            <a href="login.php" 
                style="text-decoration: none;
                    text-align : center;
                    color: #007bff;
                    background-color: #0bff;
                    color: #fff;
                    margin-top: 40px;
                    border: none;
                    padding: 10px 10px;
                    border-radius: 4px;
                    cursor: pointer;">Se connecter</a> <!-- Lien vers la page de connexion -->
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            weight : 100%;
            height : 80%;
            padding : 30px 90px 30px 90px;
        }
        .container h2{
            text-align : center;
            text-transform : uppercase;
            color: #342030;
        }
	    input[type="text"],
        input[type="password"] {
            width: 98%;
            padding: 10px ;
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
