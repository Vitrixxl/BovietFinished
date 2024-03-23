<?php
session_start();
$boolDel = false;   
if (isset ($_POST["idDelete"])) {
    $delId = $_POST['idDelete'];
    $panierdel = $_SESSION['panier'];
    foreach ($panierdel as $platKey => $platValue) {
        if ($platValue['id'] == $delId) {

            unset($_SESSION['panier'][$platKey]);
            echo 'deleted';
            $boolDel = true;    
        } else {

        }
        if ($boolDel==true){
            break;
        }
    }
}