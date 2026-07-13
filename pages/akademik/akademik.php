
<div class="card">
    <div class="card-header">
    <i class="bi bi-database-fill-gear"></i>&nbsp; Konfigurasi Master Akademik
    </div>
    <div class="card-body mt-4">
        
        <!-- MATA PELAJARAN -->
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item"><i class="bi bi-circle"></i> <span style="font-weight: 700;">Mata Pelajaran</span></li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-striped table-bordered table-sm table-mapel">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="set-table-mapel">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: 700;">Form Mata Pelajaran</span>
                        <hr>
                        <div class="form-group mt-2 mb-2">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control form-control-sm" id="mapel" placeholder="input...">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label>Kelas</label>
                            <select class="form-control form-control-sm" id="kelas"></select>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="savemapel"><i class="bi bi-check-circle"></i> Simpan</button>
                    </div>
                </div>
            </li>
        </ul>

        <!-- EKSKUL -->
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item"><i class="bi bi-circle"></i> <span style="font-weight: 700;">Ekstrakurikuler</span></li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-striped table-bordered table-sm table-ekskul">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Ekskul</th>
                                    <th>Pelatih</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="set-table-ekskul">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: 700;">Form Ekstrakurikuler</span>
                        <hr>
                        <div class="form-group mt-2 mb-2">
                            <label>Ekskul</label>
                            <input type="text" class="form-control form-control-sm" id="ekskul" placeholder="input...">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label>Nama Pelatih</label>
                            <input type="text" class="form-control form-control-sm" id="pelatih" placeholder="input...">
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="saveeskul"><i class="bi bi-check-circle"></i> Simpan</button>
                    </div>
                </div>
            </li>
        </ul>

        <!-- JAM PEMBELAJARAN -->
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item"><i class="bi bi-circle"></i> <span style="font-weight: 700;">Jam Pembelajaran</span></li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-striped table-bordered table-sm table-jampembelajaran">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Label</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="set-table-jampembelajaran">
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <span style="font-weight: 700;">Form Jam Pembelajaran</span>
                        <hr>
                        <div class="form-group mt-2 mb-2">
                            <label>Label</label>
                            <input type="text" class="form-control form-control-sm jam-pembelajaran-form" id="label" placeholder="input..." readonly>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label>Jam Mulai</label>
                            <input type="time" class="form-control form-control-sm jam-pembelajaran-form" id="mulai" placeholder="input...">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label>Jam Selesai</label>
                            <input type="time" class="form-control form-control-sm jam-pembelajaran-form" id="selesai" placeholder="input...">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <input type="checkbox" id="istirahat" class="jam-pembelajaran-form">
                            <label for="istirahat">Jam Istirahat</label>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="savejampembelajaran"><i class="bi bi-check-circle"></i> Simpan</button>
                    </div>
                </div>
            </li>
        </ul>


    </div>
</div>

<script>
// ============================================== EKSKUL ==============================================
// Load ekskul
loadEkskul();

// Add Ekskul
$('#saveeskul').on('click', function(){
    addEkskul($('#ekskul').val(), $('#pelatih').val());
});

