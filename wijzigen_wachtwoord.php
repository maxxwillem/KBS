<!DOCTYPE html>
<?php
session_start();
require_once __DIR__ . '/parts/Head.php';
require_once __DIR__ . '/parts/Body.php';
?>
<html lang="en">
    <?php
    $head = new Head();
    $body = new Body();
    $title = "Wachtwoord Wijzigen";
    $folders = "./";
    print($head->getCompleteHead($title, $folders));
    print($body->getFirstBodyPart($title, $folders));
    ?>
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
                $hwachtwoordform = htmlspecialchars("TEST");
                $hwachtwoordb = "codedwrench"; //dit moet de gebruikersnaam in $_SESSION gaan worden
                if (isset($_POST["Wijzigen"]) && $hwachtwoordform == $hwachtwoorddb)
                {
                    print("test");
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    print($body->getSecondBodyPart());
    ?>
</html>

