<?php
$id= $_GET['id'];
$sql = $koneksi->query("SELECT * FROM `Kelas` WHERE id='$id'");

$show = $sql->fetch_assoc()
?>
<div class="panel panel-primary">
<div class="panel-heading">
Form Edit Kelas
</div>
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="page/kelas/submit_edit.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div class="form-group">
            <label>Kelas :</label>
            <input type="text" class="form-control" name="kelas" value="<?php echo $show['kelas'] ?>" required/>
        </div>
       <div class="form-group">
            <label>Wali Kelas :</label>
            <input type="text" class="form-control" name="wali" value="<?php echo $show['wali'] ?>" required/>
        </div>
        <?php
        $sqlCommand1 = "SELECT COUNT(*) FROM `siswa` WHERE `kelas`='$id'"; 
        $query1 = mysqli_query($koneksi, $sqlCommand1) or die (mysqli_error($koneksi)); 
        $row1 = mysqli_fetch_row($query1);
        ?>
       <div class="form-group">
            <label>Jumlah Siswa :</label>
            <input type="text" class="form-control" name="jumlah" value="<?php echo $row1[0];  ?>" disabled/>
        </div>

                <div>
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
            </form>
    </div>
    </div>
</div>
</div>