<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    public function get_all_categorias() {
        return $this->db->get('categoria')->result_array();
    }
}
