<?php

namespace Models;

class Lists extends Database
{
	
	public function getAllLists():array
	{
		return $this -> findAll('
			SELECT id_list, id_user, name, date FROM lists
			
			ORDER BY id_user DESC'
			);
	}
	
	public function getAllListsByUser($id):array
	{
		return $this -> findAll('
			SELECT id_list, id_user, name, date FROM lists
			WHERE id_user = ?',[$id]);
	}
	
	public function getListById(int $id):array
	{
		return $this -> findOne('
		SELECT  id_list, name, first_name, last_name
		FROM lists
		INNER JOIN users ON lists.id_user = users.id_user
		WHERE id_list = ?',[$id]);
	}

	public function addList($id_user, $name)
	{
		$this -> query(
			"INSERT INTO lists (id_user, name, date) VALUES (?,?,NOW())",
			[$id_user, $name]
			);
	}
	
	public function modifyList($name, $id )
	{
		//requêtes sql qui permet la modification d'une liste
		$this -> query(
		"UPDATE lists 
		SET name = ?
		WHERE id_list = ?",[$name, $id]);
	}

	public function subscribeList($id_list, $id_user) 
	{
		$this -> query(
			"INSERT IGNORE INTO subscription (id_list, id_user) VALUES (?,?)",
			[$id_list, $id_user]
			);
	}

	public function getAllSubscriptionsByUser($id):array
	{
		return $this -> findAll('
		SELECT subscription.id_list, name, first_name, last_name, avatar_src 
		FROM subscription
		INNER JOIN lists ON subscription.id_list = lists.id_list
		INNER JOIN users ON lists.id_user = users.id_user
		INNER JOIN avatar ON users.avatar = avatar.id_avatar
		WHERE subscription.id_user = ?',[$id]);
	}

	public function deleteList($id, $user)
	{
		//requête sql qui permet la suppression de la liste
		$this -> query("
		DELETE FROM lists 
		WHERE id_list = ?
		AND (SELECT 1 FROM users WHERE id_user=lists.id_user AND id_user= ?)",[$id, $user]);
	}

	public function deleteSubscription($id)
	{
		//requête sql qui permet la suppression de la liste
		$this -> query("DELETE FROM subscription WHERE id_list = ? ",[$id]);
		
	}
}