<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class History extends MY_Controller
{
    protected $asides = [
        'header'  => 'asides/header',
        'footer'  => 'asides/footer',
        'logout'  => 'asides/logout',
        'sidebar'  => 'asides/sidebar',
        'topbar'  => 'asides/topbar',
        'sticky_footer'  => 'asides/sticky_footer'
    ];
    public function __construct()
    {
        parent::__construct();

        if (!@$this->session->userdata['is_logged_in']) {
            redirect('/auth', 'refresh');
        }

        $this->load->model(['user_model', 'history_model', 'buku_model']);
    }


    /**
     * Halaman Index
     */
    public function index()
    {
        $this->data['id'] = $this->session->userdata['user_detail']->id;
    }
}