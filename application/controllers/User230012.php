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
        $this->load->helper('pagination_helper');
    }

    public function index()
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
        if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        $this->load->library('pagination');

        $total_rows = $this->db->count_all('users_230012');
        $per_page = 10;
        $start = $this->uri->segment(3) ? $this->uri->segment(3) : 0;

        $config = bootstrap_pagination_config(
            site_url('user230012/index'),
            $total_rows,
            $per_page,
            3
        );

        $this->pagination->initialize($config);

        $data['i'] = $start + 1;
        $data['users'] = $this->User230012_model->read($per_page, $start);
        $data['title'] = 'User List';
        $data['pagination'] = $this->pagination->create_links();

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
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">User added successfully!</div>');
                    redirect('user230012');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">Failed to add user</div>');
                    redirect('user230012/add');
                }
                redirect('user230012');
            }
        }

        $data['title'] = 'Add User';
        $this->app->template('users/user_form_230012', $data);
    }

    public function edit($id)
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');
        if ($this->session->userdata('usertype_230012') != "Manager") redirect('welcome');

        if ($this->input->post('submit')) {
            if ($this->User230012_model->validate()) {
                $this->User230012_model->update($id);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">User successfully updated!</div>');
                    redirect('user230012');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">Failed to update user!</div>');
                    redirect('user230012/add');
                }
                redirect('user230012');
            }
        }
        $data['users'] = $this->User230012_model->read_by($id);
        $data['title'] = 'Edit User';
        $this->app->template('users/user_form_230012', $data);
    }

    public function delete($id)
    {
        $this->User230012_model->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">User deleted successfully</div>');
        redirect('user230012');
    }

    public function reset_password($id)
    {
        $user = $this->User230012_model->read_by($id);
        $usertype = $user->usertype_230012;

        $this->User230012_model->reset_password($id, $usertype);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Password berhasil direset</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Gagal mengubah password</div>');
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
            $this->User230012_model->update_profiles();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Profile updated successfully!</div>');
                $this->session->set_userdata('username_230012', $this->input->post('username_230012'));
                $this->session->set_userdata('fullname_230012', $this->input->post('fullname_230012'));
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Failed to update profile</div>');
            }
            redirect('user230012/profile');
        }
    }
}

/* End of file User230012.php and path \application\controllers\User230012.php */
