<div class="container mt-3" style="min-height: 38vw;">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="text-center">
					<?= $this->session->flashdata('pesan'); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<h2>Ubah Data</h2>
	<hr>
	<div class="img-profile">
		<div class="row">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail" width="130">
				<a href="<?= base_url('upload/ubah_photo_profile') ?>" class="btn btn-primary">Change Photo</a>
			</div>
		</div>
	</div>
	<?= form_open('Auth/ubahAkun/') ?>
	<div class="form-group">
		<?= form_label('Full Name') ?>
		<?= form_input(['name' => 'fullname', 'class' => 'form-control', 'value' => $user['fullname']]) ?>
	</div>
	<div class="form-group">
		<?= form_label('Email') ?>
		<?= form_input(['name' => 'email', 'class' => 'form-control', 'value' => $user['email'], 'readonly' => 'true']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Username') ?>
		<?= form_input(['name' => 'username', 'class' => 'form-control', 'value' => $user['username']]) ?>
	</div>
	<div class="form-group">
		<a href="<?= site_url('User') ?>" class="btn btn-success">Back</a>
		<?= form_submit('submit', 'Update', ['class' => 'btn btn-warning']) ?>
	</div>
	<?= form_close() ?>
</div>