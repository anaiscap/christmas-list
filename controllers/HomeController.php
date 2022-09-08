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
    
}