<?php include('../_partials/top.php') ?>

<h1 class="page-header">Data Warga</h1>
<?php include('_partials/menu.php') ?>

<?php include('data-show.php') ?>

<h3>A. Data Pribadi</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">NIK</th>
    <td width="1%">:</td>
    <td><?php echo $data_warga[0]['nik_warga'] ?></td>
  </tr>
  <tr>
    <th>Nama Warga</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['nama_warga'] ?></td>
  </tr>
  <tr>
    <th>Tempat Lahir</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['tempat_lahir_warga'] ?></td>
  </tr>
  <tr>
    <th>Tanggal Lahir</th>
    <td>:</td>
    <td>
      <?php echo ($data_warga[0]['tanggal_lahir_warga'] != '0000-00-00') ? date('d-m-Y', strtotime($data_warga[0]['tanggal_lahir_warga'])) : ''?>
    </td>
  </tr>
  <tr>
    <th>Jenis Kelamin</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['jenis_kelamin_warga'] ?></td>
  </tr>
</table>

<h3>B. Data Alamat</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Alamat KTP</th>
    <td width="1%">:</td>
    <td><?php echo $data_warga[0]['alamat_ktp_warga'] ?></td>
  </tr>
  <tr>
    <th>Alamat</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['alamat_warga'] ?></td>
  </tr>
  <tr>
    <th>Desa/Kelurahan</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['desa_kelurahan_warga'] ?></td>
  </tr>
  <tr>
    <th>Kecamatan</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['kecamatan_warga'] ?></td>
  </tr>
  <tr>
    <th>Kabupaten/Kota</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['kabupaten_kota_warga'] ?></td>
  </tr>
  <tr>
    <th>Provinsi</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['provinsi_warga'] ?></td>
  </tr>
  <tr>
    <th>Negara</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['negara_warga'] ?></td>
  </tr>
  <tr>
    <th>RT</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['rt_warga'] ?></td>
  </tr>
  <tr>
    <th>RW</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['rw_warga'] ?></td>
  </tr>
</table>

<h3>C. Data Lain-lain</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Agama</th>
    <td width="1%">:</td>
    <td><?php echo $data_warga[0]['agama_warga'] ?></td>
  </tr>
  <tr>
    <th>Pendidikan</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['pendidikan_terakhir_warga'] ?></td>
  </tr>
  <tr>
    <th>Pekerjaan</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['pekerjaan_warga'] ?></td>
  </tr>
  <tr>
    <th>Status Perkawinan</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['status_perkawinan_warga'] ?></td>
  </tr>
  <tr>
    <th>Status Sebagai</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['status_sebagai'] ?></td>
  </tr>
  <tr>
    <th>Status Tinggal</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['status_warga'] ?></td>
  </tr>
</table>

<h3>D. Data Aplikasi</h3>
<table class="table table-striped">
  <tr>
    <th width="20%">Diinput oleh</th>
    <td width="1%">:</td>
    <td><?php echo $data_warga[0]['id_user'] ?></td>
  </tr>
  <tr>
    <th>Diinput</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['created_at'] ?></td>
  </tr>
  <tr>
    <th>Diperbaharui</th>
    <td>:</td>
    <td><?php echo $data_warga[0]['updated_at'] ?></td>
  </tr>
</table>

<?php include('../_partials/bottom.php') ?>

<?php
// Panggil koneksi.php untuk mendapatkan data
include('../../config/koneksi.php');
// Ambil semua data di tabel mahasiswa berdasarkan NIM
$sql = "select * from warga order by id_warga";
// Membuat query

// Jika terdapat datanya maka tampilkan
if (mysqli_num_rows($tampil) > 0) {
    // Mulai dari satu (untuk mengganti array yang dimulai dari 0)
    $no = 1;
    // Membuat response menjadi array agar data di expert menjadi array
    $response = array();
    // Mengambil data tersebut dan menjadikan array
    $response["data"] = array();
    // Jika data tersebut ada maka ubah menjadi fetch array
    while ($r = mysqli_fetch_array($tampil)) {
        // Tampilkan semua atribut yang dimasukkan
        $h['id_warga'] = $r['id_warga'];
        $h['nik_warga'] = $r['nik_warga'];
        $h['nama_warga'] = $r['nama_warg'];
        $h['tempat_lahir_warga'] = $r['tempat_lahir_warga'];
        $h['tanggal_lahir_warga'] = $r['tanggal_lahir_warga'];
        // Simpan data array tersebut ke dalam "data" agar dipanggil di proses response
        array_push($response["data"], $h);
    }
    // tutup proses json dengan sintaks PHP json_encode
    echo json_encode($response);
    // jika data tersebut kosong atau tidak ada datanya
} else {
    // Tampilkan pesan Tidak ada data
    $response["message"] = "tidak ada data";
    // tutup proses json dengan sintaks PHP json_encode
    echo json_encode($response);
}

