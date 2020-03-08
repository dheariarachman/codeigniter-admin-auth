<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servant extends MY_Controller
{
    private $data = [];
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data = [
            'viewParent'    => 'servant/'.$this->method,
            'dataContent'   => '',
            'pageTitle'     => 'Administrator',
            'pageSubTitle'  => 'Master Menu',
            'title'         => 'Halaman Utama'
        ];
        return $this->load->view('servant/index', $this->data);
    }
}
