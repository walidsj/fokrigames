<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Finalisasi extends CI_Controller
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
        $data['title'] = 'Finalisasi Pendaftaran';
        $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');
        $data['peserta'] = $this->CRUD->getAll('view_data', 'peserta', 'ref_cabor.nama_cabor', 'ASC', ['id_pendaftar' => $data['pendaftar']->id], 'fg_kelamin', 'ASC', 'nama_peserta', 'ASC');


        $this->form_validation->set_rules('terms', 'Persetujuan', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('peserta/pages/dasbor/finalisasi', $data);
        } else {
            if ($data['pendaftar']) {
                $user['fg_status'] = now();
                if ($this->CRUD->insertOne('data', 'pendaftar', $user, ['email' => $data['pendaftar']->email]) > 0) {
                    $data['user'] =  $this->CRUD->getOne('view_data', 'pendaftar', ['data_pendaftar.id' => $this->session->pendaftar['id_pendaftar']]);
                    $this->_sendmail($data['user'], $data['peserta']);
                } else {
                    $this->session->set_flashdata('alert', 'Finalisasi tidak berhasil, silakan coba lagi atau hubungi Panitia.');
                    redirect('finalisasi');
                }
            } else {
                $this->session->set_flashdata('alert', 'Finalisasi gagal! Akun tidak Valid');
                redirect('finalisasi');
            }
        }
    }

    private function _sendmail($user, $peserta)
    {
        $data['user'] = $user;
        $data['peserta'] = $peserta;

        $message = $this->load->view('mail/finalisasi', $data, true);

        $this->load->library('email');

        $config = array();
        $config['protocol']       = getenv('MAIL_PROTOCOL');
        $config['smtp_host']      = getenv('MAIL_HOST');
        $config['smtp_user']      = getenv('MAIL_USER');
        $config['smtp_pass']      = getenv('MAIL_PASSWORD');
        $config['smtp_port']      = getenv('MAIL_PORT');
        $config['mailtype']       = 'html';
        $config['charset']        = 'utf-8';

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        $this->email->from(getenv('MAIL_USER'), getenv('MAIL_PROFILE'));
        $this->email->to($user->email);
        $this->email->bcc('mohwalidas2@gmail.com, ibnukhoiralitsnan@gmail.com, akmalluthfi04@gmail.com, javierherzain@gmail.com, wiratama906@gmail.com');
        $this->email->subject('Bukti Finalisasi - ' . $user->nama_lengkap . ' (' . $user->nama_universitas . ')');
        $this->email->message($message);

        if ($this->email->send()) {
            $this->session->set_flashdata('alert', 'Finalisasi data pendaftaran berhasil!');
            redirect('dasbor');
        } else {
            $this->session->set_flashdata('alert', 'Finalisasi data pendaftaran berhasil, namun email tidak terkirim ke panitia. Silakan hubungi panitia untuk konfirmasi');
            redirect('dasbor');
        }
    }
}
