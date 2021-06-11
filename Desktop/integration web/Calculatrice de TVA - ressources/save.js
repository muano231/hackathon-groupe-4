"use strict";

//déclaration de variables
let montantHT;
let montantTVA;
let montantTTC;

const TAUX_TVA = 20;

//demander à l'utilisateur de saisir un montant HT
montantHT = parseFloat(prompt("Veuillez saisir un montant hors taxes"));

//calculer le montant de la TVA - 20% du montant HT
montantTVA = montantHT * (TAUX_TVA / 100);

//calculer le montant TTC > montantHT + montantTVA
montantTTC = montantHT + montantTVA;

//afficher le recap
const DIV = document.querySelector("#content")
DIV.innerHTML = 
`<p> Pour un montant HI de ${montantHT}€, il y a ${montantTVA}€ de TVA.</p>
<p>Le montant TTC est donc de ${montantTTC}€, il y a ${montantTVA}€ de TVA.</p>`

