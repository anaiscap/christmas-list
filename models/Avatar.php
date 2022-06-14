<?php

namespace Models;

class Avatar extends Database
{

	public function getAllAvatars():array
	{
		return $this -> findAll("SELECT id_avatar, avatar_src, avatar_alt FROM avatar");	
	}
	
	
	public function findAvatarById($id):?array
	{
		return $this -> findOne("SELECT id_avatar, avatar_src, avatar_alt
		FROM avatar WHERE id_avatar = ?",[$id]);
	}
	
}