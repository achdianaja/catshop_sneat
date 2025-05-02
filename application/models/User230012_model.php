<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User230012_model extends CI_Model 
{
    public function create()
    {
        $data = array(
            'username_230012' => $this->input->post('username_230012'),
            'usertype_230012' => $this->input->post('usertype_230012'),
            'fullname_230012' => $this->input->post('fullname_230012'),
            'password_230012' => password_hash($this->input->post('usertype_230012'), PASSWORD_DEFAULT)
        );
        return $this->db->insert('users_230012', $data);
    }
    
    public function read($limit, $start)
    {
        // $this->db->order_by('id_230012', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get('users_230012')->result();
    }

    public function read_by($id)
    {
        return $this->db->get_where('users_230012', ['id_230012' => $id])->row();
    }

    public function update($id)
    {
        $data = array(
            'username_230012' => $this->input->post('username_230012'),
            'usertype_230012' => $this->input->post('usertype_230012'),
            'fullname_230012' => $this->input->post('fullname_230012')
        );
        return $this->db->update('users_230012', $data, ['id_230012' => $id]);
    }

    public function update_profiles()
    {
        $data = array(
            'username_230012' => $this->input->post('username_230012'),
            'fullname_230012' => $this->input->post('fullname_230012')
        );

        $id = $this->session->userdata('id_230012');
        return $this->db->update('users_230012', $data, ['id_230012' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('users_230012', ['id_230012' => $id]);
    }
              
    public function change_password($id)
    {
        $data = array(
            'password_230012' => password_hash($this->input->post('password_230012'), PASSWORD_DEFAULT)
        );
        return $this->db->update('users_230012', $data, ['id_230012' => $id]);
    }

    public function reset_password($id, $usertype)
    {
        $default_password = password_hash($usertype, PASSWORD_DEFAULT);

        $this->db->where('id_230012', $id);
        $this->db->update('users_230012', ['password_230012' => $default_password]);
    }

    public function validate()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username_230012', 'Username', 'required');
        $this->form_validation->set_rules('usertype_230012', 'Usertype', 'required');
        $this->form_validation->set_rules('fullname_230012', 'Fullname', 'required');

        if($this->form_validation->run()){
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


/* End of file User230012_model.php and path \application\models\User230012_model.php */
