
<style>
  .table-guru{
    font-size: smaller;
    width: 100%;
    white-space: nowrap;
  }
  
  /* Styling untuk baris yang dipilih */
  .table-guru tbody tr.selected {
    background-color: #b8daff !important;
    color: #212529;
  }
  
  /* Cursor pointer untuk menunjukkan baris dapat diklik */
  .table-guru tbody tr {
    cursor: pointer;
  }
</style>

<div class="card">
    <div class="card-header">
        <i class="bi bi-person-video3"></i>&nbsp; Data Guru
    </div>
    <div class="card-body mt-4">
        <div class="button-guru">
            <button type="button" class="btn btn-primary btn-sm" id="btnaddguru" title="Tambah data guru"><i class="bi bi-plus-circle"></i></button>
            <button type="button" class="btn btn-primary btn-sm" id="btneditguru" title="Edit data guru"><i class="bi bi-pencil-square"></i></button>
            <button type="button" class="btn btn-primary btn-sm" id="btndeleteguru" title="Hapus data guru"><i class="bi bi-trash"></i></button>
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
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No.Telpon</th>
                        <th class="text-center">E-Mail</th>
                        <th class="text-center">Mata Pelajaran</th>
                        <th class="text-center">Jabatan</th>
                    </tr>
                </thead>
                <tbody class="put-data-guru">
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal tambah data guru -->
<div class="modal" id="addGuruModal" tabindex="-1" aria-labelledby="addGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGuruModalLabel"><i class="bi bi-plus-square"></i> TAMBAH DATA GURU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="bi bi-times"></i></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="form-group mt-2 mb-2">
                        <label for="noguru">Nomor ID Guru</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="noguru" readonly>
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="namaguru">Nama Guru</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="namaguru" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="nuptkguru">NUPTK</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="nuptkguru" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="alamatguru">Alamat</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="alamatguru" placeholder="input...">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group  mt-2 mb-2">
                        <label for="tlpguru">No.Telp</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="tlpguru" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="emailguru">E-mail</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="emailguru" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="jabatanguru">Jabatan</label>
                        <select class="form-control form-control-sm form-add-guru" id="jabatanguru">
                            <option value="">_pilih_</option>
                            <option value="guru">Guru</option>
                            <option value="kepsek">Kepala Sekolah</option>
                            <option value="wakepsek">Wakil Kepala Sekolah</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="walikelas">Wali Kelas</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer set-btn-add-guru">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal edit data guru -->
<div class="modal" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuruModalLabel"><i class="bi bi-pencil-square"></i> EDIT DATA GURU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="bi bi-times"></i></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <div class="form-group mt-2 mb-2">
                        <label for="noguruEdit">Nomor ID Guru</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="noguruEdit" readonly>
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="namaguruEdit">Nama Guru</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="namaguruEdit" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="nuptkguruEdit">NUPTK</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="nuptkguruEdit" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="alamatguruEdit">Alamat</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="alamatguruEdit" placeholder="input...">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group  mt-2 mb-2">
                        <label for="tlpguruEdit">No.Telp</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="tlpguruEdit" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="emailguruEdit">E-mail</label>
                        <input type="text" class="form-control form-control-sm form-add-guru" id="emailguruEdit" placeholder="input...">
                    </div>
                    <div class="form-group  mt-2 mb-2">
                        <label for="jabatanguruEdit">Jabatan</label>
                        <select class="form-control form-control-sm form-add-guru" id="jabatanguruEdit">
                            <option value="">_pili h_</option>
                            <option value="guru">Guru</option>
                            <option value="kepsek">Kepala Sekolah</option>
                            <option value="wakepsek">Wakil Kepala Sekolah</option>
                            <option value="walikelas">Wali Kelas</option>
                            <option value="bendahara">Bendahara</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer set-btn-edit-guru">
                
            </div>
        </div>
    </div>
</div>



