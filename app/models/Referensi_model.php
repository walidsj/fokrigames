<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Referensi_model extends CI_Model
{

    private $prefix = 'ref_';

    // public $title;
    // public $content;
    // public $date;
    private $tb_universitas = 'ref_universitas';
    private $tb_cabor = 'ref_cabor';

    public function getAll_ref($table, $urutan)
    {
        $this->db->select('*')
            ->from($this->prefix . $table)
            ->order_by($urutan, 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertOne_ref($table, $data, $where = null)
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
