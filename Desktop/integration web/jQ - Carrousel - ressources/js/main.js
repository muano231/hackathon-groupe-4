"use strict"
/* AVANT CORRECTION
function toggleBarre(){
    BARRE.toggle();
}

function sliderNext(){
    NumPhoto++;
    if (NumPhoto>6) {
        NumPhoto = 1
      }
    IMAGE.attr('src','images/'+NumPhoto+'.jpg');
}

function sliderPrevious(){
    NumPhoto--;
    if (NumPhoto<1) {
        NumPhoto = 6
      }
    IMAGE.attr('src','images/'+NumPhoto+'.jpg');
}

function sliderToggle(){
    function toggle(){
		NumPhoto++;
        if (NumPhoto>6) {
            NumPhoto = 1
        }
        IMAGE.attr('src','images/'+NumPhoto+'.jpg');
    }
	window.setTimeout( toggle, 1000 );
}

function sliderRandom(){
    NumPhoto = Math.floor(Math.random() * (6))+1;
    IMAGE.attr('src','images/'+NumPhoto+'.jpg');
}

const BARRE = $(".hide");
const IMAGE = $("#slider img");
var NumPhoto = 1;

$("#toolbar-toggle").on("click",toggleBarre);
$("#slider-next").on("click",sliderNext);
$("#slider-previous").on("click",sliderPrevious);
$("#slider-toggle").on("click",sliderToggle);
$("#slider-random").on("click",sliderRandom);
*/

/*****************
 * VARIABLES
 *****************/

let slides = [
    { src: "1.jpg", legend: "Frères panda" },
    { src: "2.jpg", legend: "Yoga" },
    { src: "3.jpg", legend: "Levé de soleil" },
    { src: "4.jpg", legend: "Ciel étoilé" },
    { src: "5.jpg", legend: "Tea time" },
    { src: "6.jpg", legend: "Super goûter" },
];
let state = new Object();

 /*****************
 * FONCTIONS
 *****************/

function toolbarToggle() {
    //cache / affiche la toggle
    $(".toolbar ul").toggle();

    //modifier l'icon
    $("#toolbar-toggle i")
        .toggleClass("fa-arrow-right")
        .toggleClass("fa-arrow-down");
}

function refreshSlider(){
    $("#slider img").attr("src", "images/" + slides[state.index].src);
    $("#slider figcaption").text(slides[state.index].legend);
}

function next(){
    state.index++;
    if (state.index == slides.length) state.index = 0;
    refreshSlider();
}

function previous(){
    state.index--;
    if (state.index < 0) state.index = slides.length -1;
    refreshSlider();
}

function getRandomInteger(min, max){
    return Math.floor(Math.random() * (max - min + 1)) + min;

}

function random(){
    let nb;
    do {
        nb = getRandomInteger(0, slides.length - 1);
    }while(nb == state.index);
    state.index = nb;
    refreshSlider();
}

function playpause(){
    if (state.diapo == false){
        state.diapo = setInterval(next, 2000);
        this.title = "Arrêter le carroussel";
    }else{
        clearInterval(state.diapo);
        state.diapo = false
        this.title = "Démarrer le carroussel";
    }

    $("#slider-toggle i")
    .toggleClass("fa-play")
    .toggleClass("fa-pause");
}

/*****************
 * CODE PRINCIPAL
 *****************/

$(document).ready(function (){
    state.index = 0;
    state.diapo = false;

    refreshSlider();
    
    $("#toolbar-toggle").on("click", toolbarToggle);
    $("#slider-next").on("click", next);
    $("#slider-previous").on("click", previous);
    $("#slider-random").on("click", random);
    $("#slider-toggle").on("click", playpause);
});