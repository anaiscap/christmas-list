<?php

namespace Controllers;

class AccountController 
{
	
	use SessionController;
	
	private $message1;
    private $message2;
	private $message3;
    private $message4;
	private $message5;
    private $message6;

		public function __construct()
	{
		$this -> redirectIfNotUser();
		$this -> message1 = "";
		$this -> message2 = "";
		$this -> message3 = "";
		$this -> message4 = "";
		$this -> message5 = "";
		$this -> message6 = "";
		$this -> message7 = "";
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
		if (isset( $_POST['first_name']) && !empty($_POST['first_name']) && isset( $_POST['last_name']) && !empty($_POST['last_name']) && isset( $_POST['avatar']) && !empty($_POST['avatar']) && isset( $_POST['email']) && !empty($_POST['email']) && isset( $_POST['password']) && !empty($_POST['password']))
		{
		//préparer les données pour les mettre dans la base de données
		$firstName_curr = $_POST['first_name'];
		if (!preg_match("/^[a-zA-Z]+$/",$firstName_curr)) {
			$firstName_curr = false; 
		} else { $firstName = $firstName_curr;
		}
		$lastName_curr = $_POST['last_name'];
		if (!preg_match("/^[a-zA-Z]+$/",$lastName_curr)) {
			$lastName_curr = false; 
		}else { 
			$lastName = $lastName_curr;
		}
		$avatar = $_POST['avatar'];
		$email_curr = $_POST['email'];
		if (!filter_var($email_curr, FILTER_VALIDATE_EMAIL)) {
			$email_curr = false; 
		}else { 
			$email = $email_curr;
		}
		$password = $_POST['password'];
		
		$id = $_SESSION['idUser'];
		$model = new \Models\User();
		try {
			$model -> ModifyUser($firstName, $lastName, $avatar, $email, $password, $id);

		} catch(\Exception $e) {

			if ($firstName_curr == false) {
				$this -> message1 = "Prénom invalide";
				}
			else if ($lastName_curr == false) {
				$this -> message2 = "Nom invalide";
				}
			else if ($email_curr == false) {
				$this -> message3 = "Email invalide";
				} else {
				$this -> message6 = "Cet email est déjà utilisé";
			}
		}
		
	}
		//header('location:parameters');
          //  exit;
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
