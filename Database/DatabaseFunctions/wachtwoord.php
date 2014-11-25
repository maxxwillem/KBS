<?php

//controleer eisen wachtwoord en print fout melding
function wachtWoordControle() {

    $wachtwoord = $_POST['password'];
    $wachtwoord_herhaal = $_POST['passwordcontrole'];
    $password_error = array();
    if (strlen($wachtwoord) < 8) {
        $password_error[] = 'Minimaal 8 karakters lang.';
    }
    if (!preg_match('/[A-Z]/', $wachtwoord)) {
        $password_error[] = 'Minimaal 1 hoofdletter.';
    }
    if (!preg_match('/[0-9]/', $wachtwoord)) {
        $password_error[] = 'Minimaal 1 getal';
    }
    if ($wachtwoord != $wachtwoord_herhaal) {
        $password_error[] = 'Wachtwoorden zijn niet gelijk';
    }
    $password_error_count = count($password_error);
    if ($password_error_count > 0) {
        for ($i = 0; $i < $password_error_count; $i++) {

            print($password_error[$i] . "<br>");
        }
       
}
}

//return een true of false, om ervoor te zorgen dat je goede vergelijking kan maken
// zorgt ervoor dat een file NIET wordt opgestuurd als eisen nog niet kloppen
//-->zorgt voor geen foutieve record in Database!
function checkWachtwoord() {
    $wachtwoord = $_POST['password'];
    $wachtwoord_herhaal = $_POST['passwordcontrole'];
    $password_error = array();
    if (strlen($wachtwoord) < 8) {
        $password_error[] = 'Minimaal 8 karakters lang.';
    }
    if (!preg_match('/[A-Z]/', $wachtwoord)) {
        $password_error[] = 'Minimaal 1 hoofdletter.';
    }
    if (!preg_match('/[0-9]/', $wachtwoord)) {
        $password_error[] = 'Minimaal 1 getal';
    }
    if ($wachtwoord != $wachtwoord_herhaal) {
        $password_error[] = 'Wachtwoorden zijn niet gelijk';
    }
    $password_error_count = count($password_error);
    if ($password_error_count > 0) {
        return FALSE;
    } else {
        return TRUE;
    }
}

?>