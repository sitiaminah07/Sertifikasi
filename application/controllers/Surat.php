<?php

class Surat extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Surat_model');    
	}
	
	public function index(){
		$data['surat'] = $this->Surat_model->view();

        if ($this->input->post('keyword')) {
            $data['surat'] = $this->Surat_model->cari_surat();
        }

		$this->load->view('surat/sidebar');
		$this->load->view('surat/index', $data);
	}

	public function about(){
		$data['surat'] = $this->Surat_model->view();
		$this->load->view('surat/sidebar');
		$this->load->view('surat/about', $data);
	}
	
	public function detail_data($id){
        $data['surat'] = $this->Surat_model->getSuratById($id);
        $this->load->view('surat/sidebar');
		$this->load->view('surat/detail', $data);
	}

	public function detail(){
		$data['surat'] = $this->Surat_model->view();
		$this->load->view('surat/sidebar');
		$this->load->view('surat/detail', $data);
	}
	
    public function tambah(){
		if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
			if($this->Surat_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
				$this->Surat_model->save(); 
				redirect('surat');
			}
		}
		$this->load->view('surat/sidebar');
		$this->load->view('surat/form_tambah');
	}

	public function proses_tambah()
    {
        if ($this->input->post('finish')) {
            $config['upload_path']          = './assets/uploads/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                echo 'error';
                echo $this->upload->display_errors();
            } else {
                $file = $this->upload->data();
                $file = $file['file_name'];
                $no_surat = htmlspecialchars($this->input->post('no_surat'));
                $kategori = htmlspecialchars($this->input->post('kategori'));
                $judul = htmlspecialchars($this->input->post('judul_surat'));
                $dataPengajuan = array(
                    'no_surat'   	   		 => $no_surat,
                    'kategori'         		 => $kategori,
                    'judul_surat'            => $judul,
                    'file'             		 => $file,
                );
                $this->Surat_model->tambah_pengajuan($dataPengajuan);
                redirect('surat/index');
                print_r($dataPengajuan);
            }
        }
    }
	
	public function download($id)
    {
        $data = $this->db->get_where('surat', ['id' => $id])->row();
        force_download('assets/uploads/' . $data->file, NULL);
    }

	public function hapus($id){
		
        $where = array('id' => $id);
        $this->Surat_model->hapus_surat($where, 'surat');
        redirect('surat', 'refresh');
	}

   public function ubah_surat($id){
		if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
			if($this->Surat_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
				$this->Surat_model->edit($id); // Panggil fungsi edit() yang ada di Surat_model
				redirect('surat');
			}
		}
		
		$data['surat'] = $this->Surat_model->view_by($id);
		$this->load->view('surat/form_ubah', $data);
	}

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Arsip Surat';
        $data['surat'] = $this->Surat_model->getSuratById($id);
        $data['kategori'] = ['Nota Dinas', 'Pemberitahuan', 'Pengumuman', 'Undangan'];

        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('judul_surat', 'Judul', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu Pengarsipan', 'required');
        $this->form_validation->set_rules('file', 'File', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('surat/sidebar');
            $this->load->view('surat/ubah', $data);
        } else {
            $this->Surat_model->ubahDataSurat();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('surat');
        }
    }

}
