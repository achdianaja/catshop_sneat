<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Controller $this
 * @property Category230012_model $Category230012_model
 * @property CI_Loader $this->load
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 * @property CI_Pagination $pagination
 * @property CI_URI $uri
 */

class Category230012 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category230012_model');
		$this->load->library('app');
		$this->load->helper('pagination_helper');
    }

    public function index()
	{
		$this->load->library('pagination');

		$total_rows = $this->db->count_all('category_230012');
		$per_page = 10;
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$config = bootstrap_pagination_config(
			site_url('category230012/index'),
			$total_rows,
			$per_page,
			3
		);

		$this->pagination->initialize($config);

		$data['i'] = $start + 1;
		$data['category'] = $this->Category230012_model->read($per_page, $start);
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = 'Category List';

		$this->app->template('categories/category_list_230012', $data);
	}


	public function add()
	{
		if ($this->Category230012_model->validate() == FALSE) {
			$data['title'] = 'Add Category';
			$this->app->template('categories/category_form_230012', $data);
		} else {
			$this->Category230012_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Category successfully added!</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Category failed to add!</div>');
			}
			redirect('/category230012');
		}
	}

	public function edit($id)
	{
		if ($this->Category230012_model->validate() == FALSE) {
			$data['category'] = $this->Category230012_model->read_by($id);
			$data['title'] = 'Edit Category';
			$this->app->template('categories/category_form_230012', $data);
		} else {
			$this->Category230012_model->update($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Category successfully updated!</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Category failed to update!</div>');
			}
			redirect('/category230012');
		}
	}

	public function delete($id)
	{
		$this->Category230012_model->delete($id);
		if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Category successfully deleted!</div>');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Category failed to delete!</div>');
			}
		redirect('/category230012');
	}
}

/* End of file Category230012.php and path \application\controllers\Category230012.php */
