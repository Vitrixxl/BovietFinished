<?php
// session_start();
$chemin_fichier_json = './plat.json';
$contenu_json = file_get_contents($chemin_fichier_json);
$data = json_decode($contenu_json, true);

if (isset ($_GET['insert'])) {
    echo "<script type='text/javascript'> alert('Article ajouté au panier !')</script>";
}
if (isset ($_GET['plat'])) {
    if ($_GET['plat'] == "plat") {
        echo "<div class='gigaContainer containPlat'>";
        echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
        echo "<div class='platContainer'>";
        foreach ($data['plat']['avecOption']['platEntier'] as $plat) {
            echo "<div class='cardPlatmargin platPlat'>";
            $id = $plat['id'];
            echo "<div class='cardPlat' id='id".$id."'>";
            $nom = $plat['nom'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i = 1;
            echo "<div class='optionContainer'>";
            foreach ($options as $option => $choix) {
                echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii = 1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
            echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
            echo "</div>";
            echo "</div>";
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } elseif ($_GET['plat'] == "entree") {
        
            echo "<div class='gigaContainer containEntree'>";
            echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
            echo "<div class='platContainer'>";
            foreach ($data['plat']['avecOption']['entree'] as $plat) {
                echo "<div class='cardPlatmargin platEntree'>";
                $id = $plat['id'];
                echo "<div class='cardPlat' id='id".$id."'>";
                $nom = $plat['nom'];
                $options = $plat['option'];
                echo "<h3 style='text-decoration:underline;'>$nom</h3>";
                $i = 1;
                echo "<div class='optionContainer'>";
                foreach ($options as $option => $choix) {
                    echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                    echo "<select name='$i' id='$id'>";
                    if (is_array($choix)) {
                        $ii = 1;
                        foreach ($choix as $lib) {
                            echo "<option value='$ii'>$lib</option>";
                            $ii++;
                        }
                        echo "</select></div>";
                    } else {
                        echo $choix;
                    }
                    $i++;
                }
                echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
                echo "</div>";
                echo "</div>";
                echo '</div>';
        }
        foreach ($data['plat']['sansOption']['entree'] as $platS) {
            echo "<div class='cardPlatmargin platEntree'>";
            echo "<div class='cardPlat'>";
            $nomS = $platS['nom'];
            $idS = $platS['id'];
            echo "<h3 style='text-decoration:underline;'>$nomS</h3>";
            echo "<button onclick='addToCart($idS)' class='addToCart'>Ajouter</button></div></div>";
        }
    
        echo '</div></div></div>';
        
    } elseif ($_GET['plat'] == 'viandes') {

        echo "<div class='gigaContainer containViande'>";
        echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
        echo "<div class='platContainer'>";
        foreach ($data['plat']['avecOption']['viandes'] as $plat) {
            echo "<div class='cardPlatmargin platViande'>";
            $id = $plat['id'];
            echo "<div class='cardPlat' id='id".$id."'>";
            $nom = $plat['nom'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i = 1;
            echo "<div class='optionContainer'>";
            foreach ($options as $option => $choix) {
                echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii = 1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
            echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
            echo "</div>";
            echo "</div>";
            echo '</div>';
    }
    foreach ($data['plat']['sansOption']['viandes'] as $platS) {
        echo "<div class='cardPlatmargin platViande'>";
        echo "<div class='cardPlat'>";
        $nomS = $platS['nom'];
        $idS = $platS['id'];
        echo "<h3 style='text-decoration:underline;'>$nomS</h3>";
        echo "<button onclick='addToCart($idS)' class='addToCart'>Ajouter</button></div></div>";
    }

    echo '</div></div></div>';
    } elseif ($_GET['plat'] == 'poissons') {

        echo "<div class='gigaContainer containPoisson'>";
        echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
        echo "<div class='platContainer'>";
        foreach ($data['plat']['avecOption']['poisson'] as $plat) {
            echo "<div class='cardPlatmargin platPoisson'>";
            $id = $plat['id'];
            echo "<div class='cardPlat' id='id".$id."'>";
            $nom = $plat['nom'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i = 1;
            echo "<div class='optionContainer'>";
            foreach ($options as $option => $choix) {
                echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii = 1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
            echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
            echo "</div>";
            echo "</div>";
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } elseif ($_GET['plat'] == "accompagnement") {
        echo "<div class='gigaContainer containPlat'>";
        echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
        echo "<div class='platContainer'>";
        foreach ($data['plat']['avecOption']['accompagnement'] as $plat) {
            echo "<div class='cardPlatmargin platPlat'>";
            $id = $plat['id'];
            echo "<div class='cardPlat' id='id".$id."'>";
            $nom = $plat['nom'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i = 1;
            echo "<div class='optionContainer'>";
            foreach ($options as $option => $choix) {
                echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii = 1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
            echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
            echo "</div>";
            echo "</div>";
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } elseif ($_GET['plat'] == "desserts") {
        echo "<div class='gigaContainer containPlat'>";
        echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
        echo "<div class='platContainer'>";
        foreach ($data['plat']['avecOption']['desserts'] as $plat) {
            echo "<div class='cardPlatmargin platPlat'>";
            $id = $plat['id'];
            echo "<div class='cardPlat' id='id".$id."'>";
            $nom = $plat['nom'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i = 1;
            echo "<div class='optionContainer'>";
            foreach ($options as $option => $choix) {
                echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii = 1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
            echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
            echo "</div>";
            echo "</div>";
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';

    } elseif ($_GET['plat'] == "boissons") {
        echo "<div class='gigaContainer containPlat'>";
        echo "<img src='images/meal2.webp' alt='' class='backgroundTransi'>";
        echo "<div class='platContainer'>";
        foreach ($data['plat']['avecOption']['boissons'] as $plat) {
            echo "<div class='cardPlatmargin platEntree'>";
            $id = $plat['id'];
            echo "<div class='cardPlat' id='id".$id."'>";
            $nom = $plat['nom'];
            $options = $plat['option'];
            echo "<h3 style='text-decoration:underline;'>$nom</h3>";
            $i = 1;
            echo "<div class='optionContainer'>";
            foreach ($options as $option => $choix) {
                echo "<div style='display:flex;gap:5px'><p style='margin:0;' class='optLib'>$option: </p>";
                echo "<select name='$i' id='$id'>";
                if (is_array($choix)) {
                    $ii = 1;
                    foreach ($choix as $lib) {
                        echo "<option value='$ii'>$lib</option>";
                        $ii++;
                    }
                    echo "</select></div>";
                } else {
                    echo $choix;
                }
                $i++;
            }
            echo"<button onclick='addToCart($id)' class='addToCart'>Ajouter</button>";
            echo "</div>";
            echo "</div>";
            echo '</div>';
    }
    foreach ($data['plat']['sansOption']['boissons'] as $platS) {
        echo "<div class='cardPlatmargin platEntree'>";
        echo "<div class='cardPlat'>";
        $nomS = $platS['nom'];
        $idS = $platS['id'];
        echo "<h3 style='text-decoration:underline;'>$nomS</h3>";
        echo "<button onclick='addToCart($idS)' class='addToCart'>Ajouter</button></div></div>";
    }

    echo '</div></div></div>';

    }


}


?>
<div class="infoAdd"></div>
<script type="text/javascript" src="./listPlat.js">
    
</script>
