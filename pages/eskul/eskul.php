
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


<!-- Modal add siswa ekskul -->
<div class="modal fade" id="addSiswaEkskulModal" tabindex="-1" aria-labelledby="addSiswaEkskulModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSiswaEkskulModalLabel">Tambah Siswa Ekstrakurikuler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-add-siswa-ekskul">
            <input type="hidden" id="id_rombel_add" name="id_rombel_add">
            <div class="mb-3">
                <label for="siswa_ekskul" class="form-label">Pilih Siswa</label>
                <select class="form-control form-control-sm" id="data_siswa" name="data_siswa"></select>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="save-add-siswa-ekskul">Simpan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal config data nilai ekskul -->
<div class="modal fade" id="configNilaiEkskulModal" tabindex="-1" aria-labelledby="configNilaiEkskulModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configNilaiEkskulModalLabel">Config Nilai Ekstrakurikuler</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-config-nilai-ekskul">
            <input type="hidden" id="id_ekskul_config" name="id_ekskul_config">
            <input type="hidden" id="id_rombel_config" name="id_rombel_config">
            <input type="hidden" id="id_siswa_config" name="id_siswa_config">
            <div class="mb-3">
                <label for="nilai_ekskul" class="form-label">Nilai Ekstrakurikuler</label>
                <input type="number" class="form-control" id="nilai_ekskul" name="nilai_ekskul" min="0" max="100">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="save-config-nilai-ekskul">Simpan</button>
      </div>
    </div>
  </div>
</div>




<script>

    // Load data eskul
    loaddataeskulrombel();

    // Disabled button add siswa ekskul and input nilai ekskul
    $('#kelas').on('change', function(){
        $('#eskul').val('');
        $('.table-set-ekskul').html(`
            <div class="alert alert-warning" role="alert">
                Pilih kelas dan ekskul!
            </div>
        `);
    });
    $('#eskul').on('change', function(){
        $('.table-set-ekskul').html(`
            <div class="alert alert-warning" role="alert">
                Pilih kelas dan ekskul!
            </div>
        `);
    });

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
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary btn-sm" onclick="getSiswaEkskul('${idrombel}', '${idekskul}')">
                            <i class="bi bi-plus-circle"></i> Tambah Siswa
                        </button>
                    </div>
                    <table class="table table-bordered table-sm table-striped table-eskul">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">No.Induk</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">L/P</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Predikat</th>
                            <th class="text-center">Action</th>
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
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm config-nilai-ekskul" title="Input Nilai" onclick="configNilaiEkskul('${val.id_ekskul}', '${val.id_kelas}', '${val.id_siswa}')"><i class="bi bi-pencil-square"></i></button>
                            </td>
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

    function getSiswaEkskul(idrombel, idekskul){
        $.ajax({
            method: 'post',
            url: 'pages/eskul/eskul-action.php',
            dataType: 'json',
            data: {
                action: 'loadDataSiswa',
                idekskul: idekskul,
                idrombel: idrombel
            },
            success: function(dts){
                if(dts.status == 'success'){
                    let listSiswa = '<option value="">_pilih_</option>';
                    $.each(dts.listsiswa, function(id,val){
                        listSiswa += `<option value="${val.id_siswa}">${val.nis_siswa} - ${val.nama_siswa}</option>`;
                    });
                    $('#data_siswa').html(listSiswa);
                    $('#addSiswaEkskulModal').modal('show');

                    $('#save-add-siswa-ekskul').off('click').on('click', function(){
                        let id_ekskul = $('#eskul').val();
                        let id_siswa = $('#data_siswa').val();
                        if(id_siswa == ''){
                            alert('Pilih siswa!');
                        }else{
                            addSiswaEkskul(idrombel, id_siswa, id_ekskul);
                        }
                    });
                }
            }
        })
    }
    function addSiswaEkskul(idrombel, id_siswa, id_ekskul){
        $.ajax({
            method: 'post',
            url: 'pages/eskul/eskul-action.php',
            dataType: 'json',
            data: {
                action: 'addsiswaekskul',
                idrombel: idrombel,
                id_siswa: id_siswa,
                id_ekskul: id_ekskul
            },
            success: function(res){
                if(res.status == 'success'){
                    $('#addSiswaEkskulModal').modal('hide');
                    $('#find-nilai-ekskul').click();
                    alert(res.info);
                }else{
                    alert(res.info);
                }
            }
        })
    }

    function configNilaiEkskul(idekskul, idrombel, idsiswa){
        
        $('#id_ekskul_config').val(idekskul);
        $('#id_rombel_config').val(idrombel);
        $('#id_siswa_config').val(idsiswa);
        $('#configNilaiEkskulModal').modal('show');

        // validate nilai ekskul
        $('#nilai_ekskul').on('input', function(){
            let nilai = $(this).val();
            if(nilai < 0){
                alert('Nilai tidak boleh kurang dari 0');
                $(this).val(0);
            }

            if(nilai > 100){
                alert('Nilai tidak boleh lebih dari 100');
                $(this).val(null);
            }
        });

        // save config nilai ekskul and reload button submit
        $('#save-config-nilai-ekskul').off('click').on('click', function(){
            let id_ekskul = $('#id_ekskul_config').val();
            let id_rombel = $('#id_rombel_config').val();
            let id_siswa = $('#id_siswa_config').val();
            let nilai_ekskul = $('#nilai_ekskul').val();
            $.ajax({
                method: 'post',
                url: 'pages/eskul/eskul-action.php',
                dataType: 'json',
                data: {
                    action: 'inputnilaiekskul',
                    idekskul: id_ekskul,
                    idrombel: id_rombel,
                    idsiswa: id_siswa,
                    nilai: nilai_ekskul
                },
                success: function(res){
                    if(res.status == 'success'){
                        $('#configNilaiEkskulModal').modal('hide');
                        $('#find-nilai-ekskul').click();
                    }else{
                        alert(res.info);
                    }
                }
            });
        });
    }
    
</script>