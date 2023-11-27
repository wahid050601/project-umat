<?php
    // Panggil file DB koneksi
    require "../../function/database.php";


    // Buat query yang di perlukan
    $conn = mysqli_connect($host, $user, $pass, $database);
    $query = "SELECT * FROM tb_siswa";


    // Instansiasi Koneksi dan Query
    $data_siswa = mysqli_query ($conn, $query);






?>


<div class="pagetitle">
  <h1>DATA SISWA</h1>
</div>
<section class="section">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body mt-4">
          <a href="#" onclick="HtmlLoad('pages/siswa/add.php')" class="btn btn-primary btn-sm mb-3"><i class="fas fa-plus"></i> Tambah Siswa</a>
          <a href="#" onclick="HtmlLoad('pages/siswa/add.php')" class="btn btn-success btn-sm mb-3"><i class="cloud-upload"></i> Upload</a>

          <style>
              table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
              }
              </style>
              <table class="table table-bordered table-siswa">
                  <thead class="bg-primary text-white">
                    <tr> 
                        <th class="text-center">No.</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">NISN</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Tempat Lahir</th>
                        <th class="text-center">Tanggal Lahir</th>
                        <th class="text-center">Nama Ayah</th>
                        <th class="text-center">Nama Ibu</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Rombel</th>
                        <th class="text-center">No. Telpon</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_siswa as $siswa) : ?>
                      <tr>
                        <th><?= $nomor; ?></th>
                        <td><?= $siswa ["nis_siswa"] ?></td>
                        <td><?= $siswa ["nisn_siswa"] ?></td>
                        <td><?= $siswa ["nik_siswa"] ?></td>
                        <td><?= $siswa ["nama_siswa"] ?></td>
                        <td><?= $siswa ["jk_siswa"] ?></td>
                        <td><?= $siswa ["tplahir_siswa"] ?></td>
                        <td><?= $siswa ["tgl_lahir"] ?></td>
                        <td><?= $siswa ["ayah_siswa"] ?></td>
                        <td><?= $siswa ["ibu_siswa"] ?></td>
                        <td><?= $siswa ["kelas_siswa"] ?></td>
                        <td><?= $siswa ["rombel_siswa"] ?></td>
                        <td><?= $siswa ["telp_siswa"] ?></td>
                        <td>
                          <button id="hapus" data-idsiswa="<?= $siswa ['id_siswa'] ?>" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                          <a href="#" onclick="HtmlLoad('pages/siswa/edit-siswa.php?idsiswa=<?= $siswa ['id_siswa'] ?>')" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                        </td>
                      </tr>
                    <?php $nomor++; ?>
                    <?php endforeach; ?>
                  </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// INI FUNGSI HAPUS DATA SISWA
$(".table-siswa").on("click", "#hapus", function(){

  Swal.fire({
      title: 'Delete',
      text: 'Ingin hapus data siswa ?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: "yes"
  }).then((result) => {
      if(result.isConfirmed){
          $.ajax({
              method: 'POST',
              url: 'pages/siswa/hapus-siswa.php',
              data: "idsiswa=" + $(this).data("idsiswa"),
              dataType: 'json',
              success: function(msg){
                  Swal.fire({
                      title: "Success",
                      text: "Data Siswa Berhasil Di Hapus",
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 1500
                  }).then((ok) => {
                      $('.tampil').empty();
                      $('.tampil').load('pages/siswa/siswa.php');
                  })
              }

          })
      }
  })
})
</script>