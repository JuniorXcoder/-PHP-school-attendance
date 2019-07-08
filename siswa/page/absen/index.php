<?php
$tanggal = date("d/m/Y");
$kelas = $_SESSION['kelas'];
?>
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Absensi Tanggal <?php echo $tanggal ; ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="border: 10px solid : #ddd !important;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        $no = 1;
                                        $sql = $koneksi->query("SELECT * FROM `absensi` WHERE `tanggal`='$tanggal' AND `kelas`='$kelas' ORDER BY kelas");
                                        while ($data=$sql -> fetch_assoc()){
                                               $sql2 = $koneksi->query("SELECT * FROM `kelas` WHERE `id`='$kelas' ORDER BY kelas");
                                            while ($row= $sql2->fetch_assoc()) {
                                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nisn'];?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $row['kelas'];?></td>
                                        <td><?php echo $data['status'];?></td> 
                                     </tr>
                                        
                                    
                                    <?php }} ?></tbody>
                                    </table></div><a href="?page=inputabsensi" class="btn btn-success" style="margin-top: 10px"><i class="glyphicon glyphicon-plus"></i> Absen Siswa</a></div></div></div></div>