<?php

class Stock_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all()
	{
		$this->db->order_by('title');
		$query = $this->db->get('stocks');
		return $query->result_array();
	}

	public function create_stock()
	{


		$data = array(
			'title' => $this->input->post('title'),
			'created_at' => date('Y-m-d H:i:s'),
			'status' => $this->input->post('active_stock') == 'on' ? 1 : 0,
		);

		$this->db->insert('stocks', $data);
	}

	public function get_stock($id)
	{
		$query = $this->db->get_where('stocks', array('id' => $id));
		return $query->row();
	}

}
