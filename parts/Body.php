<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Body
 *
 * @author Robin Koning
 */
class Body {
    
    private $first;
    private $second;
    private $navigation;
    private $footer;
    private $footerScript;
    
    /**
     * This is a class for getting the different Body parts
     */
    public function __construct() {
        $this->first = "";
        $this->second = "";
        $this->navigation = "";
        $this->footer = "";
        $this->footerScript = "";
    }
    
    /**
     * 
     * Gets the first part of the HTML body.
     * 
     * @param String $header The page header
     * @param String $folders Path to folders
     * @return String The first part of the HTML to output
     */
    public function getFirstBodyPart($header, $folders) {
        $this->first .= "<body>"
                . "<div class=\"container\">"
                . "<div class=\"row\">"
                . "<div class=\"col-md-3\"><img src=\"$folders" . "Template/img/Ram-Logo.png\"></div>"
                . "<div class=\"col-md-9\"><div class=\"page-header\"><h1>$header</h1></div></div>"
                . "</div>"
                . $this->getNavigation()
                . "<div class=\"col-md-9\">"
                . "<div class=\"panel panel-default\">"
                . "<div class=\"panel-body\">"
                . "<script type=\"text/javascript\">"
                . "$(function () {"
                . "$('.footable').footable();"
                . "});"
                . "</script>";
        return $this->first;
    }
    
    /**
     * 
     * Gets the second part of the HTML body.
     * 
     * @return String The second part of the HTML to output
     */
    public function getSecondBodyPart() {
        $this->second .= ""
                . "</div></div></div></div>"
                . $this->getFooter()
                . "</div>"
                . $this->getFooterScript()
                . "</body>";
        return $this->second;
    }
    
    private function getNavigation() {
        $this->navigation .= ""
                . "<div class=\"row \">"
                . "<div class=\"col-md-3\">"
                . "<div class=\"list-group\">"
                . "<a href=\"#\" class=\"list-group-item\">Basestation onderhoud</a>"
                . "<a href=\"../account_overzicht.php\" class=\"list-group-item\">Account beheer</a>"
                . "<a href=\"../basestation_overzicht.php\" class=\"list-group-item active\">Basestation overzicht</a>"
                . "<a href=\"#\" class=\"list-group-item\">Wachtwoord wijzigen</a>"
                . "<a href=\"Logout.php\" class=\"list-group-item\">Uitloggen</a>"
                . "<div class=\"list-group-item empty\"></div>"
                . "</div></div>";
        return $this->navigation;
    }
    
    private function getFooter() {
        $this->footer .= ""
                . "<div class=\"row\">"
                . "<div class=\"col-md-12\">"
                . "<p class=\"text-center footer\">"
                . "Dit is de footer"
                . "</p>"
                . "</div></div>";
        return $this->footer;
    }
    
    private function getFooterScript() {
        $this->footerScript .= ""
                . "<script type=\"text/javascript\">"
                . " $(function () {"
                . "$('table').footable().bind('footable_filtering', function (e) {"
                . "var selected = $('.filter-functie').find(':selected').text();"
                . "if (selected && selected.length > 0) {"
                . "e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;"
                . "e.clear = !e.filter;}});"
                . "$('.filter-functie').change(function (e) {"
                . "e.preventDefault();"
                . "$('table').trigger('footable_filter', {filter: $('#filter').val()});});"
                . "$('.wis-zoekactie').click(function (e) {"
                . "e.preventDefault();"
                . "$('.filter-functie').val('');"
                . "$('table').trigger('footable_clear_filter');});});"
                . "</script>";
        return $this->footerScript;
    }
    
}
