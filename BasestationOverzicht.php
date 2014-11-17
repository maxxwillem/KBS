<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__. '/Database/DatabaseFunctions/BaseStation.php';



/**
 * De database die gebruikt is is een tijdelijke database alleen voor deze lijst
 */


function getList() {
    $t = new BaseStation();
    print("<table><tr><th>ID</th><th>Site naam</th><th>Datum</th>"
            . "<th>Engineer</th><th>Type onderhoud</th>");
    foreach ($t->getBasestationList() as $mArray) {
        print("<tr>");
        foreach ($mArray as $value) {
            print("<td>" . $value . "</td>");
        }
        print("</tr>");
        print("<br>");
    }
    print("</table>");
}

getList();