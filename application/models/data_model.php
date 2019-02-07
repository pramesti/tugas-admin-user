<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Model extends CI_Model {
    
    public function addbarang($nama_barang, $gambar_barang, $id_kategori, $harga, $deskripsi)
	{
		$data = array('nama_barang' => $nama_barang, 'harga' => $harga, 'deskripsi' => $deskripsi, 'gambar_barang' => $gambar_barang['file']['file_name'], 'id_kategori' => $id_kategori );
        
		$simpan=$this->db->insert('barang', $data);
		if($simpan){
			return true;
		} else{
			return false;
		}
    }
    public function getBaranginKategori($nama_kategori) 
    {
        $get=$this->db->where('nama_kategori',$nama_kategori)->join('kategori', 'kategori.id_kategori = barang.id_kategori')->get('barang')->result();
        return $get;
    }
	public function getbarang() 
	{
		$get=$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori')->get('barang')->result();
		return $get;
    }
    public function getDetailBarang($id_barang)
    {
        $get=$this->db->where('id_barang',$id_barang)->join('kategori', 'kategori.id_kategori = barang.id_kategori')->get('barang')->row();
        return $get;
    }
	public function delbarang($id_barang)
	{
		$del=$this->db->where('id_barang', $id_barang)->delete('barang');
	}
    public function createNota($id_pembeli, $tgl_pembelian, $totalitems, $grandtotal)
    {
        $data = array('id_pembeli' => $id_pembeli, 'tgl_pembelian' => $tgl_pembelian, 'totalitems' => $totalitems, 'grandtotal' => $grandtotal );
        
		$simpan=$this->db->insert('nota', $data);
		if($simpan){
			return true;
		} else{
			return false;
		}        
    }
    public function getLastNota($id_pembeli)
    {
        $get = $this->db->where('id_pembeli', $id_pembeli)->order_by('id_nota', 'desc')->limit(1)->get('nota')->row();
        return $get;
    }
    public function getDetailNota($id_nota)
    {
        $get = $this->db->join('nota', 'nota.id_nota = pembelian.id_nota')
        ->join('pembeli', 'nota.id_pembeli = pembeli.id_pembeli')
        ->join('barang', 'pembelian.id_barang = barang.id_barang')
        ->where('nota.id_nota', $id_nota)->get('pembelian')->result();
        return $get;
    }
    public function addItemtoNota($id_pembeli)
    {
        $nota = $this->getLastNota($id_pembeli);
        $data = array();
        foreach ($this->cart->contents() as $ct) {
            array_push($data, array(
                'id_nota' => $nota->id_nota,
                'id_barang' => $ct['id'],
                'jumlah' => $ct['qty']
            ));
        }
        
        $simpan = $this->db->insert_batch('pembelian', $data);
        if($simpan){
			return true;
		} else{
			return false;
		}  
    }
    //login
    public function validasi(){
        $this->form_validation->set_rules('username', 'Username','trim|required|strip_tags|xss_clean');
        $this->form_validation->set_rules('password', 'Password','trim|required|xss_clean');
        
        if ($this->form_validation->run()){
            return TRUE;
        } else {
            return FALSE;
        }
    }  
    
    public function cek_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $queryadmin = $this->db->select('*')
        ->where('username', $username)
        ->where('password', $password)
        ->limit(1)
        ->get('admin');
        
        $rowadmin = $queryadmin->row();
        
        $queryuser = $this->db->select('*')
        ->where('username', $username)
        ->where('password', $password)
        ->limit(1)
        ->get('pembeli');
        
        $rowuser = $queryuser->row();
        
        if ($queryadmin->num_rows() == 1)
        {
            $data = array(	'username' 		=> $rowadmin->username, 
            'admin'    		=> TRUE,
            'nama'			=> $rowadmin->nama_admin,
            'id'   			=> $rowadmin->id_admin,
            'role'			=> $rowadmin->role);
            
            $this->session->set_userdata($data);  
            $this->db->close();
            return true;
        } 
        else if ($queryuser->num_rows() == 1)
        {
            $data = array(	'username' 		=> $rowuser->username, 
            'login' 	  		=> TRUE,
            'nama'			=> $rowuser->nama,
            'id'   			=> $rowuser->id_pembeli,
            'alamat'		=> $rowuser->alamat,
            'kodepos'		=> $rowuser->kodepos,
            'no_telp'		=> $rowuser->no_tlp );
            $this->session->set_userdata($data);
            $this->db->close();
            return true;
        } else {
            $this->db->close();
            return false;
        }  
    }
    
    public function insertUser()
    {
        //insert data
        $data= array(
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'kodepos' => $this->input->post('kodepos'),
            'no_tlp' => $this->input->post('kontak'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password')
        );
        //insert data to the database
        $this->db->insert('pembeli', $data);
        
    }
    public function search($keyword)
    {
        //$query = $this->db->query("SELECT * FROM buku WHERE judul LIKE '%" . $keyword ."%'" .
        // "OR penulis LIKE '%" . $keyword ."%'" .
        // "OR tahun_terbit LIKE '%" . $keyword ."%'"  )->result_array();
        
        $this->db->like('nama_barang', $keyword);
        
        $query = $this->db->get('petmart')->result_array();        
        return $query;
    }
}

/* End of file ModelName.php */
