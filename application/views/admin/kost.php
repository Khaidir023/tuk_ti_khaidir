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
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="card-title">Data Kost</h2>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah"><i
                                class="nav-icon fas fa-plus">
                            </i> Tambah
                            Kost</button>
                    </div>
                </div>
            </div>


            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Kost</th>
                            <th>Nama</th>
                            <th>Telpon</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mhs->result_array() as $m):
                            $id = $m['id_kost'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no ?>
                                </td>
                                <td>
                                    <?php echo $m['no_kost'] ?>
                                </td>
                                <td>
                                    <?php echo $m['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $m['telpon'] ?>
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
                <h4 class="modal-title">Tambah Data Kost</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>dashboard/tambah_kost" method="post">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">No Kost</label>
                            <input type="text" class="form-control" name="no_kost" id="exampleInputEmail1"
                                placeholder="Masukkan No Kost Anda">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputPassword1"
                                placeholder="Masukkan Nama Anda">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Telpon</label>
                            <input type="text" class="form-control" name="telpon" id="exampleInputEmail1"
                                placeholder="Masukkan No Telpon Anda">
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
</div>
<!-- /.modal -->

<?php foreach ($mhs->result_array() as $m):
    $id = $m['id_kost'];

    ?>

    <!-- MOdal edit mhs -->
    <div class="modal fade" id="modal-edit<?php echo $id ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDIT DATA KOST</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>dashboard/edit_kost" method="post">
                        <div class="card-body">
                            <input type="hidden" name="kode" value="<?php echo $m['id_kost']; ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Kost</label>
                                <input type="text" class="form-control" name="no_kost" id="exampleInputEmail1"
                                    placeholder="Input No Kost Anda" value="<?php echo $m["no_kost"]; ?>">
                            </div>

                            <div class=" form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $m["nama"] ?>"
                                    id="exampleInputPassword1" placeholder="Input Nama Anda">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telpon</label>
                                <input type="text" class="form-control" name="telpon" value="<?php echo $m["telpon"] ?>"
                                    id="exampleInputPassword1" placeholder="Input Alamat Anda">
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
                    <h4 class="modal-title">Hapus Data KOST</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>dashboard/hapus_kost" method="post">
                        <div class="card-body">
                            <input type="hidden" name="kode" value="<?php echo $m['id_kost']; ?>">
                            <div class="form-group">
                                <p>Apakah anda Yakin untuk menghapus Data <b>
                                        <?php echo $m['nama']; ?>
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