<?php

namespace Controllers;

class UserController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotUser();
	}
	
}
