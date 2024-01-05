<h1>Exercice Banque</h1>

<p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires
et leurs comptes bancaires respectifs. <br><br>
Un compte bancaire est composé des éléments suivants : <br><br>
Un libellé (compte courant, livret A, ...)<br>
Un solde initial<br>
Une devise monétaire<br>
Un titulaire unique<br><br>
Un titulaire comporte :<br><br>
Un nom<br>
Un prénom<br>
Une date de naissance<br>
Une ville<br>
L'ensemble de ses comptes bancaires.<br><br>
Sur un compte bancaire, on doit pouvoir :<br><br>
Créditer le compte de X euros<br>
Débiter le compte de X euros<br>
Effectuer un virement d'un compte à l'autre.<br><br>
On doit pouvoir :<br><br>
Afficher toutes les informations d'un(e) titulaire (dont l'âge) et l'ensemble des comptes
appartenant à celui(celle)-ci.<br>
Afficher toutes les informations d'un compte bancaire, notamment le nom / prénom du
titulaire du compte</p>

<h2>RESULTAT :</h2><br>


<?php


spl_autoload_register(function () {
    require('classes/'. 'CompteBancaire.php');
    require('classes/'. 'Titulaire.php');
});


/////////////////////TEST AFFICHAGE DES TITULAIRES
$mohamedAmine = new Titulaire("Mohamed", "Amine", "15-01-2001", "STRASBOURG");

$compteUn = new CompteBancaire("livret A", 1500, "euros", $mohamedAmine);
$comptedeux = new CompteBancaire("compte courant", 625.60, "euros", $mohamedAmine);
$comptetrois = new CompteBancaire("compte epargne", 10000, "euros", $mohamedAmine);
$compteQuatre = new CompteBancaire("compte etranger", 900000, "dinars", $mohamedAmine);


echo "<br>";

$ArthurMorgan = new Titulaire("Morgan", "Arthur", "22-05-1866", "BLACKWATER");

$compteCinq = new CompteBancaire("livret A", 3200, "dollars", $ArthurMorgan);
$compteSix = new CompteBancaire("compte courant", 6250, "dollars", $ArthurMorgan);
$compteSept = new CompteBancaire("compte epargne", 4000, "dollars", $ArthurMorgan);
$compteHuit = new CompteBancaire("compte etranger", 920, "Francs Suisses", $ArthurMorgan);


//////////////////////TEST DES FONCTIONS DEBIT/CREDIT/VIREMENT
echo $ArthurMorgan->infosTitulaire();
echo $mohamedAmine->infosTitulaire();


//test creditage
$compteUn->crediter(1500);
echo $compteUn->getInfos();

// test debitage
$compteUn->debiter(3000);
echo $compteUn->getInfos();

//test solde insuffisant
$compteUn->debiter(3000);
echo $compteUn->getInfos();

//test virements
$compteQuatre->virerVers($compteUn, 5000);
echo $compteUn->getInfos();

// test virement solde insuffisant
$compteQuatre->virerVers($compteUn, 500000000);





