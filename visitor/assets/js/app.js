$(document).ready(function(){
    // Quand je clique
    $('#open').on('click', function(){

        // On déclenche
        var $nav = $('body')

        // if($nav.css('left') === '0px'){
        //     val = '250px';
        // } else{
        //     val = '0px';
        // }

        // Ecriture ternaire
        val = $nav.css('left') === '0px' ? '250px' : '0px';  

        $nav.animate({left: val}, 300)
    });
});

// Drapeau
var fen = document.getElementById('f-en');
var ffr = document.getElementById('f-fr');
var fru = document.getElementById('f-ru');
var fch= document.getElementById('f-ch');
var fde = document.getElementById('f-de');

// Langues
var en = document.getElementById('en');
var fr = document.getElementById('fr');
var ru = document.getElementById('ru');
var ch= document.getElementById('ch');
var de = document.getElementById('de');

// Anglais
fen.addEventListener('click', function(){
    fen.classList.add('active-img');
    en.classList.add('active');

    fru.classList.remove('active-img');
    ru.classList.remove('active');

    fch.classList.remove('active-img');
    ch.classList.remove('active');

    fde.classList.remove('active-img');
    de.classList.remove('active');

    ffr.classList.remove('active-img');
    fr.classList.remove('active');
    
})

// Russe
fru.addEventListener('click', function(){
    fen.classList.remove('active-img');
    en.classList.remove('active');

    fru.classList.add('active-img');
    ru.classList.add('active');

    fch.classList.remove('active-img');
    ch.classList.remove('active');

    fde.classList.remove('active-img');
    de.classList.remove('active');

    ffr.classList.remove('active-img');
    fr.classList.remove('active');
})

// Chinois
fch.addEventListener('click', function(){
    fen.classList.remove('active-img');
    en.classList.remove('active');

    fru.classList.remove('active-img');
    ru.classList.remove('active');

    fch.classList.add('active-img');
    ch.classList.add('active');

    fde.classList.remove('active-img');
    de.classList.remove('active');

    ffr.classList.remove('active-img');
    fr.classList.remove('active');
})

// Allemand
fde.addEventListener('click', function(){
    fen.classList.remove('active-img');
    en.classList.remove('active');

    fru.classList.remove('active-img');
    ru.classList.remove('active');

    fch.classList.remove('active-img');
    ch.classList.remove('active');
    
    fde.classList.add('active-img');
    de.classList.add('active');

    ffr.classList.remove('active-img');
    fr.classList.remove('active');
})

// Français
ffr.addEventListener('click', function(){
    fen.classList.remove('active-img');
    en.classList.remove('active');

    fru.classList.remove('active-img');
    ru.classList.remove('active');

    fch.classList.remove('active-img');
    ch.classList.remove('active');

    fde.classList.remove('active-img');
    de.classList.remove('active');

    ffr.classList.add('active-img');
    fr.classList.add('active');
})

// Changement de langues horaires
// Lorsque je clique sur le submit, 

