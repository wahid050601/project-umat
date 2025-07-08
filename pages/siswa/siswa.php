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
  
  /* Styling untuk baris yang dipilih */
  .table-siswa tbody tr.selected {
    background-color: #b8daff !important;
    color: #212529;
  }
  
  /* Cursor pointer untuk menunjukkan baris dapat diklik */
  .table-siswa tbody tr {
    cursor: pointer;
  }
</style>

<div class="card">
  <div class="card-header">
      <i class="bi bi-people-fill"></i>&nbsp; Data Siswa
  </div>
  <div class="card-body mt-4">
    <div class="button-siswa">
      <button type="button" class="btn btn-primary btn-sm" id="btnAddSiswa"><i class="bi bi-plus-circle"></i> Add Student</button>
      <button type="button" class="btn btn-primary btn-sm disabled" id="btnEditSiswa"><i class="bi bi-pencil-square"></i> edit</button>
      <button type="button" class="btn btn-primary btn-sm disabled" id="btnDeleteSiswa"><i class="bi bi-trash"></i> delete</button>
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
            <tr data-id="<?= $siswa["id_siswa"] ?>">
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

<!-- Modal untuk upload data siswa -->
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
$(document).ready(function() {
    // Inisialisasi DataTable
    const table = $(".table-siswa").DataTable({
        scrollX: true,
    });
    
    // Variabel untuk menyimpan data baris yang dipilih
    let selectedRowData = null;
    
    // Event handler untuk seleksi baris pada tabel
    $('.table-siswa tbody').on('click', 'tr', function() {
        // Toggle class 'selected' pada baris yang diklik
        $(this).toggleClass('selected').siblings().removeClass('selected');
        
        // Jika baris dipilih, ambil datanya
        if ($(this).hasClass('selected')) {
            selectedRowData = {
                id: $(this).data('id'), // Mengambil ID dari atribut data-id
                nis: $(this).find('td:eq(0)').text(),
                nisn: $(this).find('td:eq(1)').text(),
                nik: $(this).find('td:eq(2)').text(),
                nama: $(this).find('td:eq(3)').text(),
                jenis_kelamin: $(this).find('td:eq(4)').text(),
                tempat_lahir: $(this).find('td:eq(5)').text(),
                tanggal_lahir: $(this).find('td:eq(6)').text(),
                ayah: $(this).find('td:eq(7)').text(),
                ibu: $(this).find('td:eq(8)').text(),
                kelas: $(this).find('td:eq(9)').text(),
                rombel: $(this).find('td:eq(10)').text(),
                telp: $(this).find('td:eq(11)').text()
            };
            
            console.log('Data baris yang dipilih:', selectedRowData);
            
            // Aktifkan tombol edit dan delete saat baris dipilih
            $('#btnEditSiswa, #btnDeleteSiswa').removeClass('disabled');
        } else {
            // Reset data jika tidak ada baris yang dipilih
            selectedRowData = null;
            
            // Nonaktifkan tombol edit dan delete
            $('#btnEditSiswa, #btnDeleteSiswa').addClass('disabled');
        }
    });
    
    // Inisialisasi tombol edit dan delete sebagai disabled saat halaman dimuat
    $('#btnEditSiswa, #btnDeleteSiswa').addClass('disabled');
    
    // Fungsi untuk mendapatkan data baris yang dipilih
    function getSelectedRowData() {
        return selectedRowData;
    }
    
    // Event handler untuk tombol tambah siswa
    $('#btnAddSiswa').on('click', function() {
        const modal = $.customModal({
            title: 'Tambah Data Siswa',
            content: `
                <form id="formAddSiswa">
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik_siswa" name="nik_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tplahir_siswa" name="tplahir_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahir_siswa" name="tgllahir_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="ayah_siswa" name="ayah_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="ibu_siswa" name="ibu_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas_siswa" name="kelas_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rombel</label>
                        <input type="text" class="form-control" id="rombel_siswa" name="rombel_siswa" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. Telpon</label>
                        <input type="text" class="form-control" id="tlp_siswa" name="tlp_siswa" required>
                    </div>
                </form>
            `,
            size: 'large',
            theme: 'light',
            buttons: [
                {
                    text: 'Batal',
                    class: 'btn-secondary',
                    click: function() {
                        modal.hide();
                    }
                },
                {
                    text: 'Simpan',
                    class: 'btn-primary',
                    click: function() {
                        if ($('#formAddSiswa')[0].checkValidity()) {
                            // Collect form data
                            const formData = {};
                            $('#formAddSiswa').serializeArray().forEach(item => {
                                formData[item.name] = item.value;
                            });
                            formData.action = 'addsiswa';
                            
                            // Send AJAX request
                            $.ajax({
                                url: 'pages/siswa/action-siswa.php',
                                type: 'POST',
                                data: formData,
                                dataType: 'json',
                                success: function(response) {
                                    if(response.status === 'sukses') {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil!',
                                            text: response.info || 'Data siswa berhasil disimpan'
                                        }).then(() => {
                                            $('.tampil').empty();
                                            $('.tampil').load('pages/siswa/siswa.php');
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal!',
                                            text: response.info || 'Gagal menyimpan data siswa'
                                        });
                                    }
                                },
                                error: function() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Terjadi kesalahan saat mengirim permintaan'
                                    });
                                }
                            });
                            
                            modal.hide();
                        } else {
                            $('#formAddSiswa')[0].reportValidity();
                        }
                    }
                }
            ]
        });
        
        modal.show();
    });
    
    // Event handler untuk tombol edit siswa
    $('#btnEditSiswa').on('click', function() {
        // Pastikan ada data siswa yang dipilih
        if (!selectedRowData) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Silahkan pilih data siswa terlebih dahulu!'
            });
            return;
        }
        
        // Ambil ID siswa dari baris yang dipilih
        $.ajax({
            url: 'pages/siswa/action-siswa.php',
            type: 'POST',
            data: {
                action: 'getsiswa',
                nis_siswa: selectedRowData.nis
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'sukses') {
                    const siswaData = response.data;
                    
                    // Buat modal edit siswa
                    const modal = $.customModal({
                        title: 'Edit Data Siswa',
                        content: `
                            <form id="formEditSiswa">
                                <input type="hidden" id="id_siswa" name="id_siswa" value="${siswaData.id_siswa}">
                                <div class="mb-3">
                                    <label class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" value="${siswaData.nis_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NISN</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" value="${siswaData.nisn_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik_siswa" name="nik_siswa" value="${siswaData.nik_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="${siswaData.nama_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" ${siswaData.jk_siswa === 'L' ? 'selected' : ''}>Laki-laki</option>
                                        <option value="P" ${siswaData.jk_siswa === 'P' ? 'selected' : ''}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tp_siswa" name="tp_siswa" value="${siswaData.tplahir_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="${siswaData.tgl_lahir}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="ayah_siswa" name="ayah_siswa" value="${siswaData.ayah_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="ibu_siswa" name="ibu_siswa" value="${siswaData.ibu_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kelas</label>
                                    <input type="text" class="form-control" id="kls_siswa" name="kls_siswa" value="${siswaData.kelas_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rombel</label>
                                    <input type="text" class="form-control" id="rombel_siswa" name="rombel_siswa" value="${siswaData.rombel_siswa}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">No. Telpon</label>
                                    <input type="text" class="form-control" id="telp_siswa" name="telp_siswa" value="${siswaData.telp_siswa}" required>
                                </div>
                            </form>
                        `,
                        size: 'large',
                        theme: 'light',
                        buttons: [
                            {
                                text: 'Batal',
                                class: 'btn-secondary',
                                click: function() {
                                    modal.hide();
                                }
                            },
                            {
                                text: 'Update',
                                class: 'btn-primary',
                                click: function() {
                                    if ($('#formEditSiswa')[0].checkValidity()) {
                                        // Collect form data
                                        const formData = {};
                                        $('#formEditSiswa').serializeArray().forEach(item => {
                                            formData[item.name] = item.value;
                                        });
                                        formData.action = 'editsiswa';
                                        
                                        // Send AJAX request
                                        $.ajax({
                                            url: 'pages/siswa/action-siswa.php',
                                            type: 'POST',
                                            data: formData,
                                            dataType: 'json',
                                            success: function(response) {
                                                if(response.status === 'sukses') {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Berhasil!',
                                                        text: response.info || 'Data siswa berhasil diperbarui'
                                                    }).then(() => {
                                                        $('.tampil').empty();
                                                        $('.tampil').load('pages/siswa/siswa.php');
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Gagal!',
                                                        text: response.info || 'Gagal memperbarui data siswa'
                                                    });
                                                }
                                            },
                                            error: function() {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Error',
                                                    text: 'Terjadi kesalahan saat mengirim permintaan'
                                                });
                                            }
                                        });
                                        
                                        modal.hide();
                                    } else {
                                        $('#formEditSiswa')[0].reportValidity();
                                    }
                                }
                            }
                        ]
                    });
                    
                    modal.show();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mendapatkan data siswa'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan saat mengirim permintaan'
                });
            }
        });
    });
    
    // Event handler untuk tombol delete siswa
    $('#btnDeleteSiswa').on('click', function() {
        // Pastikan ada data siswa yang dipilih
        if (!selectedRowData) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Silahkan pilih data siswa terlebih dahulu!'
            });
            return;
        }
        
        // Buat modal konfirmasi hapus
        const modal = $.customModal({
            title: 'Hapus Data Siswa',
            content: `<p>Apakah Anda yakin ingin menghapus data siswa <strong>${selectedRowData.nama}</strong>?</p>`,
            size: 'medium',
            theme: 'light',
            buttons: [
                {
                    text: 'Batal',
                    class: 'btn-secondary',
                    click: function() {
                        modal.hide();
                    }
                },
                {
                    text: 'Hapus',
                    class: 'btn-danger',
                    click: function() {
                        // Send AJAX request to delete
                        $.ajax({
                            url: 'pages/siswa/action-siswa.php',
                            type: 'POST',
                            data: {
                                action: 'deletesiswa',
                                id_siswa: selectedRowData.id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if(response.status === 'sukses') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil!',
                                        text: response.info || 'Data siswa berhasil dihapus'
                                    }).then(() => {
                                        $('.tampil').empty();
                                        $('.tampil').load('pages/siswa/siswa.php');
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal!',
                                        text: response.info || 'Gagal menghapus data siswa'
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Terjadi kesalahan saat mengirim permintaan'
                                });
                            }
                        });
                        
                        modal.hide();
                    }
                }
            ]
        });
        
        modal.show();
    });
});
</script>