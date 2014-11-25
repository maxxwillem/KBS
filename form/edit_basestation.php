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
require_once '../parts/Head.php';
require_once '../parts/Body.php';

function getNodeValue() {
    $array;
    if (isset($_POST['edit'])) {
        $array = unserialize($_POST['edit']);
    } else {
        trigger_error("Did not press the edit button!");
    }
    return $array;
}

$head = new Head();
$body = new Body();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
    print($head->getCompleteHead("Basestation wijzigen", "../"));
    print($body->getFirstBodyPart("Test", "../"));
    ?>
    <form method="POST" action=login.php>
        <table>
            <tr><td><b>Node nummer:</b></td>
                <td><input type="text" name="nodenr" required="required" value="<?php print(getNodeValue()[0]); ?>"></td></tr>

            <tr><td><b>Regio:</b></td>
                <td><input type="number" name="regio" required="required" value="<?php print(getNodeValue()[1]); ?>"></td></tr>

            <tr><td><b>Site naam:</b></td>
                <td><input type="text" name="site_naam" required="required" value="<?php print(getNodeValue()[2]); ?>"></td></tr>

            <tr><td><b>Type:</b></td>
                <td><input type="text" name="type" required="required" value="<?php print(getNodeValue()[3]); ?>"></td></tr>

            <tr><td colspan="2">
                    <input type="submit" class='btn btn-primary btn-xs' name="login" value="submit">
                </td></tr>
        </table>
    </form>
    <?php
    print($body->getSecondBodyPart());
    ?>
</html>
