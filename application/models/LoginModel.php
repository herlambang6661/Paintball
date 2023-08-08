<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    function cekLoginModel($user, $pass)
    {
        $this->db->select("*");
        $this->db->from("pb_users");
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $result = $this->db->get();

        $user = $result->row();

        if (!empty($user)) {
            return $result->result();
        } else {
            return FALSE;
        }
    }

    function check($type, $val){
        $this->db->from("pb_users");
        $this->db->where($type, $val);
        $result = $this->db->get();
        $user = $result->row();
        if (!empty($user)) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
}