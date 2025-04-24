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

		$this->load->library('app');
		$data['title'] = 'Dashboard';
		$this->app->template('home_menu_230012', $data);
	}
}
