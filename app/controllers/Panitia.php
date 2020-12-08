<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud_model', 'CRUD');
    }

    #=========================================================================#
    #  ADMINISTRATION CONTROLLERS                                             #
    #=========================================================================#

    public function index()
    {
        if (!$this->session->panitia) {
            show_404();
        }

        $data['panitia'] = $this->CRUD->getOne('data', 'panitia', ['id_panitia' => $this->session->panitia['id_panitia'], 'data_panitia.email_panitia' => $this->session->panitia['email_panitia']]);

        $data['universitas'] = $this->CRUD->getAll('ref', 'universitas', 'nama_universitas', 'ASC');

        $data['pendaftar']['data'] = $this->CRUD->getAll('view_data', 'pendaftar', 'nama_lengkap', 'ASC');
        $data['pendaftar']['finalisasi'] = array_filter($data['pendaftar']['data'], function ($array) {
            if ($array->fg_status > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        });

        $data['peserta']['data'] = $this->CRUD->getAll('view_data', 'peserta', 'nama_peserta', 'ASC');
        $data['peserta']['finalisasi'] = array_filter($data['peserta']['data'], function ($array) {
            if (($array->fg_status > 0)) {
                return TRUE;
            } else {
                return FALSE;
            }
        });

        $data['token'] = $this->db->join('ref_universitas', 'temp_token.id_universitas = ref_universitas.id')
            ->order_by('whatsapp', 'ASC')
            ->get('temp_token')
            ->result();

        $this->form_validation->set_rules('whatsapp', 'No. WhatsApp', 'required|numeric|min_length[10]|max_length[18]|is_unique[temp_token.whatsapp]', ['is_unique' => 'No. WhatsApp udah digenerate tokennya kak.']);
        $this->form_validation->set_rules('id_universitas', 'Asal Univ', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/layouts/header_dasbor', $data);
            $this->load->view('panitia/partials/navigation', $data);
            $this->load->view('panitia/view_dasbor_panitia', $data);
            $this->load->view('panitia/layouts/footer_dasbor', $data);
        } else {
            $no = $this->input->post('whatsapp', true);
            $id_universitas = $this->input->post('id_universitas', true);
            $token = base64_encode(random_bytes(64));
            if ($this->db->get_where('temp_token', ['whatsapp' => $no])->row() < 1) {
                $this->db->insert('temp_token', ['id_universitas' => $id_universitas, 'whatsapp' => $no, 'token' => $token, 'waktu' => now()]);
                $this->session->set_flashdata('alert', 'Token berhasil ditambah.');
                redirect('panitia');
            } else {
                $this->session->set_flashdata('alert', 'No. WhatsApp udah didaftarin kok kak, ga bisa generate token.');
                redirect('panitia');
            }
        }

        // Prosedur Hapus
        $no = $this->input->get('no', true);
        $hapus = $this->input->get('hapus', true);
        if (!empty($no) && $hapus == 'yes') {
            $this->db->delete('temp_token', ['whatsapp' => $no]);
            $this->session->set_flashdata('alert', 'Token berhasil dihapus.');
            redirect('panitia');
        }
    }

    public function pendaftar()
    {
        if (!$this->session->panitia) {
            show_404();
        }

        $data['page']['title'] = 'Lihat Pendaftar';
        $data['panitia'] = $this->CRUD->getOne('data', 'panitia', ['id_panitia' => $this->session->panitia['id_panitia'], 'data_panitia.email_panitia' => $this->session->panitia['email_panitia']]);

        $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');

        $data['pendaftar'] = $this->CRUD->getAll('view_data', 'pendaftar', 'nama_lengkap', 'ASC');

        $this->load->view('panitia/layouts/header_dasbor', $data);
        $this->load->view('panitia/partials/navigation', $data);
        $this->load->view('panitia/view_pendaftar', $data);
        $this->load->view('panitia/layouts/footer_dasbor', $data);
    }

    public function peserta()
    {
        if (!$this->session->panitia) {
            show_404();
        }

        $data['page']['title'] = 'Lihat Peserta Kontingen';
        $data['panitia'] = $this->CRUD->getOne('data', 'panitia', ['id_panitia' => $this->session->panitia['id_panitia'], 'data_panitia.email_panitia' => $this->session->panitia['email_panitia']]);

        $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');

        $data['peserta'] = $this->CRUD->getAll('view_data', 'peserta', 'nama_peserta', 'ASC', ['data_pendaftar.fg_status' => 1]);

        $this->load->view('panitia/layouts/header_dasbor', $data);
        $this->load->view('panitia/partials/navigation', $data);
        $this->load->view('panitia/view_peserta', $data);
        $this->load->view('panitia/layouts/footer_dasbor', $data);
    }

    public function akun_panitia()
    {
        $data['panitia'] = $this->CRUD->getOne('data', 'panitia', ['id_panitia' => $this->session->panitia['id_panitia'], 'data_panitia.email_panitia' => $this->session->panitia['email_panitia']]);

        $data['akun_panitia'] = $this->db->get('data_panitia')->result();

        $this->form_validation->set_rules('nama_panitia', 'Nama Panitia', 'trim|required|max_length[64]');
        $this->form_validation->set_rules('email_panitia', 'Email Panitia', 'trim|required|valid_email|max_length[64]');
        $this->form_validation->set_rules('nama_bidang', 'Nama Bidang', 'trim|required|max_length[32]');
        $this->form_validation->set_rules('password_panitia', 'Password', 'required|max_length[16]');
        if ($this->form_validation->run() == false) {
            $this->load->view('panitia/layouts/header_dasbor', $data);
            $this->load->view('panitia/partials/navigation', $data);
            $this->load->view('panitia/view_akun_panitia', $data);
            $this->load->view('panitia/layouts/footer_dasbor', $data);
        } else {
            $akunpanitia = [
                'nama_panitia' => $this->input->post('nama_panitia', true),
                'email_panitia' => $this->input->post('email_panitia', true),
                'nama_bidang' => $this->input->post('nama_bidang', true),
                'password_panitia' => password_hash($this->input->post('password_panitia', true), PASSWORD_DEFAULT),
                'fg_status' => 1
            ];
            $this->db->insert('data_panitia', $akunpanitia);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('alert', 'Akun udah dibikin.');
                redirect('panitia/akun-panitia');
            } else {
                $this->session->set_flashdata('alert', 'Akun gagal dibikin.');
                redirect('panitia/akun-panitia');
            }
        }
    }

    #=========================================================================#
    #  TOOLS CONTROLLERS                                                      #
    #=========================================================================#

    public function lihat_peserta()
    {
        if (!$this->session->panitia) {
            show_404();
        }

        $data['page']['title'] = 'Lihat Peserta';
        $data['panitia'] = $this->CRUD->getOne('data', 'panitia', ['id_panitia' => $this->session->panitia['id_panitia'], 'data_panitia.email_panitia' => $this->session->panitia['email_panitia']]);

        $id = $this->input->get('idpendaftar', TRUE);

        $data['pengumuman'] = $this->CRUD->getAll('temp', 'pengumuman', 'id', 'DESC');

        $data['pendaftar'] = $this->CRUD->getOne('view_data', 'pendaftar', ['data_pendaftar.id' => $id]);
        $data['peserta']['data'] = $this->CRUD->getAll('view_data', 'peserta', 'nama_peserta', 'ASC', ['id_pendaftar' => $id]);

        if (empty($data['pendaftar'])) {
            show_404();
        }

        // Prosedur Hapus
        $hapus = $this->input->get('deletewesewes', true);
        if (!empty($data['pendaftar']) && $hapus == 'yes') {
            if (file_exists(FCPATH . '/public/uploads/pakta/' . $data['pendaftar']->pakta)) {
                unlink(FCPATH . '/public/uploads/pakta/' . $data['pendaftar']->pakta);
            }
            $this->db->delete('data_pendaftar', ['id' => $data['pendaftar']->id]);
            foreach ($data['peserta']['data'] as $pesertaa) {
                if (file_exists(FCPATH . '/public/uploads/foto_peserta/' . $pesertaa->foto)) {
                    unlink(FCPATH . '/public/uploads/foto_peserta/' . $pesertaa->foto);
                }
                if (file_exists(FCPATH . '/public/uploads/scan_ktm/' . $pesertaa->scan_ktm)) {
                    unlink(FCPATH . '/public/uploads/scan_ktm/' . $pesertaa->scan_ktm);
                }
                $this->db->delete('data_peserta', ['id' => $pesertaa->id]);
            }
            $this->session->set_flashdata('alert', 'Data pendaftar dan panitia berhasil dihapus.');
            redirect('panitia');
        }
        //endhere

        $this->load->view('panitia/layouts/header_dasbor', $data);
        $this->load->view('panitia/partials/navigation', $data);
        $this->load->view('panitia/view_lihat_peserta', $data);
        $this->load->view('panitia/layouts/footer_dasbor', $data);
    }

    #=========================================================================#
    #  AUTHENTICATION CONTROLLERS                                             #
    #=========================================================================#

    public function login() //DONE
    {

        if ($this->session->panitia) {
            redirect('panitia');
        }

        $data['page']['title'] = 'Login Panitia';

        # form validation
        $this->form_validation->set_rules('email', 'Email Panitia', 'required|max_length[64]|min_length[15]|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]|min_length[5]');

        #form validation work
        if ($this->form_validation->run() == true) {
            $email = htmlspecialchars($this->input->post('email', TRUE));
            $password = $this->input->post('password', TRUE);
            $this->session->set_flashdata('email', $this->input->post('email', TRUE));

            $panitia = $this->CRUD->getOne('data', 'panitia', ['email_panitia' => $email]);
            if ($panitia) {
                if ($panitia->fg_status > 0) {
                    if (password_verify($password, $panitia->password_panitia)) {
                        $userpanitia = [
                            'id_panitia' => $panitia->id_panitia,
                            'email_panitia' => $panitia->email_panitia
                        ];
                        $this->session->set_userdata('panitia', $userpanitia);
                        redirect('panitia');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Login Panitia Gagal!</h5>
                            Password salah.
                        </div>');
                        redirect('panitia/login');
                        return TRUE;
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Login Panitia Gagal!</h5>
                            Akun Panitia tidak aktif, hubungi Bidang Infomed.
                        </div>');
                    redirect('panitia/login');
                    return TRUE;
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Login Panitia Gagal!</h5>
                            Alamat Email tidak memiliki akses.
                        </div>');
                redirect('panitia/login');
                return TRUE;
            }
        }

        $this->load->view('panitia/view_login_panitia', $data);
    }

    public function lupa_password() //DONE
    {
        if ($this->session->panitia) {
            redirect('panitia');
        }

        $data['page']['title'] = 'Lupa Password';

        # form validation
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|max_length[64]|min_length[15]|valid_email|trim');

        #form validation work
        if ($this->form_validation->run() == true) {
            $user_token = [
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'token' => base64_encode(random_bytes(16))
            ];

            $this->_sendmail($user_token);
        }

        $this->load->view('panitia/view_lupapassword_panitia', $data);
    }

    public function logout() //DONE
    {
        if (!$this->session->panitia) {
            show_404();
        }

        $this->session->unset_userdata('panitia');
        redirect('panitia/login');
    }

    private function _sendmail($user_token) //DONE
    {
        if ($this->CRUD->insertOne('temp', 'token_panitia', $user_token) > 0) {

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
            $this->email->to($user_token['email']);
            $this->email->subject('RESET PASSWORD AKUN PANITIA');
            $this->email->message('<img src="' . base_url() . 'assets/images/sublogo.png" width="200"><h4>LUPA PASSWORD</h4>
            Ingat, rahasiakan link di bawah ini ya.<br>Klik link di bawah ini untuk reset password akun Anda: <a href="' . site_url() . 'panitia/reset-password?email=' . urlencode($user_token['email']) . '&token=' . urlencode($user_token['token']) . '">RESET PASSWORD</a>');

            if ($this->email->send()) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Link Telah Dikirim!</h5>
                            Link reset password PANITIA telah terkirim. Silakan cek email Anda.
                        </div>');
                redirect('panitia/login');
                return FALSE;
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                  Link reset password tidak terkirim. Silakan hubungi bidang Infomed
                </div>');
                redirect('panitia/login');
                return TRUE;

                // echo $this->email->print_debugger();
                // die;
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                  Token reset password PANITIA gagal tergenerasi, mohon coba lagi atau hubungi Bidang Infomed.
                </div>');
            redirect('panitia/login');
            return TRUE;
        }
    }

    public function reset_password() //DONE
    {
        if ($this->session->panitia) {
            redirect('panitia');
        }

        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $panitia = $this->CRUD->getOne('temp', 'token_panitia', ['email' => $email, 'token' => $token]);

        $data['page']['title'] = 'Reset Password Panitia';

        # form validation
        $this->form_validation->set_rules('password', 'Password Baru', 'required|max_length[32]|min_length[5]');
        $this->form_validation->set_rules('repassword', 'Ulangi Password Baru', 'required|max_length[32]|min_length[5]|matches[password]');

        #form validation work
        if ($this->form_validation->run() == true) {
            $user['password_panitia'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            if ($this->CRUD->insertOne('data', 'panitia', $user, ['email_panitia' => $panitia->email]) > 0) {
                if ($this->CRUD->deleteOne('temp', 'token_panitia', ['email' => $panitia->email]) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                            Reset Password Akun PANITIA berhasil. Silakan login dengan password baru.
                        </div>');
                    redirect('panitia/login');
                    return FALSE;
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-alert"></i> Berhasil!</h5>
                           Reset Password Akun PANITIA berhasil, namun token di database tidak terhapus. Silakan menghubungi Bidang Infomed.
                        </div>');
                    redirect('panitia/login');
                    return FALSE;
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                  Reset Password PANITIA tidak berhasil. Silakan coba lagi atau hubungi Bidang Infomed
                </div>');
                redirect('panitia/login');
                return TRUE;
            }
        } else {
            if (!$panitia) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                  Anda tidak memiliki akses atau email dan token tidak valid.
                </div>');
                redirect('panitia/login');
                return TRUE;
            }

            $this->load->view('panitia/view_resetpassword_panitia', $data);
        }
    }
}
