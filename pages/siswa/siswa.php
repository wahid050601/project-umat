<?php
    // Panggil file DB koneksi
    require "../../function/database.php";


    // Buat query yang di perlukan
    $conn = mysqli_connect($host, $user, $pass, $database);
    $query = "SELECT * FROM tb_siswa";


    // Instansiasi Koneksi dan Query
    $data_siswa = mysqli_query ($conn, $query);
?>


<style>
  .table-siswa{
    font-size: smaller;
    width: 100%;
    white-space: nowrap;
  }
</style>

<div class="card">
  <div class="card-header">
      <i class="bi bi-people-fill"></i>&nbsp; Data Siswa
  </div>
  <div class="card-body mt-4">
    <div class="button-siswa">
      <a href="#" onclick="HtmlLoad('pages/siswa/add.php')" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> add</a>
      <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> edit</a>
      <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-trash"></i> delete</a>
      <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-cloud-arrow-up-fill"></i> upload</button>
      <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-download"></i> download</a>
    </div>
    <hr>

    <div class="content-siswa">
      <table class="table table-bordered table-hover table-sm table-siswa">
        <thead class="bg-secondary text-white">
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
            </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>




  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPLOAD DATA SISWA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data" id="form_input_excel">
        <div class="mb-3">
            <label for="formFile" class="form-label">Pilih Template</label>
            <input class="form-control" type="file" id="formFile" name="formFile" accept=".xls,xlsx">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="uploadbutton">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
</section>


<script>

$(".table-siswa").DataTable({
  scrollX: true,
});

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
});
$('#uploadbutton').on('click',function(){
  var data_excel=new FormData($('#form_input_excel') [0]);
  $.ajax({
    method: "POST",
    url: "pages/siswa/template.php",
    data: data_excel,
    success: function (response) {
    if(response.status == 'sukses'){
      alert("Berhasil")
      $('.tampil').empty();
      $('.tampil').load('pages/siswa/siswa.php');
    }
    else{
      alert("Gagal")
      $('.tampil').empty();
      $('.tampil').load('pages/siswa/siswa.php');
    }
    },
    error: function () {
    alert("Gagal mengunggah file.");
    }
  });
})
</script>