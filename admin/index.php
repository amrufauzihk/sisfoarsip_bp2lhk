<?php include('config/connect-db.php'); ?>
<?php include('config/auth.php'); ?>
<?php include('config/base-url.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" href="../css/logo.png" sizes="16x16" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIA BP2LHKM</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for DataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <img src="../css/logo.png" width="50px" style="margin: 20px;">
                </div>
                <div class="sidebar-brand-text"><?php echo $_SESSION['nama']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>

            <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                <li class="nav-item">
                <a class="nav-link" href="?page=kode-arsip">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Kode Arsip </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                    aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Referensi</span>
                </a>
          
                    
                      <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=kode-lemari">Kode Lemari</a>
                        <a class="collapse-item" href="?page=kode-ordner">Kode Ordner</a>
                        <a class="collapse-item" href="?page=kode-guide">Kode Guide</a>
                        <a class="collapse-item" href="?page=kode-ruangan">Kode Ruangan</a>
                    </div>
                </li>
            <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Arsip Surat </span>
                </a>
          
                    
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=surat-masuk">Surat Masuk</a>
                        <a class="collapse-item" href="?page=surat-keluar">Surat Keluar</a>
                    </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?page=fisik-surat-masuk">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Informasi Fisik Arsip</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pinjam"
                    aria-expanded="true" aria-controls="pinjam">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Peminjaman Arsip</span>
                </a>
          
                    
                <div id="pinjam" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=pinjam-arsip-masuk">Peminjaman Arsip</a>
                        <a class="collapse-item" href="?page=riwayat-pinjam-arsip-masuk">Riwayat Peminjaman</a>
                    </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=settings">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span></a>
            </li>

            <!-- Session User -->
            <?php  }elseif ($_SESSION['status'] = 'USER') { ?>
                <li class="nav-item">
                <a class="nav-link" href="?page=kode-arsip">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Kode Arsip </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                    aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Referensi</span>
                </a>
          
                    
                      <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=kode-lemari">Kode Lemari</a>
                        <a class="collapse-item" href="?page=kode-ordner">Kode Ordner</a>
                        <a class="collapse-item" href="?page=kode-guide">Kode Guide</a>
                        <a class="collapse-item" href="?page=kode-ruangan">Kode Ruangan</a>
                    </div>
                </li>
            <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Arsip Surat </span>
                </a>
          
                    
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=surat-masuk">Surat Masuk</a>
                        <a class="collapse-item" href="?page=surat-keluar">Surat Keluar</a>
                    </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?page=fisik-surat">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Informasi Fisik Arsip</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pinjam"
                    aria-expanded="true" aria-controls="pinjam">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Peminjaman Arsip</span>
                </a>
          
                    
                <div id="pinjam" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=pinjam-arsip-masuk">Peminjaman Arsip</a>
                    </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=settings-user">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span></a>
            </li>
              <?php } ?>
            <!-- Nav Item - Utilities Collapse Menu -->
             

            <li class="nav-item">
                <a class="nav-link" href="config/logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">1</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="404.php" target="_blank">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">January 29, 2021</div>
                                        <span class="font-weight-bold">Dokumentasi Penggunaan Web, Klik Disini...</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Clear All Notification</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

            <div class="container-fluid">
              <?php
              if (empty($_GET["page"])) {
                include "dashboard.php";
              } elseif ($_GET['page'] == 'kode-klasifikasi') {
                include "kode-klasifikasi.php";
              } elseif ($_GET['page'] == 'kode-arsip') {
                include "kode-arsip.php";
              } elseif ($_GET['page'] == 'surat-masuk') {
                include "surat-masuk.php";
              } elseif ($_GET['page'] == 'surat-keluar') {
                include "surat-keluar.php";
              } elseif ($_GET['page'] == 'disposisi') {
                include "disposisi.php";
              } elseif ($_GET['page'] == 'settings') {
                include "settings.php";
              }  elseif ($_GET['page'] == 'kode-lemari') {
                include "kode-lemari.php";
              } elseif ($_GET['page'] == 'kode-ordner') {
                include "kode-ordner.php";
              } elseif ($_GET['page'] == 'kode-guide') {
                include "kode-guide.php";
              } elseif ($_GET['page'] == 'fisik-surat-masuk') {
                include "fisik-surat-masuk.php";
              } elseif ($_GET['page'] == 'fisik-surat-keluar') {
                include "fisik-surat-keluar.php";
              } elseif ($_GET['page'] == 'pinjam-arsip-masuk') {
                include "pinjam-arsip-masuk.php";
              } elseif ($_GET['page'] == 'pinjam-arsip-keluar') {
                include "pinjam-arsip-keluar.php";
              } elseif ($_GET['page'] == 'riwayat-pinjam-arsip-masuk') {
                include "riwayat-pinjam-arsip-masuk.php";
              } elseif ($_GET['page'] == 'riwayat-pinjam-arsip-keluar') {
                include "riwayat-pinjam-arsip-keluar.php";
              } elseif ($_GET['page'] == 'settings-user') {
                include "settings-user.php";
              } elseif ($_GET['page'] == 'kode-ruangan') {
                include "kode-ruangan.php";
              }
              ?>
            </div> <!-- /.container-fluid -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">tinggalkan halaman?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">klik "Logout" jika ingin meninggalkan halaman. </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIA BP2LHKM</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Tooltip -->
    <!-- <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.editModal', function() {
            
            var get_id = $(this).data('id');
            var get_no = $(this).data('no');
            var get_asal = $(this).data('asal');
            var get_tgl = $(this).data('tgl');
            var get_nosurat = $(this).data('nosurat');
            var get_isisurat = $(this).data('isisurat');
            var get_keterangan = $(this).data('keterangan');
            var get_kodearsip = $(this).data('kodearsip');
            
            $('#id_surat1').val(get_id);
            $('#no_urut1').val(get_no);
            $('#kd_arsip1').val(get_kodearsip);
            $('#asal_surat1').val(get_asal);
            $('#tgl_surat1').val(get_tgl);
            $('#no_surat1').val(get_nosurat);
            $('#isi_surat1').val(get_isisurat);
            $('#keterangan1').val(get_keterangan);
            

            $('#editModal').modal('show');

        });
        $(document).on('click', '.editModalSkeluar', function() {
            
            var get_id = $(this).data('id');
            var get_no = $(this).data('no');
            var get_kodearsip = $(this).data('kodearsip');
            var get_nosurat = $(this).data('nosurat');
            var get_tujuan = $(this).data('tujuan');
            var get_tgl = $(this).data('tgl');
            var get_keterangan = $(this).data('keterangan');
            var get_old = $(this).data('old');
            var get_isi = $(this).data('isi');
            
            
            $('#id_surat1').val(get_id);
            $('#no_urut1').val(get_no);
            $('#old1').val(get_old);
            $('#kd_arsip1').val(get_kodearsip);

            $('#nomor_surat1').val(get_nosurat);
            $('#tujuan_surat1').val(get_tujuan);
            $('#tgl_surat1').val(get_tgl);
            $('#isi_perihal1').val(get_isi);
            $('#keterangan1').val(get_keterangan);

            

            $('#editModalSkeluar').modal('show');

        });
    </script>
