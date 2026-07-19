<style>
.loading {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.9);
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    font-size: 25px;
    }


    /* config component */
    .mapel-view {
        cursor: pointer;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        width: 95%;
    }
</style>


<div class="card">
    <div class="card-header">
        <i class="bi bi-journal-text"></i>&nbsp; Jadwal Pelajaran
    </div>
    <div class="card-body mt-4">
        
        <!-- Formm filter jadwal -->
         <div class="row mb-4">
            <div class="col-sm-3">
                <div class="form-group">
                    <select class="form-control form-control-sm" id="filterkelas">
                        <option value="">_pilih kelas_</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="tahunPelajaran" placeholder="Tahun Pelajaran" readonly>
                </div>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-sm" id="filterbtn"><i class="bi bi-gear-fill"></i> Proses Jadwal</button>
            </div>
         </div>
        
        
        <!-- render jadwal  -->
        <div class="mt-4">
            <!-- alert -->
            <div class="alert alert-warning" role="alert" id="alertInfo">
                silahkan pilih <strong>Kelas</strong>, kemudian klik tombol <strong>Proses Jadwal</strong>
            </div>

            <!-- jadwal -->
            <div class="row" id="renderJadwal">
                <div class="col-md-2">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            SENIN
                            <span class="badge bg-primary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwal('senin')"><i class="bi bi-gear-fill"></i></span>
                        </div>
                        <div class="card-body">
                            <div class="mapel-wraper mt-3" id="jadwalsenin">
                                <span class="badge bg-primary mapel-view">Matematika</span>
                                <span class="badge bg-primary mapel-view">Bahasa Indonesia</span>
                                <span class="badge bg-primary mapel-view">IPA</span>
                                <span class="badge bg-warning mapel-view">istirahat</span>
                                <span class="badge bg-primary mapel-view">PJOK</span>
                                <span class="badge bg-primary mapel-view">IPS</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            SELASA
                            <span class="badge bg-primary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwal('selasa')"><i class="bi bi-gear-fill"></i></span>
                        </div>
                        <div class="card-body">
                            <div class="mapel-wraper mt-3" id="jadwalselasa">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            RABU
                            <span class="badge bg-primary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwal('rabu')"><i class="bi bi-gear-fill"></i></span>
                        </div>
                        <div class="card-body">
                            <div class="mapel-wraper mt-3" id="jadwalrabu">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            KAMIS
                            <span class="badge bg-primary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwal('kamis')"><i class="bi bi-gear-fill"></i></span>
                        </div>
                        <div class="card-body">
                            <div class="mapel-wraper mt-3" id="jadwalkamis">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            Jumat
                            <span class="badge bg-primary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwal('jumat')"><i class="bi bi-gear-fill"></i></span>
                        </div>
                        <div class="card-body">
                            <div class="mapel-wraper mt-3" id="jadwaljumat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header d-flex justify-content-between align-items-start">
                            Sabtu
                            <span class="badge bg-primary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwal('sabtu')"><i class="bi bi-gear-fill"></i></span>
                        </div>
                        <div class="card-body">
                            <div class="mapel-wraper mt-3" id="jadwalsabtu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<!-- MODALS -->
<!-- Modal Add Jadwal -->
<div class="modal fade" id="modalAddJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jadwal <span class="hari-title"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran</label>
                    <select class="form-control form-control-sm" id="addjadwalmapel">
                        <option value="">_pilih mata pelajaran_</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="jamMulai">Jam</label>
                    <select type="time" class="form-control form-control-sm" id="jadwaljam">
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="jamMulai">Guru Mapel</label>
                    <select class="form-control form-control-sm" id="jadwalgurumapel">
                        <option value="">_pilih guru mapel_</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveJadwalBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script>
/* Storage for save temp data loaded */
window.dataGuru = [];
window.dataMapel = [];
window.dataRombel = [];
window.dataJadwal = [];
window.activeEditJadwalId = null;
window.pendingEditJadwal = null;


// first hide render jadwal
showJadwalPage(false);

// render select kelas
loadrombel();

// on select kelas, set tahun pelajaran by data-tprombel
$('#filterkelas').on('change', function(){
    let tprombel = $(this).find(':selected').data('tprombel');
    if(tprombel){
        $('#tahunPelajaran').val(tprombel);
    } else {
        $('#tahunPelajaran').val('');
    }
});


