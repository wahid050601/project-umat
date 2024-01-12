<?php
// Cek apakah file telah diunggah
if (isset($_FILES['formFile']) && $_FILES['formFile']['error'] == UPLOAD_ERR_OK) {
    // Tentukan lokasi penyimpanan sementara file
    $tmpFilePath = $_FILES['formFile']['../../dokumen/'];

    // Baca file Excel
    $data = [];
    if (($handle = fopen($tmpFilePath, "r")) !== FALSE) {
        while (($rowData = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $data[] = $rowData;
        }
        fclose($handle);
    }

    // Loop melalui data dan simpan ke database
    foreach ($data as $row) {
        $sql = "INSERT INTO tb_siswa (nis_siswa, nisn_siswa, nik_siswa, nama_siswa, jk_siswa, 
        tplahir_siswa, tgl_lahir, ayah_siswa, ibu_siswa, kelas_siswa, rombel_siswa, telp_siswa) VALUES ('" . implode("', '", $row) . "')";
        $conn->query($sql);
    }

    // Hapus file sementara setelah selesai
    unlink($tmpFilePath);

    echo json_encode([
        "status" => "Sukses",
        "info" => "Data Berhasil di Upload"
    ]);
} else {
    echo json_encode([
        "status" => "Gagal",
        "info" => "Data Gagal di Upload"
    ]);
}
?>