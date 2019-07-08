<?php
$kelas = $_SESSION['kelas'];
?><!--di bawah adalah Tabel-->
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
                                            <th>Jenis Kelamin</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                    $no = 1;
                            $sql3 = $koneksi->query("SELECT * FROM `siswa` WHERE `kelas`='$kelas'");
                            while ($data = $sql3->fetch_assoc()) {
                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nisn'];?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $data['gender'];?></td>
                                        
                                        <td>
                                            <a href="?page=datasiswa&action=details&id=<?php echo $data['id'];?>" class="btn btn-success"><i class="fa fa-info"></i> Details</a>
                                        </td>
                                        </tr>
                                        
                                    
                                    <?php }
                                     ?></tbody>
                                    </table></div></div></div></div></div>