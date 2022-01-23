<?php include('../_partials/top.php') ?>

<h1 class="page-header">Dashboard</h1>

<?php include('data-index.php') ?>

<div class="row">
  <div class="panel well">
    <div class="row">
      <div class="col-md-12">
        <h2><center><strong><font color="blue">Selamat Datang <?php echo $_SESSION['user']['nama_user'];?><i class="fa fa-user"></i></font></strong></center></h2><span></span>
          <div class="col-xs-12">
            <font color="grey"><h4>SELAMAT DATANG DI PENDATAAN PENDUDUK</h4></font>
      </div>
    </div>
                <!-- /.col-lg-12 -->
            <!-- /.row -->
  </div>
 </div>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Data Penduduk</h3>
        <p>
          Total ada <?php echo $jumlah_warga['total'] ?> data penduduk. <?php echo $jumlah_warga_l['total'] ?> di antaranya laki-laki, dan <?php echo $jumlah_warga_p['total'] ?> diantaranya perempuan.
        </p>
        <p>
           Penduduk di atas 17 tahun berjumlah <?php echo $jumlah_warga_ld_17['total'] ?> orang, dan di bawah 17 tahun berjumlah <?php echo $jumlah_warga_kd_17['total'] ?> orang.
        </p>
      </div>
      <div class="panel-footer">
        <a href="../warga" class="btn btn-primary" role="button">
          <span class="glyphicon glyphicon-book"></span> View Details »
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Data Kartu Keluarga</h3>
        <p>Total ada <?php echo $jumlah_kartu_keluarga['total'] ?> data kartu keluarga</p>
      </div>
      <div class="panel-footer">
        <a href="../kartu-keluarga" class="btn btn-primary" role="button">
          <span class="glyphicon glyphicon-inbox"></span> View Details »
        </a>
      </div>
    </div>
  </div>


<?php include('../_partials/bottom.php') ?>

