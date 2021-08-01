                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Daftar Surat Masuk</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                        
                        <a target="_blank" href="print_smasuk.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Print Report</a>
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                            <a href="index.php?page=add-kode-arsip" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Surat Masuk</a>
                            <?php  }elseif ($_SESSION['status'] = 'USER') {
                                echo " - ";
                              } ?>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Arsip</th>
                                            <th>Asal Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>No Surat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT a.kode_arsip AS kode_arsip,a.id_surat, a.no_urut, a.asal_surat, a.tgl_surat, a.no_surat, a.isi_surat, a.keterangan, a.file_disposisi, a.file_surat FROM smasuk a LEFT JOIN kode_arsip b ON a.kode_arsip = b.id_kode");
                                            while($data = mysqli_fetch_array($dt)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['kode_arsip'] ?></td>
                                            <td><?php echo $data['asal_surat'] ?></td>
                                            <td><?php echo TanggalIndo($data['tgl_surat']) ?></td>
                                            <td><?php echo $data['no_surat'] ?></td>
                                            <td>
                                              <ul class="list-inline m-0">
                                              <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                                <!-- action buttons -->
                                              
                                                <li class="list-inline-item editModal" data-id="<?php echo $data['id_surat'] ?>" data-toggle="modal" data-no="<?php echo $data['no_urut'] ?>" data-kodearsip="<?php echo $data['kode_arsip'] ?>" data-asal="<?php echo $data['asal_surat'] ?>" data-tgl="<?php echo $data['tgl_surat'] ?>" data-nosurat="<?php echo $data['no_surat'] ?>" data-isisurat="<?php echo $data['isi_surat'] ?>" data-keterangan="<?php echo $data['keterangan'] ?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                  <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                  <a target="_blank" href="<?php echo $data['file_disposisi'] ?>" class="btn btn-warning btn-sm rounded-0"><i class="fa fa-eye"></i> Disposisi</a>
                                                </li>
                                                <li class="list-inline-item">
                                                  <a target="_blank" href="<?php echo $data['file_surat'] ?>" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-eye"></i> Surat</a>
                                                </li>
                                              
                                              <?php  }elseif ($_SESSION['status'] = 'USER') { ?>
                                                  <li class="list-inline-item">
                                                  <a target="_blank" href="<?php echo $data['file_disposisi'] ?>" class="btn btn-warning btn-sm rounded-0"><i class="fa fa-eye"></i> Disposisi</a>
                                                </li>
                                                <li class="list-inline-item">
                                                  <a target="_blank" href="<?php echo $data['file_surat'] ?>" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-eye"></i> Surat</a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        

                                        <!-- Modal Delete -->
                                        <!-- Modal DELETE DATA -->
                                        <div class="modal fade" id="<?php echo "deleteModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModal">Yakin ingin menghapus data ini?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Klik "Hapus" jika anda yakin ingin menghapus data ini.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="controller.php?page=surat-masuk&action=delete&id=<?php echo $data['id_surat'] ?>&page1=<?php echo $_GET['page']?>">Hapus</a>
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
            <!-- MODAL EDIT -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Edit - Kode Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=surat-masuk&action=update" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      
                          
                          <input type="hidden" name="id" id="id_surat1">
                          <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                          <input type="hidden" class="form-control" name="no_urut" id="no_urut1" value="<?php echo $data['no_urut'];?>" >
                        
                        <div class="form-group">
                          <label for="data2">Kode Arsip</label>
                          <input type="text" class="form-control" id="kd_arsip1" name="kode_arsip" value="<?php echo $data['kode_arsip'] ?>" ><br>
                          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <div class="form-group">
                              <label for="data2">Kode Ruangan</label>
                              <select name="kode_ruangan" id="kd_ruangan1" class="form-control show-tick">
                                      <?php  
                                        $qry = mysqli_query($mysqli, "SELECT * FROM ref_ruangan");
                                          while($rng = mysqli_fetch_array($qry)){ ?>
                                      <option value="<?php echo $rng['kode'] ?>"><?php echo "(".$rng['kode'].") ".$rng['nama'] ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="data2">Kode Lemari</label>
                              <select name="kode_lemari" id="kd_lemari1" class="form-control show-tick">
                                      <?php  
                                        $qry = mysqli_query($mysqli, "SELECT * FROM ref_lemari");
                                          while($lemari = mysqli_fetch_array($qry)){ ?>
                                      <option value="<?php echo $lemari['kode_lemari'] ?>"><?php echo $lemari['kode_lemari'] ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="data2">Kode Ordner</label>
                              <select name="kode_ordner" id="kd_ordner1" class="form-control show-tick">
                                      <?php  
                                        $qry = mysqli_query($mysqli, "SELECT * FROM ref_ordner");
                                          while($ordner = mysqli_fetch_array($qry)){ ?>
                                      <option value="<?php echo $ordner['kode_ordner'] ?>"><?php echo $ordner['kode_ordner'] ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="data2">Kode Guide</label>
                              <select name="kode_guide" id="kd_guide1" class="form-control show-tick">
                                      <?php  
                                        $qry = mysqli_query($mysqli, "SELECT * FROM ref_guide");
                                          while($guide = mysqli_fetch_array($qry)){ ?>
                                      <option value="<?php echo $guide['id'] ?>"><?php echo $guide['kode_guide'] ?></option>
                                  <?php } ?>
                              </select>
                            </div><br>
                            
                                  <button type="button" class="btn btn-sm btn-success " onclick="cetak1()">Cetak Kode Arsip</button>
                            
                        </div>
                        </div>
                        <div class="form-group">
                          <label for="data2">Asal Surat</label>
                          <input type="text" class="form-control" id="asal_surat1" name="asal_surat" value="<?php echo $data['asal_surat'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="data2">Tanggal Surat</label>
                          <input type="date" class="form-control" id="tgl_surat1" name="tgl_surat" value="<?php echo $data['tgl_surat'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="data2">Nomor Surat</label>
                          <input type="text" class="form-control" id="no_surat1" name="no_surat" value="<?php echo $data['no_surat'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="data2">Isi Surat</label>
                          <input type="text" class="form-control" id="isi_surat1" name="isi_surat" value="<?php echo $data['isi_surat'] ?>">
                        </div>
                        <div class="form-group">
                          <label for="data2">Keterangan</label>
                          <input type="text" class="form-control" id="keterangan1" name="keterangan" value="<?php echo $data['keterangan'] ?>">
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

            <!-- Modal ADD DATA -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Tambah - Surat Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=surat-masuk&action=insert" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <?php 
                        $no = 1;
                        $dt = mysqli_query($mysqli, "SELECT * FROM tb_hitung");
                        $data = mysqli_fetch_array($dt);

                        $hitung_smasuk = $data['smasuk'] + 1;
                      ?>
                        <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                        <input type="hidden" class="form-control" name="no_urut" id="no_urut" value="<?php echo $hitung_smasuk; ?>">
                      
                      <div class="form-group">
                        <label for="data2">Kode Arsip</label>
                        <input type="text" class="form-control" id="kd_arsip" name="kode_arsip" value="Silahkan Cetak Kode Arsip Dahulu" ><br>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                          <div class="form-group">
                            <label for="data2">Kode Ruangan</label>
                            <select name="kode_ruangan" id="kd_ruangan" class="form-control show-tick">
                                    <?php  
                                      $qry = mysqli_query($mysqli, "SELECT * FROM ref_ruangan");
                                        while($rng = mysqli_fetch_array($qry)){ ?>
                                    <option value="<?php echo $rng['kode'] ?>"><?php echo "(".$rng['kode'].") ".$rng['nama'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="data2">Kode Lemari</label>
                            <select name="kode_lemari" id="kd_lemari" class="form-control show-tick">
                                    <?php  
                                      $qry = mysqli_query($mysqli, "SELECT * FROM ref_lemari");
                                        while($lemari = mysqli_fetch_array($qry)){ ?>
                                    <option value="<?php echo $lemari['kode_lemari'] ?>"><?php echo $lemari['kode_lemari'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="data2">Kode Ordner</label>
                            <select name="kode_ordner" id="kd_ordner" class="form-control show-tick">
                                    <?php  
                                      $qry = mysqli_query($mysqli, "SELECT * FROM ref_ordner");
                                        while($ordner = mysqli_fetch_array($qry)){ ?>
                                    <option value="<?php echo $ordner['kode_ordner'] ?>"><?php echo $ordner['kode_ordner'] ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="data2">Kode Guide</label>
                            <select name="kode_guide" id="kd_guide" class="form-control show-tick">
                                    <?php  
                                      $qry = mysqli_query($mysqli, "SELECT * FROM ref_guide");
                                        while($guide = mysqli_fetch_array($qry)){ ?>
                                    <option value="<?php echo $guide['id'] ?>"><?php echo $guide['kode_guide'] ?></option>
                                <?php } ?>
                            </select>
                          </div><br>
                          
                                <button type="button" class="btn btn-sm btn-success " onclick="cetak()">Cetak Kode Arsip</button>
                          
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="data2">Asal Surat</label>
                        <input type="text" class="form-control" name="asal_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Nomor Surat</label>
                        <input type="text" class="form-control" name="no_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Isi Surat</label>
                        <input type="text" class="form-control" name="isi_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                      </div>
                      <div class="form-group">
                        <label for="data2">File Dosposisi</label>
                        <input type="file" class="form-control" name="file_disposisi">
                      </div>
                      <div class="form-group">
                        <label for="data2">File Surat</label>
                        <input type="file" class="form-control" name="file_surat">
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

            <!-- Modal EDIT DATA -->

