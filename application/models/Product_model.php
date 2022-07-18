<?php

class Product_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
//
//	public function get_all()
//	{
//		$query = $this->db->get('products');
//		return $query->result_array();
//	}

	public function get_product($slug = False)
	{

		if ($slug === FALSE) {
			$this->db->order_by('products.id', 'DESC');
			$this->db->join('stocks', 'stocks.id=products.stock_id');
			$this->db->select('products.*,stocks.title as name');
			$query = $this->db->get('products');
			return $query->result_array();
		}
		$this->db->join('stocks', 'stocks.id=products.stock_id');
		$this->db->select('products.*,stocks.title as name');
		$query = $this->db->get_where('products', array('slug' => $slug));
		return $query->row_array();
	}

	public function get_stocks()
	{
		$this->db->order_by('title');
		$query = $this->db->get('stocks');
		return $query->result_array();
	}


	public function product_create($post_image)
	{

		$title = $this->input->post('title');
		$data = array(
			'title' => $title,
			'slug' => url_title($title),
			'description' => $this->input->post('description'),
			'stock_id' => $this->input->post('stock_id'),
			'user_id' => 1,
			'image' => $post_image,
			'created_at' => date('Y-m-d H:i:s'),
			'price' => 10.0,
		);

		$this->db->insert('products', $data);

	}

	public function product_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('products');
		return true;

	}

	public function product_update($post_image)
	{

		$title = $this->input->post('title');
		$data = array(
			'title' => $title,
			'slug' => url_title($title),
			'description' => $this->input->post('description'),
			'stock_id' => $this->input->post('stock_id'),
			'image' => $post_image,
			'user_id' => 1,
			'updated_at' => date('Y-m-d H:i:s'),
			'price' => 10.0,
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('products', $data);
	}

	public function get_product_by_category($id)
	{
		$this->db->order_by('products.id', 'DESC');
		$this->db->join('stocks', 'stocks.id=products.stock_id');
		$this->db->select('products.*,stocks.title as name');
		$query = $this->db->get_where('products', array('stock_id' => $id));
		return $query->result_array();

	}
}
