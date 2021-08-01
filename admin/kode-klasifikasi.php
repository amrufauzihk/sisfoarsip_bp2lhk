<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800 border-bottom">‎‎Daftar Kode Klasifikasi</h1>
        <!-- ditambahin icon surat di kiri tulisannya -->
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Kode Klasifikasi</button>
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
                            <th>Kode Klasifikasi</th>
                            <th>Perihal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>5067-KLF22</td>
                            <td>Kerja Sama 1</td>
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
                            <td>5067-KLF23</td>
                            <td>Kerja Sama 2</td>
                            <td>
                                <?php if ($_SESSION['status'] == 'ADMIN') { ?>
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
                            <!-- action buttons -->
                              
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
    <h5 class="modal-title text-gray-900">Tambah - Kode Klasifikasi</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <form>
    <div class="modal-body text-gray-900">
      <div class="form-group">
        <label for="data1">Kode Klasifikasi</label>
        <input type="text" class="form-control" id="data1" placeholder=".....">
      </div>
      <div class="form-group">
        <label for="data2">Perihal</label>
        <input type="text" class="form-control" id="data2" placeholder=".....">
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
