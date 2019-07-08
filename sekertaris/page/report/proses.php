<div class="col-md-12">
	<form method="POST" action="?page=report&action=view">
	<div class="col-md-6">
            <div class="form-group">
            <label>Nama</label>
            <select name="nama" class="form-control">
                <?php
                $sql = $koneksi->query("SELECT * FROM `siswa` WHERE `kelas`='$kelas'");
                while ($data = $sql->fetch_assoc()) {
                 ?>
                <option><?php echo $data['nama']; ?></option>
                <?php } ?>
            </select>
        </div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Bulan</label>
			<select class="form-control" name="bulan">
			<option value="1">Januari</option>
			<option value="2">Febuari</option>
			<option value="3">Maret</option>
			<option value="4">April</option>
			<option value="5">Mei</option>
			<option value="6">Juni</option>
			<option value="7">Juli</option>
			<option value="8">Agustus</option>
			<option value="9">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
	</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<label>Tahun</label>
			<select class="form-control" name="tahun" placeholder="2018">
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				<option>2021</option>
				<option>2022</option>
				<option>2023</option>
				<option>2024</option>
				<option>2025</option>
				<option>2026</option>
				<option>2027</option>
				<option>2028</option>
			</select>
		</div>
	</div>
	<div class="col-md-6">
		<input type="submit" name="simpan" class="btn btn-primary">
	</div>
	</form>
</div>