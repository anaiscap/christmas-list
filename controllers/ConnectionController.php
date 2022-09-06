<?php

namespace Controllers;

class ConnectionController 
{
    private $message1;
    private $message2;
    
    public function __construct()
    {
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
            $view = 'views/signin.php';
            include 'views/layout.php';
	}

	public function disconnect()
	{
	    //je déconnecte l'utilisateur
			session_destroy();
			header('Location: index.php');
			exit;
	}
	
	public function submit() 
	{
		include 'models/User.php';
		
		$email = $_POST['email'];
		$pw = $_POST['pw'];
		
		//comparer avec ce que j'ai en bdd
		$model = new \Models\User();
		//aller chercher les infos de l'utilisateur/iden qui essaye de se connecter
		$user = $model -> getUserByEmail($email);
		//si l'identifiant existe dans la base alors user contiendra les infos de cet user
		//sinon $user contiendra false
		if(!$user)
		{
			
			$this -> message1 = "Mauvais identifiant";
		}
		else
		{
			//vérifier le mot de passe
			if(password_verify($pw,$user['password']))
			{
				//le mot de passe correspond
				//connecter l'utilisateur
				$_SESSION['user'] = $user['first_name'].' '.$user['last_name'];
				$_SESSION['avatar'] = $user['avatar_src'];
				$_SESSION['idUser'] = $user['id_user'];
				//redirige vers la page d'accueil
				header('Location: account');
				exit;
			}
			else
			{
				$this -> message2 = "Mauvais mot de passe";
			}
		}
	}
}


