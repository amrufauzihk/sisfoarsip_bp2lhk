<?php

//* Includde Koneksi Ke database
include_once("admin/config/connect-db.php");

//* Include Base Url
include_once("admin/config/base-url.php");


	$username = $_POST['username'];
	$pass     = md5($_POST['password']);

	$login = mysqli_query($mysqli, "SELECT * FROM tb_users WHERE username = '$username' AND password='$pass'");
	$row=mysqli_fetch_array($login);
	if ($row['username'] == $username AND $row['password'] == $pass)
	{

	   session_start();
	   $_SESSION['nama']        = $row['nama'];
	   $_SESSION['username']    = $row['username'];

	   if($row['status']==1){
	   		$_SESSION['status'] = 'USER';
	   }elseif($row['status']==2){
	   		$_SESSION['status'] = 'ADMIN';
	   }
	   $_SESSION['id'] = $row['id'];

	  // Jika Sukses, redirect halaman menggunakan javascript
	  echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php" </script>';

	}

	else  
	{

	  // Jika Sukses, redirect halaman menggunakan javascript
	  echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>';

	}

?>