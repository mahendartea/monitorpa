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

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <?php if (isset($prodi)) : ?>
                        <?php foreach ($prodi as $pro) : ?>
                            Selamat Datang Bpk/Ibu <span class="font-weight-bold"><?= $this->session->userdata('nama') ?></span> | <span class="badge badge-primary"><?= $pro->nama_prodi ?></span>
                        <?php endforeach; ?>
                    <?php else : ?>
                        Selamat Datang Admin
                    <?php endif ?>
                </div>
                <div class="card-body">
                    Selamat Datang di Aplikasi monitoring Pembimbing Akademik/Pembimbing Skripsi. Aplikasi ini hanya menyediakan akses untuk Ka. Prodi pada prodi-prodi di Universitas Ubudiyah Indonesia. Ka. Prodi dapat memantau Dosen dibawahnya yang membimbing mahasiswa bimbingannya mulai dari seminar hingga sidang. Terima kasih!
                </div>
            </div>
        </div>
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

</div>
<!-- /.container-fluid -->