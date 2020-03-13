<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    private $_tbl_categories    = 'tbl_m_categories';
    private $_tbl_menu          = 'tbl_m_menu';
    private $_tbl_billiard      = 'tbl_m_billiard';
    private $_tbl_table         = 'tbl_m_table';
    private $_data = array();
    public function __construct()
    {
        parent::__construct();
        $this->method = $this->router->fetch_method();
        if (!$this->ion_auth->is_admin()) {
            return redirect('servant');
        }
        $this->load->model('Admin_model', 'admin');
        $this->title = ucfirst($this->method);

    }

    public function users()
    {
        return redirect('auth');
    }

    #region Master Menu
    public function menus()
    {
        $list_menu = $this->admin->list_menus($this->_tbl_menu, $this->_tbl_categories);
        $categories = options_array($this->admin->list_categories()->result(), 'id', 'category');

        $this->_data = [
            'viewParent'        => 'admin/' . $this->method . '/index',
            'form_page'         => 'admin/' . $this->method . '/form',
            'action'            => 'admin/master/save_' . $this->method,
            'edit_data'         => 'admin/master/edit_' . $this->method,
            'delete_data'       => 'admin/master/delete_' . $this->method,
            'pageSubTitle'      => 'Master ' . ucfirst($this->method),
            'form_id'           => 'form_' . $this->method,
            'titleModal'        => ucfirst($this->method),
            'dataContent'       => [
                'menus' => $list_menu, 
                'options_categories' => $categories
            ],
        ];
        return $this->load->view('template_content', $this->_data);
    }

    public function save_menus()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_menu);
    }

    public function edit_menus()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_menu, $this->input->post('id'));
    }

    public function delete_menus()
    {
        $this->delete($this->input->post('id'), 'id', $this->_tbl_menu);
    }
    #endregion

    #region Master Tables
    public function tables()
    {
        $list_tables = $this->admin->getAll($this->_tbl_table);
        $this->_data = [
            'viewParent'    => 'admin/' . $this->method . '/index',
            'form_page'     => 'admin/' . $this->method . '/form',
            'action'        => 'admin/master/save_' . $this->method,
            'edit'          => 'admin/master/edit_' . $this->method,
            'delete'        => 'admin/master/delete_' . $this->method,
            'pageSubTitle'  => 'Master ' . ucfirst($this->method),
            'form_id'       => 'form_' . $this->method,
            'titleModal'    => ucfirst($this->method),
            'dataContent' => ['list_tables' => $list_tables],
        ];
        return $this->load->view('template_content', $this->_data);
    }

    public function save_tables()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_table, $this->input->post('id'));
    }

    public function edit_tables()
    {
        // $this->_data = $this->input->post();
        // $this->save($this->_data, $this->_tbl_menu, $this->input->post('id'));
    }

    public function delete_tables()
    {
        $this->delete($this->input->post('id'), 'id', $this->_tbl_table);
    }
    #endregion

    #region Master Billiard
    public function billiard()
    {
        $list_billiard_table = $this->admin->getAll($this->_tbl_billiard);

        $this->_data = [
            'viewParent' => 'admin/' . $this->method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageSubTitle' => 'Master ' . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => 'admin/master/save_' . $this->method,
            'edit'          => 'admin/master/edit_' . $this->method,
            'delete'        => 'admin/master/delete_' . $this->method,
            'dataContent'   => ['billiard_tables' => $list_billiard_table],
        ];
        $this->load->view('template_content', $this->_data);
    }

    public function save_billiard()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_billiard);
    }

    public function edit_billiard()
    {
        $this->output->set_output(json_encode(['status' => true, 'msg' => $this->admin->get_by_id(['id' => $this->input->get('id')], $this->_tbl_billiard)->first_row()]));
    }

    public function delete_billiard()
    {
        $this->delete($this->input->post('id'), 'id', $this->_tbl_billiard);
    }
    #endregion

    #region Master Cash
    public function cash()
    {
        $this->_data = [
            'viewParent' => 'admin/' . $this->method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageSubTitle' => 'Master ' . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => 'admin/master/save_' . $this->method,
            'edit_data' => 'admin/master/edit_' . $this->method,
            'delete' => 'admin/master/delete_' . $this->method,
            'dataContent' => [],
        ];
        $this->load->view('template_content', $this->_data);
    }

    public function edit_cash()
    {
        # code...
    }

    public function save_cash()
    {
        # code...
    }

    public function delete_cash()
    {
        # code...
    }
    #endregion

    #region Master Purchase
    public function purchase()
    {
        $this->_data = [
            'viewParent' => 'admin/' . $this->method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageSubTitle' => 'Master ' . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => 'admin/master/save_' . $this->method,
            'edit_data' => 'admin/master/edit_' . $this->method,
            'delete' => 'admin/master/delete_' . $this->method,
            'dataContent' => [],
        ];
        $this->load->view('template_content', $this->_data);
    }

    public function save_purchase()
    {
        # code...
    }

    public function edit_purchase()
    {
        # code...
    }

    public function delete_purchase()
    {
        # code...
    }
    #endregion

    #region Master Categories
    public function categories()
    {
        $listCategories = $this->admin->list_categories();

        $this->_data = [
            'viewParent' => 'admin/' . $this->method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageSubTitle' => 'Master Categories',
            'form_id' => 'form_categories',
            'titleModal' => '<i class="fas fa-utensils"></i> Add Categories',
            'action' => 'admin/master/save_category',
            'edit_data' => 'admin/master/edit_category',
            'dataContent' => ['categories' => $listCategories],
        ];
        $this->load->view('template_content', $this->_data);
    }

    public function edit_category()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_categories, $this->input->post('id'));
    }

    public function save_category()
    {
        $this->_data = $this->input->post();
        $this->save($this->_data, $this->_tbl_categories);
    }

    public function delete_category()
    {
        $this->delete($this->input->post('id'), 'id', $this->_tbl_categories);
    }
    #endregion
}
