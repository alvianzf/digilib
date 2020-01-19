<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

class Books extends MY_Controller
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

        $this->load->model('buku_model');
    }


    /**
     * Halaman Input Data Buku
     */
    public function input()
    {
        
    }

    /**
     * Halaman Input Data Buku
     */
    public function data_buku()
    {
        
    }


    /**
     * Halaman Detil Buku
     */
    public function detil($id)
    {
        $data = $this->buku_model->get($id);

        $this->data['buku'] = $data;
        $this->data['books'] = json_encode($data);
        
    }
}