<?php 

    session_start();
    $_SESSION['panier']=null;
    header("Location: index.php?page=panier");

?>
