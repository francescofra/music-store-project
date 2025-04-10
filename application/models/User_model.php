<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function verify_user($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        $user = $query->row_array();

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        return false;
    }

    public function create_user($data) {
        return $this->db->insert('users', $data);
    }

    public function getUserById($user_id) {
        $this->db->where('id_user', $user_id);
        return $this->db->get('users')->row_array();
    }
    
    public function getPagamentiByUserId($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('data_pagamento', 'DESC');
        return $this->db->get('pagamenti')->result_array();
    }
}
