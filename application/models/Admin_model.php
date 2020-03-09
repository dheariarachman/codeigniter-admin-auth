<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends MY_Model
{
    public function list_categories()
    {
        $this->db->select('*');
        $this->db->from('tbl_categories');
        return $this->db->get();
    }
}
