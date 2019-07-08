<?php
$koneksi = new mysqli ("localhost", "id8349832_db_test", "admin", "id8349832_db_test");
$nisn = $_GET['nisn'];
$bulan = $_GET['bulan'];
include "bulan.php";
$tahun = $_GET['tahun'];
$priode = "$bulan/$tahun";
$sql2 = $koneksi->query("SELECT * FROM `absensi` WHERE `nisn`='$nisn' AND `tanggal` LIKE '%$priode%'");
$nama = $sql2->fetch_assoc();
$content = '
<style type="text/javascript">
.table{border-collapse: collapse;}
.table th{background-color: #cccccc; margin-left: 15px; margin-right: 15px;}
.tableket {border-collapse: collapse;}
.tableket th{padding: 5px 7px; background-color: #cccccc; margin-left: 15px; margin-right: 15px;}
</style>
';

$content .='
<page>
<img src="../../../assets/img/logo_smk.png" alt="logo Smk" width="110" height="110" align="left">
    <h5 style="text-align: center;"><strong>PEMERINTAH DAERAH PROVINSI JAWABARAT</strong><br>
        <strong>DINAS PENDIDIKAN</strong><br>
        <strong>SMK NEGRI 1 CILEUNGSI</strong><br>
        Jl. Raya Narogong Km 16.5 - Limusnunggal<br>
        Website: <u>www.smkn1cileungsi.sch.id</u> Email: <u>smk@smkn1cileungsi.sch.id</u><br>
        Cileungsi - 16820
    </h5>
<hr>
    <p align=center><strong><u>Report Absensi</u></strong></p>
    <p><strong>Nama : </strong>'.$nama['nama'].'<br>
    <strong>Bulan : </strong>'.$nb.' '.$tahun.'</p>

<table border="1" class="table">
    <tr>
		<th style="padding: 10px 5px;">No</th>
		<th style="padding: 10px 35px;">NISN</th>
		<th style="padding: 10px 150px;">Nama</th>
		<th style="padding: 10px 35px;">Tanggal</th>
		<th style="padding: 10px 5px;">Keterangan</th>
    </tr>';    
    $no = 1;
	$sql = $koneksi->query("SELECT * FROM `absensi` WHERE `nisn`='$nisn' AND `tanggal` LIKE '%$priode%'");
    while ($data=$sql -> fetch_assoc()){
        include "warna_ket.php";
$content .='
        <tr>
	        <td>'.$no++.'</td>
	        <td>'.$data['nisn'].'</td>
	        <td>'.$data['nama'].'</td>
	        <td>'.$data['tanggal'].'</td>
	        <td style="background-color: '.$color.'; text-align: center;">'.$text.'</td>
        </tr>';
    }
$content .='</table>
<br>
<br>
<p><i><strong>Keterangan :</strong></i></p>
<table border="1" class="tableket">
<tr>
    <th>Warna</th>
    <th>Huruf</th>
    <th>Keterangan</th>
</tr>
<tr style="text-align: center;">
    <td style="background-color: #c6efce"></td>
    <td>H</td>
    <td>Hadir</td>
</tr>
<tr style="text-align: center;">
    <td style="background-color: #ccc0da"></td>
    <td>I</td>
    <td>Izin</td>
</tr>
<tr style="text-align: center;">
    <td style="background-color: #ffeb9c"></td>
    <td>S</td>
    <td>Sakit</td>
</tr>
<tr style="text-align: center;">
    <td style="background-color: #ffc7ce"></td>
    <td>A</td>
    <td>Alfa</td>
</tr>
<tr style="text-align: center;">
    <td style="background-color: #92cddc"></td>
    <td>P</td>
    <td>PKL</td>
</tr>
</table>
</page>';

require_once('../../../assets/html2pdf/html2pdf.class.php');
$html2pdf = new Html2Pdf('P', 'A4', 'fr');
$html2pdf->writeHTML($content);
$html2pdf->output();
?>