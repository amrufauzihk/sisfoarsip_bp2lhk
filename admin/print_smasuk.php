<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="../css/logo.png" sizes="16x16" type="image/png">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Arsip Dokumentasi</title>
<?php include 'config/connect-db.php'; ?>
<style type="text/css">
<!--
.style1 {font-size: 20px}
-->
</style>
</head>

<body>
<div align="center">
  <table width="793">
    <tr>
      <td width="124" ><img src="../css/logo.png" alt="q" width="100" height="100" /></td>
      <td width="657" ><p align="center"><span class="style1"><strong>BALAI PENELITIAN DAN PENGEMBANGAN LINGKUNGAN HIDUP DAN KEHUTANAN MAKASSAR <br />
        
        <strong>LAPORAN ARSIP SURAT MASUK </strong><br />
        <strong>PERIODE 2021 </strong></span></p></td>
    </tr>
    <tr>
      <td colspan="2"><hr style="border:double" /></td>
    </tr>
  </table>
  
  <table width="783" rules="all" border="1" align="center">
    <tr><center>
      <th>No</th>
      <th>Kode Arsip</th>
      <th>Asal Surat </th>
      <th>Tgl Surat </th>
      <th>Nomor Surat </th>
      <th>Isi Surat</th>
      <th>Keterangan</th>
	  </b></center>
    </tr>
    <?php 
        $no = 1;
        $dt = mysqli_query($mysqli, "SELECT a.kode_arsip AS kode_arsip2,a.id_surat, a.no_urut, a.asal_surat, a.tgl_surat, a.no_surat, b.kode_arsip AS kode_arsip1, a.isi_surat, a.keterangan, a.file_disposisi, a.file_surat FROM smasuk a LEFT JOIN kode_arsip b ON a.kode_arsip = b.id_kode");
        while($data = mysqli_fetch_array($dt)){

    ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $data['kode_arsip2'] ?></td>
      <td><?php echo $data['asal_surat'] ?></td>
      <td><?php echo TanggalIndo($data['tgl_surat']) ?></td>
      <td><?php echo $data['no_surat'] ?></td>
      <td><?php echo $data['isi_surat'] ?></td>
      <td><?php echo $data['keterangan'] ?></td>
    </tr>
    <?php $no++; } ?>
  </table>
  <p>&nbsp;</p>
</div>
</body>
<?php 
function TanggalIndo($date){
  $BulanIndo = array( 
                    "Januari", 
                    "Februari", 
                    "Maret", 
                    "April", 
                    "Mei", 
                    "Juni", 
                    "Juli", 
                    "Agustus", 
                    "September", 
                    "Oktober", 
                    "November", 
                    "Desember"
                    );

  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);

  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
} ?>
</html>
