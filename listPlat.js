const midContain1 = document.querySelector('.platContainer');
const bgImage = document.querySelector('.backgroundTransi');
const firstTop = midContain1.getBoundingClientRect().top;
var boolPanier = false
setTimeout(() => {
    document.querySelector('.backButton').classList.add('plat');
}, 500);
setTimeout(() => {
    midContain1.style = "overflow:auto;bottom:0;";
}, 1000);

function byebye() {
    let i = 15;
    byeInterval = setInterval(() => {
        let currentTop = midContain1.getBoundingClientRect().top;
        console.log(firstTop);
        if (currentTop > firstTop + (window.innerHeight * 0.1)) {

            midContain1.style = "transition:linear;transform:translateY(-" + i + "px)"
            i += 15;
        } else {
            clearInterval(byeInterval);
            bgImage.style = "transition:0.7s ease-out;left: -5%;top: -5%;transform-origin: left top!important;";
            setTimeout(() => {
                if (boolPanier==true){
                    window.location.href = "index.php?page=panier";
                }else{
                    window.location.href = "index.php?page=order";
                }
                
            }, 700);

        }
    }, 1);


}

function backTransi() {

    let maxScroll = midContain1.scrollHeight;

    maxScroll = maxScroll - midContain1.clientHeight;


    let intervalID = setInterval(() => {
        let currentScroll = midContain1.scrollTop;

        if (currentScroll == maxScroll) {
            clearInterval(intervalID);
            
            byebye();
        } else {

            midContain1.scrollTop += 15;
        }
    }, 1);
};

function transiCart(){
    boolPanier=true
    backTransi();
}

function addToCart(productID) {
    let productArray={};
    productArray['id']=productID;
    let selectArray = document.querySelectorAll('#id' + productID+ ' .optionContainer div select');
    if (productArray.length==0){
        $.ajax({
            type: 'POST',
            url: 'traitementPanier.php',
            data: {jsonData: productArray},
            success: function(response) {
                plusOne=document.querySelector('.nbPanier').innerHTML;
                plusOne=Number(plusOne);
                plusOne++;
                console.log(plusOne);
                document.querySelector('.nbPanier').innerHTML=plusOne;
                var added= document.createElement('h3');
                added.innerHTML="Article ajouté au panier";
                document.querySelector('.infoAdd').appendChild(added); 
                
            }
        });
    }else{
        let i=1;
        selectArray.forEach(selector => {
            let selectedOption = selector.selectedIndex;
            let optionValue = selector.options[selectedOption].value;
            productArray[i]=optionValue;
            i++;
        });
        productArray=JSON.stringify(productArray);
        
        $.ajax({
            type: 'POST',
            url: 'traitementPanier.php',
            data: {jsonData: productArray},
            success: function(response) {
                plusOne=document.querySelector('.nbPanier').innerHTML;
                plusOne=Number(plusOne);
                plusOne++;
                console.log(plusOne);
                document.querySelector('.nbPanier').innerHTML=plusOne;
                var added= document.createElement('h3');
                added.innerHTML="Article ajouté au panier";
                document.querySelector('.infoAdd').appendChild(added);
            }
        });
    }
    
}





