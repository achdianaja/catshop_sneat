<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Load main template
     *
     * @param string $content View yang akan dimuat di dalam main layout
     * @param array $data Data yang dikirim ke view
     */
    public function template($content, $data = [])
    {
        // Menyisipkan content ke dalam array data
        $data['content'] = $this->CI->load->view($content, $data, true);

        // Memuat template utama
        $this->CI->load->view('app/main', $data);
    }
}

/* End of file App.php */
/* Location: ./application/libraries/App.php */
