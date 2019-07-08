<?php
$nisn = $_GET['nisn'];
$koneksi = new mysqli ("localhost", "root", "", "test");
$sql1 = $koneksi->query("SELECT * FROM `siswa` WHERE `nisn`=$nisn");
$data = $sql1->fetch_assoc();
$kelas = $data['kelas'];
$sql2 = $koneksi->query("SELECT * FROM `kelas` WHERE `id`=$kelas");
$kelas1 = $sql2->fetch_assoc();
$content ='
<page>
<img src="../../../assets/img/logo_smk.png" alt="logo Smk" width="60" height="60" align="left">
    <h5 style="text-align: center; font-size:8px;"><strong>PEMERINTAH DAERAH PROVINSI JAWABARAT</strong><br>
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
<img src="https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl='.$data['nisn'].'" align="left" width="85" height="85" style="margin-left: 15px; margin-right: 10px;">
<p>
<strong>Nisn : </strong>'.$data['nisn'].'<br>
<strong>Nama : </strong>'.$data['nama'].'<br>
<strong>TTL : </strong>'.$data['tempat'].', '.$data['tl'].'<br>
<strong>kelas : </strong>'.$kelas1['kelas'].'<br>
</p>
</page>';
require_once('../../../assets/html2pdf/html2pdf.class.php');
$html2pdf = new Html2Pdf('L', 'A7', 'fr');
$html2pdf->writeHTML($content);
$html2pdf->output();?>