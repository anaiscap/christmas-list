<?php

namespace Controllers;

class ListsController {
	
	use SessionController;
	
	public function __construct()
	{
		$this -> redirectIfNotUser();
		//$this -> displayGifts();

		//si le formulaire a été soumis
		if(!empty($_POST) ){
			$this -> submitList();
		}
	}

	// fonctions permettant d'afficher les listes par utilisateurs
	public function displayAllLists()
	{
		//afficher les listes de l'utilisateur
		$model = new \Models\Lists();
		$lists = $model -> getAllLists();
        $view = 'views/lists.php';
        include 'views/layout.php';
	}
	
	public function display()
	{
		//afficher les listes de l'utilisateur connecté
		$model = new \Models\Lists();
		$lists = $model -> getAllListsByUser($_SESSION['idUser']);
        $view = 'views/mylists.php';
        include 'views/layout.php';
	}

	

	// supprime la liste
	public function delete_list()
	{
		//supprimer une liste de l'utilisateur
	    $model = new \Models\Lists();
	    $model -> deleteList($_GET['id']);
	}


	// supprime un abonnement à une liste
	public function delete_sub()
	{
		//supprimer un abonnement
		$model = new \Models\Lists();
		$model -> deleteSubscription($_GET['id']);
	}


	//affiche le formulaire de création d'une nouvelle liste
	public function newList()
	{
        $view = 'views/newlist.php';
        include 'views/layout.php';
	}

	// formulaire de création d'une nouvelle liste
	public function submitList()
	{
		if (isset( $_POST['name']) && !empty($_POST['name']))
		{
			//préparer les données pour les mettre dans la base de données
			$id_user = $_SESSION['idUser'];
			$name = $_POST['name'];

			//mettre les datas en bdd
			$model = new \Models\Lists();
			$model -> addList($id_user, $name);

			header('Location: index.php?route=mylists');
			exit;
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

			header('Location: index.php?route=lists');
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

}