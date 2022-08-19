<?php

namespace Models;

class User extends Database
{
	//requête sql qui permet de trouver tous les utilisateurs 
	public function getAllUsers():?array
	{
		return $this -> findAll(
			"SELECT id_user, first_name, last_name, avatar, email, avatar_src, password FROM users
			INNER JOIN avatar ON avatar.id_avatar = users.avatar"
		);		
	}
	
	public function AddUser($firstName, $lastName, $avatar, $email, $pw)
	{
		//requête sql qui permet l'ajout d'un nouvel utilisateur
		$this -> query(
			"INSERT INTO users(first_name, last_name, avatar, email, password) VALUES (?,?,?,?,?)",
			[$firstName, $lastName, $avatar, $email, $pw]
		);
	}
	public function ModifyUser($first_name, $last_name, $avatar, $email, $password, $id )
	{
		//requêtes sql qui permet la modification d'une liste
		$this -> query("UPDATE lists 
		SET first_name = ?, last_name = ?, avatar = ?, email = ?, password = ?
		WHERE id_list = ?",[$first_name, $last_name, $avatar, $email, $password, $id]);
	}

	public function getUserByEmail($email)
	{
		//requête sql qui permet de trouver un utilisateur particulier par son email
		return $this -> findOne(
			"SELECT id_user, first_name, last_name, avatar, avatar_src, email, password FROM users
			INNER JOIN avatar ON avatar.id_avatar = users.avatar
			WHERE email = ?",
			[$email]
		);
	}
	
	public function getUserById($id)
	{
		//requête sql qui permet de trouver un utilisateur particulier par son id
		return $this -> findOne(
			"SELECT id_user, first_name, last_name, avatar, avatar_src, email, password FROM users
			INNER JOIN avatar ON avatar.id_avatar = users.avatar
			WHERE id_user = ?",
			[$id]
		);
	}
}