<script>

    loadgurudata();

    $('#btneditguru, #btndeleteguru').addClass('disabled');
    var selectedRowData = null;
    $('.table-guru tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');
        if ($(this).hasClass('selected')) {
            selectedRowData = {};
            $(this).find('td').each(function() {
                $.each(this.dataset, function(key, val) {
                    selectedRowData[key] = val;
                });
            });
            $('#btneditguru, #btndeleteguru').removeClass('disabled');
        } else {
            selectedRowData = null;
            $('#btneditguru, #btndeleteguru').addClass('disabled');
        }
    });


    // =============== TAMBAH DATA GURU
    $('#btnaddguru').on('click', function(){
        let setBtn = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btnsaveaddguru"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.set-btn-add-guru').html(setBtn);
        $('#noguru').val('GAD'+ generateNumber());
        $('#addGuruModal').modal('show');

        $('#btnsaveaddguru').on('click', function(){
            let jsonsetguru = {
                action: 'addguru',
                noguru: $('#noguru').val(),
                nama: $('#namaguru').val(),
                nuptk: $('#nuptkguru').val(),
                alamat: $('#alamatguru').val(),
                telp: $('#tlpguru').val(),
                email: $('#emailguru').val(),
                jabatan: $('#jabatanguru').val(),
            }

            $.ajax({
                method: 'POST',
                url: 'pages/guru/action-guru.php',
                data: jsonsetguru,
                dataType: 'json',
                success: function(msg){
                    loadgurudata();
                    $('.form-add-guru').val('');
                    $('.form-add-guru').val('').trigger('change');
                    $('#addGuruModal').modal('hide');

                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                },
                error: function(err){
                    Swal.fire({
                        title: 'error',
                        text: 'Error : ' + JSON.stringify(err),
                        icon: 'error'
                    });
                }
            })
        });
    });

    // =============== EDIT DATA GURU
    $('#btneditguru').on('click', function(){
        let setBtn = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="btnsaveeditguru"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.set-btn-edit-guru').html(setBtn);

        let dt = selectedRowData;
        $('#noguruEdit').val(dt.noguru);
        $('#namaguruEdit').val(dt.nama);
        $('#nuptkguruEdit').val(dt.nuptk);
        $('#alamatguruEdit').val(dt.alamat);
        $('#tlpguruEdit').val(dt.tlp);
        $('#emailguruEdit').val(dt.email);
        $('#jabatanguruEdit').val(dt.jabatan).trigger('change');

        $('#editGuruModal').modal('show');

        $('#btnsaveeditguru').on('click', function(){
            let jsonsetguruedit = {
                action: 'editguru',
                id: dt.id,
                noguru: $('#noguruEdit').val(),
                nama: $('#namaguruEdit').val(),
                nuptk: $('#nuptkguruEdit').val(),
                alamat: $('#alamatguruEdit').val(),
                telp: $('#tlpguruEdit').val(),
                email: $('#emailguruEdit').val(),
                jabatan: $('#jabatanguruEdit').val(),
            }

            $.ajax({
                method: 'POST',
                url: 'pages/guru/action-guru.php',
                data: jsonsetguruedit,
                dataType: 'json',
                success: function(msg){
                    loadgurudata();
                    $('#btneditguru, #btndeleteguru').addClass('disabled');
                    $('#editGuruModal').modal('hide');

                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                },
                error: function(err){
                    Swal.fire({
                        title: 'error',
                        text: 'Error : ' + JSON.stringify(err),
                        icon: 'error'
                    });
                }
            })
        });
    });

    // =============== HAPUS DATA GURU
    $("#btndeleteguru").on("click", function(){
        let dt = selectedRowData;
        Swal.fire({
            title: 'Hapus Data Guru',
            text: 'Ingin hapus data guru '+ dt.nama +' ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    method: 'POST',
                    url: 'pages/guru/action-guru.php',
                    data: {
                        action: 'deleteguru',
                        id: dt.id
                    },
                    dataType: 'json',
                    success: function(msg){
                        $('#btneditguru, #btndeleteguru').addClass('disabled');
                        loadgurudata();
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        });
                    },
                    error: function(err){
                        Swal.fire({
                            title: "Error",
                            text: "Error: "+ JSON.stringify(err),
                            icon: 'error'
                        });
                    }
                })
            }
        })
    });

    // =============== LOAD DATA GURU
    function loadgurudata(){

        $.ajax({
            method: 'POST',
            url: 'pages/guru/action-guru.php',
            data: {action: 'loadguru'},
            dataType: 'json',
            success: function(msg){

                $(".table-guru").DataTable().destroy();
                let setDataGuru = '';
                let num = 1;
                $.each(msg.dataguru, function(id,val){
                    let setMapel = '';
                    if(val.mapel_guru != ''){
                        let mapelArray = val.mapel_guru.split(",").map(m => m.trim());
                        mapelArray.forEach(mapel => {
                            setMapel += `<div class="badge bg-primary">${mapel}</div><br>`;
                        })
                    }
                    setDataGuru += `
                    <tr>
                        <td data-id="${val.id_guru}">${num++}</td>
                        <td data-noguru="${val.no_guru}" class="text-center">${val.no_guru}</td>
                        <td data-nama="${val.nama_guru}">${val.nama_guru}</td>
                        <td data-nuptk="${val.nuptk}" class="text-center">${(val.nuptk == '' ? '-' : val.nuptk)}</td>
                        <td data-alamat="${val.alamat_guru}">${val.alamat_guru}</td>
                        <td data-tlp="${val.tlp_guru}">${val.tlp_guru}</td>
                        <td data-email="${val.email_guru}">${val.email_guru}</td>
                        <td>${(val.mapel_guru == '' ? '-' : setMapel)}</td>
                        <td data-jabatan="${val.jabatan}" class="text-center">${val.jabatan}</td>
                    </tr>`;
                });
                $('.put-data-guru').html(setDataGuru);
                $(".table-guru").DataTable({
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
                Swal.fire({
                    title: 'error',
                    text: 'Error : ' + JSON.stringify(err),
                    icon: 'error'
                });
            }
        })
    }




    // ============= FUNCTION
    function generateNumber(length = 5) {
        let result = '';
        for (let i = 0; i < length; i++) {
            result += Math.floor(Math.random() * 10); // angka 0-9
        }
        return result;
    }
</script>