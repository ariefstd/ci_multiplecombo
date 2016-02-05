<!DOCTYPE html>
<html lang="en">
  <head>
<title>Daftar pelanggan</title>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
	  <br/>
<div class="container">
		
	<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
        <div class="navbar-header">
<h4 style="color:#FFFFFF;font-weight:bold;"><span class="glyphicon glyphicon-fire"></span>&nbsp;Combo selected CodeIgniter V. 3.1.0</h4>
			</div>
		</div>
	</nav>


<div class="panel panel-primary">
	<div class="panel-heading"><span class="glyphicon glyphicon-th-list"></span>&nbsp;<b>Daftar baru</b></div>
		<div class="panel-body">
        <p>Untuk menmabah  data baru klik pada tombol dibawah ini !</p>
        <p><a href="<?php echo base_url();?>wilayah/tambah/">
			<button type="button" class="btn btn-sm btn-primary">
			<span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Tambah</button>
			</a>
			</p>
		<div>
	</div>
</div>

<div class="table-responsive">
<?php
	$tampilan_tabel=array('table_open'=>'<table  id="example" class="table table-striped table-bordered table-condensed table-hover">',
	'heading_cell_start'=>'<th class="daftar">',
	'row_start'=>'<tr>');
	$this->table->set_template($tampilan_tabel);

$no=0;
$hal=$this->uri->segment(3);
$no=$no+$hal;


$this->table->set_heading('No.','No. Induk','Nama pelanggan','Jenis Kelamin','Tahun langganan','Paket langganan');

if(isset($mahasiswa)){
	foreach($mahasiswa as $data_mahasiswa){
		$no++;
		$this->table->add_row(
		$no,
		$data_mahasiswa['no_induk_mahasiswa'],
		$data_mahasiswa['nama_mahasiswa'],
		$data_mahasiswa['jenis_kelamin'],
		$data_mahasiswa['angkatan'],
		$data_mahasiswa['program_studi']);
	}
}
echo $this->table->generate();
?>
</div>
</div>
</body>
</html>
