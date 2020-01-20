<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (@$this->session->userdata['is_logged_in']) {
            redirect('beranda', 'refresh');
        }
    }

    /**
     * Halaman Login
     */
    public function index()
    {
        
    }
}