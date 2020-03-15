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
        $this->db->select('a.*, b.category');
        $this->db->from($table . ' a');
        $this->db->join($table_join . ' b', 'a.category = b.id', 'LEFT');
        return $this->db->get();
    }

    public function list_order(array $condition = array())
    {
        $this->db->select('*');
        $this->db->from('tbl_tr a');
        $this->db->join('tbl_tr_detail b'   , 'b.id = a.tr_detail', 'LEFT');
        $this->db->join('tbl_m_table c'     , 'c.id = a.table_id', 'LEFT');
        $this->db->join('tbl_m_payment d'   , 'c.id = a.payment_type', 'LEFT');
        $this->db->join('tbl_m_menu e'      , 'e.id = b.menu_id', 'LEFT');
        $this->db->where($condition);
        $this->db->order_by('a.created_at');
        return $this->db->get();
    }
}
