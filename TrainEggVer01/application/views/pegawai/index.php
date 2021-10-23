    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <?php
            if ($this->session->flashdata('error') == TRUE) {
                echo    '<div class="alert alert-warning">';
                echo    $this->session->flashdata('error');
                echo    '</div>';
            }

            if ($this->session->flashdata('sukses') == TRUE) {
                echo    '<div class="alert alert-success">';
                echo    $this->session->flashdata('sukses');
                echo    '</div>';
            }
            ?>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_pegawai">Tambah Data</button>
                </li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Data Table Example
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>id</td>
                                    <td>Nama</td>
                                    <td>Tanggal Lahir</td>
                                    <td>Gender</td>
                                    <td>Agama</td>
                                    <td>Jabatan</td>
                                    <td>Foto</td>
                                    <td>Keterangan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pegawai as $pgw) : ?>
                                    <tr>
                                        <td><?= $pgw->id; ?></td>
                                        <td><?= $pgw->nama; ?></td>
                                        <td><?= $pgw->tgl_lahir; ?></td>
                                        <td><?= $pgw->gender; ?></td>
                                        <td><?= $pgw->agama; ?></td>
                                        <td><?= $pgw->jabatan; ?></td>
                                        <td><img width="100" src="<?php echo base_url('uploads/' . $pgw->foto); ?>">
                                            <br> <?= $pgw->foto  ?>
                                        </td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('pegawai/hapus/' . $pgw->id) ?>" class="btn btn-danger">Hapus</a>
                                                <a href="" data-toggle="modal" data-target="" class="btn btn-warning">Ubah</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

            <p class="small text-center text-muted my-5">
                <em>More table examples coming soon...</em>
            </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal Tambah Data -->
    <div id="tambah_pegawai" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Input Data Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('pegawai/tambah') ?>" method="post" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="id" name="id">id :</label>
                                <input type="number" class="form-control" id="id" name="id" autocomplete="off" required>
                            </div>

                            <div class="form-group col">
                                <label for="nama" name="nama">Nama :</label>
                                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="tgl_lahir" name="tgl_lahir">Tanggal Lahir :</label>
                                <input type="number" maxlength="13" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off" required>
                            </div>

                            <div class="row form-group col">
                                <legend class="col-form-label col-sm-2 pt-0">Gender:</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="laki-laki" checked>
                                        <label class="form-check-label" for="gender1">
                                            Laki - laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="perempuan">
                                        <label class="form-check-label" for="gender2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="agama" name="agama">agama :</label>
                                <select class="form-control" id="agama" name="agama">
                                    <option>Islam</option>
                                    <option>Katolik</option>
                                    <option>Kristen</option>
                                    <option>Budhha</option>
                                    <option>Hindu</option>
                                    <option>Ateis</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="jabatan" name="jabatan">jabatan :</label>
                                <select class="form-control" id="jabatan" name="jabatan">
                                    <option>Admin</option>
                                    <option>User</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="foto" name="foto">Upload Photo :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="foto">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="username" name="username">Username :</label>
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                            </div>

                            <div class="form-group col">
                                <label for="password" name="password">Password :</label>
                                <input type="text" class="form-control" id="password" name="password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>