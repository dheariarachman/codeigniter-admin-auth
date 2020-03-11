<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    private $_tbl_categories = 'tbl_categories';
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
        $this->_data = [
            'viewParent' => 'admin/' . $this->method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageSubTitle' => 'Master ' . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => 'admin/master/save_' . $this->method,
            'edit_data' => 'admin/master/edit_' . $this->method,
            'delete_data' => 'admin/master/delete_' .$this->method,
            'dataContent' => [],
        ];
        return $this->load->view('template_content', $this->_data);
    }

    public function save_menus()
    {
        # code...
    }

    public function edit_menus()
    {
        # code...
    }

    public function delete_menus()
    {
        // 
    }
    #endregion

    #region Master Tables
    public function tables()
    {
        $this->_data = [
            'viewParent' => 'admin/' . $this->method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageSubTitle' => 'Master ' . ucfirst($this->method),
            'form_id' => 'form_' . $this->method,
            'titleModal' => ucfirst($this->method),
            'action' => 'admin/master/save_' . $this->method,
            'edit_data' => 'admin/master/edit_' . $this->method,
            'delete_data' => 'admin/master/delete_' .$this->method,
            'dataContent' => [],
        ];
        return $this->load->view('template_content', $this->_data);
    }

    public function save_tables()
    {
        # code...
    }

    public function edit_tables()
    {
        # code...
    }

    public function delete_tables()
    {
        # code...
    }
    #endregion

    #region Master Billiard
    public function billiard()
    {
        $listCategories = $this->admin->list_categories();

        $this->_data = [
            'viewParent'    => 'admin/' . $this->method . '/index',
            'form_page'     => 'admin/' . $this->method . '/form',
            'pageSubTitle'  => 'Master ' . ucfirst($this->method),
            'form_id'       => 'form_' . $this->method,
            'titleModal'    => ucfirst($this->method),
            'action'        => 'admin/master/save_' . $this->method,
            'edit_data'     => 'admin/master/edit_' . $this->method,
            'dataContent'   => ['categories' => $listCategories],
            'delete'        => 'admin/master/delete_' . $this->method,
        ];
        $this->load->view('template_content', $this->_data);
    }

    public function save_billiard()
    {
        # code...
    }

    public function edit_billiard()
    {
        # code...
    }

    public function delete_billiard()
    {
        # code...
    }
    #endregion

    #region Master Cash
    public function cash()
    {
        $this->_data = [
            'viewParent'    => 'admin/' . $this->method . '/index',
            'form_page'     => 'admin/' . $this->method . '/form',
            'pageSubTitle'  => 'Master ' . ucfirst($this->method),
            'form_id'       => 'form_' . $this->method,
            'titleModal'    => ucfirst($this->method),
            'action'        => 'admin/master/save_' . $this->method,
            'edit_data'     => 'admin/master/edit_' . $this->method,
            'delete'        => 'admin/master/delete_' . $this->method,
            'dataContent'   => [],
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
            'viewParent'    => 'admin/' . $this->method . '/index',
            'form_page'     => 'admin/' . $this->method . '/form',
            'pageSubTitle'  => 'Master ' . ucfirst($this->method),
            'form_id'       => 'form_' . $this->method,
            'titleModal'    => ucfirst($this->method),
            'action'        => 'admin/master/save_' . $this->method,
            'edit_data'     => 'admin/master/edit_' . $this->method,
            'delete'        => 'admin/master/delete_' . $this->method,
            'dataContent'   => [],
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
        $category = $this->admin->get_by_id(['id' => $this->input->get('id')], $this->_tbl_categories)->row();
        if (!empty($category)) {
            $this->output->set_output(json_encode(['status' => true, 'msg' => $category]));
        } else {
            $this->output->set_output(json_encode(['status' => false, 'msg' => 'Data Tidak Ditemukan']));
        }
    }

    public function save_category()
    {
        $message = [];
        if ($this->input->post()) {
            if (empty($this->input->post('id')) or $this->input->post('id') == '') {
                if ($this->admin->save($this->input->post(), $this->_tbl_categories)) {
                    $message = ['status' => true, 'msg' => 'Data Berhasil Tersimpan'];
                } else {
                    $message = ['status' => false, 'msg' => 'Data Tidak Tersimpan'];
                }
            } else {
                if ($this->admin->update($this->input->post('id'), $this->input->post(), $this->_tbl_categories)) {
                    $message = ['status' => true, 'msg' => 'Data Berhasil Terupdate'];
                } else {
                    $message = ['status' => false, 'msg' => 'Data Tidak Terupdate'];
                }
            }
        } else {
            $message = ['status' => false, 'msg' => 'Terdapat Kesalahan Pada Sistem'];
        }
        $this->output->set_output(json_encode($message));
    }

    public function delete_category()
    {
        if (!empty($this->input->post('id')) and !is_null($this->input->post('id'))) {
            if ($this->admin->delete(['id' => $this->input->post('id')], $this->_tbl_categories)) {
                $this->output->set_output(json_encode(['status' => true, 'msg' => 'Data Berhasil Terhapus']));
            } else {
                $this->output->set_output(json_encode(['status' => false, 'msg' => 'Data Gagal Dihapus']));
            }
        }
    }
    #endregion
}
