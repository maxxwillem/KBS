<!DOCTYPE html>
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
                        <h1>Basestation onderhoud</h1>
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
                            <form method="POST" action="AccountToevoegenFormulier.php">
                                <table>
                                    <tr class="header"><td colspan="2"><h1>Toevoegen Account</h1></td></tr>


                                    <tr>
                                        <td>Gebruikersnaam:</td><td><input type="text" name="Gebruikersnaam" value="<?= $_POST['Gebruikersnaam'] ?>"></td>

                                        <?php
                                        if (isset($_POST['Toevoegen'])) {
                                            if (empty($_POST['Gebruikersnaam'])) {
                                                print("<td>");
                                                print("verplicht!");
                                                print("</td>");
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td> Naam :</td><td><input type="text" name="Naam" value="<?= $_POST['Naam'] ?>"></td>
                                        <?php
                                        if (isset($_POST['Toevoegen'])) {
                                            if (empty($_POST['Naam'])) {
                                                print("<td>");
                                                print("verplicht!");
                                                print("</td>");
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Achternaam :</td><td><input type="text" name="Achternaam" value="<?= $_POST['Achternaam'] ?>"></td>
                                        <?php
                                        if (isset($_POST['Toevoegen'])) {
                                            if (empty($_POST['Achternaam'])) {
                                                print("<td>");
                                                print("verplicht!");
                                                print("</td>");
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr><td> Functie :</td><td>
                                            <SELECT NAME="Functie">
                                                <OPTION VALUE="Empty">-----</OPTION>
                                                <OPTION VALUE="Beheerder">Beheerder</OPTION>
                                                <OPTION VALUE="Senior">Senior</OPTION>
                                                <OPTION VALUE="Technici">Technici</OPTION>
                                            </SELECT>  
                                        </td>
                                        <?php
                                        if (isset($_POST['Toevoegen'])) {
                                            if (($_POST['Functie'] == "Empty")) {
                                                print("<td>");
                                                print("verplicht!");
                                                print("</td>");
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Wachtwoord :</td><td><input type="password" name="password"></td>
                                        <?php
                                        // kijk of het wachtwoord voldoet aan de criteria, en print error message indien nodig
                                        if (isset($_POST['Toevoegen'])) {
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
                                                print("<td>");
                                                for ($i = 0; $i < $password_error_count; $i++) {

                                                    print( $password_error[$i] . "<br>");
                                                }
                                                print("</td>");
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Wachtwoord bevestigen :</td><td><input type="password" name="passwordcontrole"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" name="Annuleren" value="Annuleren">
                                            <input type="submit" name="Toevoegen" value="Toevoegen"></td>

                                    </tr>   
                                </table>
                            </form>  
                            <?php
                            if (isset($_POST['Toevoegen'])) {
									$gebruikersnaam = $_POST['Gebruikersnaam'];
									$naam = $_POST['Naam'];
									$achternaam = $_POST['Achternaam'];
									$functie = $_POST['Functie'];
									$wachtwoord = $_POST['password'];
									$wachtwoord_herhaal = $_POST['passwordcontrole'];
                                if (!empty($gebruikersnaam) && !empty($naam) && !empty($achternaam) && $functie != "Empty" && !empty($wachtwoord)) {
									
									require "Database/mysql_connect.php";
									
                                    //haal password op en maak een "salt" aan<---encrypt het wachtwoord
                                    $wachtwoord = htmlspecialchars($wachtwoord);
                                    $salt = [
                                        'cost' => 11
                                    ];
                                    //hash is wachtwoord omgezet in rare keten letters en getallen
                                    //wat wil je hashen?-->$wachtwoord
                                    //welke encryptie gebruik je?-->PASSWORD_Bcrypt
                                    //daar voeg je $salt aan toe.

                                    $hash = password_hash($wachtwoord, PASSWORD_BCRYPT, $salt);

                                    $link = $mysqli;

                                    $query = "INSERT INTO [tabelnaa] VALUES(?,?,?,?,?)";
                                    $statement = mysqli_prepare($link, $query);

                                    //ipv $wachtwoord --> $hash doorsturen
                                    //hierin sturen we door,$gebruikersnaam $naam,$achternaam,$functie en wachtwoord($hash). 5x een string!

                                    mysqli_stmt_bind_param($statement, "sssss", $gebruikersnaam, $naam, $achternaam, $functie, $hash);
                                    mysqli_stmt_execute($statement);
                                    mysqli_stmt_close($statement);
                                    mysqli_close($link);
                                }
                            }





//if(isset($_POST['Toevoegen'])){
//print("<br>");
//print($gebruikersnaam);
//print("<br>");
//print($naam);
//print("<br>");
//print($achternaam);
//print("<br>");
//print($functie);
//print("<br>");
//print($wachtwoord);
//print("<br>");
//print($wachtwoord_herhaal);
//}
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
