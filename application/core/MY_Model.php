<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @author Dhea Aria Rachman
 * @link dheariarachman@gmail.com
 */
class MY_Model extends CI_Model
{
    public function save(array $data = array(), string $table = null )
    {
        return $this->db->insert($table, $data);
    }

    /**
     * @method delete
     * @param array data
     * @param string table
     * @return void
     */
    public function delete(array $data = array(), string $table = null)
    {
        return $this->db->delete($table, $data);
    }

    public function get_by_id(array $condition = array(), string $table = null)
    {
        $this->db->where($condition);
        return $this->db->get($table);
    }

    public function update(string $id = null, array $data = array(), string $table = null)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    public function getAll(string $table = null)
    {
        return $this->db->get($table);
    }
}
