<?php

namespace Controllers;

Trait SessionController
{
	public function redirectIfNotAdmin()
	{
		if(!isset($_SESSION['admin']))
		{
			header('Location: home');
		}
	}
	public function redirectIfNotUser()
	{
		if(!isset($_SESSION['user']))
		{
			header('Location: home');
		}
	}
	
}