<?php 
$kelas = $_GET['kelas'];
$sql = $koneksi->query("SELECT * FROM `kelas` WHERE `kelas`='$kelas'");
while ($data = $sql->fetch_assoc()) {
?>
<div class="panel panel-primary">
<div class="panel-heading">
Form Siswa
</div>
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="page/kelas/submit_siswa.php">
            	<input type="hidden" name="kelas" value="<?php echo $data['id']; } ?>">
        <div class="form-group">
            <label>Nama Lengkap :</label>
            <input type="text" class="form-control" name="nama" required/>
        </div>
        <div class="form-group">
            <label>Jabatan :</label>
            <input type="text" name="jabatan" class="form-control" value="Siswa" disabled>
        </div>
        <div class="form-group">
            <label>Username :</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password :</label>
            <input type="password" name="password" class="form-control" required>
        </div>
       <div class="form-group">
            <label>Kelas :</label>
            <input type="text" class="form-control" required name="kelas" value="<?php echo $kelas ?>" disabled/>
        </div>
                <div>
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
            </form>
    </div>
    </div>
</div>
</div>