<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        // CONSTRUCTOR DI DALAM CONTROLER USER UNTUK MENDEKLARASIKAN LIBRARY FUNGSI-FUNGSI YANG SUDAH ADA //
        parent::__construct();
        $this->load->model('Auth_model');
        // load model
        $this->load->model('User_model', 'user');
        // load form validation
        $this->load->library('form_validation');
        // if user already logged in
        is_logged_in();
    }

    // CONTROLLER UNTUK MENAMPILKAN PROFIL USER //
    public function index()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));

        $data['title'] = 'My Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/home', $data);
        $this->load->view('templates/footer');
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU EDIT PROFIL USER //    
    public function edit()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Edit Profile';

        // set rules
        $this->form_validation->set_rules('username', 'nama lengkap', 'required|trim|min_length[3]|max_length[20]', [
            'min_length' => 'Username is too short!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'noinduk' => $this->input->post('noinduk'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'statusakun' => $this->input->post('statusakun'),
                'kelas' => $this->input->post('kelas'),
                'jabatan' => $this->input->post('jabatan'),
                'namabapak' => $this->input->post('namabapak'),
                'namaibu' => $this->input->post('namaibu'),
                'image' => $_FILES['image']['name']
            ];

            // send it to model
            $this->user->editUser($data);
            $this->session->set_flashdata('massage', 'Profil Berhasil Dirubah');
            redirect('user');
        }
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU UBAH PASSWORD USER//
    public function changePassword()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Change Password';

        // set rules
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[7]', [
            'min_length' => 'Password is too short!'
        ]);

        $this->form_validation->set_rules('confirm_password', 'Confirm password', 'required|trim|matches[new_password]', [
            'matches' => "Password didn't match!"
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change-password', $data);
            $this->load->view('templates/footer');
        } else {
            // do something
            $this->user->changePassword($this->input->post());
        }
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU RAPOR KESEHATAN //
    public function raporSiswa()
    {
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Rapor Siswa';
        $data['sekolah'] = $this->db->get('tb_sekolah')->row_array();
        $where = $this->session->userdata('email');
        $nis = $this->db->query("SELECT noinduk FROM user WHERE email = '$where'")->row();
        $data['raporSiswa'] = $this->user->getRaporSiswa($nis->noinduk);
        $data['nis'] = $nis->noinduk;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/rapor_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function agenda()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Agenda';
        $data['calendar'] = $this->user->getCalendar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/agenda', $data);
        $this->load->view('templates/footer');
    }
}