</body>
<script>
function cetak() {
    var kd_ruangan = document.getElementById("kd_ruangan").value;
    var kd_lemari = document.getElementById("kd_lemari").value;
    var kd_ordner = document.getElementById("kd_ordner").value;
    var kd_guide = document.getElementById("kd_guide").value;
    var jangka = "";
    var no_urut = document.getElementById("no_urut").value;
    if(kd_guide >= 1 && kd_guide<=3)
        {jangka = "1/4"; }
    else if(kd_guide>=4 && kd_guide<=6)
        {jangka = "2/4"; }
    else if(kd_guide>=7 && kd_guide<=9)
        {jangka = "3/4"; }
    else if(kd_guide>=10 && kd_guide<=12)
        {jangka = "4/4"; }
    document.getElementById("kd_arsip").value = kd_ruangan + "/" + kd_lemari + "/" + kd_ordner + "(" + kd_guide +"."+ jangka + ")/" + no_urut;
}

function cetak1() {
    var kd_ruangan1 = document.getElementById("kd_ruangan1").value;
    var kd_lemari1 = document.getElementById("kd_lemari1").value;
    var kd_ordner1 = document.getElementById("kd_ordner1").value;
    var kd_guide1 = document.getElementById("kd_guide1").value;
    var jangka1 = "";
    var no_urut1 = document.getElementById("no_urut1").value;
    if(kd_guide1 >= 1 && kd_guide1<=3)
        {jangka1 = "1/4"; }
    else if(kd_guide1>=4 && kd_guide1<=6)
        {jangka1 = "2/4"; }
    else if(kd_guide1>=7 && kd_guide1<=9)
        {jangka1 = "3/4"; }
    else if(kd_guide1>=10 && kd_guide1<=12)
        {jangka1 = "4/4"; }
    document.getElementById("kd_arsip1").value = kd_ruangan1 + "/" + kd_lemari1 + "/" + kd_ordner1 + "(" + kd_guide1 +"."+ jangka1 + ")/" + no_urut1;
    document.getElementById("kd_arsip2").value = kd_ruangan1 + "/" + kd_lemari1 + "/" + kd_ordner1 + "(" + kd_guide1 + jangka1 + ")/" + no_urut1;
}
</script>
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
