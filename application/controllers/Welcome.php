<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Controller $this
 * @property CI_Model $User230012_model
 * @property CI_Loader $this->load
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 * @property CI_library $app
 * @property CI_Pagination $pagination
 * @property CI_DB_query_builder $db
 */

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if(!$this->session->userdata('username_230012')) redirect('auth230012/login');

		$this->load->model('cats230012_model');
		$data['profit'] = $this->cats230012_model->get_profit();
		$data['sold'] = $this->cats230012_model->get_sold();
		$data['last_sale_price'] = $this->cats230012_model->get_last_sale_price();
		
		$weekly_sales = $this->cats230012_model->get_weekly_sales();
		$target_sales = 100;
		$data['sale_count'] = $weekly_sales;
		$data['sale_percentage'] = min(100, round(($weekly_sales / $target_sales) * 100));

		$sales_data = $this->cats230012_model->get_sales_last_7_days();
		$data['chart_labels'] = json_encode(array_keys($sales_data));
		$data['chart_values'] = json_encode(array_values($sales_data));


		$this->load->library('app');
		$data['title'] = 'Dashboard';
		$this->app->template('home_menu_230012', $data);
	}

}
