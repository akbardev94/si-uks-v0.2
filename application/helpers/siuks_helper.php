<?php

function is_logged_in()
{
    $ci = get_instance();
    // if there is no session
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');

        // get the controller/menu
        $menu = $ci->uri->segment(1);

        // QUERY menu
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        // query user access
        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);


        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

// function message($message, $class, $url = null)
// {
//     $ci = get_instance();

//     if (!is_null($url)) {
//         $ci->session->set_flashdata('message', '<div class="alert alert-' . $class . '" role="alert">
// 			' . $message . '
// 		</div>');
//         redirect($url);
//     } else {
//         $ci->session->set_flashdata('message', '<div class="alert alert-' . $class . '" role="alert">
// 			' . $message . '
// 		</div>');
//     }
// }

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
