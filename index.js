// if (typeof sectionEntree === 'undefined'){
//     const sectionEntree = document.querySelector('.aEntree');
// }
// if(!sectionPlat){
//     const sectionPlat = document.querySelector('.aPlat');
// }

// if(!sectionViande){
//     const sectionViande = document.querySelector('.aViande');
// }
// if(!sectionPoisson){
//     const sectionPoisson = document.querySelector('.aPoisson');
// }
// if(!sectionOther){
//     const sectionOther = document.querySelector('.aOther');
// }



function transiOrder(){
    const midDiv = document.querySelector('.d3');
    midDiv.classList.add('disapear');
    const restDiv = document.querySelectorAll('.color');
    const restTxt = document.querySelectorAll('.drole');
    setTimeout(() => {
        restTxt.forEach(el => {
            el.style='transform:scale(1,0);transition:0.25s;';
        });
    }, 250);
    
    
    setTimeout(() => {
        
        restDiv.forEach(element => {
            element.style="opacity:0;transition:0.2s"
        });
        const backAccueil = document.querySelector('.objet1');
        backAccueil.classList.remove('objet1');
        backAccueil.style="transform-origin:top left;transition:0.2s!important;transform:translateX(0)!important;transform:translateY(0)!important;"

        
        
        setTimeout(() => {
            window.location.href='http://localhost:8080/php/vietbovis/Boviet/index.php?page=order'
        }, 250);
    }, 250);
}

function transiCart(){
    const midDiv = document.querySelector('.d3');
    midDiv.classList.add('disapear');
    const restDiv = document.querySelectorAll('.color');
    const restTxt = document.querySelectorAll('.drole');
    setTimeout(() => {
        restTxt.forEach(el => {
            el.style='transform:scale(1,0);transition:0.25s;';
        });
        const backAccueil = document.querySelector('.objet1');
        backAccueil.classList.remove('objet1');
        backAccueil.style="transform-origin:top left;transition:0.2s!important;transform:translateX(0)!important;transform:translateY(0)!important;"
    }, 250);
    
    setTimeout(() => {
        window.location.href="http://localhost:8080/php/vietbovis/Boviet/index.php?page=panier";
    }, 1000);
    
}