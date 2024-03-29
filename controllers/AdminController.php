<?php

namespace Controllers;

class AdminController 
{
	use SessionController;

    private $message1;
    private $message2;
	private $message3;
    
    public function __construct()
    {
		$this -> redirectIfUser();
		$this -> redirectIfNotUser();
        $this -> message1 = "";
        $this -> message2 = "";
		$this -> message3 = "";
        /*if(!empty($_POST))
		{
			$this -> submit();
		
	    }*/
	    if(isset($_GET['action']) && $_GET['action'] == 'deco')
		{
			$this -> disconnect();
		}
    }
    
	
	public function disconnect()
	{
	    //je déconnecte l'utilisateur
			session_destroy();
			header('location:index.php');
			exit;
	}
	

	public function displayUserParameters()
	{
	
		$model = new \Models\User();
		$users = $model -> getUserById($_GET['id']);
		$model1 = new \Models\Avatar();
		$avatars = $model1 -> getAllAvatars();
		$idavatar = $users['avatar'];
		$model2 = new \Models\Avatar();
		$avatarsrc = $model2 -> findAvatarById($idavatar);
		//afficher le formulaire de connexion
        $view = 'views/admin/changeuserpassword.php';
        include 'views/layout.php';
	}

	public function modifyUserParameters()
	{
		include 'models/User.php';

			//préparer les données pour les mettre dans la base de données
			$id = $_GET['id'];
			$password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
		
		$model = new \Models\User();
		try{
			$model -> ModifyUserPassword($password, $id);
			

		} catch(\Exception $e) {
			if ($pw_curr == false) {
				$this -> message3 = "Le mot de passe doit contenir au moins 8 caractères, dont 1 majuscule, 1 minuscule, 1 chiffre, et 1 caractère spécial.";
			}
		} 
		
		header('location:dashboard');
		exit;	
	}

	
	public function delete_user()
	{
		
		//supprimer un cadeau d'une liste
		$model = new \Models\User();
		try{
			$model -> deleteUser($_GET['id']);
		} catch(\Exception $e) {
			print_r($e);
		}
		
	}
}