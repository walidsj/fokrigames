<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

    private $prefix = 'data_';

    public function getAll_data($table, $urutan)
    {
        $this->db->select('*')
            ->from($this->prefix . $table)
            ->order_by($urutan, 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertOne_data($table, $data, $where = null)
    {
        if ($where) {
            $this->db->where($where);
            $this->db->update($this->prefix . $table, $data);
        } else {
            $this->db->insert($this->prefix . $table, $data);
        }
        return $this->db->affected_rows();
    }
}
