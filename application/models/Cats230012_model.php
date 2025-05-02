<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cats230012_model extends CI_Model
{

    public function create()
    {
        $data = array(
            'name_230012' => $this->input->post('name_230012'),
            'type_230012' => $this->input->post('type_230012'),
            'gender_230012' => $this->input->post('gender_230012'),
            'age_230012' => $this->input->post('age_230012'),
            'price_230012' => $this->input->post('price_230012'),
            // 'cats_photo_230012' => $this->input->post('cats_photo_230012'),
        );

        $this->db->insert('cats_230012', $data);
    }

    public function read($limit, $start)
    {
        $this->db->order_by('id_230012', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get('cats_230012')->result();
    }

    public function read_by($id)
    {
        return $this->db->get_where('cats_230012', ['id_230012' => $id])->row();
    }

    public function update($id)
    {
        $data = array(
            'name_230012' => $this->input->post('name_230012'),
            'type_230012' => $this->input->post('type_230012'),
            'gender_230012' => $this->input->post('gender_230012'),
            'age_230012' => $this->input->post('age_230012'),
            'price_230012' => $this->input->post('price_230012'),
            // 'cats_photo_230012' => $this->input->post('cats_photo_230012')
        );

        $this->db->where('id_230012', $id);
        $this->db->update('cats_230012', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('cats_230012', ['id_230012' => $id]);
    }

    public function validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name_230012', 'Name', 'required');
        $this->form_validation->set_rules('type_230012', 'Type', 'required');
        $this->form_validation->set_rules('gender_230012', 'Gender', 'required');
        $this->form_validation->set_rules('age_230012', 'Age', 'required');
        $this->form_validation->set_rules('price_230012', 'Price', 'required|numeric');
        // $this->form_validation->set_rules('cats_photo_230012', 'Photo', 'callback_file_check');

        if ($this->form_validation->run()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function sale($id)
    {
        $data = array(
            'customer_name_230012' => $this->input->post('customer_name_230012'),
            'customer_phone_230012' => $this->input->post('customer_phone_230012'),
            'customer_address_230012' => $this->input->post('customer_address_230012'),
            'cat_id_230012' => $id,
        );

        $this->db->insert('cat_sale_230012', $data);

        $this->db->set('sold_230012', '1');
        $this->db->where('id_230012', $id);
        $this->db->update('cats_230012');
    }

    public function sales($limit, $start)
    {
        $this->db->select('cat_sale_230012.*, cats_230012.name_230012');
        $this->db->from('cat_sale_230012');
        $this->db->join('cats_230012', 'cat_sale_230012.cat_id_230012 = cats_230012.id_230012');
        $this->db->order_by('cat_sale_230012.sale_id_230012', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function read_photo_by($id)
    {
        return $this->db->get_where('cats_230012', ['id_230012' => $id])->row();
    }

    public function change_photo($photo, $id)
    {
        $this->db->set('cats_photo_230012', $photo);
        $this->db->where('id_230012', $id);
        return $this->db->update('cats_230012');
    }

    public function get_profit()
    {
        $this->db->select_sum('cats_230012.price_230012');
        $this->db->from('cat_sale_230012');
        $this->db->join('cats_230012', 'cat_sale_230012.cat_id_230012 = cats_230012.id_230012');
        return $this->db->get()->row()->price_230012;
    }

    public function get_sold()
    {
        $this->db->select('COUNT(*) as sold_count');
        $this->db->from('cat_sale_230012');
        return $this->db->get()->row()->sold_count;
    }

    public function get_last_sale_price()
    {
        $this->db->select('cats_230012.price_230012');
        $this->db->from('cat_sale_230012');
        $this->db->join('cats_230012', 'cat_sale_230012.cat_id_230012 = cats_230012.id_230012');
        $this->db->order_by('cat_sale_230012.sale_id_230012', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row()->price_230012 ?? 0;
    }

    public function get_weekly_sales()
    {
        $this->db->from('cat_sale_230012');
        $this->db->where('DATE(sale_date_230012) >=', date('Y-m-d', strtotime('-7 days')));
        return $this->db->count_all_results();
    }

    public function get_sales_last_7_days()
    {
        $this->db->select("DATE(sale_date_230012) as date, COUNT(*) as total");
        $this->db->from('cat_sale_230012');
        $this->db->where('sale_date_230012 >=', date('Y-m-d', strtotime('-6 days')));
        $this->db->group_by('DATE(sale_date_230012)');
        $this->db->order_by('DATE(sale_date_230012)', 'ASC');
        $result = $this->db->get()->result();

        $sales_data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $sales_data[$date] = 0;
        }

        foreach ($result as $row) {
            $sales_data[$row->date] = (int)$row->total;
        }

        return $sales_data;
    }

    public function validate_sale()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('customer_name_230012', 'Customer Name', 'required');
        $this->form_validation->set_rules('customer_phone_230012', 'Customer Phone', 'required|numeric');
        $this->form_validation->set_rules('customer_address_230012', 'Customer Address', 'required');

        if ($this->form_validation->run()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
