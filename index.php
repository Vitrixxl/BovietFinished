<?php
ob_start();
session_start();

include ("./nav.php");
$host = 'mysql-db';
$user = 'db_devuser';
$pass = 'J&_9VZ8Tej9xk9%';
$db = 'lab_database';

$connexion = new mysqli("localhost", "root", "", "boviet");

if ($connexion->connect_error) {
    die ("Connection failed: " . $connexion->connect_error);
}



if (isset ($_GET['page']) == true) {

    $currentPage = $_GET['page'];

    switch ($currentPage) {
        case 'connect':



            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    include './accueil.php';
                    break;
                }
                include './connectUI.php';
                break;
            } else {
                include './connectUI.php';
                break;
            }

        case 'order';

            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    include './test.php';
                    break;
                }
                include './connectUI.php';
                break;
            } else {
                include './test.php';
                break;
            }

        case 'horaire';

            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    include './horaire.php';
                    break;
                }
                include './connectUI.php';
                break;
            } else {
                include './horaire.php';
                break;
            }

        case 'admin';
            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    if ($_SESSION['admin'] == false) {
                        include './nonAdmin.php';
                        break;
                    } else {

                        include './adminMain.php';
                        break;
                    }
                } else {
                    include './connectUI.php';
                    break;
                }
            } else {
                include './adminMain.php';
                break;
            }


        case 'deco';
            include './deco.php';
            break;


        case 'plat';

            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    include './listPlat.php';
                    break;
                }
                include './connectUI.php';
                break;
            } else {
                include './listPlat.php';
                break;
            }


        case 'panier';
            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    include './affichePanier.php';
                    break;
                }
                include './connectUI.php';
                break;
            } else {
                include './connectUI.php';
                break;
            }
        case 'sendCard';
            if (isset ($_SESSION['connected'])) {
                if ($_SESSION['connected'] == true) {
                    include './sendCard.php';

                } else {
                    include './connectUI.php';

                }
            } else {
                include 'connectUI.php';
            }

    }
} else {
    if (isset ($_SESSION['connected'])) {
        if ($_SESSION['connected'] == true) {
            include './accueil.php';

        } else {
            include './connectUI.php';

        }
    } else {
        include 'connectUI.php';
    }
}


?>

</body>

</html>