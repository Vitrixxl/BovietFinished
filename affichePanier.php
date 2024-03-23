<?php
$panier = [];


$panier = $_SESSION['panier'];
$username = $_SESSION['username'];
$chemin_fichier_json = './plat.json';
$contenu_json = file_get_contents($chemin_fichier_json);
$data = json_decode($contenu_json, true);
?>
<div class="panierContainer">
    <img src='images/meal2.webp' alt='' class='panBackground'>
    <span class="bgCoverPanier"></span>


    <div class="cartContainer">
        <div class="switchDiv">
            <h1 class='welcomeMaster'>Bienvenue grand maitre vietenamien !</h1>
        </div>
        <?php
        if (isset ($_SESSION['admin']) && $_SESSION['admin'] == true) {
            echo "<a onclick='adminTransi()' class='gotoAdmin'>Administration</a>";
        }
        ?>
        <div class="cartTitle">

            <?php echo "<h1 class='cartTitre'>Bienvenue $username voici ta commande :</h1>" ?>
        </div>
        <div class="globalCartContainer">
            <span class="bottomCover"></span>
            <?php

            $bool_actif = false;
            $host = 'mysql-db';
            $user = 'db_devuser';
            $pass = 'J&_9VZ8Tej9xk9%';
            $db = 'lab_database';

            $connexion = new mysqli("localhost", "root", "", "boviet");
            $verifActif = $connexion->query("SELECT pan_actif from current_pan");
            foreach ($verifActif as $key) {
                if ($key['pan_actif'] == true) {
                    $bool_actif = true;
                }
            }
            if ($bool_actif == true) {
                $select = "SELECT usr_login, hpn_content from histo_panier inner join user on histo_panier.usr_id=user.usr_id";
                $result = $connexion->query($select);

                foreach ($result as $row) {
                    $name = $row['usr_login'];
                    echo "<div class='uCartContainer'><h3>Commande de $name</h3>";
                    $contentArray = explode("|", $row["hpn_content"]);
                    foreach ($contentArray as $content) {
                        echo $content . "<br>" . "<br>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<h2 style='color:white;'>Voulez vous lancer une commande ?</h2>";
            }
            ?>
        </div>
        <div class="cartContent">

            <span class="topCover"></span>
            <span class="bottomCover"></span>
            <?php
            unset($data[" "]);
            if (isset ($panier) && count($panier) != 0) {
                foreach ($panier as $PANIER => $plat) {
                    $optArray = [];
                    foreach ($plat as $key => $value) {
                        if ($key != "id") {
                            array_push($optArray, $value);
                        }

                    }
                    echo "<div class='contentLine'><h4>";
                    $currentID = $plat['id'];
                    $platJson = trouverPlatParId($currentID, $data);
                    $_SESSION['hsp_content'] = $_SESSION['hsp_content'] . $platJson['nom'] . ' ';
                    echo $platJson['nom'] . ' ';
                    $i = 0;

                    if (isset ($platJson['option'])) {
                        foreach ($platJson['option'] as $optionSection => $value) {
                            $currentChoix = $optArray[$i];
                            echo $value['opt' . $currentChoix] . ' ';
                            $_SESSION['hsp_content'] = $_SESSION['hsp_content'] . $value['opt' . $currentChoix] . ' ';
                            $i++;
                        }
                    }

                    echo "</h4><button onclick='deleteEl($currentID,this)' class ='removeBtn'><span class='iconRemove'>-</span></button></div>";
                    $_SESSION['hsp_content'] = $_SESSION['hsp_content'] . '|';
                }
            } else {
                echo "<h2 class='oups' style='text-align:center; color:white;justify-self:center;'>Il semblerait que votre panier soit vide...</h2>";
            }




            ?>
        </div>
        <div class="cartAction">
            <button class="cartValid" onclick='sendCard()'><?php if(count($_SESSION['panier'])==0){echo'Par ici !';}else{echo'Valider le panier';}?></button>
            <?php 
                if ($bool_actif==true){
                    echo "<button class='codeCopy' onclick='copyGitPull()'>Update Script</button> <button class='codeCopy' onclick='copyCommand()'>Code Commande</button>";
                }else{
                    echo "<button class='codeCopy' onclick='sessionStart()'>C'est parti !</button>";
                }
            
            ?>
            
        </div>

    </div>
    <?php

    function trouverPlatParId($id, $data)
    {

        foreach ($data['plat']['avecOption'] as $section) {
            foreach ($section as $platJSON) {
                if ($platJSON['id'] == $id) {
                    return $platJSON;
                }
            }
        }
        foreach ($data['plat']['sansOption'] as $section) {
            foreach ($section as $platJSON) {
                if ($platJSON['id'] == $id) {
                    return $platJSON;
                }
            }
        }
        // Retourner null si le plat n'est pas trouvé
        return null;
    }



    ?>

    <!-- <div style="display: flex; gap:10px;">
    <form action="deletePanier.php">
        <input type="submit" value="Vider votre panier">
    </form>
    <form action="sendCard.php">
        <input type="submit" value="Valider">
    </form>
</div> -->
</div>
</div>
<script type='text/javascript' src="panier.js"></script>