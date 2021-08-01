                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Daftar Surat Keluar</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                        <a target="_blank" href="print_skeluar.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Print Report</a>
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                            <a href="index.php?page=add-kode-arsip" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Surat Keluar</a>
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
                                            <th>Nomor Surat</th>
                                            <th>Isi Perihal</th>
                                            <th>Tujuan Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT 
                                                                              a.kode_arsip AS kode_arsip, 
                                                                              a.id_surat,
                                                                              a.kode_arsip,
                                                                              a.nomor_surat,
                                                                              a.tujuan_surat,
                                                                              a.tgl_surat,
                                                                              a.keterangan,
                                                                              a.isi_perihal,
                                                                              a.pdf_file
                                                                          FROM skeluar a
                                                                          LEFT JOIN kode_arsip b ON a.kode_arsip = b.id_kode");
                                            while($data = mysqli_fetch_array($dt)){
                                              $ex = explode("/", $data['kode_arsip']);

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['kode_arsip'];?></td>
                                            <td><?php echo $data['nomor_surat'] ?></td>
                                            <td><?php echo $data['isi_perihal'] ?></td>
                                            <td><?php echo $data['tujuan_surat'] ?></td>
                                            <td><?php echo TanggalIndo($data['tgl_surat']) ?></td>
                                            <td>
                                              <ul class="list-inline m-0">
                                            <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                              <!-- action buttons -->
                                              
                                                <li class="list-inline-item editModalSkeluar" data-id="<?php echo $data['id_surat'] ?>" data-toggle="modal" data-no="<?php echo $ex[4]; ?>" data-kodearsip="<?php echo $data['kode_arsip'] ?>" data-nosurat="<?php echo $data['nomor_surat'] ?>" data-tgl="<?php echo $data['tgl_surat'] ?>" data-tujuan="<?php echo $data['tujuan_surat'] ?>" data-old="<?php echo $data['pdf_file'] ?>" data-isi="<?php echo $data['isi_perihal'] ?>" data-keterangan="<?php echo $data['keterangan'] ?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                  <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                                <li class="list-inline-item">
                                                  <a target="_blank" href="<?php echo $data['pdf_file'] ?>" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-eye"></i> Surat</a>
                                                </li>
                                            <?php  }elseif ($_SESSION['status'] = 'USER') { ?>
                                                <li class="list-inline-item">
                                                  <a target="_blank" href="<?php echo $data['pdf_file'] ?>" class="btn btn-primary btn-sm rounded-0"><i class="fa fa-eye"></i> Surat</a>
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
                                                        <a class="btn btn-danger" href="controller.php?page=surat-keluar&action=delete&id=<?php echo $data['id_surat'] ?>&page1=<?php echo $_GET['page']?>&old=<?php echo $data['pdf_file'] ?>">Hapus</a>
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

            <!-- Modal Edit -->
            <div class="modal fade" id="editModalSkeluar" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Edit - Kode Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=surat-keluar&action=update" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      
                          <input type="hidden" class="form-control" name="no_urut" id="no_urut1">
                      
                        <div class="form-group">
                          <label for="data2">Kode Arsip</label>
                          <input type="text" class="form-control" id="kd_arsip1" name="kode_arsip" value="Silahkan Cetak Kode Arsip Dahulu" ><br>
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
                          <label for="data2">Nomor Surat</label>
                          <input type="hidden" name="old" id="old1">
                          <input type="hidden" name="id" id="id_surat1">
                          <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                          <input type="text" class="form-control" name="nomor_surat" id="nomor_surat1">
                        </div>
                        <div class="form-group">
                          <label for="data2">Tujuan Surat</label>
                          <input type="text" class="form-control" name="tujuan_surat" id="tujuan_surat1">
                        </div>
                        <div class="form-group">
                          <label for="data2">Tanggal Surat</label>
                          <input type="date" class="form-control" name="tgl_surat" id="tgl_surat1">
                        </div>
                        <div class="form-group">
                          <label for="data2">Isi Perihal</label>
                          <input type="text" class="form-control" name="isi_perihal" id="isi_perihal1">
                        </div>
                        <div class="form-group">
                          <label for="data2">Keterangan</label>
                          <input type="text" class="form-control" name="keterangan" id="keterangan1">
                        </div>
                        <div class="form-group">
                          <label for="data2">File Surat (Tidak Di Isi Jika tidak berubah)</label>
                          <input type="file" class="form-control" name="pdf_file">
                        </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
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
                    <h5 class="modal-title text-gray-900">Tambah - Surat Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=surat-keluar&action=insert" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <?php 
                        $no = 1;
                        $dt = mysqli_query($mysqli, "SELECT * FROM tb_hitung");
                        $data = mysqli_fetch_array($dt);

                        $hitung_smasuk = $data['skeluar'] + 1;
                      ?>
                      <div class="form-group">
                        <label for="data2">Kode Arsip</label>
                        <input type="hidden" name="no_urut" id="no_urut" value="<?php echo $hitung_smasuk; ?>">
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
                        <label for="data2">Nomor Surat</label>
                        <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                        <input type="text" class="form-control" name="nomor_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tujuan Surat</label>
                        <input type="text" class="form-control" name="tujuan_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Isi Perihal</label>
                        <input type="text" class="form-control" name="isi_perihal">
                      </div>
                      <div class="form-group">
                        <label for="data2">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                      </div>
                      <div class="form-group">
                        <label for="data2">File Surat</label>
                        <input type="file" class="form-control" name="pdf_file">
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

