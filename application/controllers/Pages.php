<?php


class Pages extends CI_Controller
{


	public function view($page = 'home')
	{
		if ($page == 'home') {
			$data['count_active_products'] = $this->product_model->count_products();
			$data['count_active_verified_users_active_products'] = $this->user_model->get_active_verfiy_users_active_products();
			$data['count_active_verified_users'] = $this->user_model->get_active_verfiy_users();
			$data['products_not_belong_to_any_users'] = $this->product_model->products_not_belong_to_any_users();
			$data['amount_products'] = $this->product_model->amount_products();
			$data['summarized_price_active_product'] = $this->product_model->summarized_price_active_product();
			$data['fetch_active_products_users'] = $this->product_model->fetch_active_products_users();


		}
		if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page);

		$this->load->view('templates/header');
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}


	public function exchanGerates_api()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
		$convertCurrency= $this->input->post('convertCurrency');
		$currency= $this->input->post('currency');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=".$currency."&from=EUR&amount=5".$convertCurrency,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: text/plain",
				"apikey: 1P248PAHpXFu1bbd1L0wTzmGSHKrrUa9"
			),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET"
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;


	}
}
