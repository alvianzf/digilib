<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Buku extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
    }

    public function tambah_post()
    {
        $data = [
            'judul_buku'    => $this->post('judul_buku'),
            'kategori'      => $this->post('kategori'),
            'pengarang'     => $this->post('pengarang'),
            'ringkasan'     => $this->post('ringkasan'),
            'created_at'    => time()
        ];

        if ($this->buku_model->insert($data)) {
            $id = $this->db->insert_id();

            $pdf_name       = time() . '-' . $_FILES['pdf']['name'];
            $target_pdf     = 'uploads/pdf/' . $pdf_name;
            $cover_name     = time() . '-' . $_FILES['cover']['name'];
            $target_cover   = 'uploads/cover/' . $cover_name;

            move_uploaded_file($_FILES['pdf']['tmp_name'], $target_pdf);
            move_uploaded_file($_FILES['cover']['tmp_name'], $target_cover);

            $this->buku_model->update($id, ['path' => $target_pdf, 'pdf_name' => $pdf_name]);
            $this->buku_model->update($id, ['foto_cover_path' => $target_cover, 'foto_cover_name' => $cover_name]);
            
            return $this->response(api_success($data), 200);
        }

        return $this->response(api_error($data), 500);
    }
}