// on click filterbtn, load jadwal
$('#filterbtn').on('click', function(){
    if($('#filterkelas').val() == ''){
        alertJadwal("info", "Info", "Silahkan pilih kelas terlebih dahulu!");
        return;
    }

    $('#alertInfo').hide();
    // load jadwal
    let idkelas = $('#filterkelas').val();
    let tprombel = $('#filterkelas').find(':selected').data('tprombel');
    loadjadwal(idkelas, tprombel);
});




/* CRUD function */
function loadguru(){
    return $.ajax({
        url: "services/basic-load.php",
        method: "POST",
        data: {
            action: "getDataGuru",
            column: "id_guru,nama_guru"
        },
        success: function(res){
            let response = JSON.parse(res);
            window.dataGuru = response.data || [];

            if(response.status == "success"){
                let options = `<option value="">_pilih guru mapel_</option>`;
                response.data.forEach(function(guru){
                    options += `<option value="${guru.id_guru}">${guru.nama_guru}</option>`;
                });
                $('#jadwalgurumapel').html(options);
            }
        },
        error: function(err){
            alertJadwal("error", "Error", "Error : "+ err.statusText);
        }
    });
}
function loadmapel(idkelas = ''){
    return $.ajax({
        url: "services/basic-load.php",
        method: "POST",
        data: {
            action: "getDataMapel",
            idkelas: idkelas
        },
        success: function(res){
            let response = JSON.parse(res);
            window.dataMapel = response.data || [];

            if(response.status == "success"){
                let options = `<option value="">_pilih mata pelajaran_</option>`;
                response.data.forEach(function(mapel){
                    options += `<option value="${mapel.id}">${mapel.mata_pelajaran}</option>`;
                });
                $('#addjadwalmapel').html(options);
            }
        },
        error: function(err){
            alertJadwal("error", "Error", "Error : "+ err.statusText);
        }
    });
}
function loadjam(){
    return $.ajax({
        url: "services/basic-load.php",
        method: "POST",
        data: {
            action: "getDataJamBelajar"
        },
        success: function(res){
            let response = JSON.parse(res);
            window.dataJam = response.data || [];

            if(response.status == "success"){
                let options = `<option value="">_pilih jam_</option>`;
                response.data.forEach(function(jam){
                    options += `<option value="${jam.id}">${jam.label} (${jam.jam_mulai} - ${jam.jam_selesai})</option>`;
                });
                $('#jadwaljam').html(options);
            }
        },
        error: function(err){
            alertJadwal("error", "Error", "Error : "+ err.statusText);
        }
    });
}
function loadrombel(){
    $.ajax({
        url: "pages/nilai/nilai-action.php",
        method: "POST",
        data: {
            action: "loadlistselectkelas"
        },
        success: function(res){
            let response = JSON.parse(res);
            window.dataRombel = response.rombel;

            if(response.status == "success"){
                let options = `<option value="">_pilih kelas_</option>`;
                response.rombel.forEach(function(rom){
                    options += `<option value="${rom.id}" data-tprombel="${rom.tp_rombel}" >${rom.ket_rombel}</option>`;
                });
                $('#filterkelas').html(options);
            } else {
                alert(response.info);
            }
        },
        error: function(err){
            alert("Error : "+ err.statusText);
        }
    });
}
function loadjadwal(idkelas, tprombel){
    $.ajax({
        url: "pages/pelajaran/pelajaran-get-data.php",
        method: "POST",
        data: {
            action: "getJadwalByKelas",
            idkelas : idkelas
        },
        success: function(res){
            // data jadwal
            let response = JSON.parse(res);
            let jadwal = response.datajadwal;
            window.dataJadwal = jadwal;

            // hari
            let hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];

            // set default jadwal to alert
            let alertJadwal = `
            <div class="text-center">
                <i class="bi bi-journal-x"></i>
                <p>jadwal kosong</p>
            </div>`;
            hari.forEach(function(h){
                let mapelHtml = '';
                jadwal[h].forEach(function(j){
                    let istirahat = j.istirahat == 1 ? "bg-warning" : "bg-primary";
                    mapelHtml += `
                        <div class="d-flex align-items-center justify-content-between gap-1 mb-2">
                            <span class="badge ${istirahat} mapel-view">${j.mata_pelajaran}</span>
                            <span class="badge bg-secondary" title="Edit Jadwal" style="cursor: pointer;" onclick="editJadwalItem('${j.id_jadwal}', '${j.hari}', '${j.id_mapel}', '${j.id_waktu}', '${j.id_guru}')"><i class="bi bi-pencil-square"></i></span>
                        </div>
                    `;
                });

                if(jadwal[h].length == 0){
                    $('#jadwal'+h).html(alertJadwal);
                } else {
                    $('#jadwal'+h).html(mapelHtml);
                }
            });
            
            // render jadwal
            showJadwalPage(true);
        },
        error: function(err){
            alertJadwal("error", "Error", "Error : "+ err.statusText);
        }
    });
}


