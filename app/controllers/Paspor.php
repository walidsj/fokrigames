<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paspor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud_model', 'CRUD');
    }

    public function index()
    {
        if ($this->session->pendaftar) {
            redirect('dasbor');
        }

        $this->form_validation->set_rules('whatsapp', 'No. WhatsApp', 'required|numeric|max_length[18]|min_length[10]|trim');
        $this->form_validation->set_rules('password', 'PIN', 'required|min_length[5]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Peserta';
            $data['meta']['description'] = "Selamat datang para perwakilan kontingen dan calon peserta Fokri Games VI tahun 2020! Silakan login untuk melanjutkan.";
            $data['meta']['thumb'] = "login.jpg";
            $this->load->view('peserta/pages/paspor/login', $data);
        } else {
            $whatsapp = $this->input->post('whatsapp', TRUE);
            $password = $this->input->post('password', TRUE);

            $pendaftar = $this->CRUD->getOne('data', 'pendaftar', ['whatsapp' => $whatsapp]);
            if ($pendaftar) {
                if (password_verify($password, $pendaftar->password)) {
                    $userpendaftar = [
                        'id_pendaftar' => $pendaftar->id
                    ];
                    $this->session->set_userdata('pendaftar', $userpendaftar);
                    redirect('dasbor');
                } else {
                    $this->session->set_flashdata('alert', 'Login gagal! PIN salah.');
                    redirect('paspor');
                }
            } else {
                $this->session->set_flashdata('alert', 'Login gagal! No. WhatsApp belum terdaftar.');
                redirect('paspor');
            }
        }
    }

    public function reg()
    {
        $whatsapp = $this->input->get('no', true);
        $token = $this->input->get('token', true);

        $data['calon'] = $this->db->join('ref_universitas', 'temp_token.id_universitas = ref_universitas.id')
            ->get_where('temp_token', ['whatsapp' => $whatsapp, 'token' => $token])->row();

        if (!empty($data['calon'])) {
            $this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email|min_length[5]|max_length[64]|trim|is_unique[data_pendaftar.email]', ['is_unique' => 'Alamat email sudah terdaftar.']);
            $this->form_validation->set_rules('password', 'PIN', 'required|min_length[5]');
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[4]|max_length[64]trim');
            $this->form_validation->set_rules('npm', 'No. Induk Mahasiswa', 'required|min_length[4]|max_length[32]trim');
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Registrasi Akun';
                $this->load->view('peserta/pages/paspor/registrasi', $data);
            } else {
                if (/*!empty($this->db->get_where('data_pendaftar', ['whatsapp' => $data['calon']->whatsapp])->row()) or */!empty($this->db->get_where('data_pendaftar', ['email' => $this->input->post('email', true)])->row())) {
                    $this->session->set_flashdata('alert', 'Alamat email telah terdaftar. Coba lagi.');
                    redirect('paspor');
                } else {
                    $insert = [
                        'id_universitas' => $data['calon']->id_universitas,
                        'whatsapp' => $data['calon']->whatsapp,
                        'pakta' => null,
                        'fg_status' => 0,
                        'tanggal_daftar' => now(),
                        'email' => strtolower($this->input->post('email', true)),
                        'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                        'nama_lengkap' => strtoupper($this->input->post('nama_lengkap', true)),
                        'npm' => $this->input->post('npm', true)
                    ];
                    if ($this->CRUD->insertOne('data', 'pendaftar', $insert) > 0) {
                        $this->db->delete('temp_token', ['whatsapp' => $data['calon']->whatsapp]);
                        $this->session->set_flashdata('alert', 'Registrasi berhasil! Silakan login melalui halaman berikut.');
                        redirect('paspor');
                    } else {
                        $this->session->set_flashdata('alert', 'Registrasi gagal! Coba lagi atau hubungi panitia/administrator.');
                        redirect(current_url() . '?no=' . $whatsapp . '&token=' . urlencode($token));
                    }
                }
            }
        } else {
            $this->session->set_flashdata('alert', 'Token tidak valid. (x000)');
            redirect('paspor');
        }
    }

    public function logout()
    {
        if (!$this->session->pendaftar) {
            redirect('paspor');
        }

        $this->session->unset_userdata('pendaftar');
        $this->session->set_flashdata('alert', 'Logout berhasil.');
        redirect('paspor');
    }
}
