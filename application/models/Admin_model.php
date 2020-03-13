<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends MY_Model
{
    public function list_categories()
    {
        $this->db->select('*');
        $this->db->from('tbl_m_categories');
        return $this->db->get();
    }

    public function list_menus(string $table = null, string $table_join = null)
    {
        $this->db->select('*');
        $this->db->from($table . ' a');
        $this->db->join($table_join . ' b', 'a.category = b.id', 'LEFT');
        return $this->db->get();
    }
}
