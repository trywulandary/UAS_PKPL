<?php
require_once("../../assets/lib/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
      

    	// Arial bold 15
    	$this->SetFont('Times','B',15);
    	// Move to the right
    	// $this->Cell(60);
    	// Title
        $this->Cell(308,8,'PEMERINTAH KABUPATEN BIAK',0,1,'C');
        $this->Cell(308,8,'DISTRIK NUMFOR',0,1,'C');
        $this->Cell(308,8,'DESA SUMBERKER',0,1,'C');
        $this->SetFont('Times','',13);
        $this->Cell(308,8,'Jalan Goa Jepang, Kampung Sumberker, Distrik Samofa, Kabupaten Biak Numfor, Provinsi Papua, Kode POS : 98156' ,0,1,'C');
    	// Line break
    	$this->Ln(5);

        $this->SetFont('Times','BU',12);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(308,0,'',1,1,'C');
        }

        $this->Ln(1);

        $this->Cell(308,8,'LAPORAN DATA PENDUDUK',0,1,'C');
        $this->Ln(2);

        $this->SetFont('Times','B',9.5);

        // header tabel
        $this->cell(8,7,'NO.',1,0,'C');
        $this->cell(23,7,'NIK',1,0,'C');
        $this->cell(40,7,'NAMA',1,0,'C');
        $this->cell(35,7,'TEMPAT LHR',1,0,'C');
        $this->cell(20,7,'TGL. LHR',1,0,'C');
        $this->cell(8,7,'JK',1,0,'C');
        $this->cell(8,7,'U',1,0,'C');
        $this->cell(50,7,'ALAMAT',1,0,'C');
        $this->cell(7,7,'RT',1,0,'C');
        $this->cell(7,7,'RW',1,0,'C');
        $this->cell(20,7,'AGAMA',1,0,'C');
        $this->cell(26,7,'PERNIKAHAN',1,0,'C');
        $this->cell(16,7,'PDDKN',1,0,'C');
        $this->cell(20,7,'KERJA',1,0,'C');
        $this->cell(24,7,'STATUS',1,1,'C');

    }

    // Page footer
    function Footer()
    {
    	// Position at 1.5 cm from bottom
    	$this->SetY(-15);
    	// Arial italic 8
    	$this->SetFont('Arial','I',8);
    	// Page number
    	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// ambil dari database
$query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga";
$hasil = mysqli_query($db, $query);
$data_warga = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_warga[] = $row;
}


$pdf = new PDF('L', 'mm', [210, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data_warga as $warga) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(23, 7, strtoupper($warga['nik_warga']), 1, 0, 'C');
    $pdf->cell(40, 7, substr(strtoupper($warga['nama_warga']),0 , 17), 1, 0, 'L');
    $pdf->cell(35, 7, strtoupper($warga['tempat_lahir_warga']), 1, 0, 'L');
    $pdf->cell(20, 7, ($warga['tanggal_lahir_warga'] != '0000-00-00') ? date('d-m-Y', strtotime($warga['tanggal_lahir_warga'])) : '', 1, 0, 'C');
    $pdf->cell(8, 7, substr(strtoupper($warga['jenis_kelamin_warga']), 0, 1), 1, 0, 'C');
    $pdf->cell(8, 7, strtoupper($warga['usia_warga']), 1, 0, 'C');
    $pdf->cell(50, 7, substr(strtoupper($warga['alamat_warga']), 0, 20), 1, 0, 'L');
    $pdf->cell(7, 7, strtoupper($warga['rt_warga']), 1, 0, 'C');
    $pdf->cell(7, 7, strtoupper($warga['rw_warga']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($warga['agama_warga']), 1, 0, 'C');
    $pdf->cell(26, 7, strtoupper($warga['status_perkawinan_warga']), 1, 0, 'C');
    $pdf->cell(16, 7, strtoupper($warga['pendidikan_terakhir_warga']), 1, 0, 'C');
    $pdf->cell(20, 7, strtoupper($warga['pekerjaan_warga']), 1, 0, 'C');
    $pdf->cell(24, 7, strtoupper($warga['status_warga']), 1, 1, 'C');
}

	$pdf->Ln(10);

$pdf->Output();
?>
<?php
// Panggil koneksi.php untuk mendapatkan data
include('../../config/koneksi.php');
// Ambil semua data di tabel mahasiswa berdasarkan NIM
$sql = "select * from warga order by id_warga";
// Membuat query
$tampil = mysqli_query($con, $sql);
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
