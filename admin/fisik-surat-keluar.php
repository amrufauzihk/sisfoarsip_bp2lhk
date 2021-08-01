                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Daftar Fisik Surat Keluar</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                        <div>
                        <a href="?page=fisik-surat-masuk" class="btn btn-sm ">Surat Masuk </a>
                        <a href="?page=fisik-surat-keluar" class="btn btn-sm btn-success">Surat Keluar </a>
                        </div>
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          Daftar Fisik Arsip Surat Keluar
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Arsip</th>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tujuan Surat</th>
                                            <th>Ruang Simpan</th>
                                            <th>Kode Lemari</th>
                                            <th>Kode Ordner</th>
                                            <th>Kode Guide</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "select * from skeluar");
                                            while($data = mysqli_fetch_array($dt)){
                                              $ex = explode("/", $data['kode_arsip']);
                                              $ex1 = explode("(", $ex[2]);
                                              $ex2 = explode(".", $ex1[1]);
                                              $rs = $ex[0];
                                              $kl = $ex[1];
                                              $ko = $ex1[0];
                                              $kg = $ex2[0];
                                              
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['kode_arsip'];?></td>
                                            <td><?php echo $data['nomor_surat'] ?></td>
                                            <td><?php echo $data['tgl_surat'] ?></td>
                                            <td><?php echo $data['tujuan_surat'] ?></td>
                                            <td><?php echo $rs; ?></td>
                                            <td><?php echo $kl; ?></td>
                                            <td><?php echo $ko; ?></td>
                                            <td><?php if ($kg == 1) {
                                                echo "Januari";
                                              } elseif ($kg == 2) {
                                                echo "Februari";
                                              } elseif ($kg == 3) {
                                                echo "Maret";
                                              } elseif ($kg == 4) {
                                                echo "April";
                                              } elseif ($kg == 5) {
                                                echo "Mei";
                                              } elseif ($kg == 6) {
                                                echo "Juni";
                                              } elseif ($kg == 7) {
                                                echo "Juli";
                                              } elseif ($kg == 8) {
                                                echo "Agustus";
                                              } elseif ($kg == 9) {
                                                echo "September";
                                              } elseif ($kg == 10) {
                                                echo "Oktober";
                                              } elseif ($kg == 11) {
                                                echo "November";
                                              } elseif ($kg == 12) {
                                                echo "Desember";
                                              }  ?></td>
                                            
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="<?php echo "editModal".$no;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                              <div class="modal-header border-bottom-secondary">
                                                <h5 class="modal-title text-gray-900">Edit - Kode Arsip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>

                                              <form action="controller.php?page=fisik-arsip&action=update" method="POST">
                                                <div class="modal-body text-gray-900">
                                                  
                                                  <div class="form-group">
                                                    <label for="data2">Kode Arsip</label>
                                                    <select name="kode_arsip" class="form-control show-tick">
                                                            <?php  
                                                              $qry = mysqli_query($mysqli, "SELECT * FROM kode_arsip");
                                                                while($dev = mysqli_fetch_array($qry)){ ?>
                                                            <option value="<?php echo $dev['id_kode'] ?>" <?php if ($dev['id_kode']==$data['kode_arsip2']) {echo "selected";} ?>><?php echo $dev['kode_arsip'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Nomor Surat</label>
                                                    <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_arsip'];?>">
                                                    <input type="text" class="form-control" name="nomor_surat" value="<?php echo $data['nomor_surat'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Tanggal Surat</label>
                                                    <input type="date" class="form-control" name="tgl_surat" value="<?php echo $data['tgl_surat'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Perihal Surat</label>
                                                    <input type="text" class="form-control" name="perihal_surat" value="<?php echo $data['perihal_surat'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Ruang Simpan Surat</label>
                                                    <input type="text" class="form-control" name="ruang_simpan" value="<?php echo $data['ruang_simpan'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Kode Lemari</label>
                                                    <select name="kode_lemari" class="form-control show-tick">
                                                            <?php  
                                                              $qry = mysqli_query($mysqli, "SELECT * FROM ref_lemari");
                                                                while($lemari = mysqli_fetch_array($qry)){ ?>
                                                            <option value="<?php echo $lemari['id'] ?>" <?php if ($lemari['id']==$data['id_lemari']) {echo "selected";} ?>><?php echo $lemari['kode_lemari'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Kode Ordner</label>
                                                    <select name="kode_ordner" class="form-control show-tick">
                                                            <?php  
                                                              $qry = mysqli_query($mysqli, "SELECT * FROM ref_ordner");
                                                                while($ordner = mysqli_fetch_array($qry)){ ?>
                                                            <option value="<?php echo $ordner['id'] ?>" <?php if ($ordner['id']==$data['id_ordner']) {echo "selected";} ?>><?php echo $ordner['kode_ordner'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Kode Guide</label>
                                                    <select name="kode_guide" class="form-control show-tick">
                                                            <?php  
                                                              $qry = mysqli_query($mysqli, "SELECT * FROM ref_guide");
                                                                while($guide = mysqli_fetch_array($qry)){ ?>
                                                            <option value="<?php echo $guide['id'] ?>" <?php if ($guide['id']==$data['id_guide']) {echo "selected";} ?>><?php echo $guide['kode_guide'] ?></option>
                                                        <?php } ?>
                                                    </select>
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
                                                        <h5 class="modal-title" id="deleteModal">Yakin ingin menghapus data ini?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Klik "Hapus" jika anda yakin ingin menghapus data ini.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="controller.php?page=fisik-arsip&action=delete&id=<?php echo $data['id_arsip'] ?>&page1=<?php echo $_GET['page']?>">Hapus</a>
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
                    <h5 class="modal-title text-gray-900">Tambah - Kode Arsip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=fisik-arsip&action=insert" method="POST">
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
                        <input type="text" class="form-control" name="nomor_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Perihal Surat</label>
                        <input type="text" class="form-control" name="perihal_surat">
                      </div>
                      <div class="form-group">
                        <label for="data2">Ruang Simpan Surat</label>
                        <input type="text" class="form-control" name="ruang_simpan">
                      </div>
                      <div class="form-group">
                        <label for="data2">Kode Lemari</label>
                        <select name="kode_lemari" class="form-control show-tick">
                                <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM ref_lemari");
                                    while($lemari = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $lemari['id'] ?>"><?php echo $lemari['kode_lemari'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Kode Ordner</label>
                        <select name="kode_ordner" class="form-control show-tick">
                                <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM ref_ordner");
                                    while($ordner = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $ordner['id'] ?>"><?php echo $ordner['kode_ordner'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Kode Guide</label>
                        <select name="kode_guide" class="form-control show-tick">
                                <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM ref_guide");
                                    while($guide = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $guide['id'] ?>"><?php echo $guide['kode_guide'] ?></option>
                            <?php } ?>
                        </select>
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

<script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    }); </script>