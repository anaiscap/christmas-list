<?php

namespace Controllers;

class UserController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotUser();
	}
	
	/*public function display()
	{
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
	    $users = $model -> getUserById($id);
		
		//afficher le formulaire de connexion
        $view = 'views/user_home.php';
        include 'views/layout.php';
	}*/
}
