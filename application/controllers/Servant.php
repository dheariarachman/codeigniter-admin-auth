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
    private $_tbl_m_table   = 'tbl_m_table';
    private $_tbl_m_menu    = 'tbl_m_menu';
    private $_tbl_m_payment = 'tbl_m_payment';
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
        $list_order     = $this->admin->list_order(['created_by' => $this->ion_auth->get_user_id()]);
        $list_table     = options_array($this->admin->getAll($this->_tbl_m_table)->result(), 'id', 'name', 'Meja');
        $list_menu      = options_array($this->admin->getAll($this->_tbl_m_menu)->result(), 'id', 'name','Menu', 'price');
        $list_payment   = options_array($this->admin->getAll($this->_tbl_m_payment)->result(), 'id', 'payment', 'Pembayaran');
        
        $this->_data = [
            'viewParent' => $this->_module . '/' . $this->method . '/index',
            'form_page' => $this->_module . '/' . $this->method . '/form',
            'pageSubTitle' => "List " . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => $this->_module . '/checkout',
            'edit' => $this->_module . '/edit_' . $this->method,
            'delete' => $this->_module . '/delete_' . $this->method,
            'dataContent' => [
                'orders'    => $list_order,
                'tables'    => $list_table,
                'menus'     => $list_menu,
                'payments'  => $list_payment,
                'kasir'     => $this->ion_auth->user()->row()
            ],
        ];
        return $this->load->view('template_content', $this->_data);
    }

    public function checkout()
    {
        $data = [
            'table_id'      => $this->input->post('table_id'),
            'customer'      => $this->input->post('customer'),
            'payment_type'  => $this->input->post('payment_type'),
            'nominal'       => $this->input->post('nominal'),
            'created_by'    => $this->input->post('created_by'),
        ];

        $this->output->set_output(json_encode($data));

        // var_dump($this->input->post());
        // $this->_data = $this->input->post();
        // $this->save($this->_data, $this->_tbl_menu, $this->input->post('id'));
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
