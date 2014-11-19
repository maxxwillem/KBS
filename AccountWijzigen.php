<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Account Wijzigen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Hier staan alle design bestanden -->
        <link href="./Template/css/bootstrap.min.css" rel="stylesheet">
        <link href="./Template/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="./Template/css/style.css" rel="stylesheet">

        <!-- Dit zorgt ervoor dat de website goed te zien is op IE6 en 7 -->
        <!--[if lt IE 9]>
            <link href="css/bootstrap-ie7fix.css" rel="stylesheet">
        <![endif]-->

        <!-- Hier staan alle javascript bestanden -->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <?php
        // Gebruikersnaam kan niet worden verandert
        $gebruikersnaam = 'HoelaHoep'; //htmlspecialchars($_POST["edit"]);
        $tablename = "testtable";
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/Ram-Logo.png">
                </div>
                <div class="col-md-9">
                    <div class="page-header">
                        <h1>Account Wijzigen</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Basestation onderhoud</a>
                        <a href="#" class="list-group-item">Account beheer</a>
                        <a href="#" class="list-group-item">Basestation beheer</a>
                        <a href="#" class="list-group-item">Wachtwoord wijzigen</a>
                        <a href="#" class="list-group-item">Uitloggen</a>
                        <div class="list-group-item empty"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            print "Gebruikersnaam:" . $gebruikersnaam;
                            ?>
                            <form  method="GET"> <br>
                                Voornaam: <input type="text" name="Voornaam"><br><br>
                                Achternaam: <input type="text" name="Achternaam"><br><br>
                                Wachtwoord: <input type="text" name="Wachtwoord"><br><br>
                                Wachtwoord bevestigen: <input type="text" name="Wachtwoord bevestigen"><br><br>
                                Functie: <select name="Functie">
                                    <option value="leeg">[Kies functie]</option>
                                    <option value="Beheerder">Beheerder</option>
                                    <option value="Senior">Senior</option>
                                    <option value="Technici">Technici</option>
                                </select> <br><br>
                                <div class="button">
                                    <input type="button" name="annuleren" value="Annuleren">
                                    <input type="submit" name="Wijzigen" value="Wijzigen">
                                    <input type="submit" name="Verwijderen" value="Verwijderen">
                                </div>
                            </form>
                            <?php
                            $link = mysqli_connect("localhost", "root", "usbw", "testtable", 3307);
                            if (isset($_GET["Voornaam"]) && isset($_GET["Wijzigen"])) {
                                $Voornaam = $_GET["Voornaam"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Voornaam=(?)WHERE gebruikersnaam = $gebruikersnaam");
                                mysqli_stmt_bind_param($stmt, 's', $Voornaam);
                                mysqli_stmt_execute($stmt);
                            }
                            if (isset($_GET["Achternaam"]) && isset($_GET["Wijzigen"])) {
                                $Achternaamnaam = $_GET["Achternaam"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Achternaam=(?)WHERE gebruikersnaam = $gebruikersnaam");
                                mysqli_stmt_bind_param($stmt, 's', $Achternaam);
                                mysqli_stmt_execute($stmt);
                            }
                            if (isset($_GET["Wachtwoord"]) && isset($_GET["Wachtwoord bevestigen"]) && isset($_GET["Wijzigen"])) {
                                $Wachtwoord = $_GET["Wachtwoord"];
                                $Wachtwoordbevestiging = $_GET["Wachtwoord bevestigen"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Wachtwoord=(?)WHERE gebruikersnaam = $gebruikersnaam");
                                mysqli_stmt_bind_param($stmt, 's', $Wachtwoord);
                                mysqli_stmt_execute($stmt);
                            }
                            if (isset($_GET["Functie"]) && isset($_GET["Wijzigen"])) {
                                $Functie = $_GET["Functie"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Functie=(?)WHERE gebruikersnaam = $gebruikersnaam");
                                mysqli_stmt_bind_param($stmt, 's', $Functie);
                                mysqli_stmt_execute($stmt);
                            }
                            if (isset($_GET["Verwijderen"])) {
                                $stmt = mysqli_prepare($link, "DELETE WHERE gebruikersnaam = $gebruikersnaam");
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
