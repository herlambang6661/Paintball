<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'Muser' => 'Muser',
        );
        // Load Multiple Models
        foreach ($models as $file => $object_name) {
            $this->load->model($file, $object_name);
        }
        $this->load->helper(array('form', 'url'));
        $this->load->model('Muser');
    }

    public function index()
    {
        $data['produk'] = $this->Muser->getAll();
		$data['active'] = 'pengguna';
        $this->load->view("user/halaman_user", $data);
    }

    public function add()
    {
        $product = $this->Muser;
        $data['active'] = 'pengguna';
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()==true) {
            $product->save();
            $this->session->set_flashdata('success', 'User berhasil disimpan');
            $url = base_url('user');
            redirect($url);
        }

        // $data["eks"] = $this->Mekspedisi->getAll();
        $this->load->view("user/halaman_tambah_user");
    }

    public function edit($id_user = null)
    {
        if (!isset($id_user)) redirect('user');

        $product = $this->Muser;
        $data['active'] = 'pengguna';
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'User berhasil diubah');
            $url = base_url('user');
            redirect($url);
        }

        $data["produk"] = $product->getById($id_user);
        if (!$data["produk"]) show_404();
        // $data["produk"] = $product->produkbyuser($id, $id_user)->row();
        // if (!$data["produk"]) show_404();
        // $eks = $this->Mekspedisi->getAll();
        // $produk = $this->Mproduk->produkbyuser($id, $id_user)->row();
        // $data = ['produk' => $produk, 'eks' => $eks];

        $this->load->view("user/halaman_edit_user", $data);
    }
    public function editDataUser(){
        $id = $_POST['id_user'];
        $nick = $_POST['nick'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];
        
        $dataUpdate = array(
            'nick' => $nick,
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );

        $this->Muser->updateUser($id, $dataUpdate, 'pb_users');
        redirect(site_url('user'));

    }

    public function adds()
    {
        $this->form_validation->set_rules('nick', 'nick', 'trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[pb_users.username]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('level', 'level','trim|required|min_length[1]|max_length[255]');
		if ($this->form_validation->run()==true)
	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nick = $this->input->post('nick');
			$this->Muser->tambah_user($username,$password,$nick);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
			$url = base_url('user/adds');
            redirect($url);
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('user');
		}


    }

    public function delete($id_user = null)
    {
        if (!isset($id_user)) show_404();
        $data['active'] = 'pengguna';

        if ($this->Muser->delete($id_user)) {
            redirect(site_url('user'));
        }
    }


}
