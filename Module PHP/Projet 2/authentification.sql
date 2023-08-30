-- Création de la base de données
CREATE DATABASE authentification;

-- Utilisation de la base de données
USE authentification;

-- Création de la table utilisateurs
CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
);
