<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    //------------------------------------MENU-------------------------------------//
    // CONSTRUCTOR DI DALAM CONTROLLER MENU UNTUK MENDEKLARASIKAN LIBRARY FUNGSI-FUNGSI YANG SUDAH ADA //
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $this->load->model('User_model', 'user');
        $this->load->model('Auth_model', 'Auth');
        $this->load->model('Menu_model');
        $this->load->model('Admin_model');
        // if user already logged in
        is_logged_in();
    }

    // CONTROLLER UNTUK MENGGAMBIL DATA DARI MENU EDIT DI UBAH DALAM BENTUK JSON //
    public function getMenuEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Menu_model->getMenuById($id));
    }


    // CONTROLLER UNTUK TAMBAH MENU MANAGEMENT //
    public function index()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));

        $data['menu'] = $this->Menu_model->getMenu();
        $data['title'] = 'Menu Management';

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addMenu($this->input->post('menu'));
            $this->session->set_flashdata('massage', 'New Menu Has Been Added!');
            redirect('menu/index');
        }
    }

    // edit menu
    public function editMenu()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));
        $data['menu'] = $this->Menu_model->getMenu();
        $data['title'] = 'Menu Management';

        // form validation
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editMenu($this->input->post());
            $this->session->set_flashdata('massage', 'Menu Has Been Edited!');
            redirect('menu/index');
        }
    }

    //------------------------------------END MENU-------------------------------------//

    //------------------------------------SUBMENU-------------------------------------//

    // CONTROLLER UNTUK MENGGAMBIL DATA DARI SUBMENU EDIT DI UBAH DALAM BENTUK JSON //
    public function getSubmenuEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Menu_model->getSubmenuById($id));
    }

    // CONTROLLER UNTUK TAMBAH SUBMENU MANAGEMENT //
    public function submenu()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));

        // get menu
        $data['menu'] = $this->Menu_model->getMenu();

        // get submenu
        $data['subMenu'] = $this->Menu_model->getSubMenu();

        $data['is_active'] = $this->db->get_where('user_sub_menu', ['is_active' => $this->input->post('is_active')])->row_array();

        // form validation
        $this->form_validation->set_rules('title', 'Title', 'required|trim|alpha_numeric_spaces', [
            'alpha_numeric_spaces' => 'Menu name must contains alpha numeric only!'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Is_Active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Submenu Management';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            // send submenu data to model
            $this->Menu_model->addSubMenu($data);
            $this->session->set_flashdata('massage', 'Submenu Has Been Added!');
            redirect('menu/subMenu');
        }
    }

    // CONTROLLER UNTUK EDIT SUBMENU MANAGEMENT //
    public function editSubMenu()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));

        // get menu
        $data['menu'] = $this->Menu_model->getMenu();

        // get submenu
        $data['subMenu'] = $this->Menu_model->getSubMenu();

        // form validation
        $this->form_validation->set_rules('title', 'Title', 'required|trim|alpha_numeric_spaces', [
            'alpha_numeric_spaces' => 'Submenu name must contains alpha numeric only!'
        ]);
        $this->form_validation->set_rules('menu_id', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Submenu Management';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            // send submenu data to model
            $this->Menu_model->editSubMenu($data);
            $this->session->set_flashdata('massage', 'Submenu Has Been Edited!');
            redirect('menu/subMenu');
        }
    }

    // CONTROLLER UNTUK MENGHAPUS SUBMENU MANAGEMENT //
    // this function can delete from various table
    public function delete($type = null, $id = null)
    {
        if (is_null($id) || is_null($type)) {
            redirect('menu');
        }
        switch ($type):
            case 'menu':
                $this->Menu_model->deleteMenu($id);
                $this->session->set_flashdata('massage', 'Menu Has Been Delete');
                redirect('menu/index');
                break;

            case 'submenu':
                $this->Menu_model->deleteSubmenu($id);
                $this->session->set_flashdata('massage', 'Submenu Has Been Deleted!');
                redirect('menu/subMenu');
                break;
        endswitch;
    }
    //-----------------------------------------END SUBMENU---------------------------------//

    //-----------------------------------------SETTING USER---------------------------------//
    // CONTROLLER SETTING USER //
    public function getUserEdit()
    {
        $id = $this->input->post('id');
        echo json_encode($this->Menu_model->getUserById($id));
    }

    public function settinguser()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Setting User';
        $data['settinguser'] = $this->Menu_model->getUser();
        $data['role'] = $this->db->query("SELECT id FROM user_role")->row_array();

        $this->form_validation->set_rules('settinguser', 'required');
        $this->form_validation->set_rules('is_active', 'Is_Active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/settinguser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addUser($this->input->post());
            $this->session->set_flashdata('massage', 'User Baru Berhasil Ditambahkan');
            redirect('menu/settinguser');
        }
    }

    public function edituser()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Setting User';
        $data['settinguser'] = $this->Menu_model->getUser();

        $this->form_validation->set_rules('settinguser', 'settingUser', 'required');
        $this->form_validation->set_rules('is_active', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/settinguser', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
                'username' => $this->input->post('usernames'),
                'email' => $this->input->post('emails'),
                'role_id' => $this->input->post('role_ids'),
                'is_active' => $this->input->post('is_actives')
            ];
            $pass = [
                'password' => $this->input->post('passwords'),
            ];

            $this->encrypt->decode($pass);
            $this->Menu_model->editUser($this->input->post($data, $pass));
            $this->session->set_flashdata('massage', 'User Berhasil Diubah');
            redirect('menu/settinguser');
        }
    }

    public function delUser($id = null)
    {
        if (is_null($id)) redirect('menu/settinguser');

        $this->Menu_model->deleteUser($id);
        $this->session->set_flashdata('massage', 'User Berhasil Dihapus');
        redirect('menu/settinguser');
    }
    //-----------------------------------------END SETTING USER---------------------------------//


    //-----------------------------------------ROLE---------------------------------//

    // CONTROLLER MANU ROLE //
    public function role()
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Role Management';
        $data['role'] = $this->Admin_model->getRole();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->addRole($this->input->post());
            $this->session->set_flashdata('massage', 'New Role Has Been Added!');
            redirect('menu/role');
        }
    }

    // CONTROLLER UNTUK MENAMPILKAN MENU ROLE ACCESS DIDALAM MENU ROLE KETIKA KLIK BADGE ACCESS //
    public function roleAccess($role_id)
    {
        // get user information
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Role Access';
        $data['role'] = $this->Admin_model->getRoleById($role_id);
        $data['menu'] = $this->Menu_model->getMenu();

        // if it is admin
        if ($role_id == 1) $data['menu'] = $this->Menu_model->getMenuExceptAdmin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/role-access', $data);
        $this->load->view('templates/footer');
    }

    // CONTROLLER UNTUK MENGAMBIL DAN MENGUBAH ROLE ID DIUBAH DALAM BENTUK JSON //
    public function getRoleEdit()
    {
        echo json_encode($this->Admin_model->getRoleById($this->input->post('id')));
    }

    // CONTROLLER UNTUK MENGHAPUS ROLE //
    public function del($id = null)
    {
        if (is_null($id)) redirect('menu/role');
        $this->Admin_model->deleteRole($id);
        $this->session->set_flashdata('massage', 'Role Has Been Deleted!');
        redirect('menu/role');
    }

    // CONTROLLER UNTUK MENGUBAH ROLE //
    public function edit()
    {
        // MENGAMBIL INFORMASI USER
        $data['user'] = $this->Auth->getUserByEmail($this->session->userdata('email'));
        $data['title'] = 'Role Management';
        $data['role'] = $this->Admin_model->getRole();

        // set rules
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->editRole($this->input->post());
            $this->session->set_flashdata('massage', 'Role Has Been Updated!');
            redirect('menu/role');
        }
    }

    // CONTROLLER UNTUK MENGUBAH ROLE ACCESS PER USER MEMAKAI ID //
    public function changeAccess()
    {
        $data = [
            'role_id' => $this->input->post('role_id'),
            'menu_id' => $this->input->post('menu_id')
        ];
        $result = $this->Admin_model->getUserAccessById($data['role_id'], $data['menu_id']);

        // jika datanya tidak ada berarti user menyentang checkbox
        if ($result < 1) {
            // maka tambahkan akses baru
            $this->Admin_model->addUserAccess($data);
            $this->session->set_flashdata('massage', 'Access Granted!');
        }
        // jika ada
        else {
            // maka hapus akses
            $this->Admin_model->deleteUserAccess($data);
            $this->session->set_flashdata('massage', 'Access Removed!');
        }
    }
    //-----------------------------------------END ROLE---------------------------------//
}
