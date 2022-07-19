<?php

class User_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_active_verfiy_users_active_products()
	{


		$query = $this->db->query('SELECT COUNT(DISTINCT(users.id)) FROM users join stocks on users.id = stocks.user_id  join products on stocks.product_id= products.id where users.token IS NOT NULL AND products.status =1 ');
		return $query->num_rows();
	}
	public function get_active_verfiy_users()
	{

		$query = $this->db->query('SELECT count(DISTINCT( users.id)) as active_verfied_user FROM users join stocks on users.id = stocks.user_id  where users.token IS NOT NULL ');
		return $query->row();
	}

}
