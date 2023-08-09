<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Muser");
        $this->load->library('form_validation');
        if ($this->session->userdata('logged') != TRUE) {
            $url = base_url('login');
            redirect($url);
        };
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
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'User berhasil disimpan');
            $url = base_url('user');
            redirect($url);
        }

        // $data["eks"] = $this->Mekspedisi->getAll();
        $this->load->view("halaman_user");
    }

    public function edit($id_user = null)
    {
        if (!isset($id_user)) redirect('user');

        $product = $this->Muser;
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

        $this->load->view("halaman_edit_user", $data);
    }

    public function delete($id_user = null)
    {
        if (!isset($id_user)) show_404();

        if ($this->Muser->delete($id_user)) {
            redirect(site_url('user'));
        }
    }


}
