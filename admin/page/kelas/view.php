<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="border: 10px solid : #ddd !important;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        
                                        $no = 1;
                                        $sql = $koneksi->query("Select * from kelas");
                                        while ($data=$sql -> fetch_assoc()){
                                            $idk = $data['id'];
                                            $sqlCommand1 = "SELECT COUNT(*) FROM `siswa` WHERE `kelas`='$idk'"; 
                                            $query1 = mysqli_query($koneksi, $sqlCommand1) or die (mysqli_error($koneksi)); 
                                            $row1 = mysqli_fetch_row($query1);
                                                
                                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['kelas'];?></td>
                                        <td><?php echo $data['wali'];?></td>
                                        <td><?php echo $row1[0];?></td>
                                        
                                        <td>
                                            <a href="?page=viewkelas&action=edit&id=<?php echo $data['id'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="?page=viewkelas&action=delete&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                            <a href="?page=viewsiswa&action=view&kelas=<?php echo $data['id'];?>" class="btn btn-success"><i class="fa fa-external-link"></i> View Kelas</a>
                                        </td>
                                        </tr>
                                        
                                    
                                    <?php } ?></tbody>
                                    </table></div></div></div></div></div>