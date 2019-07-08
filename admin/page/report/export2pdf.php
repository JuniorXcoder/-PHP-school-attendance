<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'test');
$kelas = $_GET['kelas'];
$start = $_GET['start'];
$end = $_GET['end'];
$no = 1;
$durasi = "$start - $end";
$sql1 = $koneksi->query("SELECT * FROM `kelas` WHERE `kelas`='$kelas' ORDER BY kelas");
while ($data1 = $sql1->fetch_assoc()) {
$idk = $data1['id'];
}
$content ='
<page>
<style type="text/javascript">
.table{border-collapse: collapse;}
.table th{padding: 10px 50px; background-color: #cccccc;}
.table td{padding: 10px 8px;}

</style>
<img src="../../../assets/img/logo_smk.png" alt="logo Smk" width="100" height="100" align="left">
    <h5 style="text-align: center; font-size:12px;"><strong>PEMERINTAH DAERAH PROVINSI JAWABARAT</strong><br>
        <strong>DINAS PENDIDIKAN</strong>
        <br>
        <strong>SMK NEGERI 1 CILEUNGSI</strong>
        <br>
        Jl. Raya Narogong Km 16.5 - Limusnunggal<br>
        Website: <u>www.smkn1cileungsi.sch.id</u> Email: <u>smk@smkn1cileungsi.sch.id</u><br>
        Cileungsi - 16820
    </h5>
<hr>';
    

$content .=' 
<p style="text-align: center;">
<strong><u>Laporan Absensi Siswa</u></strong>
</p>
<p>
<strong>Kelas :</strong> '.$kelas.' <br>
<strong>Tanggal :</strong> '.$durasi.' <br>
</p>
<table border="1" class="table">
    <tr>
		<th>No</th>
		<th>NISN</th>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Keterangan</th>
    </tr>';
$sql = $koneksi->query("SELECT * FROM `absensi` WHERE `kelas`='$idk' AND `tanggal` BETWEEN '$start' and '$end' ORDER BY nama");
while ($data = $sql->fetch_assoc()) {
$content .='<tr>
    	<td>'.$no++.'</td>
    	<td>'.$data['nisn'].'</td>
    	<td>'.$data['nama'].'</td>
    	<td>'.$data['tanggal'].'</td>
    	<td>'.$data['status'].'</td>
    </tr>';
}
$content .='</table>
</page>';
require_once('../../../assets/html2pdf/html2pdf.class.php');
$html2pdf = new Html2Pdf('P', 'A4', 'fr');
$html2pdf->writeHTML($content);
$html2pdf->output();?>