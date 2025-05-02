<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales230012 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cats230012_model');
        $this->load->library('app');
        $this->load->helper('pagination_helper');

    }

    public function index()
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

		$this->load->library('pagination');

		$total_rows = $this->db->count_all('cat_sale_230012');
		$per_page = 5;
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$config = bootstrap_pagination_config(
			site_url('sales230012/index'),
			$total_rows,
			$per_page,
			3
		);

		$this->pagination->initialize($config);

		$data['i'] = $start + 1;
		$data['sales'] = $this->Cats230012_model->sales($per_page, $start);
		$data['title'] = 'Sales List';
		$data['pagination'] = $this->pagination->create_links();

		$this->app->template('cats/sale_list_230012', $data);
    }

    public function sale($id)
	{
		if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
		if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

		if ($this->input->post('submit')) {
			if ($this->Cats230012_model->validate_sale()) {
				$this->Cats230012_model->sale($id);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Cat successfully sold!</div>');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Cat failed to sell!</div>');
                }

				redirect('/cats230012');
			}
		}

		$data['cat'] = $this->Cats230012_model->read_by($id);
		$data['title'] = 'Cats Sale Form';
		$this->app->template('cats/cats_sale_230012', $data);
	}
}

/* End of file Sales230012.php and path \application\controllers\Sales230012.php */
