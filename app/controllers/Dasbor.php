<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
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
        $data['pendaftar'] = $this->pendaftar;

        //paktaintegritas
        $this->form_validation->set_rules('check', 'Centang', 'required');
        $this->form_validation->set_rules('pakta', 'Berkas Scan Pakta Integritas', 'callback_pakta_check');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dasbor Pendaftar';
            $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');
            $this->load->view('peserta/pages/dasbor/utama', $data);
        } else {

            $upload_pakta = $_FILES['pakta']['name'];
            if ($upload_pakta) {
                if (!is_dir('public/uploads/pakta')) {
                    mkdir('./public/uploads/pakta', 0777, TRUE);
                }

                $config['upload_path'] = './public/uploads/pakta';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '5120';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('pakta')) {
                    $time = now();
                    $ext = pathinfo($this->upload->data('file_name'), PATHINFO_EXTENSION);
                    $filename = preg_replace('/[^a-zA-Z0-9]/', '-', $data['pendaftar']->nama_universitas . '_' . $data['pendaftar']->nama_lengkap . '_' . $time) . '.' .  $ext;

                    if (file_exists(FCPATH . '/public/uploads/pakta/' . $data['pendaftar']->pakta)) {
                        unlink(FCPATH . '/public/uploads/pakta/' . $data['pendaftar']->pakta);
                    }

                    if (rename(FCPATH . '/public/uploads/pakta/' . $this->upload->data('file_name'), FCPATH . '/public/uploads/pakta/' . $filename)) {
                        $user_data['pakta'] = $filename;
                    };

                    if ($this->CRUD->insertOne('data', 'pendaftar', $user_data, ['id' => $data['pendaftar']->id]) > 0) {
                        $this->session->set_flashdata('alert', 'Berkas Pakta Integritas berhasil diunggah.');
                        redirect('dasbor');
                    } else {
                        $this->session->set_flashdata('alert', 'Berkas Pakta Integritas berhasil diunggah. 00');
                        redirect('dasbor');
                    }
                } else {
                    $this->session->set_flashdata('alert', 'Upload gagal! ' . $this->upload->display_errors());
                    redirect('dasbor');
                }
            } else {
                $this->session->set_flashdata('alert', 'Berkas tidak dipilih. (Kode 800)');
                redirect('dasbor');
            }
        }
    }

    public function pakta_check()
    {
        $allowed_mime_type_arr = array('application/pdf');
        $mime = get_mime_by_extension($_FILES['pakta']['name']);
        if (isset($_FILES['pakta']['name']) && $_FILES['pakta']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                if ($_FILES['pakta']['size'] <= 5227520) {
                    return true;
                } else {
                    $this->form_validation->set_message('pakta_check', 'Ukuran {field} tidak boleh lebih dari 5 MB.');
                    return false;
                }
            } else {
                $this->form_validation->set_message('pakta_check', '{field} hanya boleh berupa pdf.');
                return false;
            }
        } else {
            $this->form_validation->set_message('pakta_check', '{field} harus dipilih.');
            return false;
        }
    }
}
