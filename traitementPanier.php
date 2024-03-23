<?php
session_start();
if (isset ($_POST['jsonData'])) {
    $platJS = json_decode($_POST['jsonData'], true);
    $currentID = $platJS['id'];
    $plat = array("id" => $currentID);
    $i = 1;
    
    while (isset ($platJS[$i])) {

        $plat["$i"] = $platJS[$i];

        $i++;
    }
    

    if (isset ($_SESSION["panier"])) {
        if (!is_array($_SESSION["panier"])) {
            $_SESSION["panier"] = array();
        }
    } else {
        $_SESSION["panier"] = array();
    }


    array_push($_SESSION["panier"], $plat);
    echo'Article ajouté au panier !';
}
