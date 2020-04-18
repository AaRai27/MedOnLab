<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
		<?php if ($this->session->flashdata('pesan')) : ?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Data <?= $this->session->flashdata('pesan'); ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>

	<div class="row" style="min-height: 37rem">
		<div class="col-md-12">
			<div class="col-md-11 justify-content-center mx-auto">
				<div>
					<div class="container text-center">
						<h3>Daftar Account</h3>
					</div>
					<div class="container text-right">
						<a href="<?= base_url('admin/tambah_akun') ?>" class="btn btn-primary">Add Data</a>
					</div>
					<br>
					<?php
					$template = array(
						'table_open' => '<table id="tbAkun" class="table-hover table-striped" cellspacing="0" style="width:100%">',
						'thead_open' => '<thead class="table-info text-center">',
						'tbody_open' => '<tbody class ="text-center">',
					);
					$this->table->set_template($template);
					$this->table->set_heading('ID Pasien', 'Nama', 'Username', 'Email', 'Aksi');

					foreach ($data_akun as $da) {
						$url = 'MedOnLab/index.php/admin/hapus_akun/' . $da['id'];
						$this->table->add_row(
							$da['id_pasien'],
							$da['fullname'],
							$da['username'],
							$da['email'],
							'<a href="' . base_url('admin/ubah_akun/' . $da['id'])
								. '" class="btn btn-warning btn-sm">'
								. '<i class="fa fa-edit"></i>'
								. '</a> &#160;'
								. "<button href=\"#\" onclick=\"del('" . $url . "')\" class=\"btn btn-danger btn-sm\">"
								. '<i class="fa fa-trash"></li>'
								. '</button>'
						);
					}
					echo $this->table->generate();
					$this->table->clear();
					?>
				</div>
			</div>
		</div>
	</div>