const panierArray = document.querySelectorAll('.contentLine');
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

let i = 0;

const contentContainer = document.querySelector('.cartContent');
const childContent = contentContainer.children;
const appear = setInterval(() => {
    if (panierArray[i] != undefined) {
        panierArray[i].classList.add('here');
        const child1 = panierArray[i].querySelector('button');
        const child2 = panierArray[i].querySelector('h4');
        setTimeout(() => {
            child1.classList.add('here');
            child2.classList.add('here');
        }, 200);



        i++;



    } else {
        clearInterval(appear);

    }
}, 100);



contentContainer.addEventListener('scroll', scrollContent);
const bottomCover = document.querySelector('.bottomCover');

function scrollContent() {
    let bottom = contentContainer.scrollTop;
    // bottomCover.style="bottom:-"+bottom+"px!important;transition:0s;";
    // if(bottom+contentContainer.clientHeight=== contentContainer.scrollHeight){
    //     bottomCover.style="transition:0.3s;opacity:0;";
    // }
    // console.log(bottom);
}
const globalCartContainer = document.querySelector('.globalCartContainer')
globalCartContainer.addEventListener('scroll', scrollContent2);


function scrollContent2() {
    let bottom = globalCartContainer.scrollTop;
    bottomCover.style = "bottom:-" + bottom + "px!important;transition:0s;";
    // if(bottom+ globalCartContainer.offsetHeight == globalCartContainer.scrollHeight){
    //     bottomCover.style="opacity:0;";
    // }
    // console.log(globalCartContainer.scrollHeight);
}
function sendCard() {

    $.ajax({
        type: 'POST',
        url: 'sendCard.php',

        success: function (response) {
    
            if (response == 'nope') {
                const bye = document.querySelector('.cartContainer');
                const bgCover = document.querySelector('.bgCoverPanier');
                bye.classList.add('readyToGo');
                bgCover.classList.add('readyToGo');
                setTimeout(() => {
                    window.location.href = 'index.php?page=order';
                }, 1000);
            } else {
                alert('Votre panier a bien été envoyé');
                window.location.href = 'index.php';
            }
        }
    })
}



function deleteEl(id = Number, currentEl) {

    $.ajax({
        type: 'POST',
        url: 'deletePlat.php',
        data: { idDelete: id },
        success: function (response) {
            if (response == 'deleted') {
                line = currentEl.parentNode;
                console.log(line);
                console.log('test');
                line.classList.add('deleted');
                setTimeout(() => {
                    line.style = "display:none"
                }, 500);
                let lineContent = line.children;
                for (let i = 0; i < lineContent.length; i++) {
                    lineContent[i].classList.add('deleted')
                }
                minusOne = document.querySelector('.nbPanier').innerHTML;
                minusOne = Number(minusOne);
                minusOne--;
                console.log(minusOne);
                document.querySelector('.nbPanier').innerHTML = minusOne;
                // currentEl.classList.add('delete');
                // currentEl.children.classList.add('delete');
            }

        }
    });
}

function adminTransi() {
    const wallTransi = document.querySelector('.switchDiv');
    const welcome = document.querySelector('.welcomeMaster');
    const globalCart = document.querySelector('.globalCartContainer');
    // TO DESTROY

    const content = document.querySelector('.cartContent');
    const action = document.querySelector('.cartAction');
    const btn = document.querySelector('.cartValid');

    //TO MODIFY
    const title = document.querySelector('.cartTitre');
    const transitorLink = document.querySelector('.gotoAdmin');
    const buttons = document.querySelectorAll('.codeCopy');


    setTimeout(() => {
        welcome.classList.add('transi');
        setTimeout(() => {
            welcome.classList.remove('transi');
            title.innerHTML = "Voici la liste des commandes";
            transitorLink.innerHTML = "Votre panier";
            content.remove();
            action.firstChild.remove();
            for (let i = 0; i < buttons.length; i++) {
                buttons[i].classList.add('visible')
            }
            globalCart.classList.add('visible');
            btn.style = "display:none;"
        }, 2000);
    }, 500);
    wallTransi.classList.add('transi');
    setTimeout(() => {
        wallTransi.classList.remove('transi');
    }, 3000);

}


function copyGitPull() {
    let gitPull = 'cd \\Users\\CANDAS ; cd .\\Desktop\\DOC\\VS_Code\\vraiRepoViet\\boviet ; git pull';
    navigator.clipboard.writeText(gitPull).then(() => {
        alert('GitPull copié !');
    })
}

function copyCommand() {
    $.ajax({
        type: 'POST',
        url: 'getCommand.php',

        success: function (response) {
            navigator.clipboard.writeText(response).then(() => {
                alert('La commande est copié ! Allez la coller dans votre invité de commande');

            });

        }
    });
}


function sessionStart() {
    $.ajax({
        type: 'POST',
        url: 'startCommande.php',

        success: function (response) {
            if (response == 'done') {
                alert('La commande est lancée');
                window.location.href = "index.php";
            }
        }
    });
}


function transiOrder() {
    const bye = document.querySelector('.cartContainer');
    const bgCover = document.querySelector('.bgCoverPanier');
    bye.classList.add('readyToGo');
    bgCover.classList.add('readyToGo');
    setTimeout(() => {
        window.location.href = 'index.php?page=order';
    }, 1000);
}