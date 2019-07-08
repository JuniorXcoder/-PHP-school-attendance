<?php
$kelas = $_SESSION['kelas'];
?>
<div id="app" class="panel panel-primary">
<div class="panel-heading">
Form Input Absensi
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="?page=inputabsensi&action=submit">
                <input type="hidden" name="kelas" value="<?php echo $kelas ?>">
        <h4 style="text-align: center;">QRCode Scanner Webcam</h4>
        <div>
        <video id="preview"></video>
      </div>
        <div class="form-group">
            <label>NISN</label>
            <select name="nisn" class="form-control">
        <OPTION class="form-control" v-for="scan in scans" :key="scan.date" :title ="scan.content">{{ scan.content }}</OPTION></select>
        </div>
    <div>
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
            </form>
    </div>
    </div>
</div>
</div>
<script src="../../assets/js/app.js"></script>