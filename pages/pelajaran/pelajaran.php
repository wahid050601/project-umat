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
                    <select class="form-control form-control-sm" id="mapel">
                        <option value="">_pilih mata pelajaran_</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="jamMulai">Jam Mulai</label>
                    <input type="time" class="form-control form-control-sm" id="jamMulai">
                </div>
                <div class="form-group mt-2">
                    <label for="jamSelesai">Jam Selesai</label>
                    <input type="time" class="form-control form-control-sm" id="jamSelesai">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
    $.ajax({
        url: "services/basic-load.php",
        method: "POST",
        data: {
            action: "getDataGuru",
            column: "id,nama_guru"
        },
        success: function(res){
            let response = JSON.parse(res);
            window.dataGuru = response.data;
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
                    mapelHtml += `<span class="badge ${istirahat} mapel-view">${j.mata_pelajaran}</span>`;
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
    $('.hari-title').text(hari.toUpperCase());
    $('#modalAddJadwal').modal('show');
}




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