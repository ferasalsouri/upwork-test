<?php


class Stocks extends CI_Controller
{


	public function index()
	{
		$data['title'] = 'stocks';
		$data['stocks'] = $this->stock_model->get_all();
		$this->load->view('templates/header');
		$this->load->view('stocks/index', $data);
		$this->load->view('templates/footer');
	}


	public function create()
	{
		$data['title'] = "Create New Stocks";
		$this->form_validation->set_rules('title', 'Title', 'required');


		if ($this->form_validation->run() == FALSE) {

			$this->load->view('templates/header');
			$this->load->view('stocks/create', $data);
			$this->load->view('templates/footer');
		} else {
		
			$this->stock_model->create_stock();
			$this->session->set_flashdata('success_message', 'Stock has been created success');
			redirect('stocks');
		}

	}

	public function products($id)
	{
		$data['title'] = $this->stock_model->get_stock($id)->title;

		$data['products'] = $this->product_model->get_product_by_category($id);
		$this->load->view('templates/header');
		$this->load->view('products/index', $data);
		$this->load->view('templates/footer');
	}

	public function delete()
	{
		$id=$this->input->post('stock_id');
		$this->stock_model->stock_delete($id);
		$this->session->set_flashdata('danger_message', 'Stock has been Deleted success !');
		redirect('stocks');
		redirect('products');
	}
}
