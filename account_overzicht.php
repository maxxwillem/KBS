<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Account Beheer</title>
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

        function LaatZien($mysqli)
        {
            $stmt = mysqli_prepare($mysqli, "SELECT * FROM accounts");
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $voornaam, $achternaam, $functie, $gebruikersnaam);
            while (mysqli_stmt_fetch($stmt))
            {
                print("<tr><td>$gebruikersnaam</td><td>$voornaam</td><td>$achternaam</td><td>$functie</td><td>"
                        . "<div class='button'>"
                        . "    <button type='submit' class='btn btn-success btn-xs' name='edit' value='$gebruikersnaam'>Bewerken</button>"
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
                        <h1>Account beheer</h1>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Basestation onderhoud</a>
                        <a href="account_overzicht.php" class="list-group-item active">Account beheer</a>
                        <a href="BasestationOverzicht.php" class="list-group-item">Basestation Overzicht</a>
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
                                <!--                                Filteren van tabelresultaten-->
                                Zoek: <input id="filter" type="text" size="30"/>
                                Functie: <select class="filter-functie">
                                    <option></option>
                                    <option value="Technicus">Technicus</option>
                                    <option value="Senior">Senior</option>
                                    <option value="Beheerder">Beheerder</option>
                                </select>
                                <!--                                wissen van de zoekactie-->
                                <a href="#clear" class="wis-zoekactie" title="clear filter">[Wis zoekactie]</a>
                            </p>
                            <br>

                            <a href="AccountToevoegenFormulier.php">Nieuw account toevoegen</a>

                            <form method="post" action="account_bewerken.php">
                                <table data-filter="#filter" class="footable table">
                                    <!--                                Footable Tabel, komt nog een database bij :P-->
                                    <thead>
                                        <tr>
                                            <th>Gebruikersnaam</th>
                                            <th data-hide="phone">Voornaam</th>
                                            <th data-hide="phone">Achternaam</th>
                                            <th data-ignore="true" data-hide="all">Functie</th>
                                            <th data-hide="phone" data-sort-ignore="true">Bewerken</th>
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