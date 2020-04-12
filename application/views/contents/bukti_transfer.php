<div class="container" style="min-height: 35vw">
    <div class="row mt-5 justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="info-rekening text-center mt-0 pt-3 border border-primary">
                <p>Pembayaran Transfer Dikirim Ke : </p>
                <b>Bank Mandiri,</b>
                <p>115896327536</p>
                <p>a.n. MedOnLab</p>
            </div>

            <div class="card-body">
                <h5 class="card-title mb-5">Bukti Pembayaran</h5>
                <hr>
                <?php echo $error; ?>
                <?php echo form_open_multipart('upload/do_upload'); ?>
                <input type="file" name="img_bukti" class="mb-4" />
                <br />
                <div class="col-md-12">
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="upload" class="btn btn-primary" />
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning mt-3 text-center" role="alert">
                <p>Format Penamaan File : <b>"<?= str_replace(' ', '', $user['fullname']) . '_' . str_replace(' ', '', $user['id_pasien']) . '.jpg' ?>"</b> (Tanpa Spasi)</p>
            </div>
        </div>
    </div>
</div>