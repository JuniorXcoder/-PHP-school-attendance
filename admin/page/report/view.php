                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Absensi Tanggal
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
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                    $no = 1;
                    $submit = $_POST['submit'];
                    if ($submit) {
                        $kelas = $_POST['kelas'];
                        $sql1 = $koneksi->query("SELECT * FROM `kelas` WHERE `kelas`='$kelas' ORDER BY kelas");
                        while ($data1 = $sql1->fetch_assoc()) {
                            $idk = $data1['id'];
                        }
                        $start = $_POST['start'];
                        $end = $_POST['end'];
                        $sql = $koneksi->query("SELECT * FROM `absensi` WHERE `kelas`='$idk' AND `tanggal` BETWEEN '$start' and '$end' ORDER BY nama");
                        while ($data = $sql -> fetch_assoc()) {

                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nisn'];?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $kelas;?></td>
                                        <td><?php echo $data['tanggal'];?></td>
                                        <td><?php echo $data['status'];?></td>
                                        </tr>
                                        
                                    
                                    <?php 
                                    }
                                    } ?></tbody>
                                    </table></div>
                                    <a style="margin-top: 5px;" class="btn btn-default" href="page/report/export2pdf.php?kelas=<?php echo $kelas?>&start=<?php echo $start?>&end=<?php echo $end ?>"><i class="fa fa-print"></i> Export To PDF</a>
                                </div>
                                </div>