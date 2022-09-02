<?php

namespace Controllers;

class DashboardController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotAdmin();
	}
	
	public function display()
	{
		$model = new \Models\User();
		$users = $model -> getAllUsers();
		//afficher le formulaire de connexion
            $view = 'views/admin/dashboard.php';
            include_once 'views/layout.php';
	}
	
	
	
}
