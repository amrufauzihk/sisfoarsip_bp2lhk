                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Disposisi Surat Masuk</h1>
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Disposisi</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Tujuan</th>
                                            <th>Disposisi</th>
                                            <th>Surat</th>
                                            <th>Isi</th>
                                            <th>Sifat</th>
                                            <th>Batas Waktu</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>04/MEGAJAYA/03-XI</td>
                                            <td>PT. MEGAJAYA</td>
                                            <td><i class="far fa-eye"></i> Lihat</td>
                                            <td>--</td>
                                            <td><i class="far fa-eye"></i> Lihat</td>
                                            <td>PENTING</td>
                                            <td>03-02-2021</td>
                                            <td>(+) Baru</td>
                                            <td>
                                            <!-- action buttons -->
                                              <ul class="list-inline m-0">
                                                <li class="list-inline-item" data-toggle="modal" data-target="#editModal">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="#deleteModal">
                                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                              </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>04/SKSABADI/03-X</td>
                                            <td>CV. SKSABADI</td>
                                            <td><i class="far fa-eye"></i> Lihat</td>
                                            <td>--</td>
                                            <td><i class="far fa-eye"></i> Lihat  </td>
                                            <td>PENTING</td>
                                            <td>05-02-2021</td>
                                            <td>(✓) Diteruskan</td>
                                            <td>
                                            <!-- action buttons -->
                                            <?php if ($_SESSION['status'] = 'ADMIN') { ?>
                                                    <ul class="list-inline m-0">
                                                <li class="list-inline-item" data-toggle="modal" data-target="#editModal">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="#deleteModal">
                                                  <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                              </ul>
                                                <?php  }elseif ($_SESSION['status'] = 'USER') {
                                                  echo " - ";
                                                } ?>

                                              
                                            </td>
                                        </tr>
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
                    <h5 class="modal-title text-gray-900">Tambah Data - Disposisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form>
                    <div class="modal-body text-gray-900">
                      <div class="form-group">
                        <label for="data1">Nomor Surat</label>
                        <input type="text" class="form-control" id="data1" placeholder=".....">
                      </div>
                      <div class="form-group">
                        <label for="data2">Tujuan</label>
                        <input type="text" class="form-control" id="data2" placeholder=".....">
                      </div>
                      <div class="form-group">
                        <label for="data3">Disposisi</label>
                        <input type="text" class="form-control" id="data3" placeholder="Confirm Password">
                      </div>
                      <div class="form-group">
                        <label for="data4">Surat</label>
                        <input type="text" class="form-control" id="data4" placeholder=".....">
                      </div>
                      <div class="form-group">
                        <label for="data5">Isi</label>
                        <input type="text" class="form-control" id="data5" placeholder=".....">
                      </div>
                      <div class="form-group">
                        <label for="data6">Sifat</label>
                        <input type="text" class="form-control" id="data6" placeholder=".....">
                      </div>
                      <div class="form-group">
                        <label for="data7">Batas Waktu</label>
                        <input type="date" class="form-control" id="data7" placeholder=".....">
                      </div>
                      <div class="form-group">
                        <label for="data8">Status</label>
                        <input type="text" class="form-control" id="data8" placeholder=".....">
                      </div>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>

            <!-- Modal DELETE DATA -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <a class="btn btn-danger" href="#">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal EDIT DATA -->
