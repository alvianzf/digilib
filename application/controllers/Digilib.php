<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Digilib extends MY_Controller
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

        $this->load->model(['user_model', 'buku_model', 'history_model']);
    }


    /**
     * Halaman Index
     */
    public function index()
    {
        $this->data['jumlah_buku'] =  count($this->buku_model->get_all());
        $this->data['jumlah_pengguna'] =  count($this->user_model->get_all()) - 1 ;
        $this->data['jumlah_unduhan'] =  count($this->history_model->get_all());

        $this->data['data_terakhir'] = $data = $this->buku_model->limit(5)->order_by('id', 'desc')->get_all();
    }



    /**
     * Halaman Pencarian Buku
     */
    public function search()
    {
        
    }
}