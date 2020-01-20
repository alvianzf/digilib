<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Dashboard extends MY_Controller
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

        $this->load->model(['user_model', 'buku_model', 'history_model']);
    }


    /**
     * Halaman Index
     */
    public function index()
    {
        $this->data['jumlah_pengguna']  = $this->user_model->count_by('role', 'user');
        $this->data['jumlah_buku']      = $this->buku_model->count_by('id', !0);
        $this->data['jumlah_unduhan']   = $this->history_model->count_by('id', !0);

        $user_data = $this->session->userdata['user_detail']->user_data[0];

        $this->data['nama']             = $user_data->nama;
        $this->data['last_download']    = date('d M Y', $this->history_model->order_by('id', 'desc')->get_by('user_id', $user_data->user_id)->created_at);
        $this->data['total_download']  = $this->history_model->count_by('user_id', $user_data->user_id);
    }
}