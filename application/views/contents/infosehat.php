<!-- ----------------------------------- Navbar Info Kesehatan ----------------------------------- -->



<!-- ----------------------------------- Content ----------------------------------- -->
<div class="container" style="margin-bottom: 100px;margin-top: 30px">
	<div class="row mt-2 mb-4 justify-content-center">
		<h1 class="judul-infosehat">Info Kesehatan</h1>
	</div>
	<div class="row" id="daftar-berita">
		<?php foreach ($news as $n) : ?>
			<div class="col-md-6 mb-3">
				<div class="card" style="height: 30rem">
					<img src="<?= $n['gambar']; ?>" class="card-img-top img-thumbnail" style="height: 20rem">
					<div class="card-body">
						<h5 class="card-title"><?= $n['judul'] ?></h5>
						<a href="<?= $n['link'] ?>" class="btn btn-primary" target="_blank">Lihat Berita</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</div>

<!-- ----------------------------------- Content ----------------------------------- -->