<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model', 'data', TRUE);
    }
    
    public function index()
    {
        $this->load->view('utama');
    }
    
    public function Login()
    {
        $this->load->view('login');   
    }
    
    public function act_login(){
        //Form validation
        if($this->data->cek_user()){
            if ($this->session->userdata('admin') == TRUE)
            {
                redirect('admin');
                return true;
            } else if ($this->session->userdata('login') == TRUE)
            {
                redirect('');
                return true;
            } else {
                return false;
            }
        } else {
            $this->session->set_flashdata('notif', 'Username atau Password Salah');
            redirect('utama/login');
            return false;
        }
    }
    
    public function Contact()
    {
        $this->load->view('contact');
    }
    
    public function Petmart()
    {
        $data['barang']=$this->data->getbarang();
        $this->load->view('petmart', $data);
    }
    
    public function Detail($id=0)
    {
        $data['id']=$id;
        $data['barang']=$this->data->getDetailBarang($id);
        $this->load->view('detail', $data);
    }
    
    public function Register()
    {
        $this->load->view('register');
    }
    
    public function Kategori($kategori="")
    {
        if ($kategori==="") {
            $this->load->view('kategori');
        } else {
            $data['barang']=$this->data->getBaranginKategori($kategori);
            $this->load->view('detail-kategori', $data);
        }
    }
    
    public function Cart()
    {
        $data['cart']=$this->cart->contents();
        $this->load->view('cart', $data);
    }
    
    public function beli($id_barang)
    {
        if(!$this->session->userdata('login')) {
            
            redirect('utama/login','refresh');
            
        } else {
            
            $barang = $this->data->getDetailBarang($id_barang);
            $data = array(
                'id'      => $barang->id_barang,
                'qty'     => 1,
                'price'   => $barang->harga,
                'name'    => $barang->nama_barang,
                'options' => array()
            );
            
            $this->cart->insert($data);
            
            redirect('utama/cart');
        }
        
    }
    public function remove_cart($rowid)
    {
        $this->cart->remove($rowid);
        
        redirect('utama/cart','refresh');
        
    }
    public function Checkout($id=0)
    {
        $this->load->view('checkout');
    }
    public function bayar()
    {
        $grandtotal = $this->input->post('grandtotal');
        $id_pembeli = $this->session->userdata('id');
        $tgl_pembelian = $this->input->post('tgl_pembelian');
        $totalitems = $this->input->post('totalitems');
        $createNota = $this->data->createNota($id_pembeli, $tgl_pembelian, $totalitems, $grandtotal);
        $nota = $this->data->getLastNota($id_pembeli);
        if($createNota) {
            $addItem = $this->data->addItemtoNota($id_pembeli);
            if ($addItem) {
                $this->cart->destroy();
                redirect('utama/nota/'.$nota->id_nota,'refresh');
            } else {
                redirect('utama/checkout','refresh');                
            }
        } else {
            redirect('utama/checkout','refresh');
            
        }
    }
    public function Nota($id_nota=0)
    {
        $data['detail'] = $this->data->getDetailNota($id_nota);
        $this->load->view('nota', $data);
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
    
    public function search()
    {
        $keyword = $this->input->get('keyword');
        
        $data['buku'] = $this->Buku_model->search($keyword);
        
        $this->load->view('index_view', $data);
    }
    
    public function registerUser()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kodepos', 'Kodepos', 'required');
        $this->form_validation->set_rules('kontak', 'Kontak', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        
        if ($this->form_validation->run()== TRUE) {
            $this->data->insertUser();
            
            $this->session->set_flashdata('success', 'you are registered');
            
            redirect('utama/login');
            
        } else { 
            redirect('utama/register','refresh');
        }
    }
}

/* End of file utama.php */

?>