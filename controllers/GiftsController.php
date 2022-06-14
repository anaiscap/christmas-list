<?php

namespace Controllers;

class GiftsController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotUser();
		//$this -> displayGifts();

	}


	// formulaire de création d'une nouvelle liste
	public function submitBooking()
	{
        //préparer les données pour les mettre dans la base de données
        $id_user = $_SESSION['idUser'];
        $id_gift = $_GET['id_gift'];
			//mettre les datas en bdd
			$model = new \Models\Gift();
			$model -> addBooking($id_user, $id_gift);

			header("location:index.php?route=lists");
				exit;
	}
	

	// formulaire de création d'un nouveau cadeau
	public function submitGift()
	{
		if (isset( $_POST['title']) && !empty($_POST['title']) && isset( $_POST['gift_alt']) && !empty($_POST['gift_alt']) && isset( $_POST['link']) && !empty($_POST['link']) && isset( $_POST['price']) && !empty($_POST['price']) )
		{
			//préparer les données pour les mettre dans la base de données
			$title = $_POST['title'];
			$gift_alt = $_POST['gift_alt'];
			$link = $_POST['link'];
			$price = $_POST['price'];
			$gift_src = "assets/img/gifts/{$_FILES['gift_src']['name']}";
			$id_list = $_GET['id'];

			//upload mon image
			move_uploaded_file ($_FILES['gift_src']['tmp_name'], $gift_src);

			//mettre les datas en bdd
			$model = new \Models\Gift();
			$model -> addGifts($title, $gift_src, $gift_alt, $link, $price, $id_list);
			
		}
	}

	public function subscribe()
	{
			//préparer les données pour les mettre dans la base de données
			$id_list = $_GET['id_list'];
			$id = $_GET['id_user'];
			$id_user = $_SESSION['idUser'];
			//mettre les datas en bdd
			$model = new \Models\Lists();
			$model -> subscribeList($id_list, $id_user);

			header('location:index.php?route=lists');
				exit;
	}
	public function displayMySubscriptions()
	{
		//afficher les listes de l'utilisateur
		$id = $_SESSION['idUser'];
		$model = new \Models\Lists();
		$lists = $model -> getAllSubscriptionsByUser($id);
        $view = 'views/lists.php';
        include 'views/layout.php';
	}	

	// formulaire de création d'un statut
	public function booking()
	{
		if (isset( $_POST['name']) && !empty($_POST['name']))
		{
			//préparer les données pour les mettre dans la base de données
			$id_user = $_SESSION['idUser'];
			$name = $_POST['name'];

			//mettre les datas en bdd
			$model = new \Models\Lists();
			$model -> addList($id_user, $name);

			header('location:index.php?route=mylists');
				exit;
		}
	}

}