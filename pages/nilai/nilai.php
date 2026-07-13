
<div class="card">
    <div class="card-header">
        <i class="bi bi-book"></i>&nbsp; Input Nilai Siswa
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
                                <option value="">_pilih_</option>
                            </select>
                            <input type="hidden" id="tprombel" value="">
                        </td>
                    </tr>
                    <tr>
                        <th width="40%">Pilih Mata Pelajaran</th>
                        <th>:</th>
                        <td>
                            <select class="form-control form-control-sm" id="mapel">
                                <option value="">_pilih_</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="button" class="btn btn-primary btn-sm mb-3" id="findnilai"><i class="bi bi-search"></i> Cari</button>
            </div>
            <div class="col-md-6">
            </div>
            <br>
            <hr>

            <div class="table-set-nilai">
                <div class="alert alert-warning" role="alert">
                    Pilih kelas dan mata pelajaran!
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal config data nilai mata pelajaran -->
<div class="modal fade" id="configNilaiMapelModal" tabindex="-1" aria-labelledby="configNilaiMapelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="configNilaiMapelModalLabel">Config Nilai Mata Pelajaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-config-nilai-ekskul">
            <div class="mb-3">
                <label for="nilai_harian" class="form-label">Nilai Harian</label>
                <input type="number" class="form-control" id="nilai_harian" name="nilai_harian" min="0" max="100">
            </div>
            <div class="mb-3">
                <label for="nilai_semester" class="form-label">Nilai Semester</label>
                <input type="number" class="form-control" id="nilai_semester" name="nilai_semester" min="0" max="100">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <span class="button-submit-nilai"></span>
      </div>
    </div>
  </div>
</div>




