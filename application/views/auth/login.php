    <!-- Content -->
    <div class="container">
    	<div class="row">
    		<div class="image-logo d-flex justify-contet-center mx-auto">
    			<img src="<?= base_url('assets/img/logo-lands.png') ?>">
    		</div>
    	</div>
    	<div class="row flash mx-auto">
    		<div class="col-md-12">
    			<div class="col-md-12">
    				<div class="text-center justify-content-center">
    					<?= $this->session->flashdata('pesan'); ?>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="row mt-0 kotak">
    		<div class="col-md-12">
    			<div class="kotak-header">
    				<h2>Login</h2>
    			</div>
    			<div class="form-group">
    				<form action="<?= base_url('auth') ?>" method="post">
    					<input type="text" name="email" placeholder="Email"> <!-- Awalnya username -->
    					<input type="password" name="password" placeholder="Password">
    					<button type="submit">Login</button>
    					<br><br>
    					<p>Don't have an account? <a href="<?= base_url('auth/registration') ?>"> Register Here</a></p>
    				</form>
    			</div>
    			<?= validation_errors(); ?>
    		</div>
    	</div>
    </div>
    <!-- Content -->