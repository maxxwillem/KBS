<?php
/*
 * @author: Robin Koning
 */

require_once __DIR__ . '/Database/DatabaseFunctions/BaseStation.php';
require_once __DIR__ .'/parts/Head.php';
require_once __DIR__ .'/parts/Body.php';

$head = new Head();
$body = new Body();

function getListMySQLi() {
    $t = new BaseStation();
    $array = array();
    foreach ($t->getBasestationListMysqli() as $mArray) {
        print("<form action=\"form/edit_basestation.php\" method=\"POST\">");
        print("<tr>");
        foreach ($mArray as $key => $value) {
            if ($key !== "opmerking") {
                print("<td>" . $value . "</td>");
            } else {
                print("<td class=\"hide\">" . $value . "</td>");
            }
        }
        $nodeData = serialize($mArray);
        print("<td>" . "<button type='submit' class='btn btn-success btn-xs' name='edit' value='$nodeData'>Bewerken</button>" . "</td>");

        print("</tr>");
        print("</form>");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
print($head->getCompleteHead("Basestation Overzicht", ""));
print($body->getFirstBodyPart("Basestation overzicht", ""));
?>

    <table data-filter="#filter" class="footable table">
        <thead>
            <tr>
                <th>Node nummer</th>
                <th data-hide="phone">Regio</th>
                <th data-hide="phone">Site naam</th>
                <th data-hide="phone">Type</th>
                <th data-hide="phone" class="hide"></th>
                <th data-hide="phone">Bewerken</th>
            </tr>
        </thead>
        <tbody>
<?php
getListMySQLi();
?>
        </tbody>
    </table>
<?php
print($body->getSecondBodyPart());
?>
</html>
