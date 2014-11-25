<!DOCTYPE html>
<?php
require_once __DIR__ . '/Database/DatabaseFunctions/wachtwoord.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Account Toevoegen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Hier staan alle design bestanden -->
        <link href="Template/css/bootstrap.min.css" rel="stylesheet">
        <link href="Template/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="Template/css/style.css" rel="stylesheet">

        <!-- Dit zorgt ervoor dat de website goed te zien is op IE6 en 7 -->
        <!--[if lt IE 9]>
            <link href="css/bootstrap-ie7fix.css" rel="stylesheet">
        <![endif]-->

        <!-- Hier staan alle javascript bestanden -->
        <script type="text/javascript" src="Template/js/jquery.min.js"></script>
        <script type="text/javascript" src="Template/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Template/js/scripts.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/Ram-Logo.png">
                </div>
                <div class="col-md-9">
                    <div class="page-header">
                        <h1>Account Toevoegen</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="BasestationToevoegen.php" class="list-group-item">Basestation onderhoud</a>
                        <a href="account_overzicht.php" class="list-group-item">Account beheer</a>
                        <a href="AccountToevoegenFormulier.php" class="list-group-item active">Account toevoegen</a>
                        <a href="basestation_overzicht.php" class="list-group-item">Basestation beheer</a>
                        <a href="AccountWijzigen.php" class="list-group-item">Wachtwoord wijzigen</a>
                        <a href="Logout.php" class="list-group-item">Uitloggen</a>

                        <div class="list-group-item empty"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST">




                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Gebruikersnaam:</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="Gebruikersnaam" value="<?= $_POST['Gebruikersnaam'] ?>" required="required">



                                    </div>
                                </div>
                                <div class="form-group">   
                                    <label class="col-sm-2 control-label">Naam:</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="Naam" value="<?= $_POST['Naam'] ?>" required="required">


                                    </div></div>
                                <div class="form-group">   
                                    <label class="col-sm-2 control-label">Achternaam:</label>
                                    <div class="col-sm-3">                             
                                        <input class="form-control" type="text" name="Achternaam" value="<?= $_POST['Achternaam'] ?>" required="required">



                                    </div></div>
                                <div class="form-group">   
                                    <label class="col-sm-2 control-label">Functie:</label>
                                    <div class="col-sm-3">
                                        <SELECT class="form-control" NAME="Functie">
                                            <OPTION VALUE="Empty">-----</OPTION>
                                            <OPTION VALUE="Beheerder">Beheerder</OPTION>
                                            <OPTION VALUE="Senior">Senior</OPTION>
                                            <OPTION VALUE="Technici">Technici</OPTION>
                                        </SELECT>  

<?php
if (isset($_POST['Toevoegen'])) {
    if (($_POST['Functie'] == "Empty")) {
        print("verplicht!");
    }
}
?>
                                    </div></div>

                                <div class="form-group">   
                                    <label class="col-sm-2 control-label">Wachtwoord:</label>
                                    <div class="col-sm-3"> 
                                        <input type="password" name="password" required="required">
<?php
// kijk of het wachtwoord voldoet aan de criteria, en print error message indien nodig
if (isset($_POST['Toevoegen'])) {
wachtWoordControle();
}
?>
                                    </div></div>

                                <div class="form-group">   
                                    <label class="col-sm-2 control-label">Wachtwoord Bevestigen:</label>
                                    <div class="col-sm-3"> 
                                        <input type="password" name="passwordcontrole" required="required">
                                    </div></div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-danger btn-xs" name="Annuleren" value="Annuleren">
                                        <input type="submit" class="btn btn-primary btn-xs" name="Toevoegen" value="Toevoegen">

                                    </div>
                                </div>

                            </form>  
<?php
//als het aan de eisen voldoet, voeg account toe;



if (isset($_POST['Toevoegen'])) {
    $gebruikersnaam = $_POST['Gebruikersnaam'];
    $naam = $_POST['Naam'];
    $achternaam = $_POST['Achternaam'];
    $functie = $_POST['Functie'];
    $wachtwoord = ($_POST['password']);
    $wachtwoord_herhaal = $_POST['passwordcontrole'];
    
    if (!empty($gebruikersnaam) && !empty($naam) && !empty($achternaam) && $functie != "Empty" && !empty($wachtwoord)) {

if (checkWachtwoord() == TRUE){

        //haal password op en maak een "salt" aan<---encrypt het wachtwoord
      
//        $salt = [
//            'cost' => 11
//        ];
//        hash is wachtwoord omgezet in rare keten letters en getallen
//        wat wil je hashen?-->$wachtwoord
//        welke encryptie gebruik je?-->PASSWORD_Bcrypt
//        daar voeg je $salt aan toe.

        $hash = password_hash($wachtwoord, PASSWORD_BCRYPT);
        
        
        $link = mysqli_connect("localhost", "root", "root", "BasestationOnderhoud", 3307);
        $query = "INSERT INTO Gebruikers VALUES(?,?,?,?,?)";
        $statement = mysqli_prepare($link, $query);
        //ipv $wachtwoord --> $hash doorsturen
        //hierin sturen we door,$gebruikersnaam $naam,$achternaam,$functie en wachtwoord($hash). 5x een string!
        mysqli_stmt_bind_param($statement, "sssss", $gebruikersnaam, $hash, $functie, $naam, $achternaam);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
        mysqli_close($link);
        
}else{
    print("try again");
}
    }
}
    

?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center footer">
                        Dit is de footer
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
