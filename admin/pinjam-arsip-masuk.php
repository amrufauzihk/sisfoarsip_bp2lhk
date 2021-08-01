                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Daftar Peminjaman Arsip</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                        <div>
                        <a href="?page=pinjam-arsip-masuk" class="btn btn-sm btn-success">Surat Masuk </a>
                        <a href="?page=pinjam-arsip-keluar" class="btn btn-sm">Surat Keluar </a>
                        </div>
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <a href="index.php?page=add-kode-arsip" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Peminjaman Arsip</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Arsip</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama Peminjam</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status Pengembalian</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT c.id_pinjam, a.no_surat, c.nama_peminjam, c.keperluan, c.tgl_pinjam, c.tgl_kembali, c.status_pengembalian, c.keterangan, b.kode_arsip, c.id_pinjam
                                              FROM smasuk a
                                              LEFT JOIN kode_arsip b ON a.kode_arsip = b.id_kode
                                              LEFT JOIN pinjam_arsip  c ON a.id_surat = c.no_surat
                                              WHERE c.id_pinjam IS NOT NULL");
                                            while($data = mysqli_fetch_array($dt)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['kode_arsip'];?></td>
                                            <td><?php echo $data['no_surat'] ?></td>
                                            <td><?php echo $data['nama_peminjam'] ?></td>
                                            <td><?php echo $data['keperluan'] ?></td>
                                            <td><?php echo TanggalIndo($data['tgl_pinjam']) ?></td>
                                            <td><?php echo TanggalIndo($data['tgl_kembali']) ?></td>
                                            <td>
                                              <?php 
                                                if ($data['status_pengembalian'] == 0) { ?>
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="modal" data-target="<?php echo "#status".$no;?>"><i class="fa fa-edit"></i> Kembali</button>

                                                  <div class="modal fade" id="<?php echo "status".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="status">Pengembalian Peminjaman Arsip</h5>
                                                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">×</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form action="controller.php?page=pinjam_arsip&action=status" method="POST" enctype="multipart/form-data">
                                                                  <div class="modal-body text-gray-900">
                                                                    
                                                                    <div class="form-group">
                                                                      <label for="data2">Status Pengembalian</label>
                                                                      <select name="status_pengembalian" class="form-control show-tick">
                                                                        <option value="1">Kembali</option>
                                                                        <option value="2">Terlambat</option>
                                                                        <option value="3">Hilang</option>
                                                                      </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="data2">Keterangan</label>

                                                                      <input type="text" class="form-control" name="keterangan">
                                                                      <input type="hidden" name="id_pinjam" value="<?php echo $data['id_pinjam'] ?>">
                                                                      <input type="hidden" name="page1" value="<?php echo $_GET['page'] ?>">
                                                                    </div>
                                                                  </div>
                                                                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                <?php } else { 
                                                    if ($data['status_pengembalian'] == 1) {
                                                      echo "Kembali";
                                                    } elseif ($data['status_pengembalian'] == 2){
                                                      echo "Terlambat";
                                                    } elseif ($data['status_pengembalian'] == 3){
                                                      echo "Hilang";
                                                    }
                                                    
                                                } ?>
                                              
                                            </td>
                                            <td><?php echo $data['keterangan'] ?></td>
                                            <td>
                                              <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                                <!-- action buttons -->
                                              <ul class="list-inline m-0">
                                                <?php if ($data['status_pengembalian'] == 0) {?>
                                                  <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#nostatus".$no;?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>

                                                  <div class="modal fade" id="<?php echo "nostatus".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="nostatus">Mohon Konfirmasi Pengembalian Surat</h5>
                                                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">×</span>
                                                                  </button>
                                                              </div>
                                                              <div class="modal-body">Silahkan Konfirmasi Pada Kolom status peminjaman</div>
                                                              <div class="modal-footer">
                                                                  <button class="btn btn-secondary" type="button" data-dismiss="modal"> Keluar</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </li>
                                                <?php }else{?>
                                                  <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#editModal".$no;?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                  <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Arsipkan"><i class="fa fa-download"></i></button>
                                                </li>
                                                <?php } ?>
                                                
                                              </ul>
                                              <?php  }elseif ($_SESSION['status'] = 'USER') {
                                                  echo " - ";
                                                } ?>
                                            
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="<?php echo "editModal".$no;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                              <div class="modal-header border-bottom-secondary">
                                                <h5 class="modal-title text-gray-900">Edit - Peminjaman Arsip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>

                                              <form action="controller.php?page=pinjam_arsip&action=update" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body text-gray-900">
                                                  <div class="form-group">
                                                    <label for="data2">Kode Arsip</label>
                                                    <select name="kode_arsip" class="form-control show-tick">
                                                            <?php  
                                                              $qry = mysqli_query($mysqli, "SELECT * FROM kode_arsip");
                                                                while($kd = mysqli_fetch_array($qry)){ ?>
                                                            <option value="<?php echo $kd['id_kode'] ?>" <?php if ($kd['id_kode'] == $data['kode_arsip']) {
                                                              echo "Selected";
                                                            } ?>><?php echo $kd['kode_arsip'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Nomor Surat</label>
                                                    <input type="hidden" name="page1" value="<?php echo $_GET['page']; ?>">
                                                    <input type="hidden" name="id_pinjam" value="<?php echo $data['id_pinjam']; ?>">
                                                    <select name="no_surat" class="form-control show-tick">
                                                    <?php  
                                                              $qry = mysqli_query($mysqli, "SELECT * FROM smasuk");
                                                                while($smasuk = mysqli_fetch_array($qry)){ ?>
                                                            <option value="<?php echo $smasuk['id_surat'] ?>"<?php if ($smasuk['id_surat'] == $data['no_surat']) {
                                                              echo "Selected";
                                                            }?>><?php echo $smasuk['no_surat'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Nama Peminjam</label>
                                                    <input type="text" class="form-control" name="nama_peminjam" value="<?php echo $data['nama_peminjam'] ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Keperluan</label>
                                                    <input type="text" class="form-control" name="keperluan" value="<?php echo $data['keperluan'] ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Tanggal Pinjam</label>
                                                    <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam'] ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Tanggal Kembali</label>
                                                    <input type="date" class="form-control" name="tgl_kembali" value="<?php echo $data['tgl_kembali'] ?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">File Surat</label>
                                                    <select name="status_pengembalian" class="form-control show-tick">
                                                      <option value="1" <?php if ($data['status_pengembalian'] == 1) {echo "Selected";}?>>Kembali</option>
                                                      <option value="2" <?php if ($data['status_pengembalian'] == 2) {echo "Selected";}?>>Terlambat</option>
                                                      <option value="3" <?php if ($data['status_pengembalian'] == 3) {echo "Selected";}?>>Hilang</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan" value="<?php echo $data['keterangan'] ?>">
                                                  </div>
                                                </div>
                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                  <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                              </form>

                                            </div>
                                          </div>
                                        </div>

                                        <!-- Modal Delete -->
                                        <!-- Modal DELETE DATA -->
                                        <div class="modal fade" id="<?php echo "deleteModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModal">Konfirmasi Untuk Simpan Ke Riwayat?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Klik "Ya" jika anda yakin ingin memindahkan ke riwayat data ini.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-success" href="controller.php?page=pinjam_arsip&action=delete&id=<?php echo $data['id_pinjam'] ?>&page1=<?php echo $_GET['page']?>">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <!-- </div> -->
            <!-- End of Main Content -->


            <!-- Modal ADD DATA -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Tambah - Peminjaman Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=pinjam_arsip&action=insert" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data2">Kode Arsip</label>
                        <select name="kode_arsip" class="form-control show-tick">
                                <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM kode_arsip");
                                    while($data = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $data['id_kode'] ?>"><?php echo $data['kode_arsip'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Nomor Surat</label>
                        <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                        <select name="no_surat" class="form-control show-tick">
                        <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM smasuk");
                                    while($smasuk = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $smasuk['id_surat'] ?>"><?php echo $smasuk['no_surat'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Nama Peminjam</label>
                        <input type="text" class="form-control" name="nama_peminjam">
                      </div>
                      <div class="form-group">
                        <label for="data2">Keperluan</label>
                        <input type="text" class="form-control" name="keperluan">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tgl_kembali">
                      </div>
                      <!-- <div class="form-group">
                        <label for="data2">File Surat</label>
                        <select name="status_pengembalian" class="form-control show-tick">
                          <option value="0">Kembali</option>
                          <option value="1">Terlambat</option>
                          <option value="2">Hilang</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                      </div> -->
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            

            <!-- Modal EDIT DATA -->

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>