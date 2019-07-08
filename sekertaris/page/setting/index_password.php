<?php
$sql = $koneksi->query("SELECT * FROM `user` WHERE `username` = '$sesi_username'");
while ($data = $sql->fetch_assoc()) {
?>
<div class="panel panel-primary">
    <div class="panel-heading">
         Edit Password Sekretaris
    </div>
    <div class="panel-body">
    	<div class="row">
    		<form method="POST" action="?page=changepassword&action=submit">
    		<div class="col-md-12">
    			<input type="hidden" name="id_user" value="<?php echo $data['id']; ?>">
				<div class="form-group">
		    		<label>Username :</label>
		    		<input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" disabled>
		    	</div>
		    	<div class="form-group">
		    		<label>Password saat ini :</label>
		    		<input type="password" name="old_pass" class="form-control">
		    	</div>
		    	<div class="form-group">
		    		<label>Password Baru :</label>
		    		<input type="password" name="password1" class="form-control">
		    	</div>
		    	<div class="form-group">
		    		<label>Konfirmasi Password Baru :</label>
		    		<input type="password" name="password2" class="form-control">
		    	</div>
		    	<div class="form-group">
		    		<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
		    	</div>
			</form>
    	</div>
    </div>
</div>
<?php } ?>