<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Controller $this
 * @property Auth230012_model $Auth230012_model
 * @property CI_Loader $this->load
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Upload $upload
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */

class Auth230012 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth230012_model');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if ($this->input->post('login') && $this->validate('login')) {
            $login = $this->Auth230012_model->getUser($this->input->post('username_230012'));

            if ($login != NULL) {
                if (password_verify($this->input->post('password_230012'), $login->password_230012)) {
                    $data = array(
                        'username_230012' => $login->username_230012,
                        'fullname_230012' => $login->fullname_230012,
                        'usertype_230012' => $login->usertype_230012,
                        'photo_230012' => $login->photo_230012,
                        'id_230012' => $login->id_230012,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($data);

                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Login berhasil</div>');
                    redirect('welcome');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
            }
        }

        $this->load->view('auth/form_login_230012');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth230012/login');
    }

    public function changepassword()
    {
        if (!$this->session->userdata('username_230012')) redirect('auth230012/login');

        if ($this->input->post('change') && $this->validate('change')) {
            $login = $this->Auth230012_model->getUser($this->session->userdata('username_230012'));

            if (password_verify($this->input->post('old_password_230012'), $login->password_230012)) {
                $this->Auth230012_model->change_password($login->id_230012);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Gagal mengubah password</div>');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password lama salah</div>');
            }
        }

        $this->load->view('auth/form_change_password_230012');
    }

    public function changephoto()
    {
        if (!$this->session->userdata('username_230012')) {
            redirect('auth230012/login');
        }
        if ($this->input->post('upload')) {
            if ($this->upload()) {
                $this->Auth230012_model->change_photo($this->upload->data('file_name'));
                $this->session->set_userdata('photo_230012', $this->upload->data('file_name'));
                $this->session->set_flashdata('msg', '<div style="color:green;">Photo berhasil diubah</div>');
            } else {
                $this->session->set_flashdata('msg', '<div style="color:red;">' . $this->upload->display_errors() . '</div>');
            }
        }
        redirect('user230012/profile');
    }


    private function upload()
    {
        $path = './uploads/users/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['file_name'] = $this->session->userdata('username_230012');

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }



    private function validate($type)
    {
        $this->load->library('form_validation');

        if ($type == 'login') {
            $this->form_validation->set_rules('username_230012', 'Username', 'required');
            $this->form_validation->set_rules('password_230012', 'Password', 'required');
        } else {
            $this->form_validation->set_rules('old_password_230012', 'Old Password', 'required');
            $this->form_validation->set_rules('new_password_230012', 'New Password', 'required');
        }

        if ($this->form_validation->run()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file Auth230012.php and path \application\controllers\Auth230012.php */
