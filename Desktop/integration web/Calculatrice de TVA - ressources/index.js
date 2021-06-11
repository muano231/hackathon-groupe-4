"use strict";

//déclaration de variables
let montantHT;
let montantTVA;
let montantTTC;

let remise;
let montantRemise;
let pourcentageRemise;

let fin;

const TAUX_TVA = 20;

//demander à l'utilisateur de saisir un montant HT
do{
    montantHT = parseFloat(prompt("Veuillez saisir un montant hors taxes"));
}while (isNaN(montantHT))

//demander la remise
remise = prompt("Appliquer une remise ?").toLocaleLowerCase;

//initialiser le recap
const DIV = document.querySelector("#content")

if (remise == "oui" || remise =="yes"){
    //récupérer la remise en pourcentage
    montantRemise = parseFloat(prompt("Veuillez saisir le montant de la remise %"));

    //la convertir en valeur décimale
    pourcentageRemise = 1-(montantRemise/100);
    montantHT *= pourcentageRemise;
    calculTVA(montantHT);

    //afficher le récap
    fin = `<p>Une remise de ${montantRemise}% a été appliquée sur le montant HT.</p>`;
    affichage(montantHT,montantTVA,montantTTC,montantRemise,fin);
    
} else {
    //calculer la TVA
    montantRemise = 0;
    calculTVA(montantHT);

    //afficher le récap
    fin = `<p>Aucune remise n'a été appliquée.</p>`;
    affichage(montantHT,montantTVA,montantTTC,montantRemise,fin);
    
}

function calculTVA (montantHT){
    //calculer le montant de la TVA - 20% du montant HT
    montantTVA = montantHT * (TAUX_TVA / 100);

    //calculer le montant TTC > montantHT + montantTVA
    montantTTC = montantHT + montantTVA;
}

function affichage(montantHT,montantTVA,montantTTC,montantRemise,fin){
    //recap
    DIV.innerHTML = 
    `<p>Pour un montant HI de ${montantHT}€, il y a ${montantTVA}€ de TVA.</p>
    <p>Le montant TTC est donc de ${montantTTC}€, il y a ${montantTVA}€ de TVA.</p>
    <p>${fin}</p>`
}