<?php
$requetePanier = "SELECT  pan_content from panier";
$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';

$connexion= new mysqli("localhost", "root","", "boviet");

$resultPanier = $connexion->query($requetePanier);  

$varPanier = array();

foreach ($resultPanier as $rowPanier) { 
    $varPanier[] = $rowPanier["pan_content"];
}

// Convertir la chaîne JSON en une chaîne PHP
$jsonPanier = $varPanier[0];
$jsonPanier = str_replace('"','\"', $jsonPanier);

// Chemin vers votre script Node.js
$nodeScript = './script.js';

// Exécuter le script Node.js en passant le JSON comme argument
$output = shell_exec("node $nodeScript $jsonPanier");
// echo $jsonPanier;
// echo $output;
header("Location: ./index.php");
?>