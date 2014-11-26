<?php
require(SMARTY_DIR.'Smarty.class.php'); 
 
class SmartySetup extends Smarty {

   function __construct()
   {
     	global  $CONFIG;
        parent::__construct(); 
        $this->setTemplateDir($CONFIG['SMARTY']['templates']);
//        $this->setTemplateDir('G:\\phpserver\\framework\\templates\\');
        $this->setCompileDir($CONFIG['SMARTY']['templates_c']);
        $this->setConfigDir($CONFIG['SMARTY']['configs']);
        $this->setCacheDir($CONFIG['SMARTY']['cache']); 
        $this->setCompileCheck($CONFIG['SMARTY']['check']);
        $this->left_delimiter = $CONFIG['SMARTY']['left_delimiter'];
		$this->right_delimiter = $CONFIG['SMARTY']['right_delimiter']; 
       
		$this->debugging = $CONFIG['SMARTY']['debugging']; 
	 
//		$this->caching = $CONFIG['SMARTY']['caching'];
		
        $this->caching = Smarty::CACHING_OFF;
 
      
   }

}