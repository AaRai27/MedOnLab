<div class="container mt-4" style="min-height: 36rem">
	<h2>Lihat Data Dan Ubah Data</h2>
	<hr>
	<?= form_open('admin/ubah_medcheck/' . $medcheck['id']) ?>
	<div class=" form-group">
		<?= form_label('Nama') ?>
		<?= form_input(['name' => 'nama_pasien', 'class' => 'form-control', 'value' => $medcheck['nama_pasien'], 'readonly' => 'true']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Tanggal Lahir') ?>
		<?= form_input(['name' => 'tgl_lahir', 'class' => 'form-control', 'value' => $medcheck['tgl_lahir'], 'type' => 'date']) ?>
	</div>
	<div class="form-group">
		<?= form_label('Layanan') ?>
		<select class="custom-select" id="layanan" name="layanan">
			<option value="<?= $medcheck['layanan'] ?>" selected><?= $medcheck['layanan'] ?></option>
			<option>------</option>
			<option value="Cek Darah">Cek Darah</option>
			<option value="cek Urin">cek Urin</option>
			<option value="Cek Darah dan Urin">Cek Darah dan Urin</option>
		</select>
	</div>
	<div class="form-group">
		<?= form_label('Cabang Lab') ?>
		<select class="custom-select" id="cabang" name="cabang">
			<option value="<?= $medcheck['cabang'] ?>" selected><?= $medcheck['cabang'] ?></option>
			<option>------</option>
			<option value="Cabang Bandung">Cabang Bandung</option>
			<option value="Cabang Bekasi">Cabang Bekasi</option>
			<option value="Cabang Bogor">Cabang Bogor</option>
			<option value="Cabang Surakarta">Cabang Surakarta</option>
		</select>
	</div>
	<div class="form-group">
		<?= form_label('Alamat') ?>
		<?= form_input(['name' => 'alamat', 'class' => 'form-control', 'rows' => '4', 'required' => 'required', 'value' => $medcheck['alamat']]) ?>
	</div>
	<div class="form-group">
		<?= form_label('nomor_hp') ?>
		<?= form_input(['name' => 'nomor_hp', 'class' => 'form-control', 'required' => 'required', 'value' => $medcheck['nomor_hp']]) ?>
	</div>
	<div class="form-group">
		<?= form_label('Bukti Pembayaran') ?>
		<?= form_input(['name' => 'img_bukti', 'class' => 'form-control', 'value' => $medcheck['img_bukti']]) ?>
		<a target="_blank" href="<?= base_url('assets/img/buktiBayar/') . $medcheck['img_bukti'] ?>" class="btn btn-primary mt-2">Lihat Bukti Pembayaran</a>
	</div>

	<div class="form-group">
		<?= form_label('Hasil Lab Medical Check Up') ?>
		<?= form_input(['name' => 'hasil_lab', 'class' => 'form-control', 'value' => $medcheck['hasil_lab']]) ?>
		<a target="_blank" href="<?= base_url('assets/img/hasilLab/') . $medcheck['hasil_lab'] ?>" class="btn btn-primary mt-2">Lihat Hasil Lab</a>
		<a href="<?= base_url('upload/upload_hasil_lab/') . $medcheck['id'] ?>" class="btn btn-success mt-2">Upload Hasil Lab</a>
	</div>

	<div class=" form-group">
		<?= form_label('Status') ?>
		<div class="form-check">
			<div class="form-check form-check-inline">
				<?php if ($medcheck['status'] == 0) : ?>
					<input class="form-check-input" type="radio" name="status" id="status" value="0" checked>Menunggu Pembayaran
					<input class="form-check-input ml-3" type="radio" name="status" id="status" value="1">Proses
					<input class="form-check-input ml-3" type="radio" name="status" id="status" value="2">Selesai
				<?php elseif ($medcheck['status'] == 1) : ?>
					<input class="form-check-input" type="radio" name="status" id="status" value="0">Menunggu Pembayaran
					<input class="form-check-input ml-3" type="radio" name="status" id="status" value="1" checked>Proses
					<input class="form-check-input ml-3" type="radio" name="status" id="status" value="2">Selesai
				<?php else : ?>
					<input class="form-check-input" type="radio" name="status" id="status" value="0">Menunggu Pembayaran
					<input class="form-check-input ml-3" type="radio" name="status" id="status" value="1">Proses
					<input class="form-check-input ml-3" type="radio" name="status" id="status" value="2" checked>Selesai
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="form-group">
		<a href="<?= base_url('admin') ?>" class="btn btn-success">Back</a>
		<?= form_submit('submit', 'Update', ['class' => 'btn btn-warning']) ?>
	</div>
	</script>
	<?= form_close() ?>
</div>