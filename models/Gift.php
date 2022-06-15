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
	{var_dump($title, $gift_src, $gift_alt, $link, $price, $id_list);
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
	{ try {
		//code...
		$this -> query(
			"INSERT IGNORE INTO giftBooking (id_user, id_gift, id_status) VALUES (?,?,2)",
			[$id_user, $id_gift]
		);
	} catch (\Exception $e) {
		throw $e;
	}
	}

	public function modifyBooking($id_status)
	{
		//requêtes sql qui permet la modification d'un cadeau
		$this -> query("UPDATE giftBooking 
		SET id_status = ?
		WHERE id_gift = ?",[$id_status]);
	}
	public function getAllBookingsByUser($id):array
	{
		return $this -> findAll('
		SELECT title, gift_src, link, price, status, first_name, last_name, l.id_user 
		FROM giftBooking INNER JOIN gifts ON giftBooking.id_gift = gifts.id_gift 
		INNER JOIN lists l ON gifts.id_list = l.id_list 
		INNER JOIN status ON giftBooking.id_status = status.id_status 
		INNER JOIN users ON l.id_user = users.id_user 
		WHERE giftBooking.id_user = ?',[$id]);
	}


}
//, title, gift_src, link, price, status
//INNER JOIN gifts ON giftBooking.id_user = gifts.id_user
//INNER JOIN status ON giftBooking.id_status = status.id_status//