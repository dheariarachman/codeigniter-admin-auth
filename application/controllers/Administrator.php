<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    // private $_method;
    public function __construct()
    {
        parent::__construct();
        $this->method = $this->router->fetch_method();
        if (!$this->ion_auth->is_admin()) {
            return redirect('servant');
        }
    }

    public function users()
    {
        return redirect('auth');
    }

    public function menus()
    {
        $data = [
            'viewParent'    => 'admin/'.$this->_method.'/index',
            'dataContent'   => '',
            'pageTitle'     => 'Administrator',
            'pageSubTitle'  => 'Master Menu'
        ];
        return $this->load->view('template_content', $data);
    }

    public function tables()
    {
        $data = [
            'viewParent'    => 'admin/'.$this->_method.'/index',
            'dataContent'   => '',
            'pageTitle'     => 'Administrator',
            'pageSubTitle'  => 'Master Meja'
        ];
        return $this->load->view('template_content', $data);
    }

    public function billiard()
    {
        # code...
    }

    public function cash()
    {
        echo "OKE";
    }

    public function purchase()
    {
        # code...
    }
}
