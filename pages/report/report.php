<div class="card">
    <div class="card-header">
        <i class="bi bi-book"></i>&nbsp; Reporting
    </div>
    <div class="card-body mt-4">
    
        <!-- MATA PELAJARAN -->
        <ul class="list-group mt-2 mb-2">
            <li class="list-group-item"><i class="bi bi-circle"></i> <span style="font-weight: 700;">Mata Pelajaran</span></li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-lg-6">
                        <span style="font-weight: 700;">Report Mata Pelajaran</span>
                        <hr>
                        <div class="form-group mt-2 mb-2">
                            <label>Kelas</label>
                            <select class="form-control form-control-sm" id="kelas"></select>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label>Mata Pelajaran</label>
                            <select class="form-control form-control-sm" id="mapel"></select>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="exportnilai"><i class="bi bi-file-earmark-pdf"></i> Export</button>
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
                        <span style="font-weight: 700;">Report Ekstrakurikuler</span>
                        <hr>
                        <div class="form-group mt-2 mb-2">
                            <label>Kelas</label>
                            <select class="form-control form-control-sm" id="kelasekskul"></select>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label>Ekskul</label>
                            <select class="form-control form-control-sm" id="ekskul"></select>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="exportekskul"><i class="bi bi-file-earmark-pdf"></i> Export</button>
                    </div>
                </div>
            </li>
        </ul>

    </div>
</div>

<script>
    // ======================== NILAI ========================
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

    $('#exportnilai').off('click').on('click', function(){
        // 1. Ambil data dinamis jika diperlukan
        const dataKelas = $('#kelas').val();
        const dataMapel = $('#mapel').val();
        const dataTprombel = $('#kelas option:selected').data('tprombel');

        if(!dataKelas || !dataMapel){
            alert("Pilih kelas dan mata pelajaran terlebih dahulu!");
            return;
        }

        // 2. Buat elemen <a> secara virtual (tidak perlu muncul di DOM)
        const downloadLink = $('<a>', {
            href: 'pages/report/export_nilai_pdf.php?kelas=' + dataKelas + '&mapel=' + dataMapel + '&tprombel=' + dataTprombel,
            target: '_blank' // Membuka di tab baru agar halaman utama tidak terganggu
        });

        // 3. Masukkan ke body, klik, lalu hapus kembali
        downloadLink.appendTo('body');
        downloadLink[0].click();
        downloadLink.remove();
    });
    // =======================================================



    // =================== EKSKUL ============================
    // Load data eskul
    loaddataeskulrombel();

    // Disabled button add siswa ekskul and input nilai ekskul
    $('#kelasekskul').on('change', function(){
        $('#ekskul').val('');
        $('.table-set-ekskul').html(`
            <div class="alert alert-warning" role="alert">
                Pilih kelas dan ekskul!
            </div>
        `);
    });
    $('#ekskul').on('change', function(){
        $('.table-set-ekskul').html(`
            <div class="alert alert-warning" role="alert">
                Pilih kelas dan ekskul!
            </div>
        `);
    });

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
                    $('#ekskul').html(listEskul);

                    let listKelas = '<option value="">_pilih_</option>';
                    $.each(eks.rombel, function(id,val){
                        listKelas += `<option value="${val.id}">${val.ket_rombel}</option>`;
                    });
                    $('#kelasekskul').html(listKelas);
                }
            }
        })
    }

    $('#exportekskul').off('click').on('click', function(){
        // 1. Ambil data dinamis jika diperlukan
        const dataKelas = $('#kelasekskul').val();
        const dataEkskul = $('#ekskul').val();

        if(!dataKelas || !dataEkskul){
            alert("Pilih kelas dan ekskul terlebih dahulu!");
            return;
        }

        // 2. Buat elemen <a> secara virtual (tidak perlu muncul di DOM)
        const downloadLink = $('<a>', {
            href: 'pages/report/export_eskul_pdf.php?idrombel=' + dataKelas + '&idekskul=' + dataEkskul,
            target: '_blank' // Membuka di tab baru agar halaman utama tidak terganggu
        });

        // 3. Masukkan ke body, klik, lalu hapus kembali
        downloadLink.appendTo('body');
        downloadLink[0].click();
        downloadLink.remove();
    });

</script>