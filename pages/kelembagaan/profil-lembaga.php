


<div class="card">
    <div class="card-header">
        <i class="bi bi-building-fill"></i>&nbsp; Profil Lembaga
    </div>
    <div class="card-body mt-4">
        <div class="row"> 
            <div class="col-lg-6">
                <!-- INI Kiri -->
                <input type="hidden" id="id-form">
                <div class="form-group mt-3">
                    <label for="text">Nama Sekolah</label>
                    <input type="text" class="form-control" id="nama-sekolah" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="nisn">Jenjang Sekolah</label>
                    <select class="custom-select form-control" id="jenjang-sekolah">
                        <option>_pilih_</option>
                        <option value="MI">Madrasah Ibtidaiyah (MI)</option>
                        <option value="MTs">Madrasah Tsanawiyah (MTs)</option>
                        <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="number">NSM</label>
                    <input type="text" class="form-control" id="nsm" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="number">NPSN</label> 
                    <input type="text" class="form-control" id="npsn" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="number">Status Sekolah</label>
                    <select class="custom-select form-control" id="status-sekolah">
                        <option>_pilih_</option>
                        <option value="swasta">Swasta</option>
                        <option value="negeri">Negeri</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="number">NPWP</label>
                    <input type="text" class="form-control" id="npwp" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="number">No.Telp Sekolah</label>
                    <input type="text" class="form-control" id="telp" placeholder="input...">
                </div>
            </div>
            
            <div class="col-lg-6">
                <!-- INI Kanan -->
                <div class="form-group mt-3">
                    <label for="number">E-Mail Sekolah</label>
                    <input type="text" class="form-control" id="email" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="nis">Status Akreditasi</label>
                    <select class="custom-select form-control" id="status-akreditasi">
                        <option>_pilih_</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="belum terakreditasi">Belum Akreditasi</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="akreditasi">Nilai Akreditasi</label>
                    <input type="text" class="form-control" id="nilai-akreditasi" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="akreditasi">Nomor Akreditasi</label>
                    <input type="text" class="form-control" id="no-akreditasi" placeholder="input...">
                </div>

                <div class="form-group mt-3">
                    <label for="akreditasi">Tanggal Akreditasi</label>
                    <input type="date" class="form-control" id="tanggal-akreditasi">
                </div>

                <div class="form-group mt-3">
                    <label for="akreditasi">Berlaku Akreditasi</label>
                    <input type="date" class="form-control" id="berlaku-akreditasi">
                </div>

                <div class="form-group mt-3">
                    <label for="akreditasi">Tahun Berdiri</label>
                    <input type="text" class="form-control" id="tahun-berdiri" placeholder="input...">
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-sm mt-3 float-right" id="btnsave"><i class="bi bi-pencil-square"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<script>
    // Load detail lembaga
    loadDetailLembaga();

    $('#btnsave').on('click', function(){
        let datas = {
            action: 'updateprofillembaga',
            nama_sekolah: $('#nama-sekolah').val(),
            jenjang_sekolah: $('#jenjang-sekolah').val(),
            nsm: $('#nsm').val(),
            npsn: $('#npsn').val(),
            status_sekolah: $('#status-sekolah').val(),
            npwp: $('#npwp').val(),
            status_akreditasi: $('#status-akreditasi').val(),
            nilai_akreditasi: $('#nilai-akreditasi').val(),
            no_akreditasi: $('#no-akreditasi').val(),
            tgl_akreditasi: $('#tanggal-akreditasi').val(),
            berlaku_akreditasi: $('#berlaku-akreditasi').val(),
            tahun_berdiri: $('#tahun-berdiri').val(),
            no_telp: $('#telp').val(),
            email_sekolah: $('#email').val(),
        };
        console.log("LEMBAGA ", datas);
        
        $.ajax({
            method: "POST",
            url: "pages/kelembagaan/profil-lembaga-act.php",
            data: datas,
            dataType: "json",
            success: function(msg){
                if(msg.status == "success"){
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Data berhasil disimpan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            loadDetailLembaga();
                        }
                    });
                }else{
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Data gagal disimpan',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        })
        
    });


    function loadDetailLembaga(){
        $.ajax({
            method: "POST",
            url: "pages/kelembagaan/profil-lembaga-act.php",
            dataType: "json",
            data: {action: 'loadprofillembaga'},
            success: function(msg){
                if(msg.status == "success"){
                    if(msg.count != 0){
                        $('#nama-sekolah').val(msg.data.nama_sekolah);
                        $('#jenjang-sekolah').val(msg.data.jenjang_sekolah);
                        $('#nsm').val(msg.data.nsm);
                        $('#npsn').val(msg.data.npsn);
                        $('#status-sekolah').val(msg.data.status_sekolah);
                        $('#npwp').val(msg.data.npwp);
                        $('#status-akreditasi').val(msg.data.status_akreditasi);
                        $('#nilai-akreditasi').val(msg.data.nilai_akreditasi);
                        $('#tanggal-akreditasi').val(msg.data.tgl_akreditasi);
                        $('#berlaku-akreditasi').val(msg.data.berlaku_akreditasi);
                        $('#tahun-berdiri').val(msg.data.tahun_berdiri);
                        $('#telp').val(msg.data.no_telp);
                        $('#email').val(msg.data.email_sekolah);
                        $('#no-akreditasi').val(msg.data.no_akreditasi);
                    }
                }else{
                    alert("data tidak ditemukan");
                }
            }
        })
    }


</script>