function editJadwal(hari){
    let idkelas = $('#filterkelas').val();

    if(!idkelas){
        alertJadwal("info", "Info", "Silahkan pilih kelas terlebih dahulu!");
        return;
    }

    window.activeEditJadwalId = null;
    window.pendingEditJadwal = null;
    $('#saveJadwalBtn').text('Save changes');
    $('#addjadwalmapel').val('');
    $('#jadwaljam').val('');
    $('#jadwalgurumapel').val('');

    $('.hari-title').text(hari.toUpperCase());
    loadmapel(idkelas);
    loadjam();
    loadguru();
    $('#modalAddJadwal').modal('show');
}

function editJadwalItem(idJadwal, hari, idMapel, idWaktu, idGuru){
    let idkelas = $('#filterkelas').val();

    if(!idkelas){
        alertJadwal("info", "Info", "Silahkan pilih kelas terlebih dahulu!");
        return;
    }

    window.activeEditJadwalId = idJadwal;
    window.pendingEditJadwal = {
        id_mapel: idMapel,
        id_waktu: idWaktu,
        id_guru: idGuru
    };

    $('#saveJadwalBtn').text('Update Jadwal');
    $('.hari-title').text(hari.toUpperCase());

    $.when(
        loadmapel(idkelas),
        loadjam(),
        loadguru()
    ).done(function(){
        if(!window.pendingEditJadwal){
            return;
        }

        $('#addjadwalmapel').val(window.pendingEditJadwal.id_mapel);
        $('#jadwaljam').val(window.pendingEditJadwal.id_waktu);
        $('#jadwalgurumapel').val(window.pendingEditJadwal.id_guru);
        $('#modalAddJadwal').modal('show');
    });
}

$('#saveJadwalBtn').on('click', function(){
    let idkelas = $('#filterkelas').val();
    let hari = $('.hari-title').text().trim().toLowerCase();
    let idMapel = $('#addjadwalmapel').val();
    let idWaktu = $('#jadwaljam').val();
    let idGuru = $('#jadwalgurumapel').val();

    if(!idkelas || !hari || !idMapel || !idWaktu || !idGuru){
        alertJadwal("warning", "Warning", "Harap lengkapi semua form jadwal");
        return;
    }

    $.ajax({
        url: "pages/pelajaran/pelajaran-func-data.php",
        method: "POST",
        data: {
            action: "saveJadwalMapel",
            id_jadwal: window.activeEditJadwalId || '',
            hari: hari,
            id_kelas: idkelas,
            id_mapel: idMapel,
            id_waktu: idWaktu,
            id_guru: idGuru
        },
        success: function(res){
            let response = JSON.parse(res);
            alertJadwal(response.status, response.status == 'success' ? 'Success' : 'Info', response.info);

            if(response.status == 'success'){
                $('#modalAddJadwal').modal('hide');
                loadjadwal(idkelas, $('#filterkelas').find(':selected').data('tprombel'));
            }
        },
        error: function(err){
            alertJadwal("error", "Error", "Error : "+ err.statusText);
        }
    });
});




/* Utility function */
function showJadwalPage(isShow=false){
    if(!isShow){
        $('#alertInfo').show();
        $('#renderJadwal').hide();
        return;
    }
    $('#alertInfo').hide();
    $('#renderJadwal').show();
}
function alertJadwal(status, info, message){
    Swal.fire({
        icon: status,
        title: info,
        text: message
    });
}

</script>