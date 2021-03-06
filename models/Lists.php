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
			ORDER BY date DESC
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
	
	public function ModifyList($categorie, $title, $description, $src, $alt, $author, $id )
	{
		//requêtes sql qui permet la modification d'une liste
		$this -> query("UPDATE blog 
		SET id_categorie = ?, titre = ?, content = ?, src_img = ?, alt_img = ?, id_auteur = ?
		WHERE id_article = ?",[$categorie, $title, $description, $src, $alt, $author, $id]);
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
		SELECT subscription.id_list, name, first_name, last_name 
		FROM subscription
		INNER JOIN lists ON subscription.id_list = lists.id_list
		INNER JOIN users ON lists.id_user = users.id_user
		WHERE subscription.id_user = ?',[$id]);
	}

	public function deleteList($id)
	{
		//requête sql qui permet la suppression de la liste
		$this -> query("DELETE FROM lists WHERE id_list = ? ",[$id]);
	}

	public function deleteSubscription($id)
	{
		//requête sql qui permet la suppression de la liste
		$this -> query("DELETE FROM subscription WHERE id_list = ? ",[$id]);
		
	}
}