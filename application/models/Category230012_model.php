<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category230012_model extends CI_Model {

	public function create()
	{
        $data = array(
            'name_230012' => $this->input->post('name_230012'),
            'description_230012' => $this->input->post('description_230012'),
        );

        $this->db->insert('category_230012', $data);
    }

	public function read($limit, $start)
	{
        $this->db->limit($limit, $start);
        return $this->db->get('category_230012')->result();
    }

	public function read_category()
	{
        return $this->db->get('category_230012')->result();
    }

	public function read_by($id)
	{
        return $this->db->get_where('category_230012', ['id_230012' => $id])->row();
    }

    public function update($id)
    {
        $data = array(
            'name_230012' => $this->input->post('name_230012'),
            'description_230012' => $this->input->post('description_230012'),
        );

        $this->db->where('id_230012', $id);
        $this->db->update('category_230012', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('category_230012', ['id_230012' => $id]);
    }

    public function validate()
    {
        $this->form_validation->set_rules('name_230012', 'Name', 'required|trim');
        $this->form_validation->set_rules('description_230012', 'Description', 'required|trim');

        return $this->form_validation->run();
    }
}
