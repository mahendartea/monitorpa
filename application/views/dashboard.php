<?php
error_reporting('0');
function tgl_indo($date)
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
    $pecahkan = explode('-', $date);
    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total belum terkonfirmasi Seminar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dseminarn ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Sudah Seminar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dseminar ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-people fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Sudah Sidang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dsidangya ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Belum terkonfirmasi Sidang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dsidangno ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- table belum seminar -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Mahasiswa Belum Seminar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Seminar</th>
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Seminar</th>
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>

                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($dataseminno as $mhssmno) : ?>
                                    <tr class="font-weight-lighter">
                                        <td align="center"><?= $no ?></td>
                                        <td><span class="badge badge-info"><?= $mhssmno->nim ?></span> | <span class="badge badge-primary"><?= $mhssmno->nama ?></span></td>
                                        <?php
                                        $tanggal = $mhssmno->tgl;
                                        $tgllahir =  tgl_indo(date($tanggal)); ?>
                                        <td><?= $tgllahir ?></td>
                                        <td><?= $mhssmno->nama_dspembimbing ?></td>
                                        <td align="center">
                                            <?php
                                            if ($mhssmno->status == '') {
                                                echo '<button class="badge badge-primary" disabled>Belum Seminar</button>';
                                            } else {
                                                echo '<button class="badge badge-success" disabled>Sudah</button>';
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- table sudah seminar -->
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa Telah Seminar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTabledua" width="100%" cellspacing="0">
                            <thead align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Seminar</th>
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot align="center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Seminar</th>
                                    <th>Pembimbing</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($dataseminar as $mhssm) : ?>
                                    <tr class="font-weight-lighter">
                                        <td align="center"><?= $no ?></td>
                                        <td><?= $mhssm->nama ?> <span class="badge badge-info"><?= $mhssm->nim ?></span></td>
                                        <?php
                                        $tanggal = $mhssm->tgl;
                                        $tgllahir =  tgl_indo(date($tanggal)); ?>
                                        <td><?= $tgllahir ?></td>
                                        <td><?= $mhssm->nama_dspembimbing ?></td>
                                        <td align="center">
                                            <?php
                                            if ($mhssm->status == 'LDP') {
                                                echo '<button class="badge badge-primary" disabled>Lulus Dengan Perbaikan</button>';
                                            } else {
                                                echo '<button class="badge badge-success" disabled>Lulus Tanpa Perbaikan</button>';
                                            }

                                            ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
<!-- /.container-fluid -->