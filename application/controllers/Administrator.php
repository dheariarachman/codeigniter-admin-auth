<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends MY_Controller
{
    private $_tbl_categories = 'tbl_categories';
    public function __construct()
    {
        parent::__construct();
        $this->method = $this->router->fetch_method();
        if (!$this->ion_auth->is_admin()) {
            return redirect('servant');
        }
        $this->load->model('Admin_model', 'admin');
    }

    public function users()
    {
        return redirect('auth');
    }

    public function menus()
    {
        $data = [
            'viewParent' => 'admin/' . $this->_method . '/index',
            'dataContent' => '',
            'pageTitle' => 'Administrator',
            'pageSubTitle' => 'Master Menu',
        ];
        return $this->load->view('template_content', $data);
    }

    public function tables()
    {
        $data = [
            'viewParent' => 'admin/' . $this->_method . '/index',
            'dataContent' => '',
            'pageTitle' => 'Administrator',
            'pageSubTitle' => 'Master Meja',
        ];
        $this->load->view('template_content', $data);
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

    public function categories()
    {
        $listCategories = $this->admin->list_categories();

        $data = [
            'viewParent' => 'admin/' . $this->_method . '/index',
            'form_page' => 'admin/' . $this->method . '/form',
            'pageTitle' => ucfirst($this->method),
            'title' => ucfirst($this->method),
            'pageSubTitle' => 'Master Categories',
            'add_button' => 'admin/master/save_category',
            'titleModal' => '<i class="fas fa-utensils"></i> Add Categories',
            'dataContent' => ['categories' => $listCategories],
            'form_id' => 'form_categories',
            'edit_data' => 'admin/master/edit_category',
        ];
        $this->load->view('template_content', $data);
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
        if ($this->input->post()) {
            if ($this->admin->save($this->input->post(), $this->_tbl_categories)) {
                $this->output->set_output(json_encode(['status' => true, 'msg' => 'Data Berhasil Tersimpan']));
            } else {
                $this->output->set_output(json_encode(['status' => false, 'msg' => 'Data Gagal Tersimpan']));
            }
        }
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
}
