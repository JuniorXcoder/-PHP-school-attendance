<?php
$tanggal = date("d/m/Y");
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<div class="row">
            <div class="col-md-12">
                <FORM method="post" action="?page=inputabsensi&action=submit">
                    <div class="col-md-6">
                        <div class="form-group">             
                            <label>Pilih Siswa</label><br> <?php
                                $combo="<select name=nama class=form-control>"; $sql = "SELECT * FROM `siswa` WHERE `kelas`='$kelas' ORDER BY nama";
                                if($result=$koneksi->query($sql)){
                                if($result->num_rows)
                                {
                                while($row=$result->fetch_object())
                                {
                                $combo.="<option>".$row->nama."</option>";
                                }
                                $result->free();
                                }
                                }$combo.="</select>";
                                echo $combo;
                                ?>

                        </div>
                    </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <select name="keterangan" class="form-control">
                            <option>Hadir</option>
                            <option>Alfa</option>
                            <option>Izin</option>
                            <option>Sakit</option>
                            <option>PKL</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                <input type="submit" name="simpan" class="btn btn-primary">
                </FORM>
            </div>  