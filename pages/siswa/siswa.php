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
      <button type="button" class="btn btn-primary btn-sm" id="btnAddSiswa"><i class="bi bi-plus-circle"></i> Add</button>
      <button type="button" class="btn btn-primary btn-sm disabled" id="btnEditSiswa"><i class="bi bi-pencil-square"></i> edit</button>
      <button type="button" class="btn btn-primary btn-sm disabled" id="btnDeleteSiswa"><i class="bi bi-trash"></i> delete</button>
      <!-- <button type="button" class="btn btn-primary btn-sm"><i class="bi bi-cloud-arrow-up-fill"></i> upload</button>
      <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-download"></i> download</a> -->
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
              <th class="text-center">L/P</th>
              <th class="text-center">Tempat Lahir</th>
              <th class="text-center">Tanggal Lahir</th>
              <th class="text-center">Nama Ayah</th>
              <th class="text-center">Nama Ibu</th>
              <th class="text-center">Kelas</th>
              <th class="text-center">Rombel</th>
              <th class="text-center">No. Telpon</th>
          </tr>
        </thead>
        <tbody class="put-data-siswa">
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- Modal add data siswa -->
<div class="modal" id="addSiswaModal" tabindex="-1" aria-labelledby="addSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSiswaModalLabel"><i class="bi bi-plus-square"></i> TAMBAH DATA SISWA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="bi bi-times"></i></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="mb-2 mt-2">
                        <label for="nissiswa">No.Induk</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="nissiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="nisnsiswa">NISN</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="nisnsiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="niksiswa">NIK</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="niksiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="namasiswa">Nama Siswa/I</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="namasiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="jksiswa">Jenis Kelamin</label></label>
                        <select class="form-control form-control-sm form-add-siswa" id="jksiswa">
                            <option value="">_pilih_</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="tlpsiswa">No.Telp Siswa</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="tlpsiswa" placeholder="input...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 mt-2">
                        <label for="tplahirsiswa">Tempat Lahir</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="tplahirsiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="tglahirsiswa">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-sm form-add-siswa" id="tglahirsiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="ibusiswa">Nama Ibu</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="ibusiswa" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="ayahsiswa">Ayah Ibu</label>
                        <input type="text" class="form-control form-control-sm form-add-siswa" id="ayahsiswa" placeholder="input...">
                    </div>
                    <div class="form-group">
                        <label for="kelassiswa">Kelas</label></label>
                        <select class="form-control form-control-sm form-add-siswa" id="kelassiswa">
                            <option value="">_pilih_</option>
                            <option value="1">I (Satu)</option>
                            <option value="2">II (Dua)</option>
                            <option value="3">III (Tiga)</option>
                            <option value="4">IV (Empat)</option>
                            <option value="5">V (Lima)</option>
                            <option value="6">VI (Enam)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer set-btn-add">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="savedatasiswa"><i class="bi bi-check-circle"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit data siswa -->
<div class="modal" id="editSiswaModal" tabindex="-1" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSiswaModalLabel"><i class="bi bi-pencil-square"></i> EDIT DATA SISWA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="bi bi-times"></i></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="mb-2 mt-2">
                        <label for="nissiswaEdit">No.Induk</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="nissiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="nisnsiswaEdit">NISN</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="nisnsiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="niksiswaEdit">NIK</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="niksiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="namasiswaEdit">Nama Siswa/I</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="namasiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="jksiswaEdit">Jenis Kelamin</label></label>
                        <select class="form-control form-control-sm form-edit-siswa" id="jksiswaEdit">
                            <option value="">_pilih_</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="tlpsiswaEdit">No.Telp Siswa</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="tlpsiswaEdit" placeholder="input...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-2 mt-2">
                        <label for="tplahirsiswaEdit">Tempat Lahir</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="tplahirsiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="tglahirsiswaEdit">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-sm form-edit-siswa" id="tglahirsiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="ibusiswaEdit">Nama Ibu</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="ibusiswaEdit" placeholder="input...">
                    </div>
                    <div class="mb-2 mt-2">
                        <label for="ayahsiswaEdit">Ayah Ibu</label>
                        <input type="text" class="form-control form-control-sm form-edit-siswa" id="ayahsiswaEdit" placeholder="input...">
                    </div>
                    <div class="form-group">
                        <label for="kelassiswaEdit">Kelas</label></label>
                        <select class="form-control form-control-sm form-edit-siswa" id="kelassiswaEdit">
                            <option value="">_pilih_</option>
                            <option value="1">I (Satu)</option>
                            <option value="2">II (Dua)</option>
                            <option value="3">III (Tiga)</option>
                            <option value="4">IV (Empat)</option>
                            <option value="5">V (Lima)</option>
                            <option value="6">VI (Enam)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer set-btn-edit">
                
            </div>
        </div>
    </div>
