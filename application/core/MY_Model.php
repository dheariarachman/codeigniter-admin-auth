<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    public function save(array $data = array(), string $table = null )
    {
        return $this->db->insert($table, $data);
    }

    public function delete(array $data = array(), string $table = null)
    {
        return $this->db->delete($table, $data);
    }

    public function get_by_id(array $condition = array(), string $table = null)
    {
        $this->db->where($condition);
        return $this->db->get($table);
    }
}
