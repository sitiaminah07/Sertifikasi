<?php

class Surat_model extends CI_Model {
	// Fungsi untuk menampilkan semua data siswa
	public function view()
    {
		$this->db->order_by('no_surat');
        return $this->db->from('surat')
            ->get()
            ->result_array();
	}

	public function cari_surat()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('judul_surat', $keyword);
        return $this->db->get('surat')->result_array();
    }

	public function insert($data)
    {
        $this->db->insert('surat', $data);
    }
	
	public function view_by($no_surat)
    {
		$this->db->where('no_surat', $no_surat);
		return $this->db->get('surat')->row();
	}

	public function getSuratById($id)
	{
		return $this->db->get_where('surat', ['id' => $id])->row_array();
	}

	public function detail($no_surat)
    {
		$data["surat"] = $this->db->query("select * from surat where id = '$no_surat'")->row();
        $this->db->display("detail",$data);
	}
    
	public function get_all()
    {
		return $this->db->get('surat')->result();
	}

	public function get_product_keyword($keyword)
    {
			$this->db->select('*');
			$this->db->from('surat');
			$this->db->like('judul_surat',$keyword);
			return $this->db->get()->result();
	}	

	// Fungsi untuk melakukan menghapus data surat berdasarkan no surat
	public function hapus_surat($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

	public function validation($mode)
    {
		$this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
		
		// Tambahkan if apakah $mode save atau update
		// Karena ketika update, no surat tidak harus divalidasi
		// Jadi no surat di validasi hanya ketika menambah data surat saja
		if($mode == "save")
		$this->form_validation->set_rules('no_surat', 'no Surat', 'required');
		
		$this->form_validation->set_rules('kategori', 'Kategori');
		$this->form_validation->set_rules('judul_surat', 'Judul', 'required');
		$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		$this->form_validation->set_rules('file', 'File', 'required');
			
		if($this->form_validation->run()) // Jika validasi benar
			return TRUE; // Maka kembalikan hasilnya dengan TRUE
		else // Jika ada data yang tidak sesuai validasi
			return FALSE; // Maka kembalikan hasilnya dengan FALSE
	}
	
	// Fungsi untuk melakukan simpan data ke tabel surat
	public function save()
    {
		$data = array(
			"no_surat" => $this->input->post('no_surat'),
			"kategori" => $this->input->post('kategori'),
			"judul_surat" => $this->input->post('judul_surat'),
			"waktu" => $this->input->post('waktu'),
			"file" => $this->input->post('file')
		);
		
		$this->db->insert('surat', $data); // Untuk mengeksekusi perintah insert data
	}

	public function edit($no_surat)
    {
		$data = array(
			"no_surat" => $this->input->post('no_surat'),
			"kategori" => $this->input->post('kategori'),
			"judul_surat" => $this->input->post('judul_surat'),
			"waktu" => $this->input->post('waktu'),
			"file" => $this->input->post('file')
		);
		
		$this->db->where('id', $no_surat);
		$this->db->update('surat', $data); // Untuk mengeksekusi perintah update data
	}

	public function ubahDataSurat()
    {
        $data = [
            "no_surat" => $this->input->post('no_surat', true),
			"kategori" => $this->input->post('kategori', true),
            "judul_surat" => $this->input->post('judul_surat', true),
			"waktu" => $this->input->post('waktu', true),
            "file" => $this->input->post('file', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('surat', $data);
    }
}
