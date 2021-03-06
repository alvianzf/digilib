<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Buku extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['buku_model', 'history_model']);
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
            
            $pdf_ext = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $cover_ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
            $pdf_name       = time() . '.' . $pdf_ext;
            $target_pdf     = 'uploads/pdf/' . $pdf_name;
            $cover_name     = time() . '.' . $cover_ext;
            $target_cover   = 'uploads/cover/' . $cover_name;
            

            move_uploaded_file($_FILES['pdf']['tmp_name'], $target_pdf);
            move_uploaded_file($_FILES['cover']['tmp_name'], $target_cover);

            $this->buku_model->update($id, ['path' => $target_pdf, 'pdf_name' => $pdf_name]);
            $this->buku_model->update($id, ['foto_cover_path' => $target_cover, 'foto_cover_name' => $cover_name]);
            
            return $this->response(api_success($data), 200);
        }

        return $this->response(api_error($data), 500);
    }


    /**
     * Tambah history download untuk user
     * 
     * @param int $book_id
     */
    public function history_post($book_id)
    {
        $user_id = @$this->session->userdata['user_detail']->id;

        $data = [
            'user_id'   => $user_id ? $user_id : 0,
            'book_id'   => $book_id,
            'created_at'=> time()
        ];

        if ($this->history_model->insert($data)) {
            return $this->response(api_success($data), 200);
        }

        return $this->response(api_error($data), 500);
    }



    /**
     * Menghapus data buku
     */
    function delete_buku_post() {
        $id = $this->post('id');

        if ($this->buku_model->delete($id)) {
            return $this->response(api_success($id), 200);
        }

        return $this->response(api_error($id), 500);
    } 



    /**
     * Approve data buku
     */
    function approve_buku_post() {
        $id = $this->post('id');

        $status =  $this->buku_model->get($id)->approved;
        $changed = 0;
        $changed = $status == 0 ? 1 : 0;

        if ($this->buku_model->update($id, ['approved' => $changed])) {
            return $this->response(api_success($changed), 200);
        }

        return $this->response(api_error($id), 500);
    } 

    /**
     * Hitung jumlah download
     */
    public function download_get($id)
    {
        $count = $this->history_model->count_by('book_id', $id);
        $last  = $this->history_model->limit(1, 0)->order_by('id', 'desc')->get_many_by('book_id', $id);

        return $this->response(api_success(['count' => $count, 'last' => date('d F Y', $last[0]->created_at), 'time' => date('H:i:s', $last[0]->created_at)]), 200);
    }
}