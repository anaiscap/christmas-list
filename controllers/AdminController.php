<?php

namespace Controllers;

class AdminController 
{
	use SessionController;

    private $message1;
    private $message2;
    
    public function __construct()
    {
		$this -> redirectIfUser();
        $this -> message1 = "";
        $this -> message2 = "";
        if(!empty($_POST))
		{
			$this -> submit();
		
	    }
	    if(isset($_GET['action']) && $_GET['action'] == 'deco')
		{
			$this -> disconnect();
		}
    }
    
	public function display()
	{

		//afficher le formulaire de connexion
        $view = 'views/admin/admin.php';
        include_once 'views/layout.php';
	}
	public function disconnect()
	{
	    //je déconnecte l'utilisateur
			session_destroy();
			header('location:index.php');
			exit;
	}
	public function submit() 
	{
		include 'models/Admin.php';
		
		$login = $_POST['login'];
		$pw = $_POST['pw'];
		
		//comparer avec ce que j'ai en bdd
		$model = new \Models\Admin();
		//aller chercher les infos de l'utilisateur/iden qui essaye dese connecter
		$admin = $model -> getAdminByLogin($login);
		
		//si l'identifiant existe dans la base alors âdmin contiendrales infos de cet admin
		//sinon $admin contiendra false
		
		if(!$admin)
		{
			$this -> message1 = "Mauvais identifiant";
		}
		else
		{
			//vérifier le mot de passe
			if(password_verify($pw,$admin['password']))
			{
				//le mot de passe correcpond
				//connecter l'utilisateur
				$_SESSION['admin'] = $admin['firstname'].' '.$admin['lastname'];
				//redirige vers la page tableau de bord du backoffice
				header('location:index.php?page=dashboard');
				exit;
			}
			else
			{
				$this -> message2 = "Mauvais mot de passe";
			}
		}
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
		//préparer les données pour les mettre dans la base de données
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$avatar= $_POST['avatar'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$id = $_GET['id'];
		$model = new \Models\User();
		$users = $model -> ModifyUser($first_name, $last_name, $avatar, $email, $password, $id);
		
		header('location:dashboard');
            exit;
	}
}


