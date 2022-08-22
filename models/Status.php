<?php

namespace Models;

class Avatar extends Database
{

	public function getAllStatus()
	{
		return $this -> findAll('
			SELECT id_status, status FROM status
			ORDER BY title DESC'
			);
	}
	
	
	public function findAvatarById($id):?array
	{
		return $this -> findOne("SELECT id_avatar, avatar_src, avatar_alt
		FROM avatar WHERE id_avatar = ?",[$id]);
	}
	
}