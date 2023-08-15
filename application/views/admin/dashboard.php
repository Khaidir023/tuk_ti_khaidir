<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <!-- Small Box (Stat card) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Data Mahasiswa</h3>
                        <?php

                        $jml_mhs = count($mhs->result()); // Get the count
                        ?>
                        <p>
                            <?php echo $jml_mhs; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>dashboard/mahasiswa" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Data Beasiswa</h3>
                        <?php

                        $jml_bs = count($bs->result()); // Get the count
                        ?>
                        <p>
                            <?php echo $jml_bs; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo base_url(); ?>dashboard/beasiswa" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- tutup row -->
    </div><!-- /.container-fluid -->
    <?php if ($this->session->flashdata('msg')): ?>
        <script>
            $(document).ready(function () {
                $.Toasts('create', {
                    title: 'Success',
                    body: '<?php echo $this->session->flashdata('msg'); ?>',
                    icon: 'success',
                    position: 'bottomRight'
                });
            });
        </script>
    <?php endif; ?>
</div>