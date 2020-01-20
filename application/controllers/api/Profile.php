<?php defined ('BASEPATH') OR exit ('No direct script access allowed!');

require_once APPPATH . '/libraries/REST_Controller.php';

class Profile extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'user_data_model', 'buku_model', 'history_model']);
    }



    /**
     * Edit profile
     */
    public function edit_post($user_data_id)
    {
        $data = [
            'nama'              => $this->post('nama'),
            'kelas'             => $this->post('kelas'),
            'nomor_kontak'      => $this->post('nomor_kontak'),
        ];

        if ($this->user_data_model->update($user_data_id, $data)){
            $this->session->userdata['user_detail']  = $this->user_model->with('user_data')->get($this->user_data_model->get($user_data_id)->user_id);
            return $this->response(api_success($data), 200);
        }

        return $this->reponse(api_error($data), 500);
    }



    /**
     * Edit profile
     */
    public function user_post($user_id)
    {
        $data = [
            'username'              => $this->post('username'),
            'password'              => hash('sha1', $this->post('password')),
        ];

        if ($this->user_model->update($user_id, $data)){
            $return = $this->user_model->with('user_data')->get($user_id);
            return $this->response(api_success($data), 200);
        }

        return $this->reponse(api_error($data), 500);
    }
}