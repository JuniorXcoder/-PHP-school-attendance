<?php
$nama = $_POST['nama'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$priode = "$bulan/$tahun";
$sql = $koneksi->query("SELECT * FROM `siswa` WHERE `nama`='$nama' AND `kelas`=$kelas");
while ($data1 = $sql->fetch_assoc()) {
	$nisn = $data1['nisn'];
}
?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="border: 10px solid : #ddd !important;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                    $no = 1;
                            $sql2 = $koneksi->query("SELECT * FROM `absensi` WHERE `nisn`='$nisn' AND `tanggal` LIKE '%$priode%'");
                            while ($data = $sql2->fetch_assoc()) {
                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nisn'];?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $data['tanggal'];?></td>
                                        <td><?php echo $data['status'];?></td>
                                    </tr>
                                        
                                    
                                    <?php }
                                     ?></tbody>
                                    </table>
                                </div>
                            <a href="./page/report/print2pdf.php?nisn=<?php echo $nisn; ?>&bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn btn-default" style="margin-top: 10px;"><i class="fa fa-print"></i> Export to PDF</a>
                            </div>
                        </div>
</div>