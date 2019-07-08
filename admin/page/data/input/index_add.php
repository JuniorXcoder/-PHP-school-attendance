<!--  jQuery -->
<script type="text/javascript" src="../../assets/js/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="../../assets/js/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.css"/>
<div class="panel panel-primary">
<div class="panel-heading">
Form Tambah Data
</div>
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="page/data/input/submit_add.php">
        <div class="form-group">
            <label>NISN</label>
            <input type="text" class="form-control" name="nisn" required/>
        </div>
       <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required/>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label></br>
            <label>
                <input type="radio" name="gender" id="optionsRadios1" value="Laki-Laki"/>Laki-Laki
                </label>
                <label>
                <input type="radio" name="gender" id="optionsRadios1" value="Perempuan"/>Perempuan
            </label>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat" required/>
        </div>
            <label class="control-label" for="date">Tanggal Lahir</label>
        <div class="form-group input-group">
            <input type="text" class="form-control" name="date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
        <div class="form-group">
            <label>No. Telp</label>
            <input type="text" class="form-control" name="nope" required/>
        </div>
        <div class="form-group">
            <label>Nama Bapak</label>
            <input type="text" class="form-control" name="ayah" required/>
        </div>
        <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" class="form-control" name="ibu" required/>
        </div>

            <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control">
                <?php
                $sql = $koneksi->query("SELECT * from kelas ORDER BY `kelas`");
                while ($data = $sql->fetch_assoc()) {
                 ?>
                <option><?php echo $data['kelas']; ?></option>
                <?php } ?>
            </select>
        </div>
                <div>
                     <input type="reset" name="reset" value="Reset" class="btn btn-default">
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