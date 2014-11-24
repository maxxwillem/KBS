<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Head
 *
 * @author Robin Koning
 */
class Head {

    private $complete;
    private $meta;
    private $style;
    private $script;
    
    /**
     * This is a class for getting the different Head elements
     */
    
    public function __construct() {
        $this->meta = "";
        $this->style = "";
        $this->script = "";
        $this->complete = "";
    }
     /**
     * 
     * Gets the HTML head.
     * 
     * @param String $title The page title
     * @param String $folders Path to folders
     * @return String The head
     */
    public function getCompleteHead($title, $folders) {
        $this->complete .= "<head>"
                . $this->getMeta($title)
                . $this->getStyle($folders)
                . $this->getScript($folders)
                . "</head>";
        return $this->complete;
    }

    /**
     * 
     * @return String The meta parts of the head
     * @param String $title The page title
     */
    private function getMeta($title) {
        $this->meta .= ""
                . "<meta charset=\"utf-8\">"
                . "<title>$title</title>"
                . "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">"
                . "<meta name=\"description\" content=\"\">"
                . "<meta name=\"author\" content=\"\">";
        return $this->meta;
    }

    /**
     * 
     * @return String The style parts of the head
     */
    private function getStyle($amountOfFolders) {
        
        $this->style .= ""
                . "<link href=\"$amountOfFolders" . "Template/css/bootstrap.min.css\" rel=\"stylesheet\">"
                . "<link href=\"$amountOfFolders" . "Template/css/bootstrap-theme.min.css\" rel=\"stylesheet\">"
                . "<link href=\"$amountOfFolders" . "Template/css/style.css\" rel=\"stylesheet\">"
                . "<link href=\"$amountOfFolders" . "Footable/css/footable.core.css\" rel=\"stylesheet\" type=\"text/css\" />"
                . "<link href=\"$amountOfFolders" . "Footable/css/footable.standalone.css\" rel=\"stylesheet\" type=\"text/css\" />"
                . "<!--[if lt IE 9]>"
                . "<link href=\"css/bootstrap-ie7fix.css\" rel=\"stylesheet\">"
                . "<![endif]-->";
        return $this->style;
    }
    
    /**
     * 
     * @return String The script parts of the head
     */
    private function getScript($amountOfFolders) {
        $this->script .= ""
                . "<script type=\"text/javascript\" src=\"$amountOfFolders" . "Template/js/jquery.min.js\"></script>"
                . "<script type=\"text/javascript\" src=\"$amountOfFolders" . "Template/js/bootstrap.min.js\"></script>"
                . "<script type=\"text/javascript\" src=\"$amountOfFolders" . "Template/js/scripts.js\"></script>"
                . "<script src=\"$amountOfFolders" . "Footable/js/footable.js\" type=\"text/javascript\"></script>"
                . "<script src=\"$amountOfFolders" . "Footable/js/footable.sort.js\" type=\"text/javascript\"></script>"
                . "<script src=\"$amountOfFolders" . "Footable/js/footable.filter.js\" type=\"text/javascript\"></script>";
        return $this->script;
    }

}
