<?php

namespace Controllers;

class NewUserController {
	
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
		$model = new \Models\Avatar();
		$avatars = $model -> getAllAvatars();
		//afficher le formulaire de connexion
            $view = 'views/signup.php';
            include 'views/layout.php';
	}
	public function disconnect()
	{
	    //je déconnecte l'utilisateur
			session_destroy();
			header('Location: home');
			exit;
	}
	
	//traitement du formulaire
	public function submit()
	{
		
		if (isset( $_POST['firstName']) && !empty($_POST['firstName']) && isset( $_POST['lastName']) && !empty($_POST['lastName']) && isset( $_POST['avatar']) && !empty($_POST['avatar']) && isset( $_POST['email']) && !empty($_POST['email']) && isset( $_POST['pw']) && !empty($_POST['pw']))
		{
			//préparer les données pour les mettre dans la base de données
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$avatar= $_POST['avatar'];
			$email = $_POST['email'];
			$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
			var_dump($pw);
			var_dump($_POST['pw']);
	
			//mettre les datas en bdd
			$model = new \Models\User();
			try 
			{
			$model -> AddUser($firstName, $lastName, $avatar, $email, $pw);
			header('Location: index.php?page=home');
				exit;
			}
			catch(\Exception $e)
			{
				$this -> message1 = "Cet email est déjà utilisé";
			}
			
		}
			$user = $model -> getUserByEmail($email);
			
			$_SESSION['id_user'] = $user['id_user'];
		
			//header('location:home');
			//exit;
	}
	
}