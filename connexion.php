<?php
session_start();
?>
<?php

if (isset($_POST['username']) && isset($_POST['psw'])) {
    $host = 'mysql-db';
    $user = 'db_devuser';
    $pass = 'J&_9VZ8Tej9xk9%';
    $db = 'lab_database';

    $connexion= new mysqli("localhost", "root","", "boviet");

    if ($connexion->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $typedPsw = $_POST['psw'];

    $connectRequete = "SELECT USR_ID,USR_PSW, USR_ADMIN FROM user WHERE USR_LOGIN='$username'";
    $resultVerif = $connexion->query($connectRequete);
    foreach ($resultVerif as $psw) {

        if (password_verify($typedPsw, $psw['USR_PSW']) == true) {
            $_SESSION['id'] = $psw['USR_ID'];
            $_SESSION["username"] = $username;
            $_SESSION["connected"] = true;
            $_SESSION['panier']=array();    
            if ($psw['USR_ADMIN'] == 1) {
                $_SESSION["admin"] = true;
                header("Location: index.php?page=admin");
            } else {
                $_SESSION["admin"] = false;
                header("Location: index.php?page=order");
            }

        }
    }
} else {
    echo "<script type='text/javascript'> alert('Veuillez rentrer un mot de passe et un nom d'utilisateur correct')</script>";
}