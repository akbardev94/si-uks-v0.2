<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    // CONSTRUCTOR DI DALAM CONTROLLER ADMIN UNTUK MENDEKLARASIKAN LIBRARY FUNGSI-FUNGSI YANG SUDAH ADA //
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Crud_model');


        // check if user has been logged in
        is_logged_in();
    }

    //-----------------------------------------// CONTROLLER SEKOLAH //---------------------------------//
    public function getSekolahEdit()
    {
        echo json_encode($this->Crud_model->getSekolahById($this->input->post('id')));
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU DATA SEKOLAH //
    public function dataSekolah()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Sekolah';
        $data['sekolah'] = $this->Crud_model->getSekolah();

        // set rules
        $this->form_validation->set_rules('Nama Sekolah', 'Nama Yayasan', 'Alamat', 'Kata Mutiara', 'Kepala Sekolah', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-sekolah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'sekolah' => $this->input->post('sekolah'),
                'yayasan' => $this->input->post('yayasan'),
                'alamat' => $this->input->post('alamat'),
                'katamutiara' => $this->input->post('katamutiara'),
                'kepalasekolah' => $this->input->post('kepalasekolah')
            ];
            // kirim data gukar ke model 
            $this->Crud_model->editSekolah($data);
            $this->session->set_flashdata('massage', 'Data Sekolah Berhasil Diubah');
            redirect('data/datasekolah');
        }
    }
    //-----------------------------------------// END CONTROLLER SEKOLAH //---------------------------------//

    //-----------------------------------------// CONTROLLER GUKAR //---------------------------------//

    public function dataGukar()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Guru & Karyawan';
        $data['gukar'] = $this->Crud_model->getGukar();

        // set rules
        $this->form_validation->set_rules('NIY', 'Nama Guru/Karyawan', 'Tempat Tanggal Lahir', 'Jenis Kelamin', 'Jabatan', 'Alamat', 'Nomor Telepon/HP', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-gukar', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Crud_model->addGukar($this->input->post());
            $this->session->set_flashdata('massage', 'Data Guru Berhasil Ditambahkan!');
            redirect('data/datagukar');
        }
    }

    public function getGukarEdit()
    {
        echo json_encode($this->Crud_model->getGukarById($this->input->post('id')));
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU DATA GURU & KARYAWAN // 
    public function editGukar()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Guru & Karyawan';
        $data['gukar'] = $this->Crud_model->getGukar();

        // set rules
        $this->form_validation->set_rules('NIY', 'Nama Guru/Karyawan', 'Tempat Tanggal Lahir', 'Jenis Kelamin', 'Jabatan', 'Alamat', 'Nomor Telepon/HP', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-gukar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'niy' => $this->input->post('niys'),
                'nama' => $this->input->post('namas'),
                'ttl' => $this->input->post('ttls'),
                'kelamin' => $this->input->post('kelamins'),
                'jabatan' => $this->input->post('jabatans'),
                'alamat' => $this->input->post('alamats'),
                'notelp' => $this->input->post('notelps')
            ];
            // kirim data gukar ke model 
            $this->Crud_model->editGukar($data);
            $this->session->set_flashdata('massage', 'Data Guru Berhasil Diubah!');
            redirect('data/datagukar');
        }
    }

    public function delgukar($id = null)
    {
        if (is_null($id)) redirect('data/data-gukar');
        $this->Crud_model->deleteGukar($id);
        $this->session->set_flashdata('massage', 'Data Guru Berhasil Dihapus!');
        redirect('data/datagukar');
    }

    //-----------------------------------------//END CONTROLLER GUKAR //---------------------------------//

    //-----------------------------------------//CONTROLLER SISWA //---------------------------------//

    // CONTROLLER UNTUK MENAMPILKAN TAMBAH DATA SISWA //
    public function dataSiswa()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Siswa';
        $data['siswa'] = $this->Crud_model->getSiswa();

        // set rules
        $this->form_validation->set_rules('No Induk', 'Nomor Induk Siswa Nasional', 'Nama Siswa', 'Kelas', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Umur', 'Alamat Orang Tua', 'Nama Ayah', 'Nama Ibu', 'Nomor Telepon/HP', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Crud_model->addSiswa($this->input->post()); // Insert data siswa ke tabel tb_siswa
            $noInduk = $this->db->query("SELECT noinduk FROM tb_siswa ORDER BY id DESC LIMIT 1")->row(); // Ambil noinduk terakhir dari tb_siswa
            $nis = [
                'noinduk' => $noInduk->noinduk // Ambil noinduk terakhir kemudian dideklarasikan
            ];
            $this->db->insert('tb_periksa', $nis); // kemudian diinsert ke tb_periksa
            $this->db->insert('tb_rekam', $nis); // kemudian diinsert ke tb_rekam
            $this->db->insert('tb_kunjung', $nis);
            $this->session->set_flashdata('massage', 'Data Siswa Berhasil Ditambahkan!');
            redirect('data/datasiswa');
        }
    }

    public function getSiswaEdit()
    {
        echo json_encode($this->Crud_model->getSiswaById($this->input->post('id')));
    }

    // CONTROLLER UNTUK MENAMPILKAN UBAH DATA SISWA // 
    public function editSiswa()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Siswa';
        $data['siswa'] = $this->Crud_model->getSiswa();

        // set rules
        $this->form_validation->set_rules('No Induk', 'Nomor Induk Siswa Nasional', 'Nama Siswa', 'Kelas', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Umur', 'Alamat Orang Tua', 'Nama Ayah', 'Nama Ibu', 'Nomor Telepon/HP', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'noinduk' => $this->input->post('noinduks'),
                'nisn' => $this->input->post('nisns'),
                'nama' => $this->input->post('namas'),
                'klspos' => $this->input->post('klsposs'),
                'kelamin' => $this->input->post('kelamins'),
                'tmplahir' => $this->input->post('tmplahirs'),
                'tgllahir' => $this->input->post('tgllahirs'),
                'umur' => $this->input->post('umurs'),
                'alamatortu' => $this->input->post('alamatortus'),
                'namaayah' => $this->input->post('namaayahs'),
                'namaibu' => $this->input->post('namaibus'),
                'hape' => $this->input->post('hapes')
            ];
            // kirim data siswa ke model  
            $this->Crud_model->editSiswa($data);
            $this->session->set_flashdata('massage', 'Data Siswa Berhasil Diubah!');
            redirect('data/datasiswa');
        }
    }

    public function delSiswa($id = null)
    {
        if (is_null($id)) redirect('data/datasiswa');
        $this->Crud_model->deleteSiswa($id);
        $this->session->set_flashdata('massage', 'Data Siswa Berhasil Dihapus!');
        redirect('data/datasiswa');
    }
    //-----------------------------------------//END CONTROLLER SISWA //---------------------------------//

    //-----------------------------------------//CONTROLLER SARANA //---------------------------------//

    // CONTROLLER UNTUK MENAMPILKAN MENU DATA SARANA //
    public function dataSarana()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Sarana';
        $data['sarana'] = $this->Crud_model->getSarana();
        // set rules
        $this->form_validation->set_rules('Kode Sarana', 'Nama Sarana', 'Merk', 'Jumlah', 'Kategori', 'Kondisi', 'Tanggal Pembelian', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-sarana', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Crud_model->AddSarana($this->input->post());
            $this->session->set_flashdata('massage', 'Data Sarana Berhasil Ditambahkan!');
            redirect('data/datasarana');
        }
    }

    public function getSaranaEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Crud_model->getSaranaById($id));
    }

    // CONTROLLER UNTUK MENAMPILKAN EDIT DATA SISWA // 
    public function editSarana()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Data Siswa';
        $data['sarana'] = $this->Crud_model->getSarana();

        // set rules
        $this->form_validation->set_rules('Kode Sarana', 'Nama Sarana', 'Merk', 'Jumlah', 'Kategori', 'Kondisi', 'Tanggal Pembelian', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data-sarana', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'kode_sarana' => $this->input->post('kode_saranas'),
                'namasarana' => $this->input->post('namasaranas'),
                'merksarana' => $this->input->post('merksaranas'),
                'jmlsarana' => $this->input->post('jmlsaranas'),
                'katsarana' => $this->input->post('katsaranas'),
                'konsarana' => $this->input->post('konsaranas'),
                'tglbeli' => $this->input->post('tglbelis')
            ];
            // kirim data sarana ke model  
            $this->Crud_model->editSarana($data);
            $this->session->set_flashdata('massage', 'Data Sarana Berhasil Diubah!');
            redirect('data/datasarana');
        }
    }

    public function delsarana($id = null)
    {
        if (is_null($id)) redirect('data/datasarana');
        $this->Crud_model->deleteSarana($id);
        $this->session->set_flashdata('massage', 'Data Sarana Berhasil Dihapus!');
        redirect('data/datasarana');
    }
    //-----------------------------------------//END CONTROLLER SARANA //---------------------------------//

    // CONTROLLER UNTUK MENAMPILKAN MENU MANAGEMEN OBAT //
    public function manageObat()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Managemen Obat';
        $data['obat'] = $this->Crud_model->getObat();
        // set rules
        $this->form_validation->set_rules('Kode Obat', 'Merk Obat', 'Kategori', 'Jumlah Obat', 'Tanggal Simpaan', 'Tanggal Kedaluwarsa', 'Kondisi', 'Manfaat', 'Bentuk Obat', 'Konsumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/manage-obat', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Crud_model->addObat($this->input->post());
            $this->session->set_flashdata('massage', 'Data Obat Berhasil Ditambahkan!');
            redirect('data/manageobat');
        }
    }

    public function getObatEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Crud_model->getObatById($id));
    }

    public function editObat()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Managemen Obat';
        $data['obat'] = $this->Crud_model->getObat();

        // set rules
        $this->form_validation->set_rules('Kode Obat', 'Merk Obat', 'Kategori', 'Jumlah Obat', 'Tanggal Simpaan', 'Tanggal Kedaluwarsa', 'Kondisi', 'Manfaat', 'Bentuk Obat', 'Konsumen', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/manage-obat', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'kode_obat' => $this->input->post('kode_obat'),
                'merkobat' => $this->input->post('merkobat'),
                'katobat' => $this->input->post('katobats'),
                'jmlobat' => $this->input->post('jmlobats'),
                'tglsimpan' => $this->input->post('tglsimpans'),
                'tglkedaluwarsa' => $this->input->post('tglkedaluwarsas'),
                'kondisi' => $this->input->post('kondisis'),
                'manfaat' => $this->input->post('manfaats'),
                'bentuk' => $this->input->post('bentuks'),
                'konsumen' => $this->input->post('konsumens')
            ];
            // kirim data obat ke model
            $this->Crud_model->editObat($data);
            $this->session->set_flashdata('massage', 'Data Obat Berhasil Diubah!');
            redirect('data/manageobat');
        }
    }

    public function delObat($id = null)
    {
        if (is_null($id)) redirect('data/manageobat');
        $this->Crud_model->deleteObat($id);
        $this->session->set_flashdata('massage', 'Data Obat Berhasil Dihapus!');
        redirect('data/manageobat');
    }

    public function exporSiswa()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $query = $this->db->query("SELECT * FROM tb_siswa");

        $delimiter = ",";
        $newline = "\r\n";

        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

        force_download('Data Siswa.csv', $data);
    }
}
