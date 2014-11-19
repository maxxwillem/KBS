<?php

/*
 * Rick de Bondt
 * 1078239
 * To change this license header, choose License Headers in Project Properties.
 */

require_once __DIR__ . '/../mysql_connect.php';

function ShowTable() //laat de tabel zien
{
    global $mysqli;
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