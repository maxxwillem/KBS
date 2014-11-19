<?php

//altijd seesion als eerste starten
session_start();
//maak connectie aan met MySQL DB, DB heet "Users", wachtwoord is root
$link = mysqli_connect("localhost", "root", "root", "Users", 3307);

//Controleer of er wordt op inloggen wordt gedrukt.
if(isset($_POST['login'])){
    
//gebruik real_escape_string voor veiligheid, zet waardes gebruikersnaam en password in juiste variabele    
$gebruiker_naam = mysqli_real_escape_string($link,$_POST['gebruiker']);

 //haal password op en maak een "salt" aan<---encrypt het wachtwoord
        htmlspecialchars($_POST['pass'])=$wachtwoord;
        $salt = [
            'cost' => 11
        ];
        //hash is wachtwoord omgezet in rare keten letters en getallen
        $hash=  password_hash($wachtwoord, PASSWORD_BCRYPT, $salt);

//zoek query [hier nog user_name en user_password veranderen in gegevens van ERD/Database]
$query = "SELECT * FROM [Users] WHERE [user_name]='$gebruiker_naam' AND [user_password]='$hash'";
   


    $user = mysqli_query($link, $query);

//tel aantal rijen van user.(kijk of user bestaat)
    $check_user = mysqli_num_rows($user);

//als de user dus bestaat
    if ($check_user > 0)
    {

//sessie wordt aangemaakt met gebruikersnaam, (is uniek voor idere persoon, wordt automatisch nieuwe sessie gestart)
//$_SESSION['user_name']=$gebruiker_naam;
//$_SESSION['Functie']=$functie;

//hiermee kunnen we gaan aangeven welke beperkingen sommige gebruikers gaan hebben...
//if($_SESSION['functie']=="Beheerder/technici/senior"){
//    header('location: waarjeheenwilt.php');
//}
//als je ingelogd wordt ga je naar start.php
        header('location: start.php');
    }
    else
    {

//als gegevens fout zijn blijf je op index.php

        header('location:index.php');
    }
}

?>


