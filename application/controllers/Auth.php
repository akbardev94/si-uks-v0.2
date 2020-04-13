<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // CONSTRUCTOR  DI DALAM CONTROLLER AUTH UNTUK MENDEKLARASIKAN LIBRARY FUNGSI-FUNGSI YANG SUDAH ADA //
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }

    // CONTROLLER UNTUK TAMPILAN LOGIN //
    public function index()
    {
        // if user is already login
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $data['title'] = 'Login Page';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // run login user function
            $this->Auth_model->login_user();
        }
    }

    // CONTROLLER UNTUK TAMPILAN REGISTRASI USER BARU //
    public function registration()
    {
        // if user is already login
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $data['title'] = 'Registration Page';

        // set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            // custom massage
            'is_unique' => 'Email sudah ada!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            // custom massage
            'matches' => 'Konfirmasi password tidak sama!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'confirmation password', 'matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');
        } else {
            // whenever success, send data to model
            $data = [
                'username' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->Auth_model->registration_user($data);
        }
    }

    // CONTROLLER UNTUK MODEL VERIFIKASI //
    public function verify()
    {
        $this->Auth_model->run_verify();
    }

    // CONTROLLER UNTUK SESI LOG OUT //
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Anda Telah Keluar </div>');
        redirect('auth');
    }

    // CONTROLLER INI BERFUNGSI JIKA ADA YANG MEMAKSA MASUK TANPA MELALUI AKSES USER //
    public function blocked()
    {
        $data['title'] = 'Akses Terlarang!';
        $this->load->view('auth/blocked', $data);
    }

    // CONTROLLER UNTUK TAMPILAN LUPA PASSWORD //
    public function forgotPassword()
    {
        $data['title'] = 'Forgot password';

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->Auth_model->run_forgot_password();
        }
    }

    // CONTROLLER UNTUK TAMPILAN RESET PASSWORD //
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user_token = $this->db->get_where('user_token', ['email' => $email, 'token' => $token])->row_array();

        // jika ada usernya
        if ($user_token) {
            $this->session->set_userdata('email_reset_password', $email);
            $this->changePassword();
        } else {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Reset password anda gagal! Email atau token anda salah </div>');
            redirect('auth/forgotPassword');
        }
    }

    // CONTROLLER UNTUK TAMPILAN UBAH PASSWORD //
    public function changePassword()
    {
        // jika ada seseorang yang memaksa masuk
        if (!$this->session->userdata('email_reset_password')) {
            redirect('auth');
        }

        $data['title'] = 'Reset password';

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'min_length' => 'Password terlalu pendek!',
            'matches' => ''
        ]);

        $this->form_validation->set_rules('password2', 'Repeat password', 'matches[password1]', [
            'matches' => 'Konfirmasi password tidak sama!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/reset-password', $data);
            $this->load->view('templates/auth_header');
        } else {
            $this->Auth_model->reset_password();
        }
    }
}
