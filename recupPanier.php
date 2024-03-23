<?php
session_start();    
$panier=$_SESSION['panier'];
header('Content-Type: application/json');
echo json_encode($panier);