<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $user;
    public function __construct()
    {
        parent::__construct();

        $this->user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function editUser($data)
    {
        // if user upload file
        if ($data['image']) {
            // configuration    
            $upload_image = $_FILES['image']['name'];
            $config['allowed_types']        = 'gif|jpg|png';
            $config['upload_path']          = './assets/img/profile/';
            $config['max_size']             = 100000;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {

                $old_image = $this->user['image'];
                // hapus gambar sebelumnya kecuali gambar default
                if ($old_image != 'default.jpg') {
                    // var_dump( FCPATH . 'assets/img/profile/' . $old_image);die;
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                // $this->db->set('image', $data['image']);
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                $this->upload->display_errors('massage', '<div class="alert alert-danger">
		Profil anda berhasil <b>diubah!</b> </div>');
                redirect('user/edit');
            }
        }

        $this->db->set('username', $data['username']);
        $this->db->where('email', $data['email']);
        $this->db->update('user', $data);
    }

    public function changePassword($data)
    {
        $current_password = $data['current_password'];
        $new_password = $data['new_password'];

        // cek password
        if (password_verify($current_password, $this->user['password'])) {
            // cek jika password sebelumnya sama dengan password sekarang
            if ($current_password == $new_password) {
                // message('Current password cannot be the same as new password!', 'danger', 'user/changepassword');
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
                Profil anda berhasil <b>diubah</b> </div>');
                redirect('user/changepassword ');
            } else {
                // hash password lalu update ke database
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $new_password);
                $this->db->where('email', $this->user['email']);
                $this->db->update('user');
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">
                Password anda berhasil <b>diubah</b> </div>');
                redirect('user/changepassword');
            }
        } else {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
            Password yang anda masukkan tidak sama! </div>');
            redirect('user/changepassword');
        }
    }

    public function getRapor()
    {
        $query = "SELECT `tb_siswa`.*,`tb_periksa`.*,`tb_rekam`.*,`tb_sekolah`.* 
                    FROM `tb_siswa` 
               INNER JOIN `tb_periksa` ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk` 
               INNER JOIN `tb_rekam` ON `tb_siswa`. `noinduk` = `tb_rekam`.`noinduk` 
               INNER JOIN `tb_sekolah` ON `tb_siswa`.`noinduk` = `tb_sekolah`.`noinduk` 
                 ORDER BY `tb_siswa`.`id` ASC
        ";
        return $this->db->query($query)->result_array();
    }

    public function getRaporSiswa($nis)
    {
        $query = "SELECT `tb_siswa`.*, `tb_periksa`.*, `tb_rekam`.* FROM `tb_siswa` 
                    JOIN `tb_periksa` ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk`
                    JOIN `tb_rekam` ON `tb_siswa`.`noinduk` = `tb_rekam`.`noinduk`   
                   WHERE `tb_siswa`.`noinduk` = $nis ";

        return $this->db->query($query)->row_array();
    }

    public function getCalendar()
    {
        return $this->db->get('calendar')->result_array();
    }
}
