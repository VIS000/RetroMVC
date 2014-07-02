<?php

class IndexHandler
{
	private $_url, $_controller = null;
	
	public function __construct()
	{
		$this->_url = array();
		$this->_setUrl();
		
		$this->_checkController();
		
		require 'controllers/' . $this->_url[0] . '.php';
		$this->_controller = new $this->_url[0]($config);
		
		$this->_checkMethod();
	}
	
	private function _checkController()
	{
		if(!file_exists('controllers/' . $this->_url[0] . '.php'))
		{
			header('HTTP/1.0 404 Not Found');
		    include('system/errors/404.html');
			exit();
		}
	}
	
	private function _checkMethod()
	{
		if(isset($this->_url[1]))
		{
			if(method_exists($this->controller, $this->_url[1]))
			{
				$this->_controller->{$this->_url[1]}();
			}
		}
	}
	
	private function _setUrl()
	{
		if(isset($_GET['url']))
		{
			$this->_url = explode( '/', $_GET['url']);
		}
		else
		{
			$this->_url[0] = 'index';
		}
	}
}

new IndexHandler();
?>