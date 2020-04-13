<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Admin extends CI_Controller
{
    // CONSTRUCTOR DI DALAM CONTROLLER ADMIN UNTUK MENDEKLARASIKAN LIBRARY FUNGSI-FUNGSI YANG SUDAH ADA //
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Menu_model', 'menu');
        $this->load->model('Crud_model');


        // check if user has been logged in
        is_logged_in();
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU DASHBOARD //
    public function index()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Dashboard';
        // $data['profil'] = $this->db->query('user')->result_array();

        $data['gukar'] = $this->db->query('SELECT id FROM tb_gukar')->num_rows();
        $data['siswa'] = $this->db->query('SELECT id FROM tb_siswa')->num_rows();
        $data['jenis_obat'] = $this->db->query('SELECT id FROM tb_obat')->num_rows();
        $data['jumlah_obat'] = $this->db->query('SELECT SUM(jmlobat) FROM tb_obat')->num_rows();
        $data['users'] = $this->db->query('SELECT id FROM user')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/home', $data);
        $this->load->view('templates/footer');
    }


    // CONTROLLER UNTUK MENAMPILKAN MENU PERIKSA & KELUHAN //
    public function periksa()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Periksa dan Keluhan';
        $data['periksa'] = $this->Admin_model->getPeriksa();
        // set rules
        $this->form_validation->set_rules('NIS', 'Nama Lengkap', 'Jenis Kelamin', 'Kelas', 'Golongan Darah', 'Tinggi Badan', 'Berat Badan', 'Keluhan', 'Periksa', 'Tindakan', 'Nama Dokter', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/periksa', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->addPeriksa($this->input->post());
            $this->session->set_flashdata('massage', 'Data Periksa Berhasil Ditambahkan!');
            redirect('admin/periksa');
        }
    }

    public function getPeriksaEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Admin_model->getPeriksaById($id));
    }

    public function editPeriksa()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Periksa dan Keluhan';
        $data['periksa'] = $this->Admin_model->getPeriksa();

        // set rules
        $this->form_validation->set_rules('NIS', 'Nama Lengkap', 'Jenis Kelamin', 'Kelas', 'Golongan Darah', 'Tinggi Badan', 'Berat Badan', 'Keluhan', 'Periksa', 'Tindakan', 'Nama Dokter', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/periksa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'noinduk' => $this->input->post('noinduk'),
                'gdsiswa' => $this->input->post('gdsiswa'),
                'tbsiswa' => $this->input->post('tbsiswa'),
                'bbsiswa' => $this->input->post('bbsiswa'),
                'statusgizi' => $this->input->post('statusgizi'),
                'keluhansiswa' => $this->input->post('keluhansiswa'),
                'periksasiswa' => $this->input->post('periksasiswa'),
                'tindakan' => $this->input->post('tindakan'),
                'keterangan' => $this->input->post('keterangan'),
                'catatan' => $this->input->post('catatan'),
                'namadokter' => $this->input->post('namadokter'),
                'tglupdate' => $this->input->post('tglupdate')
            ];
            // kirim data periksa ke model 
            $this->Admin_model->editPeriksa($data);
            $this->session->set_flashdata('massage', 'Data Periksa Berhasil Diubah!');
            redirect('admin/periksa');
        }
    }

    public function delPeriksa($id = null)
    {
        if (is_null($id)) redirect('admin/periksa');
        $this->Admin_model->deletePeriksa($id);
        $this->session->set_flashdata('massage', 'Data Periksa Berhasil Dihapus!');
        redirect('admin/periksa');
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU REKAM KESEHATAN //
    public function rekamSehat()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Rekam Kesehatan';
        $data['rekam'] = $this->Admin_model->getRekam();
        // set rules
        $this->form_validation->set_rules('NIS', 'Nama Lengkap', 'Jenis Kelamin', 'Kelas', 'Tinggi Badan', 'Berat Badan', 'IMT', 'Imunisasi', 'Jenis Disabilitas', 'Tekanan Darah', 'TB/U( Stunting )', 'Resiko Anemia', 'Kebersihan Rambut', 'Kebersihan Kulit', 'Kebersihan Kuku', 'Kebersihan Rongga Mulut', 'Kesehatan Gigi & Gusi', 'Kesehatan Mata', 'Kesehatan Telingan', 'Ganggun Mental Emosional', 'Modalitas Belajar', 'Dominasi Otak', 'Penggunaan Alat Bantu', 'Kebugaran Jasmani', 'Tanggal Update', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/rekam-kesehatan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->addRekam($this->input->post());
            $this->session->set_flashdata('massage', 'Data Rekam Kesehatan Berhasil Dihapus!');
            redirect('admin/rekamsehat');
        }
    }

    public function getRekamEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Admin_model->getRekamById($id));
    }

    public function editRekam()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Rekam Kesehatan';
        $data['rekam'] = $this->Admin_model->getRekam();

        // set rules
        $this->form_validation->set_rules('NIS', 'Nama Lengkap', 'Jenis Kelamin', 'Kelas', 'Tinggi Badan', 'Berat Badan', 'IMT', 'Imunisasi', 'Jenis Disabilitas', 'Tekanan Darah', 'TB/U( Stunting )', 'Resiko Anemia', 'Kebersihan Rambut', 'Kebersihan Kulit', 'Kebersihan Kuku', 'Kebersihan Rongga Mulut', 'Kesehatan Gigi & Gusi', 'Kesehatan Mata', 'Kesehatan Telinga', 'Gaya Hidup', 'Ganggun Mental Emosional', 'Modalitas Belajar', 'Dominasi Otak', 'Penggunaan Alat Bantu', 'Kebugaran Jasmani', 'Tanggal Update', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/rekam-kesehatan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'noinduk' => $this->input->post('noinduk'),
                'imt' => $this->input->post('imt'),
                'imun' => $this->input->post('imun'),
                'disabilitas' => $this->input->post('disabilitas'),
                'tekdarah' => $this->input->post('tekdarah'),
                'tbu' => $this->input->post('tbu'),
                'resikoanemia' => $this->input->post('resikoanemia'),
                'rambut' => $this->input->post('rambut'),
                'kulit' => $this->input->post('kulit'),
                'kuku' => $this->input->post('kuku'),
                'ronggamulut' => $this->input->post('ronggamulut'),
                'gigigusi' => $this->input->post('gigigusi'),
                'mata' => $this->input->post('mata'),
                'telinga' => $this->input->post('telinga'),
                'gayahidup' => $this->input->post('gayahidup'),
                'emosi' => $this->input->post('emosi'),
                'modalitasbelajar' => $this->input->post('modalitasbelajar'),
                'dominasiotak' => $this->input->post('dominasiotak'),
                'alatbantu' => $this->input->post('alatbantu'),
                'jasmani' => $this->input->post('jasmani'),
                'tglupdate' => $this->input->post('tglupdate')
            ];
            // kirim data rekam ke model 
            $this->Admin_model->editRekam($data);
            $this->session->set_flashdata('massage', 'Data Rekam Berhasil Diubah');
            redirect('admin/rekamsehat');
        }
    }

    public function delRekam($id = null)
    {
        if (is_null($id)) redirect('admin/rekam-kesehatan');
        $this->Admin_model->deleteRekam($id);
        $this->session->set_flashdata('massage', 'Data Rekam Kesehatan Berhasil Dihapus!');
        redirect('admin/rekamsehat');
    }


    public function getKunjungEdit()
    {
        echo json_encode($this->Admin_model->getKunjungById($this->input->post('noinduk')));
    }

    public function getKunjungAdd()
    {
        echo json_encode($this->Admin_model->getKunjung($this->input->post('id')));
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU REKAM KESEHATAN //
    public function kunjung()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Kunjungan Siswa';
        $data['kunjung'] = $this->Admin_model->getKunjung();
        $data['obat'] = $this->db->query("SELECT id, merkobat FROM tb_obat")->result_array();
        $data['siswa'] = $this->db->query("SELECT noinduk, nama FROM tb_siswa")->result_array();

        // set rules
        $this->form_validation->set_rules('No. Induk', 'Nama Lengkap', 'Jenis Kelamin', 'Kelas', 'Cek', 'Sakit', 'Obat', 'Jumlah Obat', 'Tanggal', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kunjung', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'noinduk' => $this->input->post('noinduk'),
                'cek' => $this->input->post('cek'),
                'sakit' => $this->input->post('sakit'),
                'obat_id' => $this->input->post('obat_id'),
                'jmlobat' => $this->input->post('jmlobat'),
                'tgl' => $this->input->post('tgl'),
                'keterangan' => $this->input->post('keterangan')
            ];

            // $this->Admin_model->addKunjung($this->input->post($data));
            $this->Admin_model->addKunjung($data);
            $this->session->set_flashdata('massage', 'Data Berhasil Ditambah');
            redirect('admin/kunjung');
        }
    }

    public function editKunjung()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Kunjungan Siswa';

        // Mengambil data Kunjung
        $data['kunjung'] = $this->Admin_model->getKunjung();

        // Menggambil data siswa & obat
        $data['obat'] = $this->db->query("SELECT id, merkobat FROM tb_obat")->result_array();
        $data['siswa'] = $this->db->query("SELECT noinduk, nama FROM tb_siswa")->result_array();

        // set rules
        $this->form_validation->set_rules('No. Induk', 'Nama Lengkap', 'Jenis Kelamin', 'Kelas', 'Cek', 'Sakit', 'Obat', 'Jumlah Obat', 'Tanggal', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/kunjung', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                // 'id' => $this->input->post('id'),
                'noinduk' => $this->input->post('noinduks'),
                // 'nama' => $this->input->post('namas'),
                'cek' => $this->input->post('ceks'),
                'sakit' => $this->input->post('sakits'),
                'obat_id' => $this->input->post('obat_ids'),
                'jmlobat' => $this->input->post('jmlobats'),
                'tgl' => $this->input->post('tgls'),
                'keterangan' => $this->input->post('keterangans')
            ];
            // kirim data rekam ke model 
            $this->Admin_model->editKunjung($data);
            $this->session->set_flashdata('massage', 'Data Kunjungan Berhasil Diubah');
            redirect('admin/kunjung');
        }
    }

    public function delKunjung($id = null)
    {
        if (is_null($id)) redirect('admin/kunjung');
        $this->Admin_model->deleteKunjung($id);
        $this->session->set_flashdata('massage', 'Data Kunjungan Berhasil Dihapus!');
        redirect('admin/kunjung');
    }

    public function rapor()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Rapor Kesehatan';
        $data['rapor'] = $this->User_model->getRapor();
        $data['siswa'] = $this->db->query("SELECT noinduk, nama FROM tb_siswa")->result_array();
        $nis = $this->input->post('noinduk');
        if ($nis != '') {
            $data['raporSiswa'] = $this->User_model->getRaporSiswa($nis);
        }
        $data['nis'] = $nis;
        $data['sekolah'] = $this->db->get('tb_sekolah')->row_array();
        $where = $this->session->userdata('email');
        $data['cekUser'] = $this->db->query("SELECT role_id FROM user WHERE email = '$where'")->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/rapor_kesehatan', $data);
        $this->load->view('templates/footer');
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU RAPOR KESEHATAN //
    public function calendar()
    {
        // get user information
        $data['user'] = $this->Auth_model->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Kalender Kegiatan';
        $data['calendar'] = $this->User_model->getCalendar();
        $where = $this->session->userdata('email');
        $data['cekUser'] = $this->db->query("SELECT role_id FROM user WHERE email = '$where'")->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/calendar', $data);
        $this->load->view('templates/footer');
    }

    // EXPORT DATA //
    public function exporPeriksa()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $query = $this->db->query("SELECT `tb_siswa`.`id`,`tb_siswa`.`noinduk`, `tb_siswa`.`nama`, `tb_siswa`.`kelamin`,`tb_siswa`.`klspos`,`tb_periksa`.`gdsiswa`,`tb_periksa`.`tbsiswa`,`tb_periksa`.`bbsiswa`,`tb_periksa`.`statusgizi`,`tb_periksa`.`keluhansiswa`,`tb_periksa`.`periksasiswa`,`tb_periksa`.`tindakan`,`tb_periksa`.`keterangan`,`tb_periksa`.`catatan`, `tb_periksa`.`namadokter`,`tb_periksa`.`tglupdate`
        FROM `tb_siswa` 
   LEFT JOIN `tb_periksa` ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk`
       WHERE `tb_siswa`.`noinduk`");

        $delimiter = ",";
        $newline = "\r\n";

        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

        force_download('Daftar Periksa & Keluhan.csv', $data);
    }

    public function exporRekam()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $query = $this->db->query("SELECT `tb_siswa`.`id`,`tb_siswa`.`noinduk`, `tb_siswa`.`nama`, `tb_siswa`.`kelamin`, `tb_siswa`.`klspos`, `tb_periksa`.`tbsiswa`, `tb_periksa`.`bbsiswa`, `tb_rekam`.`disabilitas`,`tb_rekam`.`tekdarah`,`tb_rekam`.`imun`,`tb_rekam`.`imt`,`tb_rekam`.`tbu`,`tb_rekam`.`resikoanemia`,`tb_rekam`.`rambut`,`tb_rekam`.`kulit`,`tb_rekam`.`kuku`,`tb_rekam`.`ronggamulut`,`tb_rekam`.`gigigusi`,`tb_rekam`.`mata`,`tb_rekam`.`telinga`,`tb_rekam`.`gayahidup`,`tb_rekam`.`emosi`,`tb_rekam`.`modalitasbelajar`,`tb_rekam`.`dominasiotak`,`tb_rekam`.`alatbantu`,`tb_rekam`.`jasmani`,`tb_rekam`.`tglupdate` 
        FROM `tb_siswa` 
   LEFT JOIN `tb_periksa` ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk` 
   LEFT JOIN `tb_rekam` ON `tb_siswa`. `noinduk` = `tb_rekam`. `noinduk`
          WHERE `tb_siswa`.`id`");

        $delimiter = ",";
        $newline = "\r\n";

        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

        force_download('Daftar Rekam Kesehatan.csv', $data);
    }

    public function exporKunjung()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');

        $query = $this->db->query(
            "SELECT `tb_siswa`.`nama`, `tb_siswa`.`kelamin`, `tb_siswa`.`klspos`, `tb_obat`.`merkobat`,`tb_kunjung`.* 
               FROM `tb_kunjung` 
    LEFT OUTER JOIN `tb_siswa` ON `tb_kunjung`.`noinduk` = `tb_siswa`.`noinduk` 
    LEFT OUTER JOIN `tb_obat` ON `tb_kunjung`.`obat_id` = `tb_obat`.`id`"
        );
        $delimiter = ",";
        $newline = "\r\n";

        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);

        force_download('Daftar Kunjungan.csv', $data);
    }
}
