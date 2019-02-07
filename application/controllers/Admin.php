<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_admin', 'admin', TRUE);
        
    }
    
    public function index()
    {
        $this->load->view('admin/dashboard');
    }

    public function User()
    {
        $data['pembeli']=$this->admin->getPembeli();
        $this->load->view('admin/user', $data);
    }

    public function Item()
    {
        $data['items']=$this->admin->getItems();
        $this->load->view('admin/items', $data);
    }

    public function AddItem()
    {
        $data['kategori']=$this->admin->getKategori();
        $this->load->view('admin/additem', $data);
    }

    public function EditItem($id_barang = 0)
    {
        $data['kategori']=$this->admin->getKategori();
        $data['item']=$this->admin->getDetailItem($id_barang);
        $this->load->view('admin/edititem', $data);
    }

    public function saveItem()
    {
        if ($this->admin->saveItem()) {
            redirect('admin/item','refresh');
        } else {
            redirect('admin/additem','refresh');
        }
    }

    public function updateItem($id_barang)
    {
        if ($this->admin->updateItem($id_barang)) {
            redirect('admin/item','refresh');
        } else {
            redirect('admin/edititem','refresh');
        }
    }

    public function deleteItem($id_barang)
    {
        if ($this->admin->deleteItem($id_barang)) {
            redirect('admin/item','refresh');
        } else {
            redirect('admin/item','refresh');
        }        
    }

    public function Transaction()
    {
        $data['transaction']=$this->admin->getTransaction();
        $this->load->view('admin/transaction', $data);
    }

}

/* End of file Admin.php */

?>