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
        $gebruikersnaam = htmlspecialchars($_POST["edit"]);
        $tablename = "accounts";
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="Template/img/Ram-Logo.png">
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
                        <a href="account_overzicht.php" class="list-group-item">Account beheer</a>
                        <a href="BasestationOverzicht.php" class="list-group-item">Basestation beheer</a>
                        <a href="#" class="list-group-item">Wachtwoord wijzigen</a>
                        <a href="Logout.php" class="list-group-item">Uitloggen</a>
                        <div class="list-group-item empty"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gebruikersnaam:</label>
                                    <div class="col-sm-3">
                                        <p class="form-control-static"><?php print$gebruikersnaam; ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Voornaam" class="col-sm-2 control-label">Voornaam:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="Voornaam" name="Voornaam" placeholder="Voornaam">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Achternaam" class="col-sm-2 control-label">Achternaam:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="Achternaam" name="Achternaam" placeholder="Achternaam">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Wachtwoord:</label>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="Wachtwoord" name="Wachtwoord" placeholder="Wachtwoord">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Wachtwoord bevestigen:</label>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="Achternaam" name="Wachtwoordbevestigen" placeholder="Wachtwoord">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Functie" class="col-sm-2 control-label">Functie:</label>
                                    <div class="col-sm-3">
                                        <select id="Functie" class="form-control">
                                            <option value="leeg">--------</option>
                                            <option value="Beheerder">Beheerder</option>
                                            <option value="Senior">Senior</option>
                                            <option value="Technici">Technici</option>
                                        </select>                                    
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-danger btn-xs" name="annuleren" value="Annuleren">
                                        <input type="submit" class="btn btn-primary btn-xs"name="Wijzigen" value="Wijzigen">
                                        <input type="submit" class="btn btn-primary btn-xs"name="Verwijderen" value="Verwijderen">
                                    </div>
                                </div>
                            </form>
                            <?php
                            $link = mysqli_connect("localhost", "root", "usbw", "testtable", 3307);
                            if (!empty($_POST["Voornaam"]) && isset($_POST["Wijzigen"])) {
                                $Voornaam = $_POST["Voornaam"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Voornaam= ? WHERE gebruikersnaam = '$gebruikersnaam'");
                                mysqli_stmt_bind_param($stmt, 's', $Voornaam);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_free_result($stmt);
                                mysqli_stmt_close($stmt);
                            }
                            if (!empty($_POST["Achternaam"]) && isset($_POST["Wijzigen"])) {
                                $Achternaamnaam = $_POST["Achternaam"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Achternaam=(?)WHERE gebruikersnaam = '$gebruikersnaam'");
                                mysqli_stmt_bind_param($stmt, 's', $Achternaam);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_free_result($stmt);
                                mysqli_stmt_close($stmt);
                            }
                            if (!empty($_POST["Wachtwoord"]) == "" && !empty($_POST["Wachtwoord bevestigen"]) && isset($_POST["Wijzigen"])) {
                                $Wachtwoord = $_POST["Wachtwoord"];
                                $Wachtwoordbevestiging = $_POST["Wachtwoord bevestigen"];
                                if (isset($_POST['Toevoegen'])) {
                                    $password_error = array();
                                    if (strlen($Wachtwoord) < 8) {
                                        $password_error[] = 'Minimaal 8 karakters lang.';
                                    }
                                    if (!preg_match('/[A-Z]/', $Wachtwoord)) {
                                        $password_error[] = 'Minimaal 1 hoofdletter.';
                                    }
                                    if (!preg_match('/[0-9]/', $Wachtwoord)) {
                                        $password_error[] = 'Minimaal 1 getal';
                                    }
                                    if ($Wachtwoord != $Wachtwoordbevestiging) {
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
                                if ($Wachtwoord == $Wachtwoordbevestiging) {
                                    $stmt = mysqli_prepare($link, "UPDATE $tablename SET Wachtwoord=(?)WHERE gebruikersnaam = '$gebruikersnaam'");
                                    mysqli_stmt_bind_param($stmt, 's', $Wachtwoord);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_free_result($stmt);
                                    mysqli_stmt_close($stmt);
                                }
                            }
                            if (!empty($_POST["Functie"]) == "" && isset($_POST["Wijzigen"])) {
                                $Functie = $_POST["Functie"];
                                $stmt = mysqli_prepare($link, "UPDATE $tablename SET Functie=(?)WHERE gebruikersnaam = '$gebruikersnaam'");
                                mysqli_stmt_bind_param($stmt, 's', $Functie);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_free_result($stmt);
                                mysqli_stmt_close($stmt);
                            }
                            if (isset($_POST["Verwijderen"])) {
                                $stmt = mysqli_prepare($link, "DELETE WHERE gebruikersnaam = '$gebruikersnaam'");
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_free_result($stmt);
                                mysqli_stmt_close($stmt);
                            }
                            mysqli_close($link);
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
