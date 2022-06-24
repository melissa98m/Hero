var text = document.getElementById('bienvenue');
var splitText = text.innerText.split('');

text.innerHTML = '';
i = 0
setInterval(function(){
        AjoutDeLettre()}
    , 100 )

function AjoutDeLettre(){
    if(i < splitText.length){
        text.innerHTML += splitText[i];
        i++;
    }
}
