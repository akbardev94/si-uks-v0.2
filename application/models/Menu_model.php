<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    //-------------------------------- MENU ------------------------------//
    // MENU SECTION

    // get all menu
    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    // get all menu except admin column
    public function getMenuExceptAdmin()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('user_menu')->result_array();
    }

    // get menu by id
    public function getMenuById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('user_menu')->row_array();
    }

    // add new menu
    public function addMenu($menu)
    {
        $this->db->insert('user_menu', ['menu' => $menu]);
    }

    // delete menu by id
    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    // edit menu
    public function editMenu($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    //-------------------------------- MENU ------------------------------//

    //-------------------------------- SUBMENU ------------------------------//

    // SUBMENU SECTION 
    // get submenu
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
				  FROM `user_sub_menu` JOIN `user_menu`
				  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
		";

        return $this->db->query($query)->result_array();
    }

    // get submenu by id
    public function getSubMenuById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('user_sub_menu')->row_array();
    }

    // add submenu
    public function addSubMenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
    }

    // delete submenu
    public function deleteSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    // edit submenu
    public function editSubMenu($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    //-------------------------------- END SUBMENU ------------------------------//

    //-------------------------------- SETTING USER ------------------------------//
    // get all menu
    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    // get settinguser by id
    public function getUserById($id)
    {
        $this->db->where('id =', $id);
        return $this->db->get('user')->row_array();
        // return $this->db->get_where('user_menu', ['id =', $id])->row_array();
    }

    // Tambah settinguser
    public function addUser($data)
    {
        $this->db->insert('user', $data);
    }

    // delete settinguser by id
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    // ubah settinguser
    public function editUser($data)
    {
        $id = $data['id'];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    //--------------------------------END SETTING USER ------------------------------//
}
