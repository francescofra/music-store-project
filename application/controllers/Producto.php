<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Producto_model');
    }

    public function detalles($id_producto) {

        $data['producto'] = $this->Producto_model->get_producto_by_id($id_producto);

        if (!empty($data['producto'])) {
            $this->load->view('producto_detalles', $data);
        } else {
            show_404(); 
        }
    }
}
