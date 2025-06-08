<?php
    // Panggil file DB koneksi
    require "../../function/database.php";


    // Buat query yang di perlukan
    $conn = mysqli_connect($host, $user, $pass, $database);
    $query = "SELECT * FROM tb_guru";


    // Instansiasi Koneksi dan Query
    $data_guru = mysqli_query ($conn, $query);

?>


<style>
  .table-guru {
    font-size: smaller;
    width: 100%;
    white-space: nowrap;
  }
</style>

<div class="card">
  <div class="card-header">
      <i class="bi bi-person-video3"></i>&nbsp; Data Guru
  </div>
  <div class="card-body mt-4">
    <div class="button-guru">
      <a href="#" onclick="HtmlLoad('pages/guru/add_guru.php')" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> add</a>
      <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> edit</a>
      <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-trash"></i> delete</a>
    </div>
    <hr>

    <div class="content-guru">
      <table class="table table-bordered table-sm table-hover table-guru">
        <thead class="bg-secondary text-white">
          <tr> 
              <th class="text-center">No.</th>
              <th class="text-center">ID Guru</th>
              <th class="text-center">Nama Guru</th>
              <th class="text-center">NUPTK</th>
              <th class="text-center">Mata Pelajaran</th>
              <th class="text-center">Jabatan</th>
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
            </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>



<script>

  $(".table-guru").DataTable();

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