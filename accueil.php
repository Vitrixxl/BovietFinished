<div class="colorContainer">
    <img src="images/meal2.webp" alt="" class="backgroundAccueil objet1" data-value='50'>
    <div class="d5 color">
        <span></span>
        <h1 class='drole'>Le pho-nomène culinaire directement au travail !</h1>

    </div>

    <div class="d3 color">
        <span class="masker1"></span>
        <span class="masker2"></span>
        <img src="images/meal1.jpeg" alt="" data-value='-100' class="midImg objet2">


        <h1 class="welcomeBoviet">Bienvenue chez Boviet !</h1>



    </div>

    <div class="d5 color">

        <span></span>
        <h1 class='drole'>Des nouilles plus longues que votre to do list !</h1>

    </div>
</div>

<script>
    document.addEventListener("mousemove", parallax);

    function parallax(e) {
        var objet = document.querySelector(".objet1");
        var objet2 = document.querySelector('.objet2');
        var x = (e.clientX - window.innerWidth / 2) / 100;
        var y = (e.clientY - window.innerHeight / 2) / 100;

        objet.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        objet2.style.transform = "translateX(" + -x + "px) translateY(" + -y + "px)";
    }
</script>