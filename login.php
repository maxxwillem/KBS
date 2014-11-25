<?php



//altijd seesion als eerste starten
session_start();
//maak connectie aan met MySQL DB, DB heet "Users", wachtwoord is root

//Controleer of er wordt op inloggen wordt gedrukt.
if(isset($_POST['login'])){
    
//gebruik real_escape_string voor veiligheid, zet waardes gebruikersnaam en password in juiste variabele    
$gebruiker_naam = $_POST['gebruiker'];
 $wachtwoord=  htmlspecialchars($_POST['pass']);
// //haal password op en maak een "salt" aan<---encrypt het wachtwoord
//      
//        $salt = [
//            'cost' => 11
//        ];
//        //hash is wachtwoord omgezet in rare keten letters en getallen
        $hash=  password_hash($wachtwoord, PASSWORD_BCRYPT);
//        password_verify($wachtwoord, $hash)
 

$link = mysqli_connect("localhost", "root", "root", "BasestationOnderhoud", 3307);

    

//zoek query 
$query = "SELECT * FROM Gebruikers WHERE Gebruikersnaam ='$gebruiker_naam' AND Wachtwoord ='$hash'";
   


    $user = mysqli_query($link, $query);

//tel aantal rijen van user.(kijk of user bestaat)
    $check_user = mysqli_num_rows($user);

//als de user dus bestaat
    if ($check_user > 0)
    {

//sessie wordt aangemaakt met gebruikersnaam, (is uniek voor idere persoon, wordt automatisch nieuwe sessie gestart)

//$query= "SELECT [function] FROM [Users] WHERE [user_name]='$gebruiker_naam' AND [user_password]='$hash'"
//    $functie = mysqli_query($link, $query);
//    
//$_SESSION['user_name']=$gebruiker_naam;
//$_SESSION['Functie']=$functie;


//als je ingelogd wordt ga je naar start.php
        header('location: start.php');
    }
    else
    {

//als gegevens fout zijn blijf je op index.php
print("you got an error");
       // header('location:index.php');
    }
}

?>


