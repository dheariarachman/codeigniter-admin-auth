<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Servant extends MY_Controller
{
    private $data = [];
    private $_module;

    /**
     * Tables
     */
    private $_tbl_tr        = 'tbl_tr';
    private $_tbl_tr_detail = 'tbl_tr_detail';
    public function __construct()
    {
        parent::__construct();
        $this->_module = $this->router->fetch_class();
        $this->method = $this->router->fetch_method();
        $this->title = ucfirst($this->method);
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $this->data = [
            'viewParent' => 'servant/' . $this->_method,
            'dataContent' => '',
            'pageTitle' => 'Administrator',
            'pageSubTitle' => 'Master Menu',
            'title' => 'Halaman Utama',
        ];
        return $this->load->view('servant/index', $this->data);
    }

    public function order()
    {
        $list_order = $this->admin->list_order(['created_by' => $this->ion_auth->get_user_id()]);
        $this->_data = [
            'viewParent' => $this->_module . '/' . $this->method . '/index',
            'form_page' => $this->_module . '/' . $this->method . '/form',
            'pageSubTitle' => "List " . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => $this->_module . '/save_' . $this->method,
            'edit' => $this->_module . '/edit_' . $this->method,
            'delete' => $this->_module . '/delete_' . $this->method,
            'dataContent' => ['orders' => $list_order],
        ];
        return $this->load->view('template_content', $this->_data);
    }

    public function save_menus()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_menu, $this->input->post('id'));
    }

    public function edit_menus()
    {
        $this->output->set_output(json_encode(['status' => true, 'msg' => $this->admin->get_by_id(['id' => $this->input->get('id')], $this->_tbl_menu)->first_row()]));
    }

    public function delete_menus()
    {
        $this->delete($this->input->post('id'), 'id', $this->_tbl_menu);
    }
}
