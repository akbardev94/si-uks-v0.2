<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	//---------------------------------------------------- MENU -----------------------------------------------//
	//----------------------------------------// MODEL ROLE //---------------------------------//
	// MODEL UNTUK MENU ROLE //
	// ROLE SECTION
	public function getRole()
	{
		return $this->db->get('user_role')->result_array();
	}

	public function getRoleById($id)
	{
		return $this->db->get_where('user_role', ['id' => $id])->row_array();
	}

	// Tambah role
	public function addRole($data)
	{
		$this->db->insert('user_role', $data);
	}

	// hapus role
	public function deleteRole($id)
	{
		$this->db->delete('user_role', ['id' => $id]);
	}

	// ubah role
	public function editRole($data)
	{
		$id = $data['id'];
		$this->db->where('id', $id);
		$this->db->update('user_role', $data);
	}

	//----------------------------------------// END MODEL ROLE //---------------------------------//

	//----------------------------------------	// MODEL UNTUK USER ACCESS //---------------------------------//
	// USER ACCESS SECTION
	public function getUserAccess()
	{
		return $this->db->get('user_access_menu')->result_array();
	}

	public function getUserAccessById($role_id, $menu_id, $true = null)
	{
		if ($true == 1) {
			return $this->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id])->row_array();
		}

		return $this->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id])->num_rows();
	}

	// tambah user access
	public function addUserAccess($data)
	{
		$this->db->insert('user_access_menu', $data);
	}

	// tambah user access
	public function deleteUserAccess($data)
	{
		$this->db->delete('user_access_menu', $data);
	}

	//----------------------------------------	// MODEL UNTUK USER ACCESS //---------------------------------//

	//---------------------------------------------------- END MENU -----------------------------------------------//


	//------------------------------------------------ ADMIN ------------------------------------------//

	//----------------------------------------// MODEL PERIKSA //---------------------------------//
	// MODEL UNTUK PERIKSA //
	// PERIKSA SECTION
	public function getPeriksa()
	{
		$query = "SELECT `tb_siswa`.`nama`, `tb_siswa`.`kelamin`,`tb_siswa`.`klspos`,`tb_periksa`.*
					FROM `tb_siswa` LEFT JOIN `tb_periksa`
					  ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk`
					  ";
		return $this->db->query($query)->result_array();
	}

	// get periksa by id
	public function getPeriksaById($id)
	{
		$query = "SELECT `tb_siswa`.`id`,`tb_siswa`.`noinduk`, `tb_siswa`.`nama`, `tb_siswa`.`kelamin`,`tb_siswa`.`klspos`,`tb_periksa`.*
					FROM `tb_siswa` LEFT JOIN `tb_periksa`
					  ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk`
				   WHERE `tb_siswa`.`noinduk` = $id
					  ";

		$this->db->where('id =', $id);
		return $this->db->query($query)->row_array();
	}

	// Tambah data Periksa
	public function addPeriksa($data)
	{
		$this->db->insert('tb_periksa', $data);
	}

	// hapus data periksa
	public function deletePeriksa($id)
	{
		$this->db->delete('tb_periksa', ['id' => $id]);
	}

	// ubah data periksa
	public function editPeriksa($data)
	{
		$id = $data['id'];
		$this->db->where('id', $id);
		$this->db->update('tb_periksa', $data);
	}

	//----------------------------------------// END MODEL PERIKSA //---------------------------------//

	//----------------------------------------// MODEL REKAM //---------------------------------//
	// MODEL UNTUK REKAM //
	// PERIKSA REKAM
	public function getRekam()
	{
		$query = "SELECT `tb_siswa`.`noinduk`, `tb_siswa`.`nama`, `tb_siswa`.`kelamin`, `tb_siswa`.`klspos`, `tb_periksa`.`tbsiswa`, `tb_periksa`.`bbsiswa`, `tb_rekam`.* 
					FROM `tb_siswa` 
			   LEFT JOIN `tb_periksa` ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk` 
			   LEFT JOIN `tb_rekam` ON `tb_siswa`. `noinduk` = `tb_rekam`. `noinduk`
			   ";
		return $this->db->query($query)->result_array();
	}

	// get periksa by id
	public function getRekamById($id)
	{
		$query = "SELECT `tb_siswa`.`id`,`tb_siswa`.`noinduk`, `tb_siswa`.`nama`, `tb_siswa`.`kelamin`, `tb_siswa`.`klspos`, `tb_periksa`.`tbsiswa`, `tb_periksa`.`bbsiswa`, `tb_rekam`.* 
					FROM `tb_siswa` 
			   LEFT JOIN `tb_periksa` ON `tb_siswa`.`noinduk` = `tb_periksa`.`noinduk` 
			   LEFT JOIN `tb_rekam` ON `tb_siswa`. `noinduk` = `tb_rekam`. `noinduk`
			   	   WHERE `tb_siswa`.`id` = $id
			   ";

		$this->db->where('id =', $id);
		return $this->db->query($query)->row_array();
	}

	// Tambah data rekam kesehatan
	public function addRekam($data)
	{
		$this->db->insert('tb_rekam', $data);
	}

	// hapus data rekam kesehatan
	public function deleteRekam($id)
	{
		$this->db->delete('tb_rekam', ['id' => $id]);
	}

	// ubah data rekam kesehatan
	public function editRekam($data)
	{
		$id = $data['noinduk'];
		$this->db->where('noinduk', $id);
		$this->db->update('tb_rekam', $data);
	}

	//----------------------------------------// END MODEL REKAM KESEHATAN //---------------------------------//

	//----------------------------------------// MODEL KUNJUNG //---------------------------------//
	// MODEL UNTUK KUNJUNG //
	// KUNJUNG SECTION
	public function getKunjung()
	{
		$query = "SELECT `tb_siswa`.`nama`, `tb_siswa`.`kelamin`, `tb_siswa`.`klspos`, `tb_obat`.`merkobat`, `tb_kunjung`.* 
					FROM `tb_kunjung` 
		 LEFT OUTER JOIN `tb_siswa` ON `tb_kunjung`.`noinduk` = `tb_siswa`.`noinduk` 
		 LEFT OUTER JOIN `tb_obat` ON `tb_kunjung`.`obat_id` = `tb_obat`.`id`
				";
		return $this->db->query($query)->result_array();
	}

	// get kunjung by id
	public function getKunjungById($id)
	{
		$query = "SELECT `tb_siswa`.`nama`, `tb_siswa`.`kelamin`, `tb_siswa`.`klspos`, `tb_obat`.`merkobat`, `tb_kunjung`.*
					FROM `tb_kunjung` 
		 LEFT OUTER JOIN `tb_siswa` ON `tb_kunjung`.`noinduk` = `tb_siswa`.`noinduk` 
		 LEFT OUTER JOIN `tb_obat` ON `tb_kunjung`.`obat_id` = `tb_obat`.`id`
				   WHERE `tb_siswa`.`noinduk` = $id
					  ";
		// $this->db->where('id =', $id);
		return $this->db->query($query)->row_array();
	}

	// Tambah data kunjung 
	public function addKunjung($data)
	{
		$this->db->insert('tb_kunjung', $data);
	}

	// hapus data kunjung 
	public function deleteKunjung($id)
	{
		$this->db->delete('tb_kunjung', ['id' => $id]);
	}

	// ubah data kunjung 
	public function editKunjung($data)
	{
		$id = $data['noinduk'];
		$this->db->where('noinduk', $id);
		$this->db->update('tb_kunjung', $data);
	}

	//----------------------------------------// END MODEL PERIKSA //---------------------------------//

	// ---------------------------------------------- ADMIN ------------------------------------------//
}
