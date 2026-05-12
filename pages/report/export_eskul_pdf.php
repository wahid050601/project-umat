<?php
require "../../vendor/autoload.php";
require "../../function/database.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$idekskul = $_GET["idekskul"];
$idrombel = $_GET["idrombel"];

// 2. Query Data
$query = "
select a.id as id_nilai,
a.id_ekskul,
b.ekskul,
a.id_kelas,
c.ket_rombel,
a.id_siswa,
d.nis_siswa,
d.nama_siswa,
d.jk_siswa,
a.nilai 
from tb_ekskul_nilai a
left join tb_ekskul b on a.id_ekskul = b.id
left join tb_rombel c on a.id_kelas = c.id
left join tb_siswa d on a.id_siswa = d.id_siswa
where b.id = $idekskul -- ID EKSKUL
and c.id = $idrombel; -- ID ROMBEL";
error_log("Query Export PDF : " . $query);
$result = $connect->query($query);

// 3. Menyusun Struktur HTML untuk PDF
// Gunakan CSS internal untuk mengatur tampilan tabel di dalam PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>LAPORAN DATA NILAI EKSTRAKURIKULER</h2>
        <p>Dicetak pada: ' . date('d-m-Y H:i:s') . '</p>
    </div>
    <table class="table table-bordered table-sm table-striped table-eskul">
    <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">No.Induk</th>
            <th class="text-center">Nama Siswa</th>
            <th class="text-center">L/P</th>
            <th class="text-center">Nilai</th>
            <th class="text-center">Predikat</th>
        </tr>
    </thead>
    <tbody>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $predikat = 'D';
        if($row["nilai"] > 90){
            $predikat = 'A';
        }else if($row["nilai"] > 75){
            $predikat = 'B';
        }else if($row["nilai"] < 75){
            $predikat = 'C';
        }else{
            $predikat = '-';
        }
        $num = 1;
        $html .= '<tr>
                    <td>' . $num++ . '</td>
                    <td>' . $row["nis_siswa"] . '</td>
                    <td>' . $row["nama_siswa"] . '</td>
                    <td>' . $row["jk_siswa"] . '</td>
                    <td>' . $row["nilai"] . '</td>
                    <td>' . $predikat . '</td>
                  </tr>';
    }
} else {
    $html .= '<tr><td colspan="6" style="text-align:center;">Data Kosong</td></tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// 4. Proses Rendering Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Aktifkan jika Anda memuat gambar dari URL external
$options->set('defaultFont', 'Arial');

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Opsional) Mengatur ukuran kertas dan orientasi (Portrait/Landscape)
$dompdf->setPaper('A4', 'portrait');

// Render HTML ke PDF
$dompdf->render();

// Output ke Browser (Attachment: true akan otomatis download, false akan preview di tab baru)
$dompdf->stream("laporan_nilai_ekskul_" . date('Ymd') . ".pdf", array("Attachment" => true));
?>