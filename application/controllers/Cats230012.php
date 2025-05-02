<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Controller $this
 * @property Cats230012_model $Cats230012_model
 * @property Category230012_model $Category230012_model
 * @property CI_Loader $this->load
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 * @property CI_Pagination $pagination
 * @property CI_URI $uri
 * @property CI_Upload $upload
 */

class Cats230012 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cats230012_model');
		$this->load->model('Category230012_model');
		$this->load->library('app');
		$this->load->helper('pagination_helper');
	}

	public function index()
	{
		$this->load->library('pagination');

		$total_rows = $this->db->count_all('cats_230012');
		$per_page = 5;
		$start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

		$config = bootstrap_pagination_config(
			site_url('cats230012/index'),
			$total_rows,
			$per_page,
			3
		);

		$this->pagination->initialize($config);

		$data['i'] = $start + 1;
		$data['cats']  = $this->Cats230012_model->read($per_page, $start);
		$data['title'] = 'Cats List';
		$data['pagination'] = $this->pagination->create_links();

		$this->app->template('cats/cats_list_230012', $data);
	}


	public function add()
	{
		if ($this->input->post('submit')) {
			if ($this->Cats230012_model->validation()) {
				$this->Cats230012_model->create();
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Cat successfully added!</div>');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Cat failed to add!</div>');
				}

				redirect('/cats230012');
			}
		}

		$data['categories'] = $this->Category230012_model->read_category();
		$data['title'] = 'Cats Form Add';
		$this->app->template('cats/cats_form_230012', $data);
	}

	public function edit($id)
	{
		$data['cat'] = $this->Cats230012_model->read_by($id);
		$data['error'] = '';
		$data['categories'] = $this->Category230012_model->read_category();

		if ($this->input->post('submit')) {
			if ($this->Cats230012_model->validation()) {
				$this->Cats230012_model->update($id);

				if (!empty($_FILES['cats_photo_230012']['name'])) {
					$upload_result = $this->upload($id);
					if ($upload_result['status']) {
						$this->Cats230012_model->change_photo($upload_result['file_name'], $id);
					} else {
						$data['error'] = $upload_result['error'];
					}
				}

				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success">Cat successfully updated!</div>');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Cat failed to update!</div>');
				}

				redirect('/cats230012');
			}
		}

		$data['title'] = 'Cats Form Edit';
		$this->app->template('cats/cats_form_230012', $data);
	}

	private function upload($id)
	{
		$cat = $this->Cats230012_model->read_by($id);
		$cat_name = isset($cat->name_230012) ? preg_replace('/[^a-zA-Z0-9_-]/', '', $cat->name_230012) : 'cat';

		$config['upload_path'] = './uploads/cats/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2048;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;
		$config['file_name'] = $cat_name;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('cats_photo_230012')) {
			$uploaded_data = $this->upload->data();

			if (!empty($cat->cats_photo_230012) && $cat->cats_photo_230012 != 'default.png') {
				$old_file = './uploads/cats/' . $cat->cats_photo_230012;
				if (file_exists($old_file)) {
					unlink($old_file);
				}
			}

			return [
				'status' => true,
				'file_name' => $uploaded_data['file_name']
			];
		} else {
			return [
				'status' => false,
				'error' => $this->upload->display_errors('<p style="color:red">', '</p>')
			];
		}
	}

	public function delete($id)
	{
		$this->Cats230012_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Cat successfully deleted!</div>');
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Cat failed to delete!</div>');
		}
		redirect('/cats230012');
	}
}
