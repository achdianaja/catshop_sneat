<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
* Some important function are here below!
* Remove comment to start using any of these.
*
* @package CodeIgniter
* @author  CodeIgniter Community
* @license https://opensource.org/licenses/MIT MIT License
* @link    https://codeigniter.com
* @since   Version 1.0.0
*/

if (!function_exists('bootstrap_pagination_config')) {
    /**
     * Generate Bootstrap-compatible pagination config for CodeIgniter
     *
     * @param string $base_url Base URL for pagination
     * @param int $total_rows Total number of rows
     * @param int $per_page Number of items per page
     * @param int $uri_segment URI segment for pagination
     * @return array Pagination config array
     */
    function bootstrap_pagination_config($base_url, $total_rows, $per_page, $uri_segment = 3)
    {
        return [
            'base_url' => $base_url,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'uri_segment' => $uri_segment,

            'full_tag_open' => '<nav><ul class="pagination justify-content-end">',
            'full_tag_close' => '</ul></nav>',

            'first_link' => 'First',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',

            'last_link' => 'Last',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',

            'next_link' => '&raquo;',
            'next_tag_open' => '<li class="page-item">',
            'next_tag_close' => '</li>',

            'prev_link' => '&laquo;',
            'prev_tag_open' => '<li class="page-item">',
            'prev_tag_close' => '</li>',

            'cur_tag_open' => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close' => '</a></li>',

            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',

            'attributes' => ['class' => 'page-link']
        ];
    }
}


if(!function_exists('is_post')) {

    /**
     * If the method of request is POST return true else false.
     * 
     *  @return bool  */
    function is_post()
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')  ? true : false;
    }
}

if (!function_exists('is_get')) {

    /**
     * If the method of request is GET return true else false.
     * 
     *  @return bool  */
    function is_get()
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) === 'GET')  ? true : false;
    }
}

if (!function_exists('input_print')) {

    /**
     * To print database inside a input field use this.
     * It will escape values such as ', " or other entities.
     * 
     *  @return mixed  */
    function input_print($str)
    {

        return htmlentities($str);
    }
}



if (!function_exists('set_custom_header')) {
    /**
     * It will setup custom header
     * 
     * @param mixed $custom_header to set css or any other thing to the header
     * @return void It will set value only nothing will be return.
     */
    function set_custom_header($file)
    {
        $str = '';
        $ci = &get_instance();
        $custom_header  = $ci->config->item('custom_header');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file as $item) {
                $custom_header[] = $item;
            }
            $ci->config->set_item('custom_header', $custom_header);
        } else {
            $str = $file;
            $custom_header[] = $str;
            $ci->config->set_item('custom_header', $custom_header);
        }
    }
}

if (!function_exists('get_custom_header')) {
    /**
     * It will get customer header if set up.
     * 
     *  @return void|string  */
    function get_custom_header()
    {
        $str = '';
        $ci = &get_instance();
        $custom_header  = $ci->config->item('custom_header');


        if (!is_array($custom_header)) {
            return;
        }

        foreach ($custom_header as $item) {
            $str .= $item . "
";
        }

        return $str;
    }
}

if (!function_exists('set_custom_footer')) {
    /**
     * It will setup custom footer
     * 
     * @param mixed $custom_footer to set js or any other thing to the footer
     * @return void It will set value only nothing will be return.
     */
    function set_custom_footer($file)
    {
        $str = '';
        $ci = &get_instance();
        $custom_footer  = $ci->config->item('custom_footer');

        if (empty($file)) {
            return;
        }

        if (is_array($file)) {
            if (!is_array($file) && count($file) <= 0) {
                return;
            }
            foreach ($file as $item) {
                $custom_footer[] = $item;
            }
            $ci->config->set_item('custom_footer', $custom_footer);
        } else {
            $str = $file;
            $custom_footer[] = $str;
            $ci->config->set_item('custom_footer', $custom_footer);
        }
    }
}

if (!function_exists('get_custom_footer')) {
    /**
     * It will get customer footer if set up.
     * 
     *  @return void|string  */
    function get_custom_footer()
    {
        $str = '';
        $ci = &get_instance();
        $custom_footer  = $ci->config->item('custom_footer');

        if (!is_array($custom_footer)) {
            return;
        }

        foreach ($custom_footer as $item) {
            $str .= $item . "
";
        }

        return $str;
    }
}

/* End of file pagination_helper.php and path \application\helpers\pagination_helper.php */
