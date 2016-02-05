<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct(){
	parent::__construct();
	$this->load->model('M_mahasiswa','',TRUE);	
	}	

	public function index() {
	$data['mahasiswa']=$this->M_mahasiswa->tampil_data_mahasiswa();
	$this->load->view('v_tampil_mahasiswa',$data);	
	}
	
	public function tambah() {
	$this->form_validation->set_rules('nim','Nomor Induk','required');
	$this->form_validation->set_rules('nama','Nama Mahasiswa','required');			
	
	 $data['provinsi']=$this->M_mahasiswa->ambil_provinsi();	
	 $data['program_studi']=$this->db->anggota_enum('tbl_mahasiswa','program_studi');
	 $data['jk']=$this->db->anggota_enum('tbl_mahasiswa','jenis_kelamin');
	 $this->load->view('v_tambah_mahasiswa',$data);	
	 
		if($this->form_validation->run() == TRUE){
		 $this->M_mahasiswa->simpan();
		 redirect(base_url(),'refresh');
		}	 
	 
	 }	

	// dijalankan saat provinsi di klik
	public function pilih_kabupaten(){
		$data['kabupaten']=$this->M_mahasiswa->ambil_kabupaten($this->uri->segment(3));
		$this->load->view('v_drop_down_kabupaten',$data);
	}

	// dijalankan saat kabupaten di klik
	public function pilih_kecamatan(){
		$data['kecamatan']=$this->M_mahasiswa->ambil_kecamatan($this->uri->segment(3));
		$this->load->view('v_drop_down_kecamatan',$data);
	}
	
	// dijalankan saat kecamatan di klik
	public function pilih_kelurahan(){
		$data['kelurahan']=$this->M_mahasiswa->ambil_kelurahan($this->uri->segment(3));
		$this->load->view('v_drop_down_kelurahan',$data);
	}
}
?>
