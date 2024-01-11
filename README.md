## Configuration de la base de données

1. Ouvrez le fichier `database.php` dans un éditeur de texte de votre choix.

2. Remplacez les valeurs par défaut par vos propres informations d'identification de base de données. Par exemple :
```php
<?php

const DB_NAME = 'votre_base_de_donnees';
const DB_HOST = 'votre_hote_de_base_de_donnees';
const DB_PORT = 3306; // Modifiez le port si nécessaire
const DB_USERNAME = 'votre_nom_utilisateur';
const DB_PASSWORD = 'votre_mot_de_passe';
