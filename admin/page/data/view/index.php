<!--  jQuery -->
<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="assets/js/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.css"/>

    <form method="post" style="padding-bottom: 5px;">
        <h2 style="text-align: center;">View Data siswa</h2>
    <div class="form-group">             
        <label>Pilih Kelas</label><br> <?php
            $combo="<select name=kelas class=form-control>"; $sql = "SELECT * from kelas ORDER BY kelas";
            if($result=$koneksi->query($sql)){
            if($result->num_rows)
            {
            while($row=$result->fetch_object())
            {
            $combo.="<option>".$row->kelas."</option>";
            }
            $result->free();
            }
            }$combo.="</select>";
            echo $combo;
            ?>

        </div>
        <div>
        <input class="btn btn-primary" type="submit" name="submit" value="Lihat Data">
        </div></form></br>

        <?php
        $submit = isset($_POST['submit']);
        if ($submit) {
            $kelas = $_POST['kelas'];
            $sql1 = $koneksi->query("SELECT * FROM `kelas` WHERE kelas='$kelas'"); 
            while ($data = $sql1->fetch_assoc()) {
                ?>
                <script type="text/javascript">
                    window.location.href="index.php?page=viewsiswa&action=view&kelas=<?php echo $data['id']; ?>"
                </script>
                <?php
            }
        }
        ?>