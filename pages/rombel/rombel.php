<style>
    .bucket-rombel {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
   }

   .tb-list-siswa tbody tr.selectedrow {
        background-color: #b8daff !important;
        color: #212529;
    }
</style>

<div class="card">
    <div class="card-header">
        <i class="bi bi-building-fill"></i>&nbsp; Rombongan Belajar
    </div>
    <div class="card-body mt-4">
        <div class="button-rombel-act">
            <button type="button" id="add-rombel" class="btn btn-primary btn-sm" title="Tambah Rombel"><i class="bi bi-plus-circle"></i></button>
            <button type="button" id="edit-rombel" class="btn btn-primary btn-sm" title="Edit Rombel" disabled><i class="bi bi-pencil-square"></i></button>
            <button type="button" id="del-rombel" class="btn btn-primary btn-sm" title="Hapus Rombel" disabled><i class="bi bi-trash"></i></button>
            <button type="button" id="conf-rombel" class="btn btn-primary btn-sm" title="Konfigurasi" disabled><i class="bi bi-house-gear-fill"></i></button>
        </div>
        <hr>
        <div class="bucket-rombel">
            <div class="loading-rombel text-center" style="width: 100%;">
                <img src="assets/img/loading.gif" alt="loading..." width="200px">
                <h3>Loading ...</h3>
            </div>
            <div class="set-rombel"></div>

            <!-- <div class="card" style="width: 15rem;">
                <div class="card-header"><input type="checkbox" id="cnf-kelas">&nbsp; <label for="cnf-kelas">KELAS IA</label></div>
                <div class="card-body">
                    <h5 class="card-title">TP 2024/2025</h5>
                    <span class="badge bg-primary">Wali Kelas:&nbsp; <i class="bi bi-person-fill"></i> Zaini,S.Pd.</span>
                    <br>
                    <span class="badge bg-primary">32 Siswa/i</span>
                </div>
            </div> -->
            
        </div>
    </div>
</div>





<!-- Modal Add -->
<div class="modal" id="addRombelModal" tabindex="-1" aria-labelledby="addRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addRombelModalLabel"><i class="bi bi-plus-circle"></i> TAMBAH ROMBONGAN BELAJAR</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mt-2 mb-2">
                    <label for="">Jenjang Kelas</label>
                    <select name="jenjang" id="jenjang" class="form-control form-control-sm form-add-rombel">
                    </select>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control form-control-sm form-add-rombel" disabled>
                        <option value="">_pilih_</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Wali Kelas</label>
                    <select name="walikelas" id="walikelas" class="form-control form-control-sm form-add-rombel">
                    </select>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Maksimal Siswa/i</label>
                    <input type="number" class="form-control form-control-sm form-add-rombel" id="max">
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Nama Rombel</label>
                    <input type="text" class="form-control form-control-sm form-add-rombel" id="rombel" readonly>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Tahun Pelajaran</label>
                    <input type="text" class="form-control form-control-sm form-add-rombel" id="tp" readonly>
                </div>
            </div>
            <div class="modal-footer modal-add-footer">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="editRombelModal" tabindex="-1" aria-labelledby="editRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editRombelModalLabel"><i class="bi bi-pencil-square"></i> EDIT ROMBONGAN BELAJAR</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group mt-2 mb-2">
                    <label for="">Jenjang Kelas</label>
                    <select name="jenjangEdit" id="jenjangEdit" class="form-control form-control-sm form-edit-rombel">
                    </select>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Kelas</label>
                    <select name="kelasEdit" id="kelasEdit" class="form-control form-control-sm form-edit-rombel" disabled>
                        <option value="">_pilih_</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Wali Kelas</label>
                    <select name="walikelasEdit" id="walikelasEdit" class="form-control form-control-sm form-edit-rombel">
                    </select>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Maksimal Siswa/i</label>
                    <input type="number" class="form-control form-control-sm form-edit-rombel" id="maxEdit">
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Nama Rombel</label>
                    <input type="text" class="form-control form-control-sm form-edit-rombel" id="rombelEdit" readonly>
                </div>
                <div class="form-group mt-2 mb-2">
                    <label for="">Tahun Pelajaran</label>
                    <input type="text" class="form-control form-control-sm form-edit-rombel" id="tpEdit" readonly>
                </div>
            </div>
            <div class="modal-footer modal-edit-footer">
                
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal" id="configRombelModal" tabindex="-1" aria-labelledby="configRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="configRombelModalLabel"><i class="bi bi-gear-fill"></i> KONFIGURASI ROMBONGAN BELAJAR</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="siswa-set card">
                    <div class="card-header"><i class="bi bi-people-fill"></i> Anggota Rombel</div>
                    <div class="card-body">
                        <table class="table table-striped table-sm mt-3 tb-ang-rombel">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No.Induk</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>L/P</th>
                                    <th>Kelas</th>
                                    <th>Rombel</th>
                                </tr>
                            </thead>
                            <tbody class="put-ang-rombel">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="config-siswa row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><i class="bi bi-card-list"></i> Daftar Siswa</div>
                            <div class="card-body">
                                <table class="table table-hover table-sm mt-3 tb-list-siswa">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.Induk</th>
                                            <th>Nama Siswa</th>
                                            <th>L/P</th>
                                            <th>Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody class="put-list-siswa">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><i class="bi bi-card-checklist"></i> Register Siswa</div>
                            <div class="card-body">
                                <div class="button-regis mt-3"></div>
                                <ul class="list-group mt-2">
                                    <li class="list-group-item put-label-siswa-rombel">
                                        <div class="notice-select text-center"><i class="bi bi-arrow-left-circle-fill"></i> Pilih Data Siswa Pada Table Sebelah Kiri</div>
                                        <!-- <span class="badge bg-primary"><i class="bi bi-x-lg" style="cursor: pointer;"></i> Wahid Prayogo</span>
                                        <span class="badge bg-primary"><i class="bi bi-x-lg" style="cursor: pointer;"></i> Nayla Faizah</span>
                                        <span class="badge bg-primary"><i class="bi bi-x-lg" style="cursor: pointer;"></i> Rivansyah</span>
                                        <span class="badge bg-primary"><i class="bi bi-x-lg" style="cursor: pointer;"></i> Royhan Asrori</span>
                                        <span class="badge bg-primary"><i class="bi bi-x-lg" style="cursor: pointer;"></i> Handri Gunawan</span> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer modal-edit-footer">
                
            </div>
        </div>
    </div>
