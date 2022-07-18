<?php


class Products extends CI_Controller
{


	public function index()
	{
		$data['title'] = 'Products';
		$data['products'] = $this->product_model->get_product();

		$this->load->view('templates/header');
		$this->load->view('products/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{

		$data['product'] = $this->product_model->get_product($slug);

		if (empty($data['product'])) {
			show_404();
		}
		$product_id = $data['product']['id'];


		$data['title'] = $data['product']['title'];

		$this->load->view('templates/header');
		$this->load->view('products/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{

		$data['title'] = "Create New Product";
		$data['stocks'] = $this->product_model->get_stocks();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('products/create', $data);
			$this->load->view('templates/footer');
		} else {

			$config['upload_path'] = './assets/images/products';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'no_image.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->product_model->product_create($post_image);
			redirect('products');
		}

	}

	public function delete($id)
	{
		$this->product_model->product_delete($id);
		redirect('products');

	}

	public function edit($slug)
	{

		$data['title'] = "edit New Product";
		$data['product'] = $this->product_model->get_product($slug);
		$data['stocks'] = $this->product_model->get_stocks();
		if (empty($data['product'])) {
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('products/edit', $data);
		$this->load->view('templates/footer');

	}

	public function update()
	{
		$config['encrypt_name'] = TRUE;
		$config['upload_path'] = './assets/images/products';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$errors = array('error' => $this->upload->display_errors());
			$post_image = 'no_image.jpg';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$post_image = $_FILES['image']['name'];
		}
		$this->product_model->product_update($post_image);
		redirect('products');
	}

}
