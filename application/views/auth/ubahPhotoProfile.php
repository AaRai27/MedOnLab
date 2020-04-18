<div class="container">
    <div class="row judul mt-3">
        <h2>Ubah Photo Profile</h2>
    </div>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="img-profile">
                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img-top img-thumbnail">
                    <div class="card-body">
                        <?php echo $error; ?>
                        <?php echo form_open_multipart('upload/ubah_photo_profile'); ?>
                        <input type="file" name="img_bukti" class="mb-4" />
                        <br />
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <input type="submit" value="Ubah" class="btn btn-primary" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>