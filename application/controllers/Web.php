<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    // CONTROLLER UNTUK MENAMPILKAN HALAMAN MUKA WEB //
    public function index()
    {
        $this->load->view('web/blog');
    }
}
