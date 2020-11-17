<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud_model', 'CRUD');

        if (!$this->session->pendaftar) {
            redirect('paspor');
        }

        $this->pendaftar = $this->CRUD->getOne('view_data', 'pendaftar', ['data_pendaftar.id' => $this->session->pendaftar['id_pendaftar']]);
    }

    public function index()
    {
        $data['title'] = 'Data Peserta';
        $data['pendaftar'] = $this->pendaftar;
        $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');


        $this->form_validation->set_rules('nama_peserta', 'Nama Peserta', 'required|max_length[64]|min_length[3]');
        $this->form_validation->set_rules('npm', 'No. Induk Mahasiswa', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('whatsapp_peserta', 'No. WhatApp', 'required|min_length[9]|max_length[18]');
        $this->form_validation->set_rules('fg_kelamin', 'Jenis Kelamin', 'required|numeric|exact_length[1]');
        $this->form_validation->set_rules('check', 'Centang', 'required');
        $this->form_validation->set_rules('foto', 'Foto Peserta', 'callback_file_check');
        $this->form_validation->set_rules('scan_ktm', 'Scan KTM', 'callback_ktm_check');

        if ($this->form_validation->run() == false) {
            $data['cabor'] = $this->CRUD->getAll('ref', 'cabor', 'nama_cabor', 'ASC');
            $data['peserta'] = $this->CRUD->getAll('view_data', 'peserta', 'nama_peserta', 'ASC', ['id_pendaftar' => $data['pendaftar']->id]);

            $this->load->view('peserta/pages/dasbor/peserta', $data);
        } else {
            if ($data['pendaftar']->fg_status > 0) {
                redirect('peserta');
            }

            $id_cabor = $this->input->get('cabor', TRUE);
            $data['cabor'] = $this->CRUD->getOne('ref', 'cabor', ['id' => $id_cabor]);
            if (empty($data['cabor'])) {
                redirect('peserta');
            }
            //cek ikhwan atau akhwat boleh atau tidak
            if ($data['cabor']->maks_peserta_l < 1 && $this->input->post('fg_kelamin', TRUE) == 1) {
                $this->session->set_flashdata('alert', 'Cabang lomba tidak mengizinkan ikhwan mendaftar.');
                redirect('peserta');
            }
            if ($data['cabor']->maks_peserta_p < 1 && $this->input->post('fg_kelamin', TRUE) == 2) {
                $this->session->set_flashdata('alert', 'Cabang lomba tidak mengizinkan akhwat mendaftar.');
                redirect('peserta');
            }

            $upload_image = $_FILES['foto']['name'];
            $upload_ktm = $_FILES['scan_ktm']['name'];

            if ($upload_image && $upload_ktm) {
                $peserta = [
                    'id_pendaftar' => $data['pendaftar']->id,
                    'nama_peserta' => strtoupper(htmlspecialchars($this->input->post('nama_peserta', TRUE))),
                    'id_cabor' => htmlspecialchars($this->input->get('cabor', TRUE)),
                    'npm' => htmlspecialchars($this->input->post('npm', TRUE)),
                    'whatsapp_peserta' => htmlspecialchars($this->input->post('whatsapp_peserta', TRUE)),
                    'fg_kelamin' => htmlspecialchars($this->input->post('fg_kelamin', TRUE))
                ];

                if (!is_dir('public/uploads/foto_peserta')) {
                    mkdir('./public/uploads/foto_peserta', 0777, TRUE);
                }

                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '3072';
                $config['upload_path'] = './public/uploads/foto_peserta';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $time = now();
                    if ($peserta['fg_kelamin'] == 1) {
                        $kelamin = 'Ikhwan';
                    } else {
                        $kelamin = 'Akhwat';
                    }

                    $ext = pathinfo($this->upload->data('file_name'), PATHINFO_EXTENSION);
                    $filename = preg_replace('/[^a-zA-Z0-9]/', '-', $data['pendaftar']->nama_universitas . '_' . $data['pendaftar']->nama_lengkap . '_' . $kelamin . '_' . $peserta['nama_peserta'] . '_' . $time) . '.' .  $ext;

                    if (rename(FCPATH . '/public/uploads/foto_peserta/' .  $this->upload->data('file_name'), FCPATH . '/public/uploads/foto_peserta/Asli_' . $filename)) {
                        $hehe['file_name'] = $filename;
                    };

                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './public/uploads/foto_peserta/Asli_' . $hehe['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['height'] = 500;
                    $config['new_image'] = './public/uploads/foto_peserta/' . $hehe['file_name'];

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $new_image = $hehe['file_name'];
                    $peserta['foto'] = $new_image;

                    unlink(FCPATH . '/public/uploads/foto_peserta/Asli_' . $peserta['foto']);
                    #unset library upload
                    unset($this->upload);

                    if (!empty($peserta['foto'])) {

                        if (!is_dir('public/uploads/scan_ktm')) {
                            mkdir('./public/uploads/scan_ktm', 0777, TRUE);
                        }

                        $config_ktm['allowed_types'] = 'pdf';
                        $config_ktm['max_size'] = '3072';
                        $config_ktm['upload_path'] = './public/uploads/scan_ktm';

                        $this->load->library('upload', $config_ktm);
                        if ($this->upload->do_upload('scan_ktm')) {
                            $ext_ktm = pathinfo($this->upload->data('file_name'), PATHINFO_EXTENSION);
                            $filename_ktm = preg_replace('/[^a-zA-Z0-9]/', '-', $data['pendaftar']->nama_universitas . '_' . $data['pendaftar']->nama_lengkap . '_' . $kelamin . '_' . $peserta['nama_peserta'] . '_' . $time) . '.' .  $ext_ktm;

                            if (rename(FCPATH . '/public/uploads/scan_ktm/' . $this->upload->data('file_name'), FCPATH . '/public/uploads/scan_ktm/' . $filename_ktm)) {
                                $peserta['scan_ktm'] = $filename_ktm;
                            };

                            if ($this->CRUD->insertOne('data', 'peserta', $peserta) > 0) {
                                $this->session->set_flashdata('alert', 'Data peserta berhasil di tambah.');
                                redirect('peserta');
                            } else {
                                $this->session->set_flashdata('alert', 'Data peserta gagal ditambah.');
                                redirect('peserta');
                            }
                        } else {
                            unlink(FCPATH . '/public/uploads/foto_peserta/' . $peserta['foto']);
                            $this->session->set_flashdata('alert', 'Upload scan ktm gagal! Coba lagi' . $this->upload->display_errors());
                            redirect('peserta');
                        }
                    } else {
                        $this->session->set_flashdata('alert', 'Foto gagal diunggah. Coba lagi.');
                        redirect('peserta');
                    }
                } else {
                    $this->session->set_flashdata('alert', 'Upload foto gagal! Coba lagi. ' . $this->upload->display_errors());
                    redirect('peserta');
                }
            } else {
                $this->session->set_flashdata('alert', 'Berkas tidak dipilih (Pasfoto atau Scan KTM harap dilengkapi semua). Coba lagi.');
                redirect('peserta');
            }
        }
    }

    public function lihat()
    {
        $data['page']['title'] = 'Lihat Peserta';

        $data['pendaftar'] = $this->pendaftar;
        $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');

        $id_peserta = $this->input->get('id', TRUE);
        $data['peserta'] = $this->CRUD->getOne('view_data', 'peserta', ['id_pendaftar' => $data['pendaftar']->id, 'data_peserta.id' => $id_peserta]);

        if (empty($data['peserta'])) {
            redirect('peserta');
        }

        $this->load->view('peserta/pages/dasbor/peserta_lihat', $data);
    }

    public function hapus()
    {
        $data['pendaftar'] = $this->pendaftar;
        if ($data['pendaftar']->fg_status > 0) {
            redirect('peserta');
        }

        $id_peserta = $this->input->get('id', TRUE);
        $data['peserta'] = $this->CRUD->getOne('view_data', 'peserta', ['id_pendaftar' => $data['pendaftar']->id, 'data_peserta.id' => $id_peserta]);

        if (empty($data['peserta'])) {
            redirect('peserta');
        } else {
            if ($this->CRUD->deleteOne('data', 'peserta', ['id' => $id_peserta, 'id_pendaftar' => $data['pendaftar']->id]) > 0) {
                unlink(FCPATH . '/public/uploads/foto_peserta/' . $data['peserta']->foto);
                unlink(FCPATH . '/public/uploads/scan_ktm/' . $data['peserta']->scan_ktm);
                $this->session->set_flashdata('alert', 'Peserta berhasil dihapus. (' . $data['peserta']->nama_peserta . ')');
                redirect('peserta');
            } else {
                $this->session->set_flashdata('alert', 'Gagal! ' . $data['peserta']->nama_peserta . ' tidak dapat dihapus. Coba lagi.');
                redirect('peserta');
            }
        }
    }

    public function file_check($str)
    {
        $allowed_mime_type_arr = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
        $mime = get_mime_by_extension($_FILES['foto']['name']);
        if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                if ($_FILES['foto']['size'] <= 3145728) {
                    return true;
                } else {
                    $this->form_validation->set_message('file_check', 'Ukuran Foto Peserta tidak boleh lebih dari 3 MB.');
                    return false;
                }
            } else {
                $this->form_validation->set_message('file_check', 'Mohon untuk hanya mengunggah berkas gif/jpg/png.');
                return false;
            }
        } else {
            $this->form_validation->set_message('file_check', 'Foto peserta harus diisi.');
            return false;
        }
    }

    public function ktm_check()
    {
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['scan_ktm']['name']);
        if (isset($_FILES['scan_ktm']['name']) && $_FILES['scan_ktm']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                if ($_FILES['scan_ktm']['size'] <= 3145728) {
                    return true;
                } else {
                    $this->form_validation->set_message('ktm_check', 'Ukuran {field} tidak boleh lebih dari 3 MB.');
                    return false;
                }
            } else {
                $this->form_validation->set_message('ktm_check', '{field} hanya boleh berupa pdf.');
                return false;
            }
        } else {
            $this->form_validation->set_message('ktm_check', '{field} harus dipilih.');
            return false;
        }
    }
}
