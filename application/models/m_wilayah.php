<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_wilayah extends CI_Model {


//var $tabel_mahasiswa='tbl_mahasiswa';
var $tabel_pelanggan='tbl_pelanggan';
var $tabel_acara='tbl_paket_acara';
var $tabel_provinsi='provinsi';
var $tabel_kabupaten='kabupaten';
var $tabel_kecamatan='kecamatan';
var $tabel_kelurahan='kelurahan';

	public function __construct(){
	parent::__construct();
	}
	
	
	public function tampil_data_acara(){
	$sql_query=$this->db->get($this->tabel_acara);	
			if($sql_query->num_rows()>0){
				return $sql_query->result_array();
			}		
	}	
	
	public function tampil_data_pelanggan() {
	$sql_query=$this->db->get($this->tabel_pelanggan);	
			if($sql_query->num_rows()>0){
				return $sql_query->result_array();
			}
	}	
	
	
	public function simpan(){

		$this->db->where('oid', $this->input->post('oid'));
		$query = $this->db->get('tbl_pelanggan');

        if($query->num_rows > 0){
        	echo '<script type="javascript">';
			  echo 'alert("OID already taken")';	
			echo '</script>';
		}else{	

		$data_pelanggan=array(
			'oid'=>$this->input->post('oid'),
			'nama_pelanggan'=>$this->input->post('nama'),
			'jenis_kelamin'=>$this->input->post('jk'),
			'tahun_daftar'=>$this->input->post('angkatan'),
			'kd_program'=>$this->input->post('program'),
			'provinsi'=>$this->input->post('provinsi_id'),
			'kabupaten'=>$this->input->post('kabupaten_id'),
			'kecamatan'=>$this->input->post('kecamatan_id'),
			'kelurahan'=>$this->input->post('kelurahan_id'),
			'alamat'=>$this->input->post('alamat')
		);	
			$insert = $this->db->insert($this->tabel_pelanggan,$data_pelanggan);	
			return $insert;
		}
	}	 	
	
	public function detail($no_induk) {
	$this->db->where('no_induk_mahasiswa',$no_induk);	
	$sql_query=$this->db->get($this->tbl_pelanggan);	
			if($sql_query->num_rows()==1){
				return $sql_query->row_array();
			}
	}
	
	public function ambil_provinsi() {
	$sql_prov=$this->db->get($this->tabel_provinsi);	
	if($sql_prov->num_rows()>0){
		foreach ($sql_prov->result_array() as $row)
			{
				$result['-']= '- Pilih Provinsi -';
				$result[$row['id_provinsi']]= ucwords(strtolower($row['nama_provinsi']));
			}
			return $result;
		}
	}
	
	public function ambil_kabupaten($kode_prop){
	$this->db->where('id_provinsi',$kode_prop);
	$this->db->order_by('nama_kabupaten','asc');
	$sql_kabupaten=$this->db->get($this->tabel_kabupaten);
	if($sql_kabupaten->num_rows()>0){

		foreach ($sql_kabupaten->result_array() as $row)
        {
            $result[$row['id_kabupaten']]= ucwords(strtolower($row['nama_kabupaten']));
        }
		} else {
		   $result['-']= '- Belum Ada Kabupaten -';
		}
        return $result;
	}
	
	public function ambil_kecamatan($kode_kab){
	$this->db->where('id_kabupaten',$kode_kab);
	$this->db->order_by('nama_kecamatan','asc');
	$sql_kecamatan=$this->db->get($this->tabel_kecamatan);
	if($sql_kecamatan->num_rows()>0){

		foreach ($sql_kecamatan->result_array() as $row)
        {
            $result[$row['id_kecamatan']]= ucwords(strtolower($row['nama_kecamatan']));
        }
		} else {
		   $result['-']= '- Belum Ada Kecamatan -';
		}
        return $result;
	}

	public function ambil_kelurahan($kode_kec){
	$this->db->where('id_kecamatan',$kode_kec);
	$this->db->order_by('nama_kelurahan','asc');
	$sql_kelurahan=$this->db->get($this->tabel_kelurahan);
	if($sql_kelurahan->num_rows()>0){

		foreach ($sql_kelurahan->result_array() as $row)
        {
            $result[$row['id_kelurahan']]= ucwords(strtolower($row['nama_kelurahan']));
        }
		} else {
		   $result['-']= '- Belum Ada Kelurahan -';
		}
        return $result;
	}

}
