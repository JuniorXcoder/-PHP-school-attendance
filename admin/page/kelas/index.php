<div class="panel panel-primary">
<div class="panel-heading">
Form Input Kelas
</div>
<div class="panel-body">

    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="page/kelas/submit_add.php">
        <div class="form-group">
            <label>Kelas :</label>
            <input type="text" class="form-control" name="kelas" required/>
            <label style="color: red; font-size: 80%;">*Note: Semua Huruf Harus Menggunakan Huruf Kapital Contoh: </label><label style="color: green;">X-TKJ1</label>
        </div>
       <div class="form-group">
            <label>Wali Kelas :</label>
            <input type="text" class="form-control" name="wali" required/>
        </div>
                <div>
                     <input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>
            </form>
    </div>
    </div>
</div>
</div>