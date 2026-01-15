<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $page_title = 'Dashboard';
    public $active_nav = '';

    public function __construct()
    {
        parent::__construct();
        // load menu titles
        $this->menu_titles = include(APPPATH.'config/menu_titles.php');
    }

    protected function render($view, $data = [])
    {
        // Tentukan page title dari active_nav
        if (!isset($data['page_title']) && !empty($this->active_nav) && isset($this->menu_titles[$this->active_nav])) {
            $data['page_title'] = $this->menu_titles[$this->active_nav];
        } elseif (!isset($data['page_title'])) {
            $data['page_title'] = $this->page_title;
        }

        $data['active_nav'] = $this->active_nav;

        $this->load->view('partials/head', $data);
        $this->load->view($view, $data);
        $this->load->view('partials/footer', $data);
    }
}
