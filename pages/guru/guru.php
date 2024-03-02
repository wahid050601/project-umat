<?php
    // Panggil file DB koneksi
    require "../../function/database.php";


    // Buat query yang di perlukan
    $conn = mysqli_connect($host, $user, $pass, $database);
    $query = "SELECT * FROM tb_guru";


    // Instansiasi Koneksi dan Query
    $data_guru = mysqli_query ($conn, $query);





?>


<div class="pagetitle">
  <h1>DATA GURU</h1>
</div>
<section class="section">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body mt-4">
          <a href="#" onclick="HtmlLoad('pages/guru/add_guru.php')" class="btn btn-primary mb-3">Tambah Guru</a>

          <style>
              table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
              }
              </style>
              <!-- TABLE GURU -->
              <table class="table table-bordered table-guru">
                  <thead class="bg-primary text-white">
                    <tr> 
                        <th class="text-center">No.</th>
                        <th class="text-center">ID GURU</th>
                        <th class="text-center">NAMA GURU</th>
                        <th class="text-center">NUPTK</th>
                        <th class="text-center">MATA PELAJARAN</th>
                        <th class="text-center">JABATAN</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data_guru as $guru) : ?>
                      <tr>
                        <th><?= $nomor; ?></th>
                        <td><?= $guru ["id_guru"] ?></td>
                        <td><?= $guru ["nama_guru"] ?></td>
                        <td><?= $guru ["nuptk"] ?></td>
                        <td><?= $guru ["mapel_guru"] ?></td>
                        <td><?= $guru ["jabatan"] ?></td>
                        <td>
                          <button id="hapus" data-idguru="<?= $guru ['id_guru'] ?>" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                          <a href="#" onclick="HtmlLoad('pages/guru/edit-guru.php?idguru=<?= $guru ['id_guru'] ?>')" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
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

// INI FUNGSI HAPUS DATA GURU
$(".table-guru").on("click", "#hapus", function(){

  Swal.fire({
      title: 'Delete',
      text: 'Ingin hapus data guru ?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: "yes"
  }).then((result) => {
      if(result.isConfirmed){
          $.ajax({
              method: 'POST',
              url: 'pages/guru/hapus-guru.php',
              data: "idguru=" + $(this).data("idguru"),
              dataType: 'json',
              success: function(msg){
                  Swal.fire({
                      title: "Success",
                      text: "Data Guru Berhasil Di Hapus",
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 1500
                  }).then((ok) => {
                      $('.tampil').empty();
                      $('.tampil').load('pages/guru/guru.php');
                  })
              }

          })
      }
  })
})
</script>