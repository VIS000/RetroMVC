<?php


include 'global.php';

class Index extends Core
{
	public function __construct($config)
	{
		parent::__construct($config);
		$this->_constants();
		$this->smarty->display('index.html');
	}
	
	private function _constants()
	{
		$this->smarty->assign('test', 'Bitch!');
	}
	
	public function _mysql()
	{
		echo $this->mysql->query('SELECT * FROM users WHERE username = ?', array('Edward'))->fetchArray()['username'];
		echo 'lol!s';
	}
}