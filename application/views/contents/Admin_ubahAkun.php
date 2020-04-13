<div class="container">
	<h2>Ubah Data</h2><hr>
	<?= form_open('Admin_akun/ubah_akun/'.$akun['id']) ?>
		<div class="form-group">
			<?= form_label('Full Name') ?>
			<?= form_input(['name'=>'fullname','class'=>'form-control','required'=>'required','value'=>$akun['fullname']]) ?>
		</div>
		<div class="form-group">
			<?= form_label('Email') ?>
			<?= form_input(['name'=>'email','class'=>'form-control','required'=>'required','value'=>$akun['email']]) ?>
		</div>
		<div class="form-group">
			<?= form_label('Username') ?>
			<?= form_input(['name'=>'username','class'=>'form-control','required'=>'required','value'=>$akun['username'],'readonly'=>'true']) ?>
		</div>
        <div class="form-group">
			<?= form_label('Password Lama') ?>
			<?= form_input(['name'=>'password','class'=>'form-control','required'=>'required','value'=>$akun['password'],'readonly'=>'true']) ?>
		</div>
        <div class="form-group">
			<?= form_label('Password Baru') ?>
			<?= form_input(['name'=>'password','class'=>'form-control','required'=>'required','type'=>'password',]) ?>
		</div>
		<div class="form-group">
			<a href="<?= site_url('Admin_akun') ?>" class="btn btn-success">Back</a>
			<?= form_submit('submit','Update',['class'=>'btn btn-warning']) ?>
		</div>
	<?= form_close() ?>
</div>