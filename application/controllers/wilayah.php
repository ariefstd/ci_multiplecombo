<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wilayah extends CI_Controller
{
	public function __construct(){
	parent::__construct();
	$this->load->model('M_wilayah','',TRUE);	
	}	

	public function tampilkan(){
		$data['pelanggan']=$this->M_wilayah->tampil_data_pelanggan();
		$this->load->view('v_tampil',$data);			
	}

	public function index() {
	//$data['pelanggan']=$this->M_wilayah->tampil_data_pelanggan();
	//$this->load->view('v_tampil',$data);	
	////////////////////////////////////////////////////////////////
	$data['provinsi']=$this->M_wilayah->ambil_provinsi();
	 $data['program']=$this->M_wilayah->tampil_data_acara();
	 $data['jk']=$this->db->anggota_enum('tbl_pelanggan','jenis_kelamin');
	$this->load->view('v_tambah',$data);
	}
	
	public function tambah() {
	$this->form_validation->set_rules('oid','Nomor OID','required');
	$this->form_validation->set_rules('nama','Nama Pelanggan','required');			
	
	 $data['provinsi']=$this->M_wilayah->ambil_provinsi();	
	 //$data['program_studi']=$this->db->anggota_enum('tbl_mahasiswa','program_studi');
	 $data['program']=$this->M_wilayah->tampil_data_acara();
	 $data['jk']=$this->db->anggota_enum('tbl_pelanggan','jenis_kelamin');
	 $this->load->view('v_tambah',$data);	
	 
		if($this->form_validation->run() == TRUE){
		 $this->M_wilayah->simpan();
		 //redirect(base_url(),'refresh');	
		 $data['pelanggan']=$this->M_wilayah->tampil_data_pelanggan();
		 redirect('tampilkan',$data);		 
		}	 
	 
	 }	

	// dijalankan saat provinsi di klik
	public function pilih_kabupaten(){
		$data['kabupaten']=$this->M_wilayah->ambil_kabupaten($this->uri->segment(3));
		$this->load->view('v_drop_down_kabupaten',$data);
	}

	// dijalankan saat kabupaten di klik
	public function pilih_kecamatan(){
		$data['kecamatan']=$this->M_wilayah->ambil_kecamatan($this->uri->segment(3));
		$this->load->view('v_drop_down_kecamatan',$data);
	}
	
	// dijalankan saat kecamatan di klik
	public function pilih_kelurahan(){
		$data['kelurahan']=$this->M_wilayah->ambil_kelurahan($this->uri->segment(3));
		$this->load->view('v_drop_down_kelurahan',$data);
	}
}
?>
