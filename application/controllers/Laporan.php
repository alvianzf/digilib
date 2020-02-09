<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Laporan extends MY_Controller
{
    protected $asides = [
        'header'  => 'asides/header',
        'footer'  => 'asides/footer',
        'logout'  => 'asides/logout',
        'login'  => 'asides/login',
        'topbar'  => 'asides/topbar',
        'sticky_footer'  => 'asides/sticky_footer'
    ];
    public function __construct()
    {
        parent::__construct();

        if (!@$this->session->userdata['is_logged_in']) {
            redirect('/', 'refresh');
        }

        $this->load->model(['user_model', 'history_model', 'buku_model']);
    }


    /**
     * Halaman Index
     */
    public function index()
    {
        
    }
}