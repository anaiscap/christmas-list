<?php

namespace Controllers;

class NewUserController {
	
   // private $message1;
   // private $message2;
    
    public function __construct()
    {
    	$this -> message1 = "";
		$this -> message2 = "";
		$this -> message3 = "";
		$this -> message4 = "";
		$this -> message5 = "";
		$this -> message6 = "";
		$this -> message7 = "";
        
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
		include 'models/User.php';
		
		if (isset( $_POST['firstName']) && !empty($_POST['firstName']) && isset( $_POST['lastName']) && !empty($_POST['lastName']) && isset( $_POST['avatar']) && !empty($_POST['avatar']) && isset( $_POST['email']) && !empty($_POST['email']) && isset( $_POST['pw']) && !empty($_POST['pw']))
		{

			//préparer les données pour les mettre dans la base de données
			$firstName_curr = $_POST['firstName'];
			if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ]+$/",$firstName_curr)) {
				$firstName_curr = false; 
			} else { $firstName = $firstName_curr;
			}
			$lastName_curr = $_POST['lastName'];
			if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ]+$/",$lastName_curr)) {
				$lastName_curr = false; 
			}else { 
				$lastName = $lastName_curr;
			}
			$avatar= $_POST['avatar'];
			
			$email_curr = $_POST['email'];
			if (!filter_var($email_curr, FILTER_VALIDATE_EMAIL)) {
				$email_curr = false; 
			}else { 
				$email = $email_curr;
			}
			$pw_curr = $_POST['pw'];
			if (!preg_match("/^(?=.{10,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/",$pw_curr)) {
				$pw_curr = false; 
			}else { 
				$pw = password_hash($pw_curr, PASSWORD_DEFAULT);
			}
	
			//mettre les datas en bdd
			$model = new \Models\User();
			try 
			{
			$model -> AddUser($firstName, $lastName, $avatar, $email, $pw);
		
			}
			catch(\Exception $e)
			{
				if ($firstName_curr == false) {
					$this -> message3 = "Prénom invalide";
					}
				else if ($lastName_curr == false) {
					$this -> message4 = "Nom invalide";
					}
				else if ($email_curr == false) {
					$this -> message5 = "Email invalide";
					}
				else if ($pw_curr == false) {
					$this -> message7 = "Le mot de passe doit contenir au moins 8 caractères, dont 1 majuscule, 1 minuscule, 1 chiffre, et 1 caractère spécial.";
					}
				else if ($firstName == NULL || $lastName == NULL ||$avatar == NULL || $email == NULL || $pw) {
					$this -> message2 = "Veuillez remplir tous les champs";
				} else {
					$this -> message1 = "Cet email est déjà utilisé";
				}
			}
		}
			$user = $model -> getUserByEmail($email);
			
			$_SESSION['user'] = htmlspecialchars($user['first_name']).' '.htmlspecialchars($user['last_name']);
			$_SESSION['avatar'] = htmlspecialchars($user['avatar_src']);
			$_SESSION['idUser'] = htmlspecialchars($user['id_user']);
			//redirige vers la page d'accueil
			header('Location: account');
			exit;
	}
	
}