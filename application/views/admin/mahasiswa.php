<div id="messages">
    <?php
    if ($this->session->flashdata('success_msg')) {
        echo '<div id="success-msg" class="alert alert-success">' . $this->session->flashdata('success_msg') . '</div>';
    }

    if ($this->session->flashdata('warning_msg')) {
        echo '<div id="warning_msg" class="alert alert-warning">' . $this->session->flashdata('warning_msg') . '</div>';
    }
    if ($this->session->flashdata('error_msg')) {
        echo '<div id="error-msg" class="alert alert-danger">' . $this->session->flashdata('error_msg') . '</div>';
    }
    ?>
</div>
<!-- Main content -->
<div class="content" id="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="card-title">Data Mahasiswa</h2>
                    </div>
                    <!-- <div class="col-sm-3"> -->
                    <button type="button" class="btn btn-success mr-2" data-toggle="modal"
                        data-target="#modal-tambah"><i class="nav-icon fas fa-plus">
                        </i> Tambah
                        Mahasiswa</button>
                    <!-- <button type="button" class="btn btn-primary" id="printButton">
                            <i class="fas fa-print"></i> Print
                        </button> -->
                    <!-- </div> -->
                    <a href="<?php echo base_url(); ?>dashboard/cetak_pdf" target="_blank" class="btn btn-primary mr-2">
                        <i class="fas fa-print"></i> Print PDF
                    </a>
                    <!-- <button id="downloadPDF" class="btn btn-primary mr-2">
                        <i class="fas fa-print"></i> Download PDF
                    </button> -->
                </div>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nim</th>
                            <th>Beasisswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Alamat Mahasiswa</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mhs->result_array() as $m):
                            $id = $m['NIM'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no ?>
                                </td>
                                <td>
                                    <?php echo $m['Nim'] ?>
                                </td>
                                <td>
                                    <?php echo $id ?>
                                </td>
                                <td>
                                    <?php echo $m['NAMA_BEASISWA'] ?>
                                </td>
                                <td>
                                    <?php echo $m['NAMA'] ?>
                                </td>
                                <td>
                                    <?php echo $m['ALAMAT'] ?>
                                </td>
                                <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modal-edit<?php echo $id ?>"><i class="nav-icon fas fa-edit">
                                        </i> Edit </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-hapus<?php echo $id ?>"><i class="nav-icon fas fa-trash">
                                        </i> Hapus </button>
                                </td>
                            </tr>

                            <?php $no++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- modal tambah mhs -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data MHS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboard/tambah_mhs" method="post"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIM</label>
                            <input type="text" class="form-control" name="nim" id="exampleInputEmail1"
                                placeholder="Input nim">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Beasiswa</label>
                            <select class="custom-select rounded-0" name="beasiswa" id="exampleSelectRounded0">
                                <option value="">Pilih Beasiswa</option>
                                <?php foreach ($bs->result_array() as $b): ?>
                                    <option value="<?php echo $b['ID_BEASISWA'] ?>"><?php echo $b['NAMA_BEASISWA'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputPassword1"
                                placeholder="Input nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="exampleInputPassword1"
                                placeholder="Input alamat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="exampleInputPassword1"
                                placeholder="Input alamat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($mhs->result_array() as $m):
    $id = $m['NIM'];
    ?>

    <!-- MOdal edit mhs -->
    <div class="modal fade" id="modal-edit<?php echo $id ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDIT DATA MHS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>dashboard/edit_mhs" method="post">
                        <div class="card-body">
                            <input type="hidden" name="kode" value="<?php echo $m['NIM']; ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIM</label>
                                <input type="text" class="form-control" name="nim" id="exampleInputEmail1"
                                    placeholder="Input nim" value="<?php echo $m["NIM"]; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Beasiswa</label>
                                <select class="custom-select rounded-0" name="beasiswa" id="exampleSelectRounded0">
                                    <option value="" disabled selected>Pilih Beasiswa</option>
                                    <?php foreach ($bs->result_array() as $b): ?>
                                        <option value="<?php echo $b['ID_BEASISWA']; ?>" <?php if ($m["ID_BEASISWA"] == $b['ID_BEASISWA'])
                                               echo "selected"; ?>>
                                            <?php echo $b['NAMA_BEASISWA']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class=" form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $m["NAMA"] ?>"
                                    id="exampleInputPassword1" placeholder="Input nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $m["ALAMAT"] ?>"
                                    id="exampleInputPassword1" placeholder="Input alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- MOdal Hapus mhs -->
    <div class="modal fade" id="modal-hapus<?php echo $id ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data MHS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>dashboard/hapus_mhs" method="post">
                        <div class="card-body">
                            <input type="hidden" name="kode" value="<?php echo $m['NIM']; ?>">
                            <div class="form-group">
                                <p>Apakah anda Yakin untuk menghapus Data <b>
                                        <?php echo $m['NAMA']; ?>
                                    </b>
                                </p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>