</div>




<script>
$(document).ready(function() {
    
    loadSiswa()
    
    $('#btnEditSiswa, #btnDeleteSiswa').addClass('disabled');
    var selectedRowData = null;
    $('.table-siswa tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');
        if ($(this).hasClass('selected')) {
            selectedRowData = {};
            $(this).find('td').each(function() {
                $.each(this.dataset, function(key, val) {
                    selectedRowData[key] = val;
                });
            });
            $('#btnEditSiswa, #btnDeleteSiswa').removeClass('disabled');
        } else {
            selectedRowData = null;
            $('#btnEditSiswa, #btnDeleteSiswa').addClass('disabled');
        }
    });


    // ========================== ADD Data Siswa
    $('#btnAddSiswa').on('click', function(){
        // Show modal
        let btnset = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="savedatasiswa"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.set-btn-add').html(btnset);
        $('#addSiswaModal').modal('show');

        // Save Data
        $('#savedatasiswa').on('click', function(){
            let jsongetsiswa = {
                action: 'addsiswa',
                nis: $('#nissiswa').val(),
                nisn: $('#nisnsiswa').val(),
                nik: $('#niksiswa').val(),
                nama: $('#namasiswa').val(),
                jk: $('#jksiswa').val(),
                telp: $('#tlpsiswa').val(),
                tplahir: $('#tplahirsiswa').val(),
                tglahir: $('#tglahirsiswa').val(),
                ibu: $('#ibusiswa').val(),
                ayah: $('#ayahsiswa').val(),
                kelas: $('#kelassiswa').val(),
            }

            $.ajax({
                method: 'POST',
                url: 'pages/siswa/action-siswa.php',
                dataType: 'json',
                data: jsongetsiswa,
                success: function(msg){
                    loadSiswa();
                    $('#addSiswaModal').modal('hide');
                    $('.form-add-siswa').val('');
                    $('.form-add-siswa').val('').trigger('change');
                    
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                },
                error: function(err){
                    alert(err);
                }
            });
        });
    });

    // ========================== EDIT Data Siswa
    $('#btnEditSiswa').on('click', function(){
        let btnEdit = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="savedatasiswaedit"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.set-btn-edit').html(btnEdit);

        let dt = selectedRowData;
        $('#nissiswaEdit').val(dt.nis);
        $('#nisnsiswaEdit').val(dt.nisn);
        $('#niksiswaEdit').val(dt.nik);
        $('#namasiswaEdit').val(dt.nama);
        $('#jksiswaEdit').val(dt.jk).trigger('change');
        $('#tlpsiswaEdit').val(dt.tlp);
        $('#tplahirsiswaEdit').val(dt.tplahir);
        $('#tglahirsiswaEdit').val(dt.tglahir);
        $('#ibusiswaEdit').val(dt.ibu);
        $('#ayahsiswaEdit').val(dt.ayah);
        $('#kelassiswaEdit').val(dt.kelas).trigger('change');

        $('#editSiswaModal').modal('show');

        $('#savedatasiswaedit').on('click', function(){
            let jsongetsiswaedit = {
                action: 'editsiswa',
                id: dt.id,
                nis: $('#nissiswaEdit').val(),
                nisn: $('#nisnsiswaEdit').val(),
                nik: $('#niksiswaEdit').val(),
                nama: $('#namasiswaEdit').val(),
                jk: $('#jksiswaEdit').val(),
                telp: $('#tlpsiswaEdit').val(),
                tplahir: $('#tplahirsiswaEdit').val(),
                tglahir: $('#tglahirsiswaEdit').val(),
                ibu: $('#ibusiswaEdit').val(),
                ayah: $('#ayahsiswaEdit').val(),
                kelas: $('#kelassiswaEdit').val(),
            }
            
            $.ajax({
                method: 'POST',
                url: 'pages/siswa/action-siswa.php',
                dataType: 'json',
                data: jsongetsiswaedit,
                success: function(msg){
                    loadSiswa();
                    $('#editSiswaModal').modal('hide');
                    $('.form-edit-siswa').val('');
                    $('.form-edit-siswa').val('').trigger('change');
                    
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                },
                error: function(err){
                    alert(err);
                }
            });
        });
    });

    // ========================== DELETE Data Siswa
    $('#btnDeleteSiswa').on('click', function(){
        let dt = selectedRowData;
        Swal.fire({
            icon: "question",
            title: "Hapus Data Siswa",
            text: "Ingin hapus data siswa "+ dt.nama +" ?",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: 'pages/siswa/action-siswa.php',
                    dataType: 'json',
                    data: {action: 'deletesiswa', id: dt.id},
                    success: function(msg){
                        loadSiswa();
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        });
                    },
                    error: function(err){
                        alert(JSON.stringify(err));
                    }
                });
            }
        });
    });



    // ========================== LOAD Data Siswa
    function loadSiswa(){
        $.ajax({
            method: 'POST',
            url: 'pages/siswa/action-siswa.php',
            dataType: 'json',
            data: {action: 'getdatasiswa'},
            success: function(msg){
                
                $(".table-siswa").DataTable().destroy();
                let setData = '';
                let num = 1;
                $.each(msg.datasiswa, function(id,val){
                    setData += `
                    <tr>
                        <td data-id="${val.id_siswa}" class="text-center">${num++}</td>
                        <td data-nis="${val.nis_siswa}" class="text-center">${val.nis_siswa}</td>
                        <td data-nisn="${val.nisn_siswa}" class="text-center">${(val.nisn_siswa == '' ? '-' : val.nisn_siswa)}</td>
                        <td data-nik="${val.nik_siswa}" class="text-center">${(val.nik_siswa == '' ? '-' : val.nik_siswa)}</td>
                        <td data-nama="${val.nama_siswa}">${val.nama_siswa}</td>
                        <td data-jk="${val.jk_siswa}" class="text-center">${val.jk_siswa}</td>
                        <td data-tplahir="${val.tplahir_siswa}">${val.tplahir_siswa}</td>
                        <td data-tglahir="${val.tgl_lahir}">${val.tgl_lahir}</td>
                        <td data-ayah="${val.ayah_siswa}">${val.ayah_siswa}</td>
                        <td data-ibu="${val.ibu_siswa}">${val.ibu_siswa}</td>
                        <td data-kelas="${val.kelas_siswa}" class="text-center">${val.kelas_siswa}</td>
                        <td class="text-center">${(val.rombel_siswa == '' ? '-' : val.rombel_siswa)}</td>
                        <td data-tlp="${val.telp_siswa}" class="text-center">${(val.telp_siswa == '' ? '-' : val.telp_siswa)}</td>
                    </tr>`;
                });
                $('.put-data-siswa').html(setData);
                $(".table-siswa").DataTable({
                    scrollX: true,
                });
                
                if(msg.status != 'success'){
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                }
            },
            error: function(err){
                alert(err);
            }
        });
    }

});
</script>