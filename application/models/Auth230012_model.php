    <?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Auth230012_model extends CI_Model 
{
    public function getUser($username)
    {
        $this->db->where('username_230012', $username);
        return $this->db->get('users_230012')->row();
    }            
    
    public function change_password($id)
    {
        $this->db->set('password_230012', password_hash($this->input->post('new_password_230012'), PASSWORD_DEFAULT));
        $this->db->where('username_230012', $this->session->userdata('username_230012'));

        return $this->db->update('users_230012');
    } 
    
    public function change_photo($photo)
    {
        if($this->session->userdata('photo_230012') !== 'default.png'){
            unlink('./uploads/users/' . $this->session->userdata('photo_230012'));
        }
        $this->db->set('photo_230012', $photo);
        $this->db->where('username_230012', $this->session->userdata('username_230012'));

        return $this->db->update('users_230012');
    }
}


/* End of file Auth230012_model_model.php and path \application\models\Auth230012_model_model.php */
