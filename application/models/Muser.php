<?php defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{
    private $_table = "pb_users";

    public $id_user;
    public $nick;
    public $username;
    public $password;
    public $level;
    public $tmpstp;

    public function rules()
    {
        return [
            [
                'field' => 'id_user',
                'label' => 'Id User',
                'rules' => 'required'
            ],

            [
                'field' => 'nick',
                'label' => 'Nick',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],

            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required'
            ],

            [
                'field' => 'tmpstp',
                'label' => 'Time Stamp',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_user)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id_user])->row();
    }

    public function save($data)
    {
        $post = $this->input->post();
        // $this->id = $post["id"];
        $this->id_user = $post["id_user"];
        $this->nick = $post["nick"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->level = $post["level"];
        $this->tmpstp = $post["tmpstp"];
        return $this->db->insert($this->_table, $data, 'pb_users');
}
    

    public function update()
    {
        $post = $this->input->post();
        // $this->id = $post["id"];
        $this->id_user = $post["id_user"];
        $this->nick = $post["nick"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->level = $post["level"];
        $this->tmpstp = $post["tmpstp"];
        return $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }

    public function delete($id_user)
    {
        return $this->db->delete($this->_table, array("id_user" => $id_user));
    }
    
    public function updateUser($id, $data, $table)
    {
        $this->db->where('id_user', $id);
        $this->db->update($table, $data);
    }

}
