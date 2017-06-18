<?php

include_once('../extras/Config.php');

Config::autoload();

class TemplateManager {
    
    private $smarty;
    
    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->addTemplateDir(Config::getTemplatesDir());
        $this->smarty->setCompileDir(Config::getCompileDir());
    }
    
    function display($templateFile) {
        $this->smarty->display($templateFile);
    }

    function assign($name, $value) {
        $this->smarty->assign($name, $value);
    }
}