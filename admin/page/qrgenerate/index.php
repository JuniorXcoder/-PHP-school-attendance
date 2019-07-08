<?php
class QRGenerator { 

    protected $size; 
    protected $data; 
    protected $encoding; 
    protected $errorCorrectionLevel; 
    protected $marginInRows; 
    protected $debug; 

    public function __construct($data='http://www.phpgang.com',$size='150',$encoding='UTF-8',$errorCorrectionLevel='L',$marginInRows=4,$debug=false) { 

        $this->data=urlencode($data); 
        $this->size=($size>100 && $size<800)? $size : 300; 
        $this->encoding=($encoding == 'Shift_JIS' || $encoding == 'ISO-8859-1' || $encoding == 'UTF-8') ? $encoding : 'UTF-8'; 
        $this->errorCorrectionLevel=($errorCorrectionLevel == 'L' || $errorCorrectionLevel == 'M' || $errorCorrectionLevel == 'Q' || $errorCorrectionLevel == 'H') ?  $errorCorrectionLevel : 'L';
        $this->marginInRows=($marginInRows>0 && $marginInRows<10) ? $marginInRows:4; 
        $this->debug = ($debug==true)? true:false;     
    }
public function generate(){ 

        $QRLink = "https://chart.googleapis.com/chart?cht=qr&chs=".$this->size."x".$this->size.                            "&chl=" . $this->data .  
                   "&choe=" . $this->encoding . 
                   "&chld=" . $this->errorCorrectionLevel . "|" . $this->marginInRows; 
        if ($this->debug) echo   $QRLink;          
        return $QRLink; 
    }
}
?>
<div class="panel panel-primary" style="margin-right: 500px;">
<div class="panel-heading">
Kartu Absensi Siswa
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-12" style="padding-bottom: 5px;">
<?php
$nisn = $_GET['nisn'];
$sql = $koneksi->query("SELECT * FROM `siswa` WHERE nisn='$nisn'");
$show = $sql->fetch_assoc();
$kelas = $show['kelas'];
$sql2 = $koneksi->query("SELECT * FROM `kelas` WHERE id='$kelas'");
$data = $sql2->fetch_assoc();
	$ex3 = new QRGenerator($nisn); 
	echo "<img src=".$ex3->generate()." align=left>";
?>
    <p><b>Nisn:</b> <?php echo $nisn ?><br>
    <b>Nama: </b> <?php echo $show['nama']; ?> <br>
    <b>Kelas: </b><?php echo $data['kelas']; ?><br>
    <b>TTL: </b><?php echo $show['tempat']; ?>, <?php echo $show['tl']; ?></p><br>
</div></div></div></div>

<a href="page/qrgenerate/convert.php?nisn=<?php echo $nisn ?>" class="btn btn-default"><i class="fa fa-print"></i> Print Kartu Absensi</a>