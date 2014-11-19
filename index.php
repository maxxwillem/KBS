<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Inloggen</title>
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
                    <img src="Template/img/Ram-Logo.png">
                </div>
                <div class="col-md-6">
                    <div class="page-header">
                        <h1>Inloggen</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    &nbsp;
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="login.php">

                                <div class="form-group">

                                    <label class="col-sm-3 control-label">Gebruikersnaam:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="gebruiker" required="required">

                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-sm-3 control-label">Wachtwoord:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="password" name="pass" required="required">

                                    </div></div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4">

                                        <input type="submit" class='btn btn-primary btn-group-lg' name="login" value="Login">
                                    </div></div>

                            </form>
                            <br>

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
