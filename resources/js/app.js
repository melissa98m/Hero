import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

var text = document.getElementById('bienvenue');
var splitText = text.innerText.split('');

text.innerHTML = '';
var i = 0
setInterval(function(){
        AjoutDeLettre()}
    , 40 )

function AjoutDeLettre(){
    if(i < splitText.length){
        text.innerHTML += splitText[i];
        i++;
    }
}

