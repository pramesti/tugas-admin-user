<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Admin extends CI_Model {
    public function getDetailNota($id_nota)
    {
        $get = $this->db->join('nota', 'nota.id_nota = pembelian.id_nota')
        ->join('pembeli', 'nota.id_pembeli = pembeli.id_pembeli')
        ->join('barang', 'pembelian.id_barang = barang.id_barang')
        ->where('nota.id_nota', $id_nota)->get('pembelian')->result();
        return $get;
    }
    
    public function getTransaction()
    {
        $get = $this->db->join('pembeli', 'nota.id_pembeli = pembeli.id_pembeli')
        ->order_by('id_nota', 'desc')->get('nota')->result();
        return $get;
    }
    
    public function getPembeli()
    {
        $get = $this->db->get('pembeli')->result();
        return $get;
    }
    
    public function getItems()
    {
        $get = $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori')
        ->order_by('id_barang', 'asc')->get('barang')->result();   
        return $get;
    }
    
    public function getDetailItem($id_barang)
    {
        $get = $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori')
        ->where('id_barang', $id_barang)->get('barang', 1)->row();   
        return $get;
    }
    
    public function saveItem()
    {
        $id_kategori = $this->input->post('kategori');        
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $this->upload($this->getDetailKategori($id_kategori)->nama_kategori);
        
        $data = array(
            'id_kategori' => $id_kategori, 
            'nama_barang' => $nama,
            'harga' => $harga,
            'stok' => $stok,
            'deskripsi' => $deskripsi,
            'gambar_barang' => $gambar['file']['file_name']
        );
        $simpan = $this->db->insert('barang', $data);
        if ($simpan) {
            return true;
        } else {
            return false;
        }  
    }
    
    public function updateItem($id_barang)
    {
        $id_kategori = $this->input->post('kategori');        
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $this->upload($this->getDetailKategori($id_kategori)->nama_kategori);
        
        if ($gambar['error']) { 
            $data = array(
                'id_kategori' => $id_kategori, 
                'nama_barang' => $nama,
                'harga' => $harga,
                'stok' => $stok,
                'deskripsi' => $deskripsi
            ); 
        } else {  
            $data = array(
                'id_kategori' => $id_kategori, 
                'nama_barang' => $nama,
                'harga' => $harga,
                'stok' => $stok,
                'deskripsi' => $deskripsi,
                'gambar_barang' => $gambar['file']['file_name']
            );
        }
        
        $simpan = $this->db->where('id_barang', $id_barang)->update('barang', $data);
        if ($simpan) {
            return true;
        } else {
            return false;
        }  
    }
    
    public function deleteItem($id_barang)
    {
        $delete = $this->db->where('id_barang', $id_barang)->delete('barang');        
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
    
    public function upload($nama_kategori)
    {
        # code...
        $config['upload_path'] = './assets/images/'.$nama_kategori.'/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '10240';
        $config['remove_space'] = TRUE;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors(), 'result' => 'error');
            return $error;
        }
        else{
            $data = array('file' =>$this->upload->data(), 'result' => 'success');
            return $data;
        }
    }
    
    public function getKategori()
    {
        $get = $this->db->order_by('nama_kategori', 'asc')->get('kategori')->result();   
        return $get;
    }
    
    public function getDetailKategori($id_kategori)
    {
        $get = $this->db->order_by('nama_kategori', 'asc')->get('kategori')->row();   
        return $get;
    }
}

/* End of file ModelName.php */
