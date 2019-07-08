<!--di bawah adalah Tabel-->
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
                        $idkelas = $_GET['kelas'];
                        if ($idkelas == "") {
                        	?>
                        	<script type="text/javascript">
                        		window.location.href="http://localhost/login/index.php?page=viewsiswa"
                        	</script>
                        	<?php
                        }
                            $sql3 = $koneksi->query("SELECT * FROM `siswa` WHERE `kelas`='$idkelas'");
                            while ($data = $sql3->fetch_assoc()) {
                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nisn'];?></td>
                                        <td><?php echo $data['nama'];?></td>
                                        <td><?php echo $data['gender'];?></td>
                                        
                                        <td>
                                            <a href="?page=viewsiswa&action=details&id=<?php echo $data['id'];?>" class="btn btn-success"><i class="fa fa-info"></i> Details</a>
                                            <a href="?page=viewsiswa&action=generate&nisn=<?php echo $data['nisn'];?>" class="btn btn-default"><i class="fa fa-qrcode"></i> Generate QRCode</a>
                                            <a href="?page=viewsiswa&action=edit&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="?page=viewsiswa&action=delete&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                        </tr>
                                        
                                    
                                    <?php }
                                     ?></tbody>
                                    </table></div></div></div></div></div>