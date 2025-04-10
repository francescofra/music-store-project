<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagamentoModel extends CI_Model {
    public function salvaPagamento($userId, $nome, $cognome, $indirizzo, $numeroCarta, $scadenza, $cvv, $importo) {
        $codigo = bin2hex(random_bytes(16)); 
        $data = [
            'user_id' => $userId,
            'nome' => $nome,
            'cognome' => $cognome,
            'indirizzo' => $indirizzo,
            'numero_carta' => $numeroCarta,
            'scadenza' => $scadenza,
            'cvv' => $cvv,
            'codigo' => $codigo,
            'importo' => $importo,
            'data_pagamento' => date('Y-m-d H:i:s')
        ];

        return $this->db->insert('pagamenti', $data); 
    }
    
    public function getPagamentiByUserId($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('data_pagamento', 'DESC');
        return $this->db->get('pagamenti')->result_array();
}
}

