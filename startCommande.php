<?php
$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';

$connexion = new mysqli("localhost", "root", "", "boviet");





$insertNewCard = "UPDATE panier set pan_content = '[{}]';";
$deleteHSTCard = "DELETE from histo_panier";
$sessionCommande=  "UPDATE current_pan set pan_actif=1";
$connexion->query($insertNewCard);
$connexion->query($deleteHSTCard);
$connexion->query($sessionCommande);
echo'done';

