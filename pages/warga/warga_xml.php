<?php
// Panggil koneksi.php nya untuk mendapatkan data
include "koneksi.php";
// Panggil tipe content yaitu XML ke dalam header
header('Content-Type: text/xml');
// Ambil semua data di tabel mahasiswa
$query = "SELECT * FROM tgr_buku_tamu";
//Membuat query
$hasil = mysqli_query($con, $query);
// Membuat field baru yang diambil dari query
$jumField = mysqli_num_fields($hasil);
// Tampilkan XML Version
echo "<?xml version='1.0'?>";
// Tampilkan proses data yang akan ditampilkan 
echo "<data>";
// Membuat perulangan while menggunakan fetch array agar data dijadikan array
while ($data = mysqli_fetch_array($hasil)) {
	// Tampilkan data-data dibawah ini
    echo "<tgr_buku_tamu>";
    echo "<id>", $data['id'], "</id>";
    echo "<nama>", $data['nama'], "</nama>";
    echo "<kelas>", $data['kelas'], "</kelas>";
    echo "<keperluan>", $data['keperluan'], "</keperluan>";
    echo "<tanggal>", $data['tanggal'], "</tanggal>";
    echo "</tgr_buku_tamu>";
}
// Tutup proses data yang sudah ditampilkan
echo "</data>";