function loadEkskul(){
    $.ajax({
        url: 'pages/eskul/eskul-action.php',
        method: 'post',
        dataType: 'json',
        data: {action: 'loadekskul'},
        success: function(eks){
            $(".table-ekskul").DataTable().destroy();

            let settable = '';
            let nums = 1;
            $.each(eks.ekskul, function(id,val){
                settable += `
                <tr>
                    <td class="text-center">${nums++}</td>
                    <td>${val.ekskul}</td>
                    <td>${val.pelatih}</td>
                    <td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm" onclick="delEkskul('${val.id}')"><i class="bi bi-trash"></i></button></td></td>
                </tr>`;
            });
            $('.set-table-ekskul').html(settable);
            $(".table-ekskul").DataTable({
                scrollX: true,
            });
            
        }

    })
}
function addEkskul(ekskul,pelatih){
    if(ekskul == '' || pelatih == ''){
        Swal.fire({
            title: 'Error',
            text: 'Ekskul dan nama pelatih harus di isi !',
            icon: 'error'
        });
        return false;
    }

    $.ajax({
        url: 'pages/eskul/eskul-action.php',
        method: 'post',
        dataType: 'json',
        data: {
            action: 'addekskul',
            ekskul: ekskul,
            pelatih: pelatih
        },
        success: function(msg){
            loadEkskul();
            $('#ekskul').val('');
            $('#pelatih').val('');

            Swal.fire({
                title: msg.status,
                text: msg.info,
                icon: msg.status
            });
        }
    });
}
function delEkskul(idkeskul){
    Swal.fire({
        title: 'Hapus Data Ekskul',
        text: 'Ingin hapus data ekstrakurikuler ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url: 'pages/eskul/eskul-action.php',
                method: 'post',
                dataType: 'json',
                data: {
                    action: 'deleteekskul',
                    idekskul: idkeskul
                },
                success: function(msg){
                    loadEkskul();

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
// ============================================== END EKSKUL ==============================================

// ============================================== MATA PELAJARAN ==============================================
// Load Mata Pelajaran Akademik
loadMapelAkademik();

// Add Mata Pelajaran Akademik
$('#savemapel').on('click', function(){
    addMapel($('#mapel').val(), $('#kelas').val());
});

function loadMapelAkademik(){
    $.ajax({
        url: 'pages/pelajaran/pelajaran-get-data.php',
        method: 'post',
        dataType: 'json',
        data: {action: 'getMapelAkademik'},
        success: function(eks){
            $(".table-mapel").DataTable().destroy();

            let settable = '';
            let nums = 1;
            $.each(eks.datamapelakademik, function(id,val){
                settable += `
                <tr>
                    <td class="text-center">${nums++}</td>
                    <td>${val.mata_pelajaran}</td>
                    <td>${val.kelas}</td>
                    <td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm" onclick="delMapelAkademik('${val.id}')"><i class="bi bi-trash"></i></button></td></td>
                </tr>`;
            });
            $('.set-table-mapel').html(settable);
            $(".table-mapel").DataTable({
                scrollX: true,
            });
            
            // set list kelas
            let listKelas = '<option value="">_pilih_</option>';
            $.each(eks.datarombel, function(id,val){
                listKelas += `<option value="${val.id}">${val.ket_rombel}</option>`;
            });
            $('#kelas').html(listKelas);
        }

    })
}
function addMapel(mapel,kelas){
    if(mapel == '' || kelas == ''){
        Swal.fire({
            title: 'Error',
            text: 'Mata pelajaran dan kelas harus di isi !',
            icon: 'error'
        });
        return false;
    }

    $.ajax({
        url: 'pages/pelajaran/pelajaran-func-data.php',
        method: 'post',
        dataType: 'json',
        data: {
            action: 'addMapelAkademik',
            mapel: mapel,
            kelas: kelas
        },
        success: function(msg){
            loadMapelAkademik();
            $('#mapel').val('');
            $('#kelas').val('');

            Swal.fire({
                title: msg.status,
                text: msg.info,
                icon: msg.status
            });
        }
    });
}
function delMapelAkademik(idmapel){
    Swal.fire({
        title: 'Hapus Data Mata Pelajaran',
        text: 'Ingin hapus data mata pelajaran ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url: 'pages/pelajaran/pelajaran-func-data.php',
                method: 'post',
                dataType: 'json',
                data: {
                    action: 'deleteMapelAkademik',
                    idmapel: idmapel
                },
                success: function(msg){
                    loadMapelAkademik();

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
// ============================================== END MATA PELAJARAN ==============================================

// ============================================== JAM PEMBELAJARAN ==============================================
// Load Jam Pembelajaran Akademik
window.dataStackJamPembelajaran = window.dataStackJamPembelajaran || [];
loadJamPembelajaran();

// Add Jam Pembelajaran Akademik
$('#savejampembelajaran').on('click', function(){
    let dataPembelajaran = {
        action: 'addJamPembelajaran',
        label: $('#label').val(),
        mulai: $('#mulai').val(),
        selesai: $('#selesai').val(),
        istirahat: $('#istirahat').is(':checked') ? 1 : 0
    };

    // Validasi input kosong
    if (!dataPembelajaran.mulai || !dataPembelajaran.selesai) {
        Swal.fire({
            title: 'Error',
            text: 'Jam mulai dan jam selesai harus di isi!',
            icon: 'error'
        });
        return false;
    }

    // Validasi logis: Jam mulai tidak boleh lebih besar dari jam selesai
    if (dataPembelajaran.mulai >= dataPembelajaran.selesai) {
        Swal.fire({
            title: 'Error',
            text: 'Jam selesai harus lebih dari jam mulai.',
            icon: 'error'
        });
        return false;
    }

    // Validasi urutan waktu dengan data terakhir di STACK
    if (dataStackJamPembelajaran.length > 0) {
        const jamSelesaiTerakhir = dataStackJamPembelajaran[dataStackJamPembelajaran.length - 1].selesai;
        if (dataPembelajaran.mulai < jamSelesaiTerakhir) {
            Swal.fire({
                title: 'Error',
                text: `Waktu bentrok. Jam sebelumnya selesai pukul ${jamSelesaiTerakhir}.`,
                icon: 'error'
            });
            return false;
        }
    }

    // process add jam pembelajaran
    addJamPembelajaran(dataPembelajaran);

});

function loadJamPembelajaran(){
    $.ajax({
        url: 'pages/akademik/akademik-load.php',
        method: 'post',
        dataType: 'json',
        data: {action: 'loadJamPembelajaran'},
        success: function(eks){
            $(".table-jampembelajaran").DataTable().destroy();

            let settable = '';
            let nums = 1;
            $.each(eks.jamBelajar, function(id,val){
                const isLastItem = (id === eks.jamBelajar.length - 1);
                const btnHapusHTML = isLastItem 
                    ? `<button type="button" class="btn btn-outline-danger btn-sm" onclick="delJamPembelajaran('${val.id}')"><i class="bi bi-trash"></i></button></td>`
                    : `<button type="button" class="btn btn-outline-secondary btn-sm" disabled><i class="bi bi-lock-fill"></i></button></td>`;

                settable += `
                <tr>
                    <td class="text-center">${nums++}</td>
                    <td>${val.label}</td>
                    <td>${val.jam_mulai}</td>
                    <td>${val.jam_selesai}</td>
                    <td class="text-center">${btnHapusHTML}</td>
                </tr>`;
            });
            $('.set-table-jampembelajaran').html(settable);
            $(".table-jampembelajaran").DataTable({
                scrollX: true,
            });

            // auto fill form jam pembelajaran (label)
            var stack = eks.stackJamBelajar;
            var label = stack.length + 1;
            $('#label').val('Jam ke-' + label);

            // fill stack jam pembelajaran
            dataStackJamPembelajaran.length = 0; // Clear existing data
            eks.jamBelajar.forEach(function(jam) {
                dataStackJamPembelajaran.push({
                    mulai: jam.jam_mulai,
                    selesai: jam.jam_selesai
                });
            });
        }

    })
}
function addJamPembelajaran(datas){
    $.ajax({
        method: 'POST',
        url: 'pages/akademik/akademik-act.php',
        dataType: 'JSON',
        data: datas,
        success: function(msg){
            loadJamPembelajaran();
            $('#mulai').val('');
            $('#selesai').val('');
            $('#istirahat').prop('checked', false);

            Swal.fire({
                title: msg.status,
                text: msg.info,
                icon: msg.status
            });
        },
        error: function(err){
            Swal.fire({
                title: 'Error',
                text: err.responseText || 'Terjadi kesalahan saat menambahkan jam pembelajaran.',
                icon: 'error'
            });
        }
    });
}
function delJamPembelajaran(idjam){
    Swal.fire({
        title: 'Hapus Data Jam Pembelajaran',
        text: 'Ingin hapus data jam pembelajaran ?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url: 'pages/akademik/akademik-act.php',
                method: 'post',
                dataType: 'json',
                data: {
                    action: 'delJamPembelajaran',
                    idjam: idjam
                },
                success: function(msg){
                    loadJamPembelajaran();

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


</script>