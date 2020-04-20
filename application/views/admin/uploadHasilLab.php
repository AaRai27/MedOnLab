<div class="container" style="min-height: 36rem">
    <div class="row judul mt-3">
        <h2>Upload Hasil Lab </h2>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="img-profile">
                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/hasilLab/') . $pasien['hasil_lab'] ?>" class="card-img-top img-thumbnail">
                    <div class="card-body">
                        <?php echo $error; ?>
                        <?php echo form_open_multipart('upload/upload_hasil_lab/' . $pasien['id']); ?>
                        <input type="file" name="hasil_lab" class="mb-4" />
                        <br />
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <input type="submit" value="Upload" class="btn btn-primary" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>