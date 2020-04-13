<div class="container">
	<h2>Ubah Data</h2><hr>
	<?= form_open('Admin_medcheck/ubah_medcheck/'.$medcheck['id']) ?>
		<div class="form-group">
			<?= form_label('Nama') ?>
			<?= form_input(['name'=>'nama','class'=>'form-control','required'=>'required','value'=>$medcheck['nama']]) ?>
		</div>
		<div class="form-group">
			<?= form_label('Tanggal Lahir') ?>
			<?= form_input(['name'=>'tgl_lahir','class'=>'form-control','required'=>'required','value'=>$medcheck['tgl_lahir']]) ?>
		</div>
		<div class="form-group">
			<?= form_label('E-Mail') ?>
			<?= form_input(['name'=>'email','class'=>'form-control','required'=>'required', 'value'=>$medcheck['email']]) ?>
		</div>
		<div class="form-group">
			<?= form_label('Alamat') ?>
			<?= form_input(['name'=>'alamat','class'=>'form-control','rows'=>'4','required'=>'required','value'=>$medcheck['alamat']]) ?>
		</div>
		<div class="form-group">
			<a href="<?= site_url('Admin_medcheck') ?>" class="btn btn-success">Back</a>
			<?= form_submit('submit','Update',['class'=>'btn btn-warning']) ?>
		</div>
    </script>
	<?= form_close() ?>
</div>