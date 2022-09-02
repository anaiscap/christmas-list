<?php

namespace Controllers;

class AccountController 
{
	
	use SessionController;
	
		public function __construct()
	{
		$this -> redirectIfNotUser();
	}
	
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
		$model1 = new \Models\Avatar();
		$avatars = $model1 -> getAllAvatars();
		$idavatar = $users['avatar'];
		$model2 = new \Models\Avatar();
		$avatarsrc = $model2 -> findAvatarById($idavatar);
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
		include 'models/User.php';
		
		$pw = $_POST['pw'];
		
		//comparer avec ce que j'ai en bdd
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
		//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
		$users = $model -> getUserById($id);
		//si l'identifiant existe dans la base alors user contiendra les infos de cet user
		//sinon $user contiendra false
	
			//vérifier le mot de passe
			if(password_verify($pw,$users['password']))
			{
				//le mot de passe correspond
				//préparer les données pour les mettre dans la base de données
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$avatar= $_POST['avatar'];
			$email = $_POST['email'];
			$password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
			//$id = $_SESSION['idUser'];
			$model = new \Models\User();
			$users = $model -> ModifyUser($first_name, $last_name, $avatar, $email, $password, $id);
			
			
			//redirige vers la page d'accueil
			header('Location: account');
			exit;
			
			}
			else
			{
				$this -> message2 = "Mauvais mot de passe";
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
