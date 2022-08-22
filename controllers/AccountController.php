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

	public function displayParameters()
	{
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
		$users = $model -> getUserById($id);
		
		//afficher le formulaire de connexion
        $view = 'views/account/parameters.php';
        include 'views/layout.php';
	}

	public function modifyParameters()
	{
		//préparer les données pour les mettre dans la base de données
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$avatar= $_POST['avatar'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
		$users = $model -> ModifyUser($first_name, $last_name, $avatar, $email, $password, $id);
		
		header('location:parameters');
            exit;
	}

	public function modifyPassword()
	{
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
		$users = $model -> getUserById($id);

		if(password_verify($password,$users['password'])){
			//préparer les données pour les mettre dans la base de données
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$avatar= $_POST['avatar'];
			$email = $_POST['email'];
			//password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			//$id = $_SESSION['idUser'];
			$model = new \Models\User();
			$users = $model -> ModifyUser($first_name, $last_name, $avatar, $email, $password, $id);
		}
		//afficher le formulaire de connexion
        $view = 'views/account/newpassword.php';
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
