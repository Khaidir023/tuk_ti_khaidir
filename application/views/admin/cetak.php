<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>


<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
} ?>

<body onLoad="window.print()">

    <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="100px" src="<?= base_url() ?>assets/images/logo.png">
            </td>
            <td>
                <font size="6">POLITEKNIK NEGERI BANJARMASIN</font> <br>
                <font size="3">Jl. Brig Jend. Hasan Basri, Pangeran, Kec. Banjarmasin Utara, Kota Banjarmasin,
                    Kalimantan Selatan 70124
                </font>
            </td>

        </tr>
        <tr>
            <td colspan="5">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table><br>
    <div style="text-align: center;">
        <font size="4"><b><u>DATA Cetak</u></b></font><br>
    </div>
    <br>

    <div style="text-align: left; display: inline-block; float: left; margin-right: 50px;">
        <table border="0" style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  " class="table ">
            <div>
                <tbody>

                    <tr style="vertical-align: top; text-align: left;">
                        <td width="90px">Dicetak oleh</td>
                        <td width="10px">:</td>
                        <td>
                            <?php
                            $tes = $this->session->userdata('nama');
                            echo $tes; ?>
                        </td>
                    </tr>

                    <tr style="vertical-align: top; text-align: left;">
                        <td width="90px">Filter</td>
                        <td width="10px">:</td>
                        <td> Period
                            <?php
                            $today = date("Y-m-d"); // Get the current date
                            echo "Hari ini tanggal: " . $today;
                            ?>

                        </td>
                    </tr>

                </tbody>
            </div>
        </table>
    </div>
    <div style="text-align: left; display: inline-block; float: left; margin-right: 50px;">
        <table border="0" style="margin-left: 30px; font-size: 11pt;font-family: 'Times New Roman';  " class="table ">
            <div>
                <tbody>

                    <tr style="vertical-align: top; text-align: left;">
                        <td width="90px">Dicetak oleh</td>
                        <td width="10px">:</td>
                        <td>
                            <?php
                            $tes = $this->session->userdata('nama');
                            echo $tes; ?>
                        </td>
                    </tr>

                    <tr style="vertical-align: top; text-align: left;">
                        <td width="90px">Filter</td>
                        <td width="10px">:</td>
                        <td> Period
                            <?php
                            $today = date("Y-m-d"); // Get the current date
                            echo "Hari ini tanggal: " . $today;
                            ?>

                        </td>
                    </tr>

                </tbody>
            </div>
        </table>
    </div>

    <table border="1" cellspacing="0" width="100%">
        <thead style="text-align: center;">
            <th>No</th>
            <th>NIM</th>
            <th>Beasiswa</th>
            <th>Nama Mahasiswa</th>
            <th>Alamat Beasiswa</th>
            </tr>
        </thead>
        <tbody style="text-align: center;font-size: 11pt;font-family: 'Times New Roman';">
            <?php $no = 0; ?>
            <?php foreach ($mhs->result_array() as $i):
                // $id_visimisi  = $i['id_visimisi '];
                ?>
                <tr>
                    <td>
                        <?php echo $no++; ?>
                    </td>
                    <td>
                        <?php echo $i['NIM']; ?>
                    </td>
                    <td>
                        <?php echo $i['NAMA_BEASISWA']; ?>
                    </td>
                    <td>
                        <?php echo $i['NAMA']; ?>
                    </td>
                    <td>
                        <?php echo $i['ALAMAT']; ?>
                    </td>

                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    <br><br><br>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
        <label>
            <br>
            <p style="text-align: center;">
                Banjarmasin,
                <!-- <?= tgl_indo(date('Y-m-d')) ?><br> -->
                <b>
                    <?php
                    $tes = $this->session->userdata('nama');
                    echo $tes; ?><b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>.................</u></b><br>
            </p>
        </label>

    </div>

</body>

</html>