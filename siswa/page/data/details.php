<?php
$id= $_GET['id'];
$sql = $koneksi->query("SELECT * FROM `siswa` WHERE id='$id'");

$show = $sql->fetch_assoc();
$idk = $show['kelas'];
$sql2 = $koneksi->query("SELECT `kelas` FROM `kelas` WHERE id='$idk'");
$row = $sql2->fetch_assoc();
?>
<div class="panel panel-primary">
<div class="panel-heading">
Form Details Siswa
</div>
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
	        <form role="form">
	            <fieldset disabled="disabled">
                <input type="hidden" name="id" value="<?php echo $id ?>"/>
			<div class="form-group">
			    <label for="disabledSelect">NISN</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $show['nisn']; ?>" disabled />
			</div>
			<div class="form-group">
			    <label for="disabledSelect">Nama</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $show['nama']; ?>" disabled />
			</div>
        <div class="form-group">
            <label>Jenis Kelamin :</label>
            <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Laki-Laki" <?=$show['gender']=="Laki-Laki" ? "checked" : ""?> />Laki-Laki
                </label>
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="Perempuan" <?=$show['gender']=="Perempuan" ? "checked" : ""?>/>Perempuan
                </label>
            </div>
        </div>
			<div class="form-group">
			    <label for="disabledSelect">Tempat Lahir</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $show['tempat']; ?>" disabled />
			</div>
			<div class="form-group">
			    <label for="disabledSelect">Tanggal Lahir</label>
			    <input class="form-control" id="disabledInput" type="date" value="<?php echo $show['tl']; ?>" disabled />
			</div>
			<div class="form-group">
			    <label for="disabledSelect">No. Telp</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $show['nope']; ?>" disabled />
			</div>
			<div class="form-group">
			    <label for="disabledSelect">Nama Bapak</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $show['ayah']; ?>" disabled />
			</div>
			<div class="form-group">
			    <label for="disabledSelect">Nama Ibu</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $show['ibu']; ?>" disabled />
			</div>
			<div class="form-group">
			    <label for="disabledSelect">Kelas</label>
			    <input class="form-control" id="disabledInput" type="text" value="<?php echo $row['kelas']; ?>" disabled />
			</div>

            </form>
    </div>
    </div>
    			<a style="content-align: center;" href="javascript:history.back()" class="btn btn-default"><i class="fa fa-arrow-circle-o-left"></i> Go Back</a>
</div>
</div>