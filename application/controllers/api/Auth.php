<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Auth extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }



    /**
     * API login
     */
    public function login_post()
    {
        $username       = $this->post('username');
        $password       = $this->post('password');
        
        if($this->user_model->login(['username' => $username, 'password' => $password])) {
            return $this->response(api_success(['message' => 'logged in']), 200);
        }

        return $this->response(api_error(['message' => 'internal server_error']), 500);
    }


    /**
     * Logout
     */
    public function logout_get()
    {
        unset($this->session->userdata['is_logged_in']);

        return $this->response(true, 200);
    }



    /**
     * Register user
     */
    public function register_post()
    {
        $user = $this->post('username');
        $pass = $this->post('password');
        $role = $this->post('role');
        $created_at = time();

        $data = [
            'username'  => $user,
            'password'  => hash('sha1', $pass),
            'role'      => 'user',
            'created_at'=> $created_at
        ];

        $existing = $this->user_model->get_by('username', $user);

        if (!$existing) {
            if ($this->user_model->insert($data)) {
                $id = $this->db->insert_id();
    
                return $this->response(api_success(['id' => $id, 'message' => 'User berhasil dibuat']), 200);
            }
            return $this->response(api_error('Terjadi kesalahan di server!'), 500);
        } else {
            return $this->response(api_error(['message' => 'User sudah ada!']));
        }


    }

    public function user_detail_post($id)
    {
        $nama           = $this->post('nama');
        $kelas          = $this->post('kelas');
        $nomor_kontak   = $this->post('nomor_kontak');
        $created_at     = time();

        $data = [
            'user_id'       => $id,
            'nama'          => $nama,
            'kelas'         => $kelas,
            'nomor_kontak'  => $nomor_kontak,
            'created_at'    => $created_at
        ];

        if ($this->user_data_model->insert($data)) {
            return $this->response(true, 200);
        }

        return $this->response(false, 500);
    }


    public function delete_user_post()
    {
        $id = $this->post('id');

        if ($this->user_model->delete($id)){
            $user_id = $this->user_data_model->get_by('user_id', $id)->id;
            if ($this->user_data_model->delete($user_id)) {
                return $this->response(api_success($id), 200);
            }
            return $this->response(api_error($id), 500);
        }
        return $this->response(api_error($id), 500);
    }
}