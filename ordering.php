<?php
session_start();

$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';

$connexion= new mysqli("localhost", "root","", "boviet");

if ($connexion->connect_error) {
    die("Connection failed: " . $connexion->connect_error);
}
$order = $_POST['order'];
$requeteOrder = "INSERT INTO `order` (ord_content,usr_id) values ('$order',$usr_id)";

if ($order != '') {
    $connexion->query($requeteOrder);
    header("Location: index.php?page=order&done=1"); 
}