<script>

    // Load data eskul
    loadlistselectkelas();

    // Disabled button add siswa ekskul and input nilai ekskul
    $('#kelas').on('change', function(){
        let idkelas = $(this).val();
        let tprombel = $('#kelas option:selected').data('tprombel');
        $('#tprombel').val(tprombel);
        loadlistselectmapel(idkelas);
        $('#mapel').val('');
        $('.table-set-nilai').html(`
            <div class="alert alert-warning" role="alert">
                Pilih kelas dan mata pelajaran!
            </div>
        `);
    });
    $('#mapel').on('change', function(){
        $('.table-set-nilai').html(`
            <div class="alert alert-warning" role="alert">
                Pilih kelas dan mata pelajaran!
            </div>
        `);
    });

    // Load nilai mata pelajaran
    $('#findnilai').on('click', function(){
        let idkelas = $('#kelas').val();
        let idmapel = $('#mapel').val();
        let tprombel = $('#tprombel').val();
        loaddatanilaimapel(idkelas,idmapel,tprombel);
    })

    function loadlistselectkelas(){
        $.ajax({
            url: "pages/nilai/nilai-action.php",
            method: "POST",
            data: {
                action: "loadlistselectkelas"
            },
            success: function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    let options = `<option value="">_pilih_</option>`;
                    response.rombel.forEach(function(rom){
                        options += `<option value="${rom.id}" data-tprombel="${rom.tp_rombel}" >${rom.ket_rombel}</option>`;
                    });
                    $('#kelas').html(options);
                } else {
                    alert(response.info);
                }
            },
            error: function(err){
                alert("Error : "+ err.statusText);
            }
        });
    }
    function loadlistselectmapel(idkelas){
        $.ajax({
            url: "pages/nilai/nilai-action.php",
            method: "POST",
            data: {
                action: "loadlistselectmapel",
                idkelas : idkelas
            },
            success: function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    let options = `<option value="">_pilih_</option>`;
                    response.mapel.forEach(function(mp){
                        options += `<option value="${mp.id}">${mp.mata_pelajaran}</option>`;
                    });
                    $('#mapel').html(options);
                } else {
                    alert(response.info);
                }
            },
            error: function(err){
                alert("Error : "+ err.statusText);
            }
        });
    }



    function loaddatanilaimapel(idrombel, idmapel, tprombel){
        
        if(!idrombel || !idmapel || !tprombel){
            alert("Pilih kelas dan mata pelajaran!");
            return;
        }

        $.ajax({
            url: "pages/nilai/nilai-action.php",
            method: "POST",
            data: {
                action: "loaddatanilaisiswa",
                idrombel : idrombel,
                idmapel : idmapel,
                tprombel : tprombel
            },
            success: function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    let tableset = `
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary btn-sm" onclick="syncDataSiswa('${idrombel}', '${idmapel}', '${tprombel}')">
                            <i class="bi bi-arrow-repeat"></i> Sync Data Siswa
                        </button>
                    </div>
                    <table class="table table-bordered table-sm table-striped table-nilai">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">No.Induk</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">L/P</th>
                                <th class="text-center">Harian</th>
                                <th class="text-center">PAT/PAS</th>
                                <th class="text-center">Rapor</th>
                                <th class="text-center">Predikat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    `;

                    response.nilai.forEach(function(val, index){
                        let nilaiHarian = parseInt(val.nilai_harian);
                        let nilaiSmts = parseInt(val.nilai_smts);
                        let nilaiRaportCountAverage = ((nilaiHarian ?? 0) + (nilaiSmts ?? 0)) / 2;
                        let predikat = '-';
                        if(nilaiRaportCountAverage > 85){
                             predikat = 'A';
                        }else if(nilaiRaportCountAverage > 75){
                             predikat = 'B';
                        }else if(nilaiRaportCountAverage < 75 ){
                             predikat = 'C';
                        }else{
                             predikat = '-';
                        }

                        tableset += `
                            <tr>
                                <td class="text-center">${index+1}</td>
                                <td>${val.nis_siswa}</td>
                                <td>${val.nama_siswa}</td>
                                <td class="text-center">${val.jk_siswa}</td>
                                <td class="text-center">${val.nilai_harian ?? '-'}</td>
                                <td class="text-center">${val.nilai_smts ?? '-'}</td>
                                <td class="text-center">${!nilaiRaportCountAverage ? '-' : nilaiRaportCountAverage.toFixed(2)}</td>
                                <td class="text-center">${predikat}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary" onclick="inputNilai('${val.id_nilai}', '${val.nilai_harian}', '${val.nilai_smts}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                    });

                    tableset += `
                        </tbody>
                    </table>
                    `;

                    $('.table-set-nilai').html(tableset);
                    $('.table-nilai').DataTable().destroy();
                    $('.table-nilai').DataTable();
                } else {
                    alert(response.info);
                    $('.table-set-nilai').html(`
                        <div class="alert alert-warning" role="alert">
                            ${response.info}
                        </div>
                    `);
                }
            },
            error: function(err){
                alert("Error : "+ err.statusText);
                $('.table-set-nilai').html(`
                    <div class="alert alert-warning" role="alert">
                        Error : ${err.statusText}
                    </div>
                `);
            }
        });
    }

    function inputNilai(idnilai, nilaiHarian = null, nilaiSmts = null){
        let buttonSubmit = '<button type="button" class="btn btn-primary" id="save-config-nilai-mapel">Simpan</button>';
        $('.button-submit-nilai').html(buttonSubmit);
        $('#configNilaiMapelModal').modal('show');

        // set default nilai harian if exists
        $('#nilai_harian').val(nilaiHarian ?? '');
        $('#nilai_semester').val(nilaiSmts ?? '');

        // validasi value nilai harian dan nilai semester
        $('#nilai_harian, #nilai_semester').on('input', function(){
            let val = $(this).val();
            if(val < 0){
                $(this).val(0);
            } 
            
            if(val > 100){
                alert("Nilai tidak boleh lebih dari 100!");
                $(this).val(null);
            }
        });

        $('#save-config-nilai-mapel').on('click', function(){
            var nilaiHarian = $('#nilai_harian').val();
            var nilaiSemester = $('#nilai_semester').val();
            console.log(nilaiHarian, nilaiSemester);
            if(nilaiHarian == '' || nilaiSemester == ''){
                alert("Nilai harian dan nilai semester harus diisi!");
                return;
            }

            // proses simpan nilai ke database
            $.ajax({
                url: "pages/nilai/nilai-action.php",
                method: "POST",
                data: {
                    action: "updatenilaisiswa",
                    idnilai : idnilai,
                    nilaiharian : nilaiHarian,
                    nilaismts : nilaiSemester
                },
                success: function(res){
                    let response = JSON.parse(res);
                    if(response.status == "success"){
                        alert("Nilai berhasil disimpan!");
                        $('#configNilaiMapelModal').modal('hide');
                        $('#findnilai').click();
                    } else {
                        alert(response.info);
                    }
                },
                error: function(err){
                    alert("Error : "+ err.statusText);
                }
            });
        });
    }

    function syncDataSiswa(idrombel, idmapel, tprombel){
        $.ajax({
            url: "pages/nilai/nilai-action.php",
            method: "POST",
            data: {
                action: "syncdatasiswa",
                idrombel : idrombel,
                idmapel : idmapel,
                tprombel : tprombel
            },
            success: function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    alert(response.info);
                    loaddatanilaimapel(idrombel, idmapel, tprombel);
                } else {
                    alert(response.info);
                }
            },
            error: function(err){
                alert("Error : "+ err.statusText);
            }
        });
    }

</script>