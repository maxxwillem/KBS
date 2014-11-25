<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Formulier overzicht</title>
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
        <?php
        //php database gedeelte
        require_once './Database/mysql_connect.php';
        /* Check of de verbinding het doet
          if ($link) {
          print("Verbinding is gemaakt" . "<br>" . "<br>");
          } else {
          print("Kan helaas geen verbinding maken" . "<br>" . "<br>");
          print(mysqli_connect_error());
          } */

        function LaatZien($mysqli) {
            $stmt = mysqli_prepare($mysqli, "SELECT F.id, B.regio, F.nodenr, B.sitenaam, F.datum, F.type, F.gebruikersnaam FROM formulieren F JOIN basestations B ON F.nodenr = B.nodenr ");
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $ID, $regio, $nodenummer, $sitenaam, $laatstgewijzigd, $onderhoudstype, $engineer);
            while (mysqli_stmt_fetch($stmt)) {
                print("<tr><td>$ID</td><td>$regio</td><td>$nodenummer</td><td>$sitenaam</td><td>$laatstgewijzigd</td><td>$onderhoudstype</td><td>$engineer</td><td>"
                        . "<div class='button'>"
                        . "    <button type='button' class='btn btn-success btn-xs' name='bekijken' value='bekijken'>Bekijken</button>"
                        . "</div></td></tr>");
            }
            mysqli_stmt_close($stmt);
            mysqli_close($mysqli);
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="Template/img/Ram-Logo.png">
                </div>
                <div class="col-md-9">
                    <div class="page-header">
                        <h1>Formulier overzicht</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Basestation onderhoud</a>
                        <a href="account_overzicht.php" class="list-group-item active">Account beheer</a>
                        <a href="basestation_overzicht.php" class="list-group-item">Basestation Overzicht</a>
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

                            <p>
                            <div class="form-group">
                                <label for="filter" class="col-sm-1 control-label">Zoek:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="filter" placeholder="Zoek">
                                </div>
                            </div>
                            <br><br>

                            <div class="button">
                                <button type="button" class="btn btn-success btn-xs" a href="FormulierToevoegen.php">Nieuw formulier toevoegen</a></button>
                            </div> <br>


                            <form method="post" action="AccountWijzigen.php">
                                <table data-filter="#filter" class="footable table">
                                    <!--                                Footable Tabel, komt nog een database bij :P-->
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Regio</th>
                                            <th>Nodenummer</th>
                                            <th data-hide="phone">Sitenaam</th>
                                            <th data-hide="phone">Laatst gewijzigd</th>
                                            <th data-hide="phone">Onderhoudstype</th>
                                            <th data-hide="phone">Engineer</th>
                                            <th data-hide="phone" data-sort-ignore="true">Bekijken</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php LaatZien($mysqli); ?>
                                    </tbody>
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
