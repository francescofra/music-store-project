<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_model extends CI_Model {
    public function removeItem($userId, $productId) {
        $this->db->where('user_id', $userId);
        $this->db->where('product_id', $productId);
        return $this->db->delete('carrello'); 
    }

    public function getProdottiCarrello($userId) {
        $this->db->select('producto.precio');
        $this->db->from('carrito');
        $this->db->join('producto', 'carrito.id_producto = producto.id_producto');
        $this->db->where('carrito.id_user', $userId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function calcolaTotale($userId) {
        $prodotti = $this->getProdottiCarrello($userId);
        $totale = 0;
        foreach ($prodotti as $prodotto) {
            $totale += $prodotto['precio'];
        }
        return $totale > 0 ? $totale : 0;
    }

    public function svuotaCarrello($userId) {
        $this->db->where('id_user', $userId);
        $this->db->delete('carrito'); 
    }
    
    
}