                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Daftar Pengguna</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                            <a href="index.php?page=add-kode-arsip" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Pengguna</a>
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
                                            <th>Nama Penguuna</th>
                                            <th>Username</th>
                                            <th>E - Mail</th>
                                            <th>Status Pengguna</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT * FROM tb_users");
                                            while($data = mysqli_fetch_array($dt)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['username'];?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php if ($data['status'] == 2){
                                              echo "Admin";
                                            }elseif ($data['status'] == 1) {
                                              echo "User";
                                            } ?></td>
                                            <td>
                                            <!-- action buttons -->
                                            <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                              <ul class="list-inline m-0">
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#editModal".$no;?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                  <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
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
                                                <h5 class="modal-title text-gray-900">Edit - Pengguna</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>

                                              <form action="controller.php?page=settings&action=update" method="POST">
                                                <div class="modal-body text-gray-900">
                                                  <div class="form-group">
                                                    <label for="data1">Nama</label>
                                                    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                                                    <input type="hidden" name="page1" value="<?php echo $_GET['page'];?>">
                                                    <input type="text" class="form-control" id="data1" name="nama" value="<?php echo $data['nama'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Username</label>
                                                    <input type="text" class="form-control" id="data2" name="username" value="<?php echo $data['username'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Password (Tidak Di Isi Jika tidak Ingin Di Rubah)</label>
                                                    <input type="text" class="form-control" id="data2" name="password">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Email</label>
                                                    <input type="text" class="form-control" id="data2" name="email" value="<?php echo $data['email'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Status</label>
                                                    <select name="status" class="form-control show-tick">
                                                      <option value="1" <?php if ($data['status'] == 1 ) {echo "selected";} ?>> User</option>
                                                      <option value="2" <?php if ($data['status'] == 2 ) {echo "selected";} ?>> Admin</option>
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
                                                        <a class="btn btn-danger" href="controller.php?page=settings&action=delete&id=<?php echo $data['id'] ?>&page1=<?php echo $_GET['page']?>">Hapus</a>
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
                    <h5 class="modal-title text-gray-900">Tambah - Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=settings&action=insert" method="POST">
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data1">Nama</label>
                        <input type="hidden" name="page1" value="<?php echo $_GET['page'];?>">
                        <input type="text" class="form-control" id="data1" name="nama">
                      </div>
                      <div class="form-group">
                        <label for="data2">Username</label>
                        <input type="text" class="form-control" id="data2" name="username">
                      </div>
                      <div class="form-group">
                        <label for="data2">Password</label>
                        <input type="text" class="form-control" id="data2" name="password">
                      </div>
                      <div class="form-group">
                        <label for="data2">Email</label>
                        <input type="text" class="form-control" id="data2" name="email">
                      </div>
                      <div class="form-group">
                        <label for="data2">Status</label>
                        <select name="status" class="form-control show-tick">
                          <option value="1"> User</option>
                          <option value="2"> Admin</option>
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