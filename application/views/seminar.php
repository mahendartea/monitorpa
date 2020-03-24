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
      <!-- table belum seminar -->
      <div class="col-md-12">
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
                           <th>NIM</th>
                           <th>Nama</th>
                           <th>Tanggal Seminar</th>
                           <th>Pembimbing</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tfoot align="center">
                        <tr>
                           <th>No</th>
                           <th>NIM</th>
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
                              <td><?= $mhssmno->nim ?></td>
                              <td><?= $mhssmno->nama ?></td>
                              <?php
                              $tanggal = $mhssmno->tgl;
                              $tgllahir =  tgl_indo(date($tanggal)); ?>
                              <td><?= $tgllahir ?></td>
                              <td><?= $mhssmno->nama_dspembimbing ?></td>
                              <td align="center">
                                 <?php
                                 if ($mhssmno->status == '') {
                                    echo '<button class="badge badge-danger" disabled>Belum Seminar</button>';
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


   </div>
   <div class="row">
      <div class="col-md-12">
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
                           <th>NIM</th>
                           <th>Nama</th>
                           <th>Tanggal Seminar</th>
                           <th>Pembimbing</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tfoot align="center">
                        <tr>
                           <th>No</th>
                           <th>NIM</th>
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
                              <td><?= $mhssm->nim ?></td>
                              <td><?= $mhssm->nama ?></td>
                              <?php
                              $tanggal = $mhssm->tgl;
                              $tgllahir =  tgl_indo(date($tanggal)); ?>
                              <td><?= $tgllahir ?></td>
                              <td><?= $mhssm->nama_dspembimbing ?></td>
                              <td align="center">
                                 <?php
                                 if ($mhssm->status == 'LDP' or $mhssm->status == '') {
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