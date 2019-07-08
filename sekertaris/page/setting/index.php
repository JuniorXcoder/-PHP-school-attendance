<?php
$sql = $koneksi->query("SELECT * FROM `user` WHERE `username` = '$sesi_username'");
while ($data = $sql->fetch_assoc()) {
?>
<div class="panel panel-primary">
    <div class="panel-heading">
         Edit Data Sekretaris
    </div>
    <div class="panel-body">
    	<div class="row">
    		<form method="POST" action="?page=setting&action=submit">
    		<div class="col-md-12">
    			<input type="hidden" name="id_user" value="<?php echo $data['id']; ?>">
    			<div class="form-group">
    				<label>Nama :</label>
    				<input type="text" name="nama" class="form-control" value="<?php echo $data['nama'];?>">
    			</div>
    			<div class="form-group">
    				<label>Jabatan :</label>
    				<input type="text" name="jabatan" class="form-control" value="<?php echo $data['level'];?>" disabled>
    			</div>
		    	<div class="form-group">
		    		<label>Kelas :</label>
		    		<input type="text" name="kelas" class="form-control" value="<?php echo $nkelas['kelas'];?>" disabled>
		    	</div>
				<div class="form-group">
		    		<label>Username :</label>
		    		<input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" >
		    	</div>
		    	<div class="form-group">
		    		<label>Password saat ini :</label>
		    		<input type="password" name="password" class="form-control">
		    	</div>
		    	<div class="form-group">
		    		<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
		    	</div>
			</form>
		    	<div class="form-group">
		    		<label>Ingin mengubah Kata sandi? </label>
		    		<a href="?page=changepassword">klik disini</a>
		    	</div>
    	</div>
    </div>
</div>
<?php } ?>