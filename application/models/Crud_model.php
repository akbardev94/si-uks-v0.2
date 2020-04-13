<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    //----------------------------------------	// MODEL SEKOLAH //---------------------------------//
    // get all sekolah
    public function getSekolah()
    {
        return $this->db->get('tb_sekolah')->result_array();
    }

    public function getSekolahById($id)
    {
        $this->db->where("id =", $id);
        return $this->db->get('tb_sekolah')->row_array();
    }

    // ubah sekolah
    public function editSekolah($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('tb_sekolah', $data);
    }

    //----------------------------------------	// MODEL SEKOLAH //---------------------------------//

    //----------------------------------------// MODEL GURU & KARYAWAN //---------------------------------//
    // MODEL UNTUK GUKAR //
    public function getGukar()
    {
        return $this->db->get('tb_gukar')->result_array();
    }

    public function getGukarById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('tb_gukar')->row_array();
    }

    // Tambah Gukar
    public function addGukar($data)
    {
        $this->db->insert('tb_gukar', $data);
    }

    // hapus Gukar
    public function deleteGukar($id)
    {
        $this->db->delete('tb_gukar', ['id' => $id]);
    }

    // ubah Gukar
    public function editGukar($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('tb_gukar', $data);
    }

    //----------------------------------------// END MODEL GUKAR //---------------------------------//

    //----------------------------------------// MODEL SISWA //---------------------------------//
    // MODEL UNTUK SISWA //
    public function getSiswa()
    {
        return $this->db->get('tb_siswa')->result_array();
    }

    public function getSiswaById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('tb_siswa')->row_array();
    }

    // Tambah Siswa
    public function addSiswa($data)
    {
        $this->db->insert('tb_siswa', $data);
    }

    // hapus Siswa
    public function deleteSiswa($id)
    {
        $this->db->delete('tb_siswa', ['id' => $id]);
    }

    // ubah Siswa
    public function editSiswa($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('tb_siswa', $data);
    }

    //----------------------------------------// END MODEL SISWA //---------------------------------//

    //----------------------------------------// MODEL SARANA //---------------------------------//
    // MODEL UNTUK SARANA //
    public function getSarana()
    {
        return $this->db->get('tb_sarana')->result_array();
    }

    public function getSaranaById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('tb_sarana')->row_array();
    }

    // Tambah Sarana
    public function addSarana($data)
    {
        $this->db->insert('tb_sarana', $data);
    }

    // hapus Sarana
    public function deleteSarana($id)
    {
        $this->db->delete('tb_sarana', ['id' => $id]);
    }

    // ubah Sarana
    public function editSarana($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('tb_sarana', $data);
    }

    //----------------------------------------// END MODEL SARANA //---------------------------------//

    //----------------------------------------// MODEL OBAT //---------------------------------//
    // MODEL UNTUK SARANA //
    public function getObat()
    {
        return $this->db->get('tb_obat')->result_array();
    }

    public function getObatById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('tb_obat')->row_array();
    }

    // Tambah Obat
    public function addObat($data)
    {
        $this->db->insert('tb_obat', $data);
    }

    // hapus Obat
    public function deleteObat($id)
    {
        $this->db->delete('tb_obat', ['id' => $id]);
    }

    // ubah Obat
    public function editObat($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('tb_obat', $data);
    }

    //----------------------------------------// END MODEL OBAT //---------------------------------//
}
