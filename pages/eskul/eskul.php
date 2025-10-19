
<div class="card">
    <div class="card-header">
        <i class="bi bi-journal-bookmark-fill"></i>&nbsp; Input Nilai Ekstrakurikuler
    </div>
    <div class="card-body mt-4">
        <div class="row">
            <div class="col-md-6">
                <table style="width: 100%;" class="mb-2">
                    <tr>
                        <th width="40%">Pilih Kelas</th>
                        <th>:</th>
                        <td>
                            <select class="form-control form-control-sm" id="kelas">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="40%">Pilih Ekstrakurikuler</th>
                        <th>:</th>
                        <td>
                            <select class="form-control form-control-sm" id="eskul">
                                <option value="">_pilih_</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="button" class="btn btn-primary btn-sm mb-3" id="find-nilai-ekskul"><i class="bi bi-search"></i> Cari</button>
            </div>
            <div class="col-md-6">
            </div>
            <br>
            <hr>

            <div class="table-set-ekskul">
                <div class="alert alert-warning" role="alert">
                    Pilih kelas dan ekskul!
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    // Load data eskul
    loaddataeskulrombel();

    // Load nilai ekskul
    $('#find-nilai-ekskul').on('click', function(){
        let idkelas = $('#kelas').val();
        let idekskul = $('#eskul').val();
        loadlistnilai(idkelas,idekskul);
    })



    function loaddataeskulrombel(){

        $.ajax({
            method: 'post',
            url: 'pages/eskul/eskul-action.php',
            dataType: 'json',
            data: {action: 'loadekskul'},
            success: function(eks){
                if(eks.status == 'success'){
                    let listEskul = '<option value="">_pilih_</option>';
                    $.each(eks.ekskul, function(id,val){
                        listEskul += `<option value="${val.id}">${val.ekskul}</option>`;
                    })
                    $('#eskul').html(listEskul);

                    let listKelas = '<option value="">_pilih_</option>';
                    $.each(eks.rombel, function(id,val){
                        listKelas += `<option value="${val.id}">${val.ket_rombel}</option>`;
                    });
                    $('#kelas').html(listKelas);
                }
            }
        })
    }

    function loadlistnilai(idrombel,idekskul){
        $.ajax({
            method: 'post',
            url: 'pages/eskul/eskul-action.php',
            dataType: 'json',
            data: {
                action: 'loadnilaiekssiswa',
                idrombel: idrombel,
                idekskul: idekskul
            },
            success: function(dte){
                if(dte.status == 'success'){
                    let nums = 1;
                    let tableset = `
                    <table class="table table-bordered table-sm table-striped table-eskul">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">No.Induk</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">L/P</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Predikat</th>
                        </tr>
                    </thead>
                    <tbody>`;
                    $.each(dte.listnilai, function(id,val){
                        let predikat = 'D';
                        if(val.nilai > 90){
                            predikat = 'A';
                        }else if(val.nilai > 75){
                            predikat = 'B';
                        }else if(val.nilai < 75){
                            predikat = 'C';
                        }else{
                            predikat = '-';
                        }

                        tableset += `
                        <tr>
                            <td>${nums++}</td>
                            <td>${val.nis_siswa}</td>
                            <td>${val.nama_siswa}</td>
                            <td>${val.jk_siswa}</td>
                            <td>${val.nilai == null ? 0 : val.nilai}</td>
                            <td>${predikat}</td>
                        </tr>`;
                    });
                    tableset += `
                    </tbody>
                    </table>`;
                    $('.table-set-ekskul').html(tableset);
                    // $('.table-eskul').DataTable().destroy();
                    $('.table-eskul').DataTable();
                }
            }
        });
    }
    
</script>