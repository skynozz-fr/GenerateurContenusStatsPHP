# Guide de configuration de la base de données

## Étape 1 : Configuration du fichier `database.php`

1. Ouvrez le fichier `database.php` dans un éditeur de texte de votre choix.

2. Remplacez les valeurs par défaut par vos propres informations d'identification de base de données. Par exemple :

   ```php
   <?php

   const DB_NAME = 'votre_base_de_donnees';
   const DB_HOST = 'votre_hote_de_base_de_donnees';
   const DB_PORT = 3306; // Modifiez le port si nécessaire
   const DB_USERNAME = 'votre_nom_utilisateur';
   const DB_PASSWORD = 'votre_mot_de_passe';
   
## Étape 2 : Importation du fichier `dump.sql`

1. Copiez le fichier dump.sql dans le répertoire SQL de votre projet.

2. Importez le dump.sql dans votre base de données. 
