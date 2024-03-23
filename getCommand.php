<?php

$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';

$connexion = new mysqli("localhost", "root", "", "boviet");
$commande = $connexion->query("SELECT * from panier");
foreach ($commande as $rowJ) {
    $pan_content = str_replace('"', '\\"', $rowJ["pan_content"]);
    // echo  $pan_content;
    $shellCommande = "cd \\Users\\CANDAS ; cd .\\Desktop\\DOC\\VS_Code\\vraiRepoViet\\boviet ; node ./script " . "'$pan_content'";
    // echo  $shellCommande;
    echo $shellCommande;
}