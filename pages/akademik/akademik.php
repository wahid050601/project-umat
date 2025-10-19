
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
                                    <th>Ekskul</th>
                                    <th>Pelatih</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="set-table-mapel">
                            </tbody>
                        </table>
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

</script>