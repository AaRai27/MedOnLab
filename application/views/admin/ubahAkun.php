<div class="container mt-4" style="min-height: 36rem">
	<h2>Ubah Data</h2>
	<?= validation_errors(); ?>
	<hr>
	<?= form_open('admin/ubah_akun/' . $akun['id']) ?>
	<div class="form-group">
		<?= form_label('Email') ?>
		<?= form_input(['name' => 'email', 'class' => 'form-control', 'required' => 'required', 'value' => $akun['email'], 'readonly' => 'true']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Full Name') ?>
		<?= form_input(['name' => 'fullname', 'class' => 'form-control', 'required' => 'required', 'value' => $akun['fullname']]) ?>
	</div>
	<div class="form-group">
		<?= form_label('Username') ?>
		<?= form_input(['name' => 'username', 'class' => 'form-control', 'required' => 'required', 'value' => $akun['username'], 'readonly' => 'true']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Ganti Password') ?>
		<a href="<?= base_url('admin/ubah_password/' . $akun['id']) ?>" class="form-control btn btn-primary">Ganti Password</a>
	</div>
	<!--  -->
	<div class="form-group">
		<a href="<?= base_url('admin/view_all_akun') ?>" class="btn btn-success">Back</a>
		<?= form_submit('submit', 'Update', ['class' => 'btn btn-warning', "onclick" => 'edit()']) ?>
	</div>
	<?= form_close() ?>
</div>