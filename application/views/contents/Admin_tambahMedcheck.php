<div class="container">
	<h2>Tambah Data</h2><hr>
	<?= form_open('medcheck/tambah_medcheck') ?>
		<div class="form-group">
			<?= form_label('Nama Pasien') ?>
			<?= form_input(['name'=>'nama_pasien','class'=>'form-control','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Tanggal Lahir') ?>
			<?= form_input(['name'=>'tgl_lahir','class'=>'form-control','type'=>'date','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Jenis Layanan') ?>
			<select class="form-control" id="formGroupExampleInput2" name="jenis_layanan" required>
				<option value="Layanan 1" >Cek Darah</option>
				<option value="Layanan 2" >Cek Urin</option>
				<option value="Layanan 3" >Cek Darah dan Urin</option>
			</select>
		</div>
		<div class="form-group">
			<?= form_label('Tanggal Layanan') ?>
            <?= form_input(['name'=>'tgl_layanan','class'=>'form-control','type'=>'date','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Cabang') ?>
			<select class="form-control" id="formGroupExampleInput2" name="cabang" required>
				<option value="Bandung">Cabang Bandung</option>
				<option value="Bekasi">Cabang Bekasi</option>
				<option value="Bogor">Cabang Bogor</option>
				<option value="Surakarta">Cabang Surakarta</option>
			</select>
		</div>
		<div class="form-group">
			<?= form_label('Alamat') ?>
            <?= form_input(['name'=>'alamat','class'=>'form-control','type'=>'date','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Nomor Aktif yang dapat Dihubungi') ?>
            <?= form_input(['name'=>'nomor_hp','class'=>'form-control','type'=>'date','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<a href="<?= site_url('Admin_medcheck') ?>" class="btn btn-success">Back</a>
			<?= form_reset(['value'=>'Reset','class'=>'btn btn-info']) ?>
			<?= form_submit('submit','Submit',['class'=>'btn btn-primary']) ?>
		</div>
	<?= form_close() ?>
</div>