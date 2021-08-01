                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->
                  <?php 
                    $ID = $_SESSION['id'];
                    $dt = mysqli_query($mysqli, "SELECT * FROM tb_users WHERE id = $ID");
                    $data = mysqli_fetch_array($dt);
                  ?>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎EDIT PROFIL PENGGUNA</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          EDIT PROFIL
                            
                        </div>
                        <div class="card-body">
                            <form action="controller.php?page=settings&action=update" method="POST">
                              <div class="modal-body text-gray-900">
                                <div class="form-group">
                                  <label for="data1">Nama</label>
                                  <input type="hidden" name="page1" value="<?php echo $_GET['page'];?>">
                                  <input type="hidden" name="id" value="<?php echo $ID;?>">
                                  <input type="text" class="form-control" id="data1" name="nama" value="<?php echo $data['nama'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="data2">Username</label>
                                  <input type="text" class="form-control" id="data2" name="username" value="<?php echo $data['username'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="data2">Password (Tidak Di Isi Jika tidak Ingin Di Rubah)</label>
                                  <input type="text" class="form-control" id="data2" name="password">
                                </div>
                                <div class="form-group">
                                  <label for="data2">Email</label>
                                  <input type="text" class="form-control" id="data2" name="email" value="<?php echo $data['email'] ?>">
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

            <!-- </div> -->
            