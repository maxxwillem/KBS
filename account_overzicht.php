<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    require_once __DIR__ . '/parts/Head.php';
    require_once __DIR__ . '/parts/Body.php';
    require_once './Database/DatabaseFunctions/Account.php';
    $head = new Head();
    $body = new Body();
    $title = "Account overzicht";
    $folders = "./";
    print($head->getCompleteHead($title, $folders));
    print($body->getFirstBodyPart($title, $folders));
    ?>
    <p>
    <div class="form-group">
        <label for="filter" class="col-sm-1 control-label">Zoek:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control input-sm" id="filter" placeholder="Zoek">
        </div>
        <label for="functie" class="col-sm-1 control-label">Functie:</label>
        <div class="col-sm-2">
            <select id="functie" class="form-control input-sm filter-functie">
                <option></option>
                <option value="Technicus">Technicus</option>
                <option value="Senior">Senior</option>
                <option value="Beheerder">Beheerder</option>
            </select>
        </div>
    </div>
    <br><br>


    <a href="AccountToevoegenFormulier.php">Nieuw account toevoegen</a>

    <form method="post" action="AccountWijzigen.php">
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
                <?php showTable(); ?>
            </tbody>
        </table>
    </form>
    <?php
    print($body->getSecondBodyPart());
    ?>
</html>
