<?php


require 'library/Smarty/libs/Smarty.class.php';
require 'library/MySQLi/OBJ_mysql.php';

class Core
{
	public $mysql, $smarty = null;
	
	public function __construct($config)
	{	
		$this->_debug($config['system']['debug']);
		$this->_connectMySQL($config['db']);
		$this->_setupSmarty();
		$this->_globalAssigns($config['tpl']);
	}
	
	private function _debug($value)
	{
		if($value == true)
		{
			error_reporting(E_ALL);
		}
		else
		{
			error_reporting(0);
		}
	}
	
	private function _connectMySQL($config)
	{
		$this->mysql = new OBJ_mysql($config);
	}
	
	private function _setupSmarty()
	{
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir('views');
		$this->smarty->setCompileDir('system/compile');
	}
	
	private function _globalAssigns($config)
	{
		foreach($config as $key => $value)
		{
			$this->smarty->assign($key, $value);
		}
	}
}

?>