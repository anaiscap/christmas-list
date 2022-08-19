<?php

namespace Controllers;

class AccountController 
{
	
	//use SessionController;
	
		//public function __construct()
	//{
	//	$this -> redirectIfNotUser();
	//}
	
	public function display()
	{
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
		$users = $model -> getUserById($id);
		
		//afficher le formulaire de connexion
        $view = 'views/account/user_home.php';
        include 'views/layout.php';
	}
	
	public function displayLists()
	{
		$id = $_SESSION['idUser'];
		$model = new \Models\Lists();
		$lists = $model -> getAllLists();
		$view = 'views/mylists.php';
        include 'views/layout.php';
	}
	
	
}