</div>








<script>
// array config rombel siswa
var configRombel = [];

$(document).ready(function() {
    // Load rombel
    loadDataRombel();

    // Add modal
    $('#add-rombel').on('click', function() {
        let btnAddModal = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm save-rombel"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.modal-add-footer').html(btnAddModal);

        $('.form-add-rombel').val('');
        $('.form-add-rombel').val('').trigger('change');

        $('#tp').val(getTahunPelajaran());
        $('#addRombelModal').modal('show');

        $('#jenjang').on('change', function(){
            let jenjang = $(this).val();
            if(jenjang != ''){
                $('#kelas').attr('disabled', false);
            }else{
                $('#kelas').attr('disabled', true);
            }
        })
        $('#kelas, #jenjang').on('change', function(){
            let jenjang = $('#jenjang').val();
            let kelas = $('#kelas').val();
            if(kelas != '' && jenjang != ''){
                $('#rombel').val('KELAS '+ jenjang + kelas);
            }else{
                $('#rombel').val('');
            }
        })

        // load attr
        var existRombel = [];
        $.ajax({
            method: 'POST',
            url: 'pages/rombel/action-rombel.php',
            dataType: 'json',
            data: {action: 'loadattr'},
            success: function(msg){
                if(msg.status == 'success'){
                    // load jenjang
                    let setJenjang = '<option value="">_pilih_</option>';
                    $.each(msg.jenjang, function(id,val){
                        setJenjang += `<option value="${val.jenjang}">${val.romawi} (${val.ket})</option>`;
                    });
                    $('#jenjang').html(setJenjang);

                    // load jenjang
                    let setGuru = '<option value="">_pilih_</option>';
                    $.each(msg.guru, function(id,val){
                        setGuru += `<option value="${val.id_guru}">${val.nama_guru} (${val.no_guru})</option>`;
                    });
                    $('#walikelas').html(setGuru);

                    // load rombel
                    $.each(msg.rombel, function(id,val){
                        existRombel.push(val.ket_rombel);
                    });
                }
            }
        });

        // save rombel
        $('.save-rombel').on('click', function(){
            if(existRombel.includes($('#jenjang').val()+''+$('#kelas').val())){
                Swal.fire({
                    title: 'Duplikasi Rombel',
                    text: 'Rombel '+ $('#jenjang').val()+''+$('#kelas').val() +' sudah ditambahkan',
                    icon: 'warning'
                });
            }else{
                let datarombel = {
                    action: 'add',
                    jenjang: $('#jenjang').val(),
                    kelas: $('#jenjang').val()+''+$('#kelas').val(),
                    max: $('#max').val(),
                    walkel: $('#walikelas').val(),
                    tp: $('#tp').val(),
                }

                $.ajax({
                    method: 'POST',
                    url: 'pages/rombel/action-rombel.php',
                    dataType: 'json',
                    data: datarombel,
                    success: function(msg){
                        if(msg.status == 'success'){
                            $('.form-add-rombel').val('');
                            $('.form-add-rombel').val('').trigger('change');
                            $('#addRombelModal').modal('hide');
                            loadDataRombel();
                        }

                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        });
                    }, error: function(err){
                        alert(JSON.stringify(err));
                    }
                });
            }
        });
    });

    // Edit modal
    $('#edit-rombel').on('click', function() {

        let btnAddModal = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm save-rombel-edit"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.modal-edit-footer').html(btnAddModal);

        $('#jenjangEdit').on('change', function(){
            let jenjang = $(this).val();
            if(jenjang != ''){
                $('#kelasEdit').attr('disabled', false);
            }else{
                $('#kelasEdit').attr('disabled', true);
            }
        })
        $('#kelasEdit, #jenjangEdit').on('change', function(){
            let jenjang = $('#jenjangEdit').val();
            let kelas = $('#kelasEdit').val();
            if(kelas != '' && jenjang != ''){
                $('#rombelEdit').val('KELAS '+ jenjang + kelas);
            }else{
                $('#rombelEdit').val('');
            }
        })

        // load attr
        var idrbl = $("input[name='cnfkelas']:checked").val();
        var existRombel = [];
        var existRombelDetail;
        $.ajax({
            method: 'POST',
            url: 'pages/rombel/action-rombel.php',
            dataType: 'json',
            data: {action: 'loadattr', idrbl: idrbl},
            success: function(msg){
                console.log(msg);
                console.log('id = '+ idrbl)
                if(msg.status == 'success'){
                    // exist data
                    let data = msg.rombeldetail[0];
                    existRombelDetail = data;

                    // load jenjang
                    let setJenjang = '<option value="">_pilih_</option>';
                    $.each(msg.jenjang, function(id,val){
                        setJenjang += `<option value="${val.jenjang}">${val.romawi} (${val.ket})</option>`;
                    });
                    $('#jenjangEdit').html(setJenjang);
                    $('#jenjangEdit').val(data.jenjang_rombel).trigger('change');
                    $('#jenjangEdit').prop('disabled', true);

                    // load kelas
                    $('#kelasEdit').val(data.ket_rombel.slice(-1)).trigger('change');
                    $('#kelasEdit').prop('disabled', true);

                    // load wali kelas
                    let setGuru = '<option value="">_pilih_</option>';
                    $.each(msg.guru, function(id,val){
                        setGuru += `<option value="${val.id_guru}">${val.nama_guru} (${val.no_guru})</option>`;
                    });
                    $('#walikelasEdit').html(setGuru);
                    $('#walikelasEdit').val(data.walkel_rombel).trigger('change');

                    // load max siswa
                    $('#maxEdit').val(data.max_siswa);

                    // load tp
                    $('#tpEdit').val(data.tp_rombel);

                    // load rombel
                    $.each(msg.rombel, function(id,val){
                        existRombel.push(val.ket_rombel);
                    });
                }
            }
        });
        $('#editRombelModal').modal('show');


        // save rombel
        $('.save-rombel-edit').on('click', function(){
            let datarombel = {
                action: 'edit',
                id: idrbl,
                max: $('#maxEdit').val(),
                walkel: $('#walikelasEdit').val()
            }

            $.ajax({
                method: 'POST',
                url: 'pages/rombel/action-rombel.php',
                dataType: 'json',
                data: datarombel,
                success: function(msg){
                    if(msg.status == 'success'){
                        $('.form-edit-rombel').val('');
                        $('.form-edit-rombel').val('').trigger('change');
                        $('#editRombelModal').modal('hide');
                        loadDataRombel();
                    }

                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                }, error: function(err){
                    alert(JSON.stringify(err));
                }
            });
        });

    });

    // Delete modal
    $('#del-rombel').on('click', function() {
        var idrbl = $("input[name='cnfkelas']:checked").val();
        var totalsiswa = $("input[name='cnfkelas']:checked").data('totalsiswa');
        var kelas = $("input[name='cnfkelas']:checked").data('kelas');

        Swal.fire({
            icon: "question",
            title: "Hapus Data Rombel",
            text: "Ingin hapus data rombel kelas "+ kelas +" ?",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if(result.isConfirmed){
                if(totalsiswa != 0){
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Rombel '+ kelas +' terdapat '+ totalsiswa +' siswa aktif. Kosongkan siswa untuk menghapus rombel ini',
                        icon: 'error'
                    });
                }else{
                    $.ajax({
                        method: 'POST',
                        url: 'pages/rombel/action-rombel.php',
                        dataType: 'json',
                        data: {action: 'delete', id: idrbl, rombel: kelas},
                        success: function(msg){
                            loadDataRombel();
                            Swal.fire({
                                title: msg.status,
                                text: msg.info,
                                icon: msg.status
                            });
                        }, error: function(err){
                            alert(JSON.stringify(err));
                        }
                    });
                }
            }
        });
    });

    // Config modal
    $('#conf-rombel').on('click', function() {
        let alertCnf = '<div class="notice-select text-center"><i class="bi bi-arrow-left-circle-fill"></i> Pilih Data Siswa Pada Table Sebelah Kiri</div>';
        let buttonReg = `<button type="button" class="btn btn-primary btn-sm" id="btn-save-cnf"><i class="bi bi-check-lg"></i> simpan</button>`;
        $('.button-regis').html(buttonReg);
        $('.put-label-siswa-rombel').html(alertCnf);
        configRombel = [];

        var idrbl = $("input[name='cnfkelas']:checked").val();
        var totalsiswa = $("input[name='cnfkelas']:checked").data('totalsiswa');
        var kelas = $("input[name='cnfkelas']:checked").data('jenjang');
        var kelasshow = $("input[name='cnfkelas']:checked").data('kelas');

        loadAnggotaRombel(idrbl,kelas);
        loadListSiswa(kelas);
        $('#configRombelModal').modal('show');

        //Save Config
        $('#btn-save-cnf').on('click', function(){
            if(configRombel.length == 0){
                Swal.fire({
                    title: 'Data Siswa Kosong',
                    text: 'Tidak ada data siswa pada list konfigurasi Rombel',
                    icon: 'warning'
                });
            }else{
                Swal.fire({
                    icon: "question",
                    title: "Konfigurasi Rombel",
                    text: "simpan konfigurasi rombel pada kelas "+ kelasshow +" ?",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if(result.isConfirmed){
                        $.ajax({
                            method: 'POST',
                            url: 'pages/rombel/action-rombel.php',
                            dataType: 'json',
                            data: {
                                action: 'config',
                                id: idrbl,
                                siswa: JSON.stringify(configRombel)
                            },
                            success: function(msg){
                                $('.put-label-siswa-rombel').html(alertCnf);
                                configRombel = [];
                                loadAnggotaRombel(idrbl,kelas);
                                loadListSiswa(kelas);

                                Swal.fire({
                                    title: msg.status,
                                    text: msg.info,
                                    icon: msg.status
                                });
                            }
                        });
                    }
                });
            }
        })
    });
});



