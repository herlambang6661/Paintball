<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'LoginModel' => 'login',
        );
        // Load Multiple Models
        foreach ($models as $file => $object_name) {
            $this->load->model($file, $object_name);
        }
        $this->load->library("session");
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function cekLogin(){
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

		// find username
		$resultUsername = $this->login->check('username', $username);
		if (empty($resultUsername)) {
            echo "invalidUser";
		} else {
        	$user_id    = $this->login->cekLoginModel($username, $password);
			if (!empty($user_id)) {
				$data_session = array(
					'nama' => $user_id[0]->nick,
					'level' => $user_id[0]->level,
					'status' => "login"
				);
				$this->session->set_userdata($data_session);
				echo "success";
			} else {
				echo "error";
			}
		}
	}

	public function logout(){
        $data = $this->session->sess_destroy();
		redirect(base_url());
	}
}
