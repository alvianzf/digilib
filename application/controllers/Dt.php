<?php defined('BASEPATH') OR exit('NO');

class Dt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('datatables');
        $this->load->model(['user_model', 'buku_model', 'history_model']);
    }

    public function buku()
    {
        $this->datatables->select('*')->from('data_buku');

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }

    public function user()
    {
        $this->datatables->select('A.id as id, A.username, A.role, B.nama, B.kelas, B.nomor_kontak')
                ->from('users as A')
                ->join('user_details as B', 'A.id = B.user_id')
                ->where('role', 'user');

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }

    public function history($id)
    {
        $this->datatables->select('A.id as id, B.id as id_buku, B.kategori, B.judul_buku, B.pengarang, A.created_at as tanggal')
                ->from('history as A')
                ->join('data_buku as B', 'A.book_id = B.id')
                ->where('user_id', $id);

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }

    public function laporan()
    {
        $this->datatables->select('id, judul_buku, foto_cover_path, kategori, pengarang')
                        ->from('data_buku')
                        ->add_column('jumlah', '$1', 'count_books(id)')
                        ->add_column('oleh', '$1', 'downloaded_by(id)')
                        ->edit_column('terakhir', '$1', 'last_downloaded(id)');

        $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output($this->datatables->generate('json', 'UTF-8', true));
    }

}