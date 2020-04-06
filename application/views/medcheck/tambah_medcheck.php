<div class="container">
	<h2>Tambah Data</h2><hr>
	<?= form_open('medcheck/tambah_medcheck') ?>
		<div class="form-group">
			<?= form_label('Nama') ?>
			<?= form_input(['name'=>'nama','class'=>'form-control','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Tanggal Lahir') ?>
			<?= form_input(['name'=>'tgl_lahir','class'=>'form-control','type'=>'date','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Jenis Layanan') ?>
			<select class="form-control" id="formGroupExampleInput2" name="jenis_layanan" required>
				<option value="Layanan 1" >Layanan 1</option>
				<option value="Layanan 2" >Layanan 2</option>
				<option value="Layanan 3" >Layanan 3</option>
			</select>
		</div>
		<div class="form-group">
			<?= form_label('Tanggal Layanan') ?>
            <?= form_input(['name'=>'tgl_layanan','class'=>'form-control','type'=>'date','required'=>'required']) ?>
		</div>
		<div class="form-group">
			<?= form_label('Jam Layanan') ?>
			<select class="form-control" id="formGroupExampleInput2" name="jam_layanan" required>
				<option value="10:30 WIB" >10:30 WIB</option>
				<option value="12.30 WIB" >12.30 WIB</option>
				<option value="14.00 WIB" >14.00 WIB</option>
			</select>
		</div>
		<div class="form-group">
			<?= form_label('Tempat') ?>
			<select class="form-control" id="formGroupExampleInput2" name="cabang" required>
				<option value="Bojongswan" >Bojongswan</option>
				<option value="Majalayork" >Majalayork</option>
				<option value="Sukaboston" >Sukaboston</option>
			</select>
		</div>
		<div class="form-group">
			<a href="<?= site_url('medcheck') ?>" class="btn btn-success">Back</a>
			<?= form_reset(['value'=>'Reset','class'=>'btn btn-info']) ?>
			<?= form_submit('submit','Submit',['class'=>'btn btn-primary']) ?>
		</div>
	<?= form_close() ?>
</div>