function loadDataRombel(){
    $.ajax({
        method: 'POST',
        url: 'pages/rombel/action-rombel.php',
        dataType: 'json',
        data: {action: 'loadrombel'},
        success: function(data){
            if(data.status == 'success'){
                let setRombel = '';
                $.each(data.rombel, function(id,val){
                    let max_siswa = val.max_siswa == 0 ? '<i class="bi bi-infinity" style="font-size: 14px;"></i>' : val.max_siswa;
                    setRombel += `
                    <div class="card" style="width: 15rem;">
                        <div class="card-header"><input type="checkbox" name="cnfkelas" id="cnfkelas${val.id}" value="${val.id}" data-totalsiswa="${val.total_siswa}" data-kelas="${val.kelas}" data-jenjang="${val.jenjang_rombel}">&nbsp; <label for="cnfkelas${val.id}">${val.kelas}</label></div>
                        <div class="card-body">
                            <h5 class="card-title">TP ${val.tp_rombel}</h5>
                            <span class="badge bg-primary">Wali Kelas:&nbsp; <i class="bi bi-person-fill"></i> ${val.nama_guru}</span>
                            <br>
                            <span class="badge bg-primary">Total Siswa: ${val.total_siswa}/${max_siswa}</span>
                        </div>
                    </div>`;
                });
                $('.loading-rombel').css('display', 'none');
                $('.set-rombel').html(setRombel);
                $('.set-rombel').css('display', 'contents');
            }

            $('input[name="cnfkelas"]').on('change', function() {
                // Hilangkan checklist dari semua checkbox lain
                $('input[name="cnfkelas"]').not(this).prop('checked', false);

                // Cek apakah ada yang dicentang
                if ($('input[name="cnfkelas"]:checked').length > 0) {
                    $('#edit-rombel').prop('disabled', false);
                    $('#del-rombel').prop('disabled', false);
                    $('#conf-rombel').prop('disabled', false);
                } else {
                    $('#edit-rombel').prop('disabled', true);
                    $('#del-rombel').prop('disabled', true);
                    $('#conf-rombel').prop('disabled', true);
                }
            });
        }
    });
}

function loadAnggotaRombel(id,kelas){
    $.ajax({
        method: 'POST',
        url: 'pages/rombel/action-rombel.php',
        dataType: 'json',
        data: {
            action: 'loadsiswarombel',
            id: id,
            kelas: kelas
        },
        success: function(data){
            $('.tb-ang-rombel').DataTable().destroy();
            let setRow = '';
            let nums = 1;
            $.each(data.siswa, function(id,val){
                setRow += `
                <tr>
                    <td>${nums++}</td>
                    <td>${val.nis_siswa}</td>
                    <td>${val.nisn_siswa}</td>
                    <td>${val.nama_siswa}</td>
                    <td>${val.jk_siswa}</td>
                    <td>${val.kelas_siswa}</td>
                    <td>${val.rombel_siswa}</td>
                </tr>`;
            });
            $('.put-ang-rombel').html(setRow);
            $('.tb-ang-rombel').DataTable();
        }
    });
}

function loadListSiswa(kelas){
    $.ajax({
        method: 'POST',
        url: 'pages/rombel/action-rombel.php',
        dataType: 'json',
        data: {
            action: 'loadlistsiswa',
            kelas: kelas
        },
        success: function(data){
            $('.tb-list-siswa').DataTable().destroy();
            let setRow = '';
            let nums = 1;
            $.each(data.daftar_siswa, function(id,val){
                setRow += `
                <tr>
                    <td><input type="checkbox" value="${val.id_siswa}" data-nama="${val.nama_siswa}" data-nis="${val.nis_siswa}"></td>
                    <td>${val.nis_siswa}</td>
                    <td>${val.nama_siswa}</td>
                    <td>${val.jk_siswa}</td>
                    <td>${val.kelas_siswa}</td>
                </tr>`;
            });
            $('.put-list-siswa').html(setRow);
            $('.tb-list-siswa').DataTable();

            //selected rows
            $(".tb-list-siswa tbody tr").on("click", function(e) {
                if (!$(e.target).is(":checkbox")) {
                    let $checkbox = $(this).find("input[type=checkbox]");
                    $checkbox.prop("checked", !$checkbox.prop("checked"));
                }

                let $checkbox = $(this).find("input[type=checkbox]");
                let value = $checkbox.val();
                let siswa = $checkbox.data('nama');
                let nis = $checkbox.data('nis');

                if ($checkbox.prop("checked")) {
                    // tambahkan kalau belum ada
                    configRombelSiswa(value,siswa,nis)
                    $(this).addClass("selected");
                } else {
                    // hapus kalau ada
                    configRombelSiswa(value,siswa,nis,false)
                    $(this).removeClass("selected");
                }
            });
        }
    });
}

