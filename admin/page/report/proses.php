<!--  jQuery -->
<script type="text/javascript" src="../assets/js/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="../assets/js/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.css"/>

    <form method="post" style="padding-bottom: 5px;" action="?page=report&action=view">
        <h2 style="text-align: center;">Report Absensi siswa</h2>
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
        <div id="sandbox-container" class="form-group" style="padding-bottom: 5px;">        
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="input-sm form-control" name="start" required />
                <span class="input-group-addon">Sampai</span>
                <input type="text" class="input-sm form-control" name="end" required/>
            </div>
        </div>

        <div>
        <input class="btn btn-primary" type="submit" name="submit" value="Lihat report">
        </div></form></br>
        <script type="text/javascript">
            $('#sandbox-container .input-daterange').datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            todayHighlight: true
            });
        </script>