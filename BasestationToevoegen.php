<!DOCTYPE html>
<html lang="en">
    <?php
    if (isset($_POST["toevoegen"])) {
        header('location: basestation_overzicht.php');
    }
    if (isset($_POST["annuleren"])) {
        header('location: basestation_overzicht.php');
    }
    ?>
    <head>
        <meta charset="utf-8">
        <title>Basestation toevoegen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Hier staan alle design bestanden -->
        <link href="Template/css/bootstrap.min.css" rel="stylesheet">
        <link href="Template/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="Template/css/style.css" rel="stylesheet">
        <link href="Footable/css/footable.core.css" rel="stylesheet" type="text/css" />
        <link href="Footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />

        <!-- Dit zorgt ervoor dat de website goed te zien is op IE6 en 7 -->
        <!--[if lt IE 9]>
            <link href="css/bootstrap-ie7fix.css" rel="stylesheet">
        <![endif]-->

        <!-- Hier staan alle javascript bestanden -->
        <script type="text/javascript" src="Template/js/jquery.min.js"></script>
        <script type="text/javascript" src="Template/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Template/js/scripts.js"></script>
        <script src="Footable/js/footable.js" type="text/javascript"></script>
        <script src="Footable/js/footable.sort.js" type="text/javascript"></script>
        <script src="Footable/js/footable.filter.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="Template/img/Ram-Logo.png">
                </div>
                <div class="col-md-9">
                    <div class="page-header">
                        <h1>Basestation toevoegen</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Basestation onderhoud</a>
                        <a href="account_overzicht.php" class="list-group-item">Account beheer</a>
                        <a href="#" class="list-group-item active">Basestation beheer</a>
                        <a href="#" class="list-group-item">Wachtwoord wijzigen</a>
                        <a href="#" class="list-group-item">Uitloggen</a>
                        <div class="list-group-item empty"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <!-- Content -->
                            <!-- Standaard formulier met data icl. mobile responsive -->
                            <form class="form-horizontal" role="form" method="POST">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Node nummer:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nodenummer" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Regionummer:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="regio" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sitenaam:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="sitenaam" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Type basestation:</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="typeBasestation" required>
                                            <option value="leeg">[Kies type]</option>
                                            <option value="BRS2">BRS2</option>
                                            <option value="BRU3">BRU3</option></select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Opmerkingen:</label>
                                    <div class="col-sm-3">
                                        <textarea class="form-control" rows="4" cols="40" name="opmerking"></textarea>
                                    </div>
                                </div>

                                <div class="button">
                                    <input type="submit" name="annuleren" value="Annuleren" class="btn btn-primary btn-xs">
                                    <input type="submit" name="toevoegen" value="Toevoegen" class="btn btn-primary btn-xs">

                                </div>
                        </div>
                        </form>

                        <?php
                        $link = mysqli_connect("localhost", "root", "usbw", "rmd", 3307);
                        /* Check of de verbinding het doet
                          if ($link) {
                          print("Verbinding is gemaakt" . "<br>" . "<br>");
                          } else {
                          print("Kan helaas geen verbinding maken" . "<br>" . "<br>");
                          print(mysqli_connect_error());
                          } */



                        //Mogelijkheid tot verwijderen Voor testen

                        if (isset($_POST["verwijderen"])) {
                            $verwijderen = $_POST["verwijderen"];
                            $delete = mysqli_prepare($link, "DELETE FROM basestation_overzicht WHERE node = ?");
                            mysqli_stmt_bind_param($delete, 's', $verwijderen);
                            mysqli_stmt_execute($delete);
                        }

                        // Als alle velden ingevuld zijn dan ...
                        if (isset($_POST["nodenummer"]) && isset($_POST["regio"]) && isset($_POST["sitenaam"]) && isset($_POST["typeBasestation"]) && isset($_POST["toevoegen"]) && ($_POST["typeBasestation"] != "leeg")) {
                            $nodenummer = $_POST["nodenummer"];
                            $regio = $_POST["regio"];
                            $sitenaam = $_POST["sitenaam"];
                            $type = $_POST["typeBasestation"];
                            $opmerking = $_POST["opmerking"];


                            $stmt2 = mysqli_prepare($link, "INSERT INTO basestation_overzicht VALUES (?,?,?,?,?)");
                            mysqli_stmt_bind_param($stmt2, 'iisss', $nodenummer, $regio, $sitenaam, $type, $opmerking);
                            mysqli_stmt_execute($stmt2);
                        }


                        /*
                          //Weergeven van database (Als test)
                          $stmt = mysqli_prepare($link, "SELECT * FROM basestation_overzicht");
                          mysqli_execute($stmt);
                          mysqli_stmt_bind_result($stmt, $nodenummer, $regio, $sitenaam, $type);

                          print('<table><tr><th>Nodenummer</th><th>Regio</th><th>Sitenaam</th><th>Type</th>');

                          while ($row = mysqli_stmt_fetch($stmt)) {
                          print('<tr><td>' . $nodenummer . '</td><td>' . $regio . '</td><td>' . $sitenaam . '</td><td>' . $type . '</td><td>' . '<a href="BasestationToevoegen.php?verwijderen=' . $nodenummer . '">Verwijderen</a></td></tr>');
                          }

                          print('</table>');



                          mysqli_stmt_free_result($stmt);
                          mysqli_stmt_close($stmt); */
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