function configRombelSiswa(value,siswa,nis,check=true){
    if(check){
        if (!configRombel.some(item => item.id === value)) {
            configRombel.push({
                id: value,
                siswa: siswa,
                nis: nis,
            });
        }
    }else{
        configRombel = configRombel.filter(item => item.id !== value);
    }
    
    //Loop set label siswa
    let labelSiswa = '';
    configRombel.forEach(vals => {
        labelSiswa += `
        <span class="badge bg-primary" style="cursor: pointer;">${vals.nis}-${vals.siswa}</span>`;
    });
    $('.put-label-siswa-rombel').html(labelSiswa);
    if(configRombel.length == 0){
        let alert = '<div class="notice-select text-center"><i class="bi bi-arrow-left-circle-fill"></i> Pilih Data Siswa Pada Table Sebelah Kiri</div>';
        $('.put-label-siswa-rombel').html(alert);
    }
}



function getTahunPelajaran() {
    const now = new Date();
    const tahun = now.getFullYear();
    const bulan = now.getMonth(); // Januari=0 ... Desember=11

    let tahunPelajaran;
    if (bulan <= 5) { 
        // Januari s/d Juni → (tahun sebelumnya/tahun sekarang)
        tahunPelajaran = (tahun - 1) + "/" + tahun;
    } else { 
        // Juli s/d Desember → (tahun sekarang/tahun depan)
        tahunPelajaran = tahun + "/" + (tahun + 1);
    }

    return tahunPelajaran;
}


</script>