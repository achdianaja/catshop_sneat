<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Controller $this
 * @property User230012_model $User230012_model
 * @property CI_Loader $this->load
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 * @var CI_DB_query_builder $this->db
 * @property CI_Pagination $pagination
 * @property CI_URI $uri
 * @property CI_library $app
 */

class User230012 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User230012_model');
        $this->load->library('form_validation');
        $this->load->library('app');
    }

    public function index()
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
        if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        $this->load->library('pagination');
        $config['base_url'] = site_url('user230012/index');
        $config['total_rows'] = $this->db->count_all('users_230012');
        $config['per_page'] = 5;
        $this->pagination->initialize($config);

        $limit = $config['per_page'];
        $start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

        $data['i'] = $start + 1;

        $data['users'] = $this->User230012_model->read($limit, $start);
        $this->app->template('users/user_list_230012', $data);
    }

    public function add()
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
        if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        if ($this->input->post('submit')) {
            if ($this->User230012_model->validate()) {
                $this->User230012_model->create();

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div style="color:green;">User added successfully!</div>');
                    redirect('user230012');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color:red;">Failed to add user</div>');
                    redirect('user230012/add');
                }
                redirect('user230012');
            }
        }

        $this->app->template('users/user_form_230012');
    }

    public function edit($id)
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
        if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        if ($this->input->post('submit')) {
            if ($this->User230012_model->validate()) {
                $this->User230012_model->update($id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div style="color:green;">User successfully updated!</div>');
                    redirect('user230012');
                } else {
                    $this->session->set_flashdata('msg', '<div style="color:red;">Failed to update user!</div>');
                    redirect('user230012/add');
                }
                redirect('user230012');
            }
        }
        $data['users'] = $this->User230012_model->read_by($id);

        $this->app->template('users/user_form_230012', $data);
    }

    public function delete($id)
    {
        $this->User230012_model->delete($id);
        $this->session->set_flashdata('msg', '<div style="color:green;">User deleted successfully</div>');
        redirect('user230012');
    }

    public function reset_password($id)
    {
        $user = $this->User230012_model->read_by($id);
        $usertype = $user->usertype_230012;

        $this->User230012_model->reset_password($id, $usertype);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div style="color:green;">Password berhasil direset</div>');
        } else {
            $this->session->set_flashdata('msg', '<div style="color:red;">Gagal mengubah password</div>');
        }

        return redirect('user230012');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $this->app->template('users/user_profile_230012', $data);
    }

    public function update_profile()
    {
        if ($this->input->post('submit')) {
            $this->User230012_model->update_profile();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<div style="color:green;">Profile updated successfully!</div>');
            } else {
                $this->session->set_flashdata('msg', '<div style="color:red;">Failed to update profile</div>');
            }
            redirect('user230012/profile');
        }
    }
}

/* End of file User230012.php and path \application\controllers\User230012.php */
