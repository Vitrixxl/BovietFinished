<?php 

session_start();

// Initialisez ou récupérez le contenu du panier
if(isset($_SESSION["panier"])) {
    $panier = $_SESSION["panier"];
} else {
    $panier = array();
}

// Renvoyer le contenu du panier au format JSON
header('Content-Type: application/json');
echo json_encode($panier);
?>


