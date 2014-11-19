<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of edit_basestation
 *
 * @author Robin Koning
 */

function getNodeValue() {
    $node = "";
    if (isset($_POST['edit'])) {
        $nodenr = $_POST['edit'];
    } else {
        trigger_error("Did not press the edit button!");
    }
    return $node;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Basestation Wijzigen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Hier staan alle design bestanden -->
        <link href="../Template/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Template/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../Template/css/style.css" rel="stylesheet">
        <link href="../Footable/css/footable.core.css" rel="stylesheet" type="text/css" />
        <link href="../Footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />

        <!-- Dit zorgt ervoor dat de website goed te zien is op IE6 en 7 -->
        <!--[if lt IE 9]>
            <link href="css/bootstrap-ie7fix.css" rel="stylesheet">
        <![endif]-->

        <!-- Hier staan alle javascript bestanden -->
        <script type="text/javascript" src="../Template/js/jquery.min.js"></script>
        <script type="text/javascript" src="../Template/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../Template/js/scripts.js"></script>
        <script src="../Footable/js/footable.js" type="text/javascript"></script>
        <script src="../Footable/js/footable.sort.js" type="text/javascript"></script>
        <script src="../Footable/js/footable.filter.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="../Template/img/Ram-Logo.png">
                </div>
                <div class="col-md-9">
                    <div class="page-header">
                        <h1>Basestation wijzigen</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Basestation onderhoud</a>
                        <a href="../account_overzicht.php" class="list-group-item">Account beheer</a>
                        <a href="../basestation_overzicht.php" class="list-group-item active">Basestation overzicht</a>
                        <a href="#" class="list-group-item">Wachtwoord wijzigen</a>
                        <a href="Logout.php" class="list-group-item">Uitloggen</a>
                        <div class="list-group-item empty"></div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <script type="text/javascript"> //aanroepen van footable
                                $(
                                        function () {
                                            $('.footable').footable();
                                        });
                            </script>
                            <br>
                            <form method="POST" action=login.php>
                                <table>
                                    <tr><td><b>Node nummer:</b></td>
                                        <td><input type="text" name="nodenr" required="required" value="<?php getNodeValue() ?>"></td></tr>

                                    <tr><td><b>Regio:</b></td>
                                    <td><input type="number" name="regio" required="required"></td></tr>
                                    
                                    <tr><td><b>Site naam:</b></td>
                                    <td><input type="text" name="site_naam" required="required"></td></tr>
                                    
                                    <tr><td><b>Type:</b></td>
                                    <td><input type="text" name="type" required="required"></td></tr>
                                    
                                    <tr><td colspan="2">
                                            <input type="submit" class='btn btn-primary btn-xs' name="login" value="submit">
                                        </td></tr>
                                </table>
                            </form>
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
        <script type="text/javascript">
//            script voor het filteren van het keuzemenu
            $(function () {
                $('table').footable().bind('footable_filtering', function (e) {
                    var selected = $('.filter-functie').find(':selected').text();
                    if (selected && selected.length > 0) {
                        e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                        e.clear = !e.filter;
                    }
                });

//            script voor het filteren van het keuzemenu
                $('.filter-functie').change(function (e) {
                    e.preventDefault();
                    $('table').trigger('footable_filter', {filter: $('#filter').val()});
                });

//script voor het wissen van zoekactie
                $('.wis-zoekactie').click(function (e) {
                    e.preventDefault();
                    $('.filter-functie').val('');
                    $('table').trigger('footable_clear_filter');
                });
            });
        </script>
    </body>
</html>
