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
<div class="container text-center"><h3>Daftar Account</h3></div>
<div class="container text-right">
	<a href="<?= site_url('Admin_akun/form_tambah') ?>" class="btn btn-primary">Add Data</a>
</div>
<br>
<?php 
	$template = array(
		'table_open' => '<table id="tbAkun" class="table-hover table-striped" cellspacing="0" style="width:100%">',
		'thead_open' => '<thead class="table-info text-center">',
		'tbody_open' => '<tbody class ="text-center">',
	);
	$this->table->set_template($template);
	$this->table->set_heading('ID Pasien','Nama','Username','Email','Aksi');

	foreach($data_akun as $da){
		$url = 'MedOnLab/index.php/Admin_akun/hapus_akun/' . $da['id'];
		$this->table->add_row(
			$da['id_pasien'],
			$da['fullname'],
			$da['username'],
			$da['email'],
			'<a href="' . site_url('Admin_akun/form_ubah/'.$da['id'])
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