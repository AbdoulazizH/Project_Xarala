-- Créer la base de données
CREATE DATABASE gestion_stock;

-- Utiliser la base de données
USE gestion_stock;

-- Créer la table "produits"
CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_produit VARCHAR(255) NOT NULL,
    quantite INT NOT NULL
);
