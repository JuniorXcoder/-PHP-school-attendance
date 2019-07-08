<!--  jQuery -->
<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="assets/js/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.css"/>
<?php
$id= $_GET['id'];
$sql = $koneksi->query("SELECT * FROM `siswa` WHERE id='$id'");

$show = $sql->fetch_assoc()
?>
<div class="panel panel-primary">
<div class="panel-heading">
Form Edit Alat
</div>
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="page/data/view/submit_edit.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn" value="<?php echo $show['nisn'];?>" required/>
        </div>
       <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $show['nama']; ?>" required/>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" id="optionsRadios1" value="Laki-Laki" <?=$show['gender']=="Laki-Laki" ? "checked" : ""?> />Laki-Laki
                </label>
                <label>
                    <input type="radio" name="gender" id="optionsRadios1" value="Perempuan" <?=$show['gender']=="Perempuan" ? "checked" : ""?>/>Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat" value="<?php echo $show['tempat']; ?>" required/>
        </div>
        <label class="control-label" for="date">Tanggal Lahir</label>
        <div class="form-group input-group">
            <input type="text" class="form-control" name="date" value="<?php echo $show['tl'] ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <div class="form-group">
            <label>No. Telp</label>
            <input type="text" class="form-control" name="nope" value="<?php echo $show['nope']; ?>" required/>
        </div>
        <div class="form-group">
            <label>Nama Bapak</label>
            <input type="text" class="form-control" name="ayah" value="<?php echo $show['ayah']; ?>" required/>
        </div>
        <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" class="form-control" name="ibu" value="<?php echo $show['ibu']; ?>" required/>
        </div>
            <div class="form-group">
                <label>Kelas</label>
<?php 
$combo="<select name=kelas class=form-control>";
$sql = "SELECT * from kelas ORDER BY `kelas`";

if($result=$koneksi->query($sql)){
    if($result->num_rows)
    {
        while($row=$result->fetch_object())
        {
            $combo.="<option>".$row->kelas."</option>";
        }
        $result->free();
    }
}$combo.="</select>";
echo $combo;
?>
        </div>
                <div>
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
            </form>
    </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        todayBtn: "linked",
      };
      date_input.datepicker(options);
    })
</script>