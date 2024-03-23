const everyA = document.querySelectorAll(".aSect");

const sectionEntree = document.querySelector('.aEntree');
const sectionPlat = document.querySelector('.aPlat');
const sectionViande = document.querySelector('.aViande');
const sectionPoisson = document.querySelector('.aPoisson');
const sectionOther = document.querySelector('.aOther');







function platTransition(e){
    
    everyA.forEach(a => {
        if(a==e){
            a.classList.add('transi')
        }else{
            a.classList.add('disapear');
        }
        
        
    });
    setTimeout(() => {
        e.querySelector('.platSec').querySelector('.st').classList.add('anim');
        switch (e) {
            case sectionEntree:
                setTimeout(() => {
                    window.location.href ='http://localhost:8080/php/vietbovis/Boviet/index.php?page=plat&plat=entree';
                }, 600);
                break;
        
            case sectionPlat:
                setTimeout(() => {
                    window.location.href ='http://localhost:8080/php/vietbovis/Boviet/index.php?page=plat&plat=plat';
                }, 600);
                break;

            case sectionViande:
                setTimeout(() => {
                    window.location.href ='http://localhost:8080/php/vietbovis/Boviet/index.php?page=plat&plat=viandes';
                }, 600);
                break;
            
            case sectionPoisson:
                setTimeout(() => {
                    window.location.href ='http://localhost:8080/php/vietbovis/Boviet/index.php?page=plat&plat=poissons';
                }, 600);
                break;

            case sectionOther:
                setTimeout(() => {
                    window.location.href ='http://localhost:8080/php/vietbovis/Boviet/index.php?page=plat&plat=accompagnement';
                }, 600);
                break;
        }

    }, 1000);

    
}

function transiCart(){
    document.querySelector('.choixTypePlatContainer').classList.add('reduce')
    // everyA.forEach(a => {
    // a.classList.add('disapear');
    // });
    setTimeout(() => {
        window.location.href='index.php?page=panier'
    }, 1000);
}