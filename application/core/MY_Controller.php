<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $method;
    public $title;
    private $_message = [];

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->_method = $this->router->fetch_method();
        $this->load->model('Admin_model', 'admin');
    }

    public function save(array $data = array(), string $table = null, string $id = null)
    {
        if (empty($id) or is_null($id) or $id === '') {
            unset($data['id']);
            if ($this->admin->save($data, $table)) {
                $this->_message = ['status' => true, 'msg' => 'Data Berhasil Tersimpan'];
            } else {
                $this->_message = ['status' => false, 'msg' => 'Data Tidak Tersimpan'];
            }
        } else {
            if ($this->admin->update($id, $data, $table)) {
                $this->_message = ['status' => true, 'msg' => 'Data Berhasil Terupdate'];
            } else {
                $this->_message = ['status' => false, 'msg' => 'Data Tidak Terupdate'];
            }
        }
        $this->output->set_output(json_encode($this->_message));
    }

    public function delete(string $id = null, string $delete_column = null, string $table = null)
    {
        if ($this->admin->delete([$delete_column => $id], $table)) {
            $this->_message = ['status' => true, 'msg' => 'Data Berhasil Terhapus'];
        } else {
            $this->_message = ['status' => false, 'msg' => 'Data Tidak Terhapus'];
        }

        $this->output->set_output(json_encode($this->_message));
    }
}
