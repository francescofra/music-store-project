<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); 
    }

    public function get_all_productos() {
        $query = $this->db->get('producto'); 
        return $query->result_array(); 
    }

    public function get_producto_by_id($id_producto) {
        $this->db->where('id_producto', $id_producto);
        $query = $this->db->get('producto');
        return $query->row_array(); 
    }
    
    public function get_productos_by_categoria($id_categoria) {
        $this->db->where('id_categoria', $id_categoria);
        $query = $this->db->get('producto');
        return $query->result_array();
    }

    public function get_all_categorias() {
        $query = $this->db->get('categoria');
        return $query->result_array();
    }

    public function get_categoria_by_id($id_categoria) {
        $this->db->where('id_categoria', $id_categoria);
        $query = $this->db->get('categoria');
        return $query->row_array(); 
    }
    
    public function get_image($id_producto) {
        $this->db->select('imagen'); 
        $this->db->from('producto');
        $this->db->where('id_producto', $id_producto); 
        $query = $this->db->get();
        return $query->row()->imagen; 
    }


    

}
