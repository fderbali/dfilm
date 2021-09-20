<?php

$RegExpcourriel = "/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/";
$RegExpMotpasse = "/^[A-Za-z\d#_!-]{8,10}$/";

$donneesFormulaire = true;

if ($nom == "" || $prenom == "" || $courriel == "" || $sexe == "" || $date_de_naissance == "" || $password == "" || $confirm_mot_de_passe == "") {
    $donneesFormulaire = false;
}

if (!preg_match($RegExpcourriel, $courriel)) {
    $donneesFormulaire = false;
}

if (!preg_match($RegExpMotpasse, $password)) {
    $donneesFormulaire = false;
}

if ($password != $confirm_mot_de_passe) {
    $donneesFormulaire = false;
}
if (!$donneesFormulaire) {
    $message_erreur = "Desolé mais vous devez envoyer de nouveau vos données. Un problème inconnu est survenu et en dehors de notre contrôle.";
}
