<?php

namespace Controllers;

class HomeController
{
    
    public function display()
    {
        $model = new \Models\Avatar();
		$avatars = $model -> getAllAvatars();
        $model1 = new \Models\User();
		$users = $model1 -> getAllUsers();
        $view = 'home.php';
        include_once 'views/layout.php';
    }
    public function displayUserLists()
	{
        $id = $_GET['id'];
        $model1 = new \Models\User();
		$users = $model1 -> getUserById($_GET['id']);
		$model = new \Models\Lists();
		$lists = $model -> getAllListsByUser($_GET['id']);
        $view = 'views/userslists.php';
        include 'views/layout.php';
	}
    
    public function notFound()
    {
        $view = 'notFound.php';
        include_once 'views/layout.php';
    }

    public function displayAdmin()
	{

		//afficher le formulaire de connexion
        $view = 'views/admin/admin.php';
        include_once 'views/layout.php';
	}

    public function submitAdmin() 
	{
		include 'models/Admin.php';
		
		$login = htmlspecialchars($_POST['login']);
		$pw = htmlspecialchars($_POST['pw']);
		
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
    
}