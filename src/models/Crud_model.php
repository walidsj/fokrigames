<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{

    public function getAll($prefix, $table, $urutan, $order, $where = null, $urutan2 = null, $order2 = null, $urutan3 = null, $order3 = null)
    {
        if ($where) {
            $this->db->where($where);
        }
        if ($prefix == 'view_data') {
            if ($table == 'peserta') {
                $this->db->select('data_peserta.*,
data_pendaftar.nama_lengkap as nama_pendaftar,
data_pendaftar.fg_status,
data_pendaftar.whatsapp,
ref_universitas.nama_universitas,
ref_cabor.nama_cabor');
                $this->db->join('data_pendaftar', 'data_pendaftar.id = data_peserta.id_pendaftar');
                $this->db->join('ref_universitas', 'ref_universitas.id = data_pendaftar.id_universitas');
                $this->db->join('ref_cabor', 'ref_cabor.id = data_peserta.id_cabor');
            } elseif ($table == 'pendaftar') {
                $this->db->select('data_pendaftar.*,
ref_universitas.nama_universitas,
ref_universitas.nama_singkat,
(select count(data_peserta.id) from data_peserta where data_peserta.id_pendaftar = data_pendaftar.id) as jumlah_peserta');
                $this->db->join('ref_universitas', 'ref_universitas.id = data_pendaftar.id_universitas');
            }
            $this->db->order_by($urutan, $order);
            if ($urutan2 != null && $order2 != null) {
                $this->db->order_by($urutan2, $order2);
            }
            if ($urutan3 != null && $order3 != null) {
                $this->db->order_by($urutan3, $order3);
            }
            $this->db->from('data' . '_' . $table);
        } else {
            $this->db->from($prefix . '_' . $table);
            $this->db->order_by($urutan, $order);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getOne($prefix, $table, $where)
    {
        if ($prefix == 'view_data') {
            if ($table == 'peserta') {
                $this->db->select('data_peserta.*,
data_pendaftar.nama_lengkap as nama_pendaftar,
ref_universitas.nama_universitas,
ref_cabor.nama_cabor');
                $this->db->join('data_pendaftar', 'data_pendaftar.id = data_peserta.id_pendaftar');
                $this->db->join('ref_universitas', 'ref_universitas.id = data_pendaftar.id_universitas');
                $this->db->join('ref_cabor', 'ref_cabor.id = data_peserta.id_cabor');
            } elseif ($table == 'pendaftar') {
                $this->db->select('data_pendaftar.*,
ref_universitas.nama_universitas,
ref_universitas.nama_singkat,
(select count(data_peserta.id) from data_peserta where data_peserta.id_pendaftar = data_pendaftar.id) as jumlah_peserta');
                $this->db->join('ref_universitas', 'ref_universitas.id = data_pendaftar.id_universitas');
            }
            $this->db->from('data' . '_' . $table);
        } else {
            $this->db->from($prefix . '_' . $table);
        }
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function insertOne($prefix, $table, $data, $where = null)
    {
        if ($where) {
            $this->db->where($where);
            $this->db->update($prefix . '_' . $table, $data);
        } else {
            $this->db->insert($prefix . '_' . $table, $data);
        }
        return $this->db->affected_rows();
    }

    public function deleteOne($prefix, $table, $where)
    {
        $this->db->where($where)
            ->delete($prefix . '_' . $table);
        return $this->db->affected_rows();
    }
}
