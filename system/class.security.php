<?php
class Security
{
	public function _construct() {$this->Filter(array(&$_GET, &$_POST, &$_REQUEST));}
	
	private function Filter($vars)
	{
		array_walk_recursive($vars, 'self::Clean');
	}

	private function Clean(&$var)
	{
		if(is_array($var))
		{
			array_walk_recursive($var, 'self::Clean');
			return;
		}
		
		$var = htmlentities(stripslashes(addslashes(trim($var))));
	}	
}
?>