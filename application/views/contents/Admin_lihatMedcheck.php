<div class="container">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
	<?php if( $this->session->flashdata('flash') ) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data <?= $this->session->flashdata('flash'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
	<?php endif; ?>
<div>
<div class="container text-center"><h3>Daftar Medical Check</h3></div>
<div class="container text-right">
	<a href="<?= site_url('Admin_medcheck/form_tambah') ?>" class="btn btn-primary">Add Data</a>
</div>
<br>
<?php
	$template = array(
		'table_open' => '<table id="tbMedcheck" class="table-hover table-striped" cellspacing="0" style="width:100%">',
		'thead_open' => '<thead class="table-info text-center">',
		'tbody_open' => '<tbody class ="text-center">',
	);
	$this->table->set_template($template);
	$this->table->set_heading('ID Pasien','Nama','Layanan','Cabang','Alamat','No HP','Periksa','Ambil','Aksi');

	foreach($data_medcheck as $dm){
		$url = 'MedOnLab/index.php/Admin_medcheck/hapus_medcheck/' . $dm['id'];
		$this->table->add_row(
			$dm['id_pasien'],
			$dm['nama_pasien'],
			$dm['layanan'],
			$dm['cabang'],
			$dm['alamat'],
			$dm['nomor_hp'],
			$dm['tgl_periksa'],
			$dm['tgl_ambil'],
			'<a href="' . site_url('Admin_medcheck/form_ubah/'.$dm['id'])
			.'" class="btn btn-warning btn-sm">'
			.'<i class="fa fa-edit"></i>'
			.'</a> &#160;'
			."<button href=\"#\" onclick=\"del('".$url."')\" class=\"btn btn-danger btn-sm\">"
			.'<i class="fa fa-trash"></li>'
			.'</button>'
		);
	}
	echo $this->table->generate();
	$this->table->clear();
?>