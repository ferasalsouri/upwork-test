<?php

class Product_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function count_products()
	{
		$query = $this->db->query('SELECT * FROM products where status =1');
		return $query->num_rows();
	}

	public function products_not_belong_to_any_users()
	{
		$query = $this->db->query('SELECT COUNT(DISTINCT(products.id)) as products_not_belong_to_any_users FROM products join stocks on products.id = stocks.product_id  where stocks.user_id IS NULL AND products.status =1 ');
		return $query->row();
	}

	public function amount_products()
	{
		$query = $this->db->query('SELECT SUM(stocks.quantity) as amount_products FROM stocks join products on stocks.product_id = products.id where products.status =1');
		return $query->row();
	}

	/* 3.6. Summarized price of all active attached products
	 (from the previous subpoint if prod1 price is 100$, prod2 price is 120$, prod3 price is 200$, the summarized price will be 3 x 100 + 9 x 120 = 1380).*/

	public function summarized_price_active_product()
	{
		$query = $this->db->query('select sum(`stocks`.`quantity` * `stocks`.`price`) as total_price FROM `stocks` JOIN products on stocks.product_id = products.id WHERE products.status = 1;');
		return $query->result();
	}

	/*3.7. Summarized prices of all active products per user.
	 For example - John Summer - 85$, Lennon Green - 107$.*/
	public function fetch_active_products_users()
	{
		$this->db->join('users', 'users.id=stocks.user_id');
		$this->db->select('stocks.*,users.name');
		$this->db->where('stocks.user_id !=',  NULL, FALSE);
		$query = $this->db->get('stocks');
		return $query->result_array();
	}
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
		$query = $this->db->get_where('stocks', ['status' => 1]);
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
