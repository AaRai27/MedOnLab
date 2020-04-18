<div class="container mt-4" style="min-height: 35rem">
	<h2><?= $title ?></h2>
	<hr>
	<?= form_open('admin/ubah_password/' . $akun['id']) ?>
	<div class="form-group">
		<?= form_label('Username') ?>
		<?= form_input(['name' => 'username', 'class' => 'form-control', 'required' => 'required', 'value' => $akun['username'], 'readonly' => 'true']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Password Baru') ?>
		<?= form_input(['name' => 'password1', 'class' => 'form-control', 'type' => 'password']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Konfirmasi Pasword') ?>
		<?= form_input(['name' => 'password2', 'class' => 'form-control', 'type' => 'password']) ?>
	</div>
	<div class="form-group">
		<a href="<?= base_url('admin') ?>" class="btn btn-success">Back</a>
		<?= form_submit('submit', 'Update', ['class' => 'btn btn-warning']) ?>
	</div>
	<?= form_close() ?>
</div>