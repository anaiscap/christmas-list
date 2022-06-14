<?php

namespace Models;

class Gift extends Database
{
	
	public function getAllGifts():array
	{
		return $this -> findAll('
			SELECT id_gift, title, gift_src, gift_alt, link, price, id_list FROM gifts
			ORDER BY title DESC'
			);
	}

	public function addGifts($title, $gift_src, $gift_alt, $link, $price, $id_list)
	{
		$this -> query(
			"INSERT INTO gifts (title, gift_src, gift_alt, link, price, id_list) VALUES (?,?,?,?,?,?)",
			[$title, $gift_src, $gift_alt, $link, $price, $id_list]
			);
	}

	public function ModifyGift($title, $src, $alt, $link, $price )
	{
		//requêtes sql qui permet la modification d'un cadeau
		$this -> query("UPDATE blog 
		SET title = ?, gift_src = ?, gift_alt = ?, link = ?, price = ?
		WHERE id_gift = ?",[$title, $src, $alt, $link, $price]);
	}

	public function getGiftById(int $id):array
	{
		return $this -> findOne('
		SELECT title, gift_src, gift_alt, link, price, id_list
		FROM gifts 
		WHERE id_gift = ?',[$id]);
	}

	public function addBooking($id_user, $id_gift)
	{
		$this -> query(
			"INSERT IGNORE INTO giftBooking (id_user, id_gift, id_status) VALUES (?,?,2)",
			[$id_user, $id_gift]
			);
	}

}