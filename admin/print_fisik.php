<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="../css/logo.png" sizes="16x16" type="image/png">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Arsip Surat Keluar</title>
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
        
        <strong>LAPORAN INFORMASI FISIK ARSIP </strong><br />
        <strong>PERIODE 2021 </strong></span></p></td>
    </tr>
    <tr>
      <td colspan="2"><hr style="border:double" /></td>
    </tr>
  </table>
  
  <table width="783" rules="all" border="1" >
    <tr><center>
      <th>No</th>
      <th>Kode Arsip</th>
      <th>Nomor Surat </th>
      <th>Tgl Surat</th>
      <th>Perihal Surat </th>
      <th>Ruang Simpan </th>
      <th>Kode Lemari</th>
      <th>Kode Ordner</th>
      <th>Kode Guide</th>
    </tr></center>
    <?php 
        $no = 1;
        $dt = mysqli_query($mysqli, "SELECT a.nomor_surat, a.tgl_surat, a.perihal_surat, a.ruang_simpan , b.kode_arsip, c.kode_lemari, d.kode_ordner, e.kode_guide FROM fisik_arsip a 
                                      LEFT JOIN kode_arsip b ON a.kode_arsip = b.id_kode
                                      LEFT JOIN ref_lemari c ON a.kode_lemari = c.id
                                      LEFT JOIN ref_ordner d ON a.kode_ordner = d.id
                                      LEFT JOIN ref_guide e ON a.kode_guide = e.id");
        while($data = mysqli_fetch_array($dt)){
    ?>
    <tr>
      <td><?php echo $no ?></td>
      <td><?php echo $data['kode_arsip'] ?></td>
      <td><?php echo $data['nomor_surat'] ?></td>
      <td><?php echo TanggalIndo($data['tgl_surat']) ?></td>
      <td><?php echo $data['perihal_surat'] ?></td>
      <td><?php echo $data['ruang_simpan'] ?></td>
      <td><?php echo $data['kode_lemari'] ?></td>
      <td><?php echo $data['kode_ordner'] ?></td>
      <td><?php echo $data['kode_guide'] ?></td>
    </tr>
    <?php $no++; } ?>
  </table>
  <p>&nbsp;</p>
</div>
</body>
</html>
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