<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viet</title>
    <link rel="stylesheet" href="style.css?10">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Angkor&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/banco" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/super-easy" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/natural-precision" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/jmh-ss" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/romero" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>







</head>

<body>
    <button onclick="backTransi()" class="backButton">
        <</button>
            <nav>

                <div class="option">
                    <a <?php if (isset ($_SESSION['connected']) && $_SESSION['connected'] == true) {
                        echo "onclick='transiOrder()'";
                    } ?>>Commander</a>



                    <a href="index.php">Boviet</a>
                    
                    
                    <a <?php if(isset($_SESSION["connected"]) && $_SESSION["connected"] == true) {
                        
                        echo "onclick='transiCart()'";
                        
                    }else{
                        echo "href='index.php?page=connect'";
                    }  ?> class="navPanier">Mon Compte<span class="nbPanier">
                           <?php
                            if(isset($_SESSION["panier"])){
                                if (count($_SESSION["panier"]) != 0) {
                                    echo count($_SESSION["panier"]);
                                } else {
                                    echo "0";
                                }
                            }else{
                                echo "0";
                            }
                            ?>
                        </span>
                    </a>

                </div>

            </nav>
            <script type="text/javascript" src="./index.js"></script>