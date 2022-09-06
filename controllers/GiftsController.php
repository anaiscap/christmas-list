<?php

namespace Controllers;
class GiftsController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotUser();
		$this -> message1 = "";
		$this -> message2 = "";
		$this -> message3 = "";
		$this -> message4 = "";
	}

	public function submitGift()
	{
		if (isset( $_POST['title']) && !empty($_POST['title']) && isset( $_POST['link']) && !empty($_POST['link']) && isset( $_POST['price']) && !empty($_POST['price']) )
		{
			//préparer les données pour les mettre dans la base de données
			$title_curr = $_POST['title'];
			if (!preg_match("/^[a-zA-Z]+$/",$title_curr)) {
				$title_curr = false; 
			} else { 
				$title = $title_curr;
			}
			$link = $_POST['link'];
			/*if (!preg_match("/^(?:([A-Za-z]+):)?(\/{0,3})([0-9.\-A-Za-z]+)
			(?::(\d+))?(?:\/([^?#]*))?(?:\?([^#]*))?(?:#(.*))?$/",$link_curr)) {
				$link_curr = false; 
			} else { 
				$link = $link_curr;
			}*/
			$price_curr = $_POST['price'];
			if (!preg_match("/^((\d{1,3}|\s*){1})((\,\d{3}|\d)*)(\s*|\.(\d{2}))$/",$price_curr)) {
				$price_curr = false; 
			} else { 
				$price = $price_curr;
			}
			$gift_src = "assets/img/gifts/{$_FILES['gift_src']['name']}";
			$id_list = $_GET['id'];

			//upload mon image
			move_uploaded_file ($_FILES['gift_src']['tmp_name'], $gift_src);

			//mettre les datas en bdd
			$model = new \Models\Gift();
			try
			{
				$model -> addGifts($title, $gift_src, $link, $price, $id_list);
			} catch(\Exception $e)
			{
				if ($title_curr == false) {
					$this -> message1 = "Titre invalide";
					}
				else if ($price_curr == false) {
					$this -> message2 = "Prix invalide";
					}
			}
		}
	}
	// fonction permettant d'afficher les cadeaux d'une liste
	public function displayAllGifts()
	{
		//défini la liste
		$model = new \Models\Lists();
		$lists = $model -> getListById($_GET['id']);
		$model2 = new \Models\Gift();
		$bookings = $model2 -> getAllBookingsByUser($_GET['id']);
		//afficher les cadeaux d'une liste
		$model1 = new \Models\Gift();
		$gifts = $model1 -> getAllGiftsByListId($_GET['id']);
        $view = 'views/displaygifts.php';
        include 'views/layout.php';
	}

	// permet de modifier une liste
	public function displayModify()
	{
		if(!empty($_POST) ){
			$this -> submitGift();
		}
		//modifier une liste de l'utilisateur
		$model = new \Models\Lists();
		$lists = $model -> getListById($_GET['id']);
		//afficher les cadeaux d'une liste
		$model1 = new \Models\Gift();
		$gifts = $model1 -> getAllGiftsByListId($_GET['id']);
        $view = 'views/modifylist.php';
        include 'views/layout.php';
	}

	// supprime un cadeau
	public function delete_gift()
	{
		//supprimer un cadeau d'une liste
		$model = new \Models\Gift();
		$model -> deleteGift($_GET['id']);
	}

	// supprime un cadeau
	public function delete_booking()
	{
		//supprimer un cadeau d'une liste
		$model = new \Models\Gift();
		$model -> deleteBooking($_GET['id']);
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
			header("Location: index.php?route=displayBooking");
			exit;
	}

	public function displayMyBookings()
	{
		//afficher les listes de l'utilisateur
		$id = $_SESSION['idUser'];
		$model = new \Models\Gift();
		$bookings = $model -> getAllBookingsByUser($id);
		$model1 = new \Models\Gift();
		$stats = $model1 -> getAllStatus();
		
        $view = 'views/bookings.php';
        include 'views/layout.php';
	}

	public function modifyMyBookings()
	{
		//préparer les données pour les mettre dans la base de données
		$status = $_POST['status'];
		$user = $_SESSION['idUser'];
		$gift = $_POST['idgift'];
		//mettre les datas en bdd
		$model = new \Models\Gift();
		$modifyBooking = $model -> ModifyBooking($status, $user, $gift);
		header('location:displayBooking');
        exit;
	}
	
	
}