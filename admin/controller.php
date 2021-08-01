<?php
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
 
	$page    = $_GET['page'];
	$action  = $_GET['action'];

	/* KODE ARSIP */
	if($page == "kode-arsip" && $action == "insert")
	{

		 $kode = $_POST['kode'];
		 $keterangan = $_POST['perihal'];
		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO kode_arsip SET
											kode_arsip = '$kode', 
											keterangan = '$keterangan'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "kode-arsip" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode'];
		$keterangan = $_POST['perihal'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE kode_arsip SET
				  									kode_arsip = '$kode', 
													keterangan = '$keterangan'
													WHERE id_kode = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "kode-arsip" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM kode_arsip WHERE id_kode = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* KODE LEMARI */
	if($page == "kode-lemari" && $action == "insert")
	{

		 $kode = $_POST['kode_lemari'];
		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO ref_lemari SET
											kode_lemari = '$kode'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "kode-lemari" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode_lemari'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE ref_lemari SET
				  									kode_lemari = '$kode'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "kode-lemari" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM ref_lemari WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* KODE ORDNER */
	if($page == "kode-ordner" && $action == "insert")
	{

		 $kode = $_POST['kode_ordner'];
		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO ref_ordner SET
											kode_ordner = '$kode'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "kode-ordner" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode_ordner'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE ref_ordner SET
				  									kode_ordner = '$kode'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "kode-ordner" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM ref_ordner WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* KODE RUANGAN */
	if($page == "kode-ruangan" && $action == "insert")
	{

		 $kode = $_POST['kode'];
		 $nama = $_POST['nama'];
		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO ref_ruangan SET
											kode = '$kode',
											nama = '$nama'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "kode-ruangan" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode'];
		 $nama = $_POST['nama'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE ref_ruangan SET
				  									kode = '$kode',
													nama = '$nama'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "kode-ruangan" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM ref_ruangan WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* KODE GUIDE */
	if($page == "kode-guide" && $action == "insert")
	{

		 $kode = $_POST['kode_guide'];
		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO ref_guide SET
											kode_guide = '$kode'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "kode-guide" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode_guide'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE ref_guide SET
				  									kode_guide = '$kode'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "kode-guide" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM ref_guide WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* FISIK ARSIP */
	if($page == "fisik-arsip" && $action == "insert")
	{
		$kode_arsip 	= $_POST['kode_arsip'];
		$nomor_surat 	= $_POST['nomor_surat'];
		$tgl_surat 		= $_POST['tgl_surat'];
		$perihal_surat 	= $_POST['perihal_surat'];
		$ruang_simpan 	= $_POST['ruang_simpan'];
		$kode_lemari 	= $_POST['kode_lemari'];
		$kode_ordner 	= $_POST['kode_ordner'];
		$kode_guide 	= $_POST['kode_guide'];
		$page 			= $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO fisik_arsip SET
											kode_arsip = '$kode_arsip',
											nomor_surat = '$nomor_surat',
											tgl_surat = '$tgl_surat',
											perihal_surat = '$perihal_surat',
											ruang_simpan = '$ruang_simpan',
											kode_lemari = '$kode_lemari',
											kode_ordner = '$kode_ordner',
											kode_guide = '$kode_guide'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "fisik-arsip" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode_arsip 	= $_POST['kode_arsip'];
		$nomor_surat 	= $_POST['nomor_surat'];
		$tgl_surat 		= $_POST['tgl_surat'];
		$perihal_surat 	= $_POST['perihal_surat'];
		$ruang_simpan 	= $_POST['ruang_simpan'];
		$kode_lemari 	= $_POST['kode_lemari'];
		$kode_ordner 	= $_POST['kode_ordner'];
		$kode_guide 	= $_POST['kode_guide'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE fisik_arsip SET
				  							kode_arsip = '$kode_arsip',
											nomor_surat = '$nomor_surat',
											tgl_surat = '$tgl_surat',
											perihal_surat = '$perihal_surat',
											ruang_simpan = '$ruang_simpan',
											kode_lemari = '$kode_lemari',
											kode_ordner = '$kode_ordner',
											kode_guide = '$kode_guide' WHERE id_arsip = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "fisik-arsip" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM fisik_arsip WHERE id_arsip = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* SURAT MASUK */
	if($page == "surat-masuk" && $action == "insert")
	{

		 $page 		= $_POST['page'];
		$no_urut 	= $_POST['no_urut'];
		$kode_arsip = $_POST['kode_arsip'];
		$asal_surat = $_POST['asal_surat'];
		$tgl_surat 	= $_POST['tgl_surat'];
		$no_surat 	= $_POST['no_surat'];
		$isi_surat 	= $_POST['isi_surat'];
		$keterangan = $_POST['keterangan'];
		
			$type	       = $_FILES["file_disposisi"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-disposisi.pdf";
			$namaSementara = $_FILES['file_disposisi']['tmp_name'];
			$size          = $_FILES['file_disposisi']['size'];
			$dirUpload     = "assets/pdf/disposisi/";
			$file_disposisi = $dirUpload.$namaFile;
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

			$type1	       = $_FILES["file_surat"]["type"];
		  	$namaFile1      = "file-".date('Y-m-d H-i-s')."-surat.pdf";
			$namaSementara1 = $_FILES['file_surat']['tmp_name'];
			$size1         = $_FILES['file_surat']['size'];
			$dirUpload1     = "assets/pdf/surat/";
			move_uploaded_file($namaSementara1, $dirUpload1.$namaFile1);

		$result = mysqli_query($mysqli, "INSERT INTO smasuk SET
											no_urut = '$no_urut', 
											kode_arsip = '$kode_arsip', 
											asal_surat = '$asal_surat', 
											tgl_surat = '$tgl_surat', 
											no_surat = '$no_surat', 
											isi_surat = '$isi_surat', 
											keterangan = '$keterangan', 
											file_disposisi = 'assets/pdf/disposisi/$namaFile', 
											file_surat = 'assets/pdf/surat/$namaFile1'"); 
		$result = mysqli_query($mysqli, "UPDATE tb_hitung SET smasuk = '$no_urut' WHERE id = 1"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "surat-masuk" && $action == "update")
	{

		$ID 		= $_POST['id'];
		$page 		= $_POST['page'];
		$no_urut 	= $_POST['no_urut'];
		$kode_arsip = $_POST['kode_arsip'];
		$asal_surat = $_POST['asal_surat'];
		$tgl_surat 	= $_POST['tgl_surat'];
		$no_surat 	= $_POST['no_surat'];
		$isi_surat 	= $_POST['isi_surat'];
		$keterangan = $_POST['keterangan'];

			$result = mysqli_query($mysqli, "UPDATE smasuk SET
											no_urut = '$no_urut', 
											kode_arsip = '$kode_arsip', 
											asal_surat = '$asal_surat', 
											tgl_surat = '$tgl_surat', 
											no_surat = '$no_surat', 
											isi_surat = '$isi_surat', 
											keterangan = '$keterangan' WHERE id_surat = $ID"); 

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "surat-masuk" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM smasuk WHERE id_surat = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}
	/* SURAT KELUAR */
	if($page == "surat-keluar" && $action == "insert")
	{

		 $page 		= $_POST['page'];
		$kode_arsip 	= $_POST['kode_arsip'];
		$nomor_surat 	= $_POST['nomor_surat'];
		$tujuan_surat 	= $_POST['tujuan_surat'];
		$tgl_surat 	= $_POST['tgl_surat'];
		$isi_perihal 	= $_POST['isi_perihal'];
		$keterangan 	= $_POST['keterangan'];
		$no_urut 	= $_POST['no_urut'];
		
		
			$type	       = $_FILES["pdf_file"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-surat-keluar.pdf";
			$namaSementara = $_FILES['pdf_file']['tmp_name'];
			$size          = $_FILES['pdf_file']['size'];
			$dirUpload     = "assets/pdf/surat-keluar/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$result = mysqli_query($mysqli, "INSERT INTO skeluar SET
											kode_arsip = '$kode_arsip', 
											nomor_surat = '$nomor_surat', 
											tujuan_surat = '$tujuan_surat', 
											tgl_surat = '$tgl_surat', 
											isi_perihal = '$isi_perihal', 
											keterangan = '$keterangan', 
											pdf_file = 'assets/pdf/surat-keluar/$namaFile'"); 
		$result = mysqli_query($mysqli, "UPDATE tb_hitung SET skeluar = '$no_urut' WHERE id = 1"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "surat-keluar" && $action == "update")
	{

		$ID 		= $_POST['id'];
		$page 		= $_POST['page'];
		$kode_arsip 	= $_POST['kode_arsip'];
		$nomor_surat 	= $_POST['nomor_surat'];
		$tujuan_surat 	= $_POST['tujuan_surat'];
		$tgl_surat 	= $_POST['tgl_surat'];
		$isi_perihal 	= $_POST['isi_perihal'];
		$keterangan 	= $_POST['keterangan'];

		if($_FILES["pdf_file"]["name"] <> "")
		  {
			$type	       = $_FILES["pdf_file"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-surat-keluar.pdf";
			$namaSementara = $_FILES['pdf_file']['tmp_name'];
			$size          = $_FILES['pdf_file']['size'];
			$dirUpload     = "assets/pdf/surat-keluar/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			$old 		   = $_POST['old'];
			if(file_exists($old)){
				unlink($old);	
			}else{
				echo 'File Not Found';
			}
			$result = mysqli_query($mysqli, "UPDATE skeluar SET
											kode_arsip = '$kode_arsip', 
											nomor_surat = '$nomor_surat', 
											tujuan_surat = '$tujuan_surat', 
											tgl_surat = '$tgl_surat', 
											isi_perihal = '$isi_perihal', 
											keterangan = '$keterangan', 
											pdf_file = 'assets/pdf/surat-keluar/$namaFile' WHERE id_surat = $ID"); 

		  }else{
		  	$result = mysqli_query($mysqli, "UPDATE skeluar SET
											kode_arsip = '$kode_arsip', 
											nomor_surat = '$nomor_surat', 
											tujuan_surat = '$tujuan_surat', 
											tgl_surat = '$tgl_surat', 
											isi_perihal = '$isi_perihal', 
											keterangan = '$keterangan' WHERE id_surat = $ID"); 
		  }
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "surat-keluar" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];
		  $old = $_GET['old'];
		  unlink($old);
				  $result = mysqli_query($mysqli, "DELETE FROM skeluar WHERE id_surat = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/*PEMINJAMAN ARSIP*/
	if($page == "pinjam_arsip" && $action == "insert")
	{

		$kode_arsip = $_POST['kode_arsip'];
		$no_surat = $_POST['no_surat'];
		$nama_peminjam = $_POST['nama_peminjam'];
		$keperluan = $_POST['keperluan'];
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];
		$page 		= $_POST['page'];
		$result = mysqli_query($mysqli, "INSERT INTO pinjam_arsip SET
											kode_arsip = '$kode_arsip',
											no_surat = '$no_surat',
											nama_peminjam = '$nama_peminjam',
											keperluan = '$keperluan',
											tgl_pinjam = '$tgl_pinjam',
											tgl_kembali = '$tgl_kembali'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "pinjam_arsip" && $action == "update")
	{

		$ID = $_POST['id_pinjam'];
		  $page1 = $_POST['page1'];
		  $status_pengembalian = $_POST['status_pengembalian'];
		  $keterangan = $_POST['keterangan'];
		  $kode_arsip = $_POST['kode_arsip'];
		$no_surat = $_POST['no_surat'];
		$nama_peminjam = $_POST['nama_peminjam'];
		$keperluan = $_POST['keperluan'];
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];


				  $result = mysqli_query($mysqli, "UPDATE pinjam_arsip SET
				  									kode_arsip = '$kode_arsip',
													no_surat = '$no_surat',
													nama_peminjam = '$nama_peminjam',
													keperluan = '$keperluan',
													tgl_pinjam = '$tgl_pinjam',
													tgl_kembali = '$tgl_kembali',
				  									status_pengembalian = '$status_pengembalian',
				  									keterangan = '$keterangan'
													WHERE id_pinjam = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "pinjam_arsip" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM pinjam_arsip WHERE id_pinjam = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "pinjam_arsip" && $action == "status")
	{

		  $ID = $_POST['id_pinjam'];
		  $page1 = $_POST['page1'];
		  $status_pengembalian = $_POST['status_pengembalian'];
		  $keterangan = $_POST['keterangan'];


				  $result = mysqli_query($mysqli, "UPDATE pinjam_arsip SET
				  									status_pengembalian = '$status_pengembalian',
				  									keterangan = '$keterangan'
													WHERE id_pinjam = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* Settings */
	if($page == "settings" && $action == "insert")
	{

		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = MD5($_POST['password']);
		 $email = $_POST['email'];
		 $status = $_POST['status'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$password',
											email = '$email',
											status = '$status'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "settings" && $action == "update")
	{

		 $ID = $_POST['id'];
		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $email = $_POST['email'];
		 $status = $_POST['status'];

		 if (is_null($password)) {
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											email = '$email',
											status = '$status' WHERE id = $ID"); 
		 }else{
		 	$pass = MD5($password);
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$pass',
											email = '$email',
											status = '$status' WHERE id = $ID"); 
		 }

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "settings" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_users WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}
?>