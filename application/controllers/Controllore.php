<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controllore extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->model('Producto_model'); 
        $this->load->model('PagamentoModel'); 
        $this->load->library('session'); 
        $this->load->model('Carrito_model'); 
    }
    
    public function index() {

        $this->load->model('Producto_model');
        $productos = $this->Producto_model->get_all_productos();

        $data['categorias'] = $this->Producto_model->get_all_categorias();
        $data['productos'] = $productos; 

        $this->load->view('header');
        $this->load->view('navbar', $data);
        $this->load->view('main', $data);
        $this->load->view('footer');
        
    }

    public function about() {
        $this->load->view('header');
        $this->load->view('about');
        $this->load->view('footer');
    }

    public function contacts() {
        $this->load->view('header');
        $this->load->view('contacts');
        $this->load->view('footer');
    }

    public function categoria($id_categoria) {
   
        $data['productos'] = $this->Producto_model->get_productos_by_categoria($id_categoria);
        $categorias = $this->Producto_model->get_all_categorias();

        foreach ($categorias as $categoria) {
            if ($categoria['id_categoria'] == $id_categoria) {
                $data['categoria_nombre'] = $categoria['nombre'];
                break;
            }
        }
    
        $data['categorias'] = $categorias;
    
        $this->load->view('header');
        $this->load->view('navbar', $data);
        $this->load->view('categoria', $data); 
        $this->load->view('footer');
    }
    
    public function producto($id_producto) {
        
        $data['producto'] = $this->Producto_model->get_producto_by_id($id_producto);
    
        if (!empty($data['producto'])) {
            $this->load->view('header');
            $this->load->view('navbar', ['categorias' => $this->Producto_model->get_all_categorias()]);
            $this->load->view('producto', $data);
            $this->load->view('footer');
        } else {
            show_404(); 
        }
    }

    public function login() {
        $this->load->view('header');
        $this->load->view('login'); 
        $this->load->view('footer');
    }

    public function logout() {
        $this->session->unset_userdata(['user_id', 'username', 'is_logged_in']);
        $this->session->sess_destroy();
        redirect(base_url());
    }    

    public function register() {
        $this->load->view('header');
        $this->load->view('register');
        $this->load->view('footer');
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $this->load->model('User_model');
        $user = $this->User_model->verify_user($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'user_id' => $user['id_user'],
                'username' => $user['username'],
                'is_logged_in' => true
            ]);
        
            $this->db->select_sum('quantity');
            $this->db->where('id_user', $user['id_user']);
            $query = $this->db->get('carrito');
            $cart_items = $query->row()->quantity;
        
            $this->session->set_userdata('cart_items', $cart_items ?: 0);
        
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Credenziali non valide');
            redirect('controllore/login');
        }
        
    }
    

    public function process_registration() {
        $data = [
            'username' => $this->input->post('username'),
            'password_hash' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nombre' => $this->input->post('nombre'),
            'appellidos' => $this->input->post('appellidos'),
            'direccion' => $this->input->post('direccion'),
            'email' => $this->input->post('email'),
        ];

        $this->load->model('User_model');
        if ($this->User_model->create_user($data)) {
            redirect('controllore/login');
        } else {
            $this->session->set_flashdata('error', 'Errore durante la registrazione');
            redirect('controllore/register');
        }
    }

    public function aggiungiAlCarrello($id_producto) {
        if (!$this->session->userdata('is_logged_in')) {
            echo json_encode(['success' => false, 'message' => 'Devi effettuare il login.']);
            return;
        }
    
        $id_user = $this->session->userdata('user_id');
        
        $carrello = $this->db->get_where('carrito', [
            'id_user' => $id_user,
            'id_producto' => $id_producto
        ])->row();
    
        if ($carrello) {
            $this->db->where('id_carrito', $carrello->id_carrito);
            $this->db->update('carrito', ['quantity' => $carrello->quantity + 1]);
        } else {
            $this->db->insert('carrito', [
                'id_user' => $id_user,
                'id_producto' => $id_producto,
                'quantity' => 1
            ]);
        }
    
        $this->db->select_sum('quantity');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('carrito');
        $total_items = $query->row()->quantity;
    
        echo json_encode(['success' => true, 'total_items' => $total_items]);
    }
    

    public function rimuoviDalCarrello($id_carrito) {
        $this->db->where('id_carrito', $id_carrito);
        $this->db->delete('carrito');
        redirect('controllore/carrello');
    }
    

    public function carrello() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }
    
        $id_user = $this->session->userdata('user_id');
    
        $this->db->select('carrito.*, producto.nombre, producto.precio');
        $this->db->from('carrito');
        $this->db->join('producto', 'carrito.id_producto = producto.id_producto');
        $this->db->where('carrito.id_user', $id_user);
        $query = $this->db->get();
    
        $data['carrello'] = $query->result_array();
    
        $this->load->view('header');
        $this->load->view('carrello', $data);
        $this->load->view('footer');
    }

    public function aggiornaQuantita() {
        $id_carrello = $this->input->post('id_carrello');
        $quantity = $this->input->post('quantity');
    
        if ($quantity > 0) {
            $this->db->where('id_carrito', $id_carrello);
            $this->db->update('carrito', ['quantity' => $quantity]);
            echo json_encode(['success' => true]);
        } else {
            $this->db->where('id_carrito', $id_carrello);
            $this->db->delete('carrito');
            echo json_encode(['success' => true]);
        }
    }
    
    public function sincronizzaCarrello() {
        if (!$this->session->userdata('is_logged_in')) {
            echo json_encode(['success' => false, 'message' => 'Devi effettuare il login.']);
            return;
        }
    
        $id_user = $this->session->userdata('user_id');
        $this->db->select('carrito.*, producto.nombre, producto.precio');
        $this->db->from('carrito');
        $this->db->join('producto', 'carrito.id_producto = producto.id_producto');
        $this->db->where('carrito.id_user', $id_user);
        $query = $this->db->get();
    
        $carrello = $query->result_array();
        echo json_encode(['success' => true, 'carrello' => $carrello]);
    }
    
    public function getCartCount() {
        $cartCount = $this->CarrelloModel->getCartCount(); 
        echo json_encode(['count' => $cartCount]);
    }
    
    public function paginaPagamento() {
        $this->load->view('header'); 
        $this->load->view('pago');   
        $this->load->view('footer');
    }

    public function confermaPagamento() {
        //$this->load->model('PagamentoModel'); // Carica il modello qui
        $this->load->model('Carrito_model'); 

        $userId = $this->session->userdata('user_id');
        $nome = $this->input->post('nome');
        $cognome = $this->input->post('cognome');
        $indirizzo = $this->input->post('indirizzo');
        $numeroCarta = $this->input->post('numero_carta');
        $scadenza = $this->input->post('scadenza');
        $cvv = $this->input->post('cvv');

        $importo = $this->Carrito_model->calcolaTotale($userId);

        if ($importo === null || $importo <= 0) {
            $this->session->set_flashdata('error', 'Errore: il carrello è vuoto o l\'importo non è valido.');
            redirect('index.php/controllore/paginaPagamento');
            return;
        }
    
        if ($this->PagamentoModel->salvaPagamento($userId, $nome, $cognome, $indirizzo, $numeroCarta, $scadenza, $cvv, $importo)) {
            $this->Carrito_model->svuotaCarrello($userId);
            $this->session->set_flashdata('success', 'Pagamento effettuato con successo!');
            redirect('/controllore/successo'); 
        } else {
            $this->session->set_flashdata('error', 'Errore durante il pagamento.');
            redirect('index.php/controllore/paginaPagamento');
        }

        
    }
    
    public function successo() {
        $this->load->view('successo_pagamento');
    }

    public function profilo() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect('index.php/controllore/login');
        }
    
        $user_id = $this->session->userdata('user_id');
    
        $this->load->model('User_model');
    
        $data['user'] = $this->User_model->getUserById($user_id);
    
        $this->load->model('PagamentoModel');
        $data['pagamenti'] = $this->PagamentoModel->getPagamentiByUserId($user_id);
    
        $this->load->view('header'); 
        $this->load->view('profilo', $data);
        $this->load->view('footer'); 
    }
    
    
}
