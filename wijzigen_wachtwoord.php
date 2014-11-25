<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Basestation Overzicht</title>
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
                        <h1>Wachtwoord Wijzigen</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Basestation onderhoud</a>
                        <a href="account_overzicht.php" class="list-group-item">Account beheer</a>
                        <a href="basestation_overzicht.php" class="list-group-item">Basestation Overzicht</a>
                        <a href="wijzigen_wachtwoord.php" class="list-group-item active">Wachtwoord wijzigen</a>
                        <a href="Logout.php" class="list-group-item">Uitloggen</a>
                        <div class="list-group-item empty"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                                <div class="form-group">
                                    <label for="HWachtwoord" class="col-sm-2 control-label">Huidige Wachtwoord:</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="HWachtwoord" name="HWachtwoord" placeholder="Wachtwoord">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NWachtwoord" class="col-sm-2 control-label">Nieuw Wachtwoord:</label>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="NWachtwoord" name="NWachtwoord" placeholder="Wachtwoord">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Wachtwoord bevestigen:</label>
                                    <div class="col-sm-3">
                                        <input type="password" class="form-control" id="BVWW" name="BVWW" placeholder="Wachtwoord">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-danger btn-xs" name="annuleren" value="Annuleren">
                                        <input type="submit" class="btn btn-primary btn-xs"name="Wijzigen" value="Wijzigen">
                                    </div>
                                </div>
                            </form>
                            <?php
                            $hwachtwoordform = htmlspecialchars($_POST(["HWachtwoord"]));
                            $hwachtwoordb = databasewachtwoord("codedwrench") //dit moet de gebruikersnaam in $_SESSION gaan worden
                            if (isset($_POST(["Wijzigen"])) && $hwachtwoordform == $hwachtwoorddb)
                            {

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

