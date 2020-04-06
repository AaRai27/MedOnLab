<div class="container">
	<h2>Tambah Data</h2><hr>
	<?= form_open('akun/tambah_akun') ?>
		<div class="form-group">
			<?= form_label('Username') ?>
			<?= form_input(['name'=>'username','class'=>'form-control','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Password') ?>
			<?= form_input(['name'=>'password','class'=>'form-control','required'=>'required','type'=>'password']) ?>
		</div>
		<div class="form-group">
			<a href="<?= site_url('akun') ?>" class="btn btn-success">Back</a>
			<?= form_reset(['value'=>'Reset','class'=>'btn btn-info']) ?>
			<?= form_submit('submit','Submit',['class'=>'btn btn-primary']) ?>
		</div>
	<?= form_close() ?>
</div>