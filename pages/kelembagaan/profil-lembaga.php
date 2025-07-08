<div class="pagetitle">
  <h1>Profile Lembaga</h1>
</div>

<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body mt-4">
                    <i class="bi bi-home"></i><span>Data Lembaga</span>
                        <div class="row"> 
                            <div class="col-lg-6">
                            <!-- INI Kiri -->
                                <input type="hidden" id="id-form">
                                <div class="form-group mt-3">
                                    <label for="text">Nama Sekolah</label>
                                    <input type="text" class="form-control" id="nama-sekolah">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nisn">Jenjang Sekolah</label>
                                    <select class="custom-select form-control" id="jenjang-sekolah">
                                        <option selected>_pilih_</option>
                                        <option value="MI">Madrasah Ibtidaiyah (MI)</option>
                                        <option value="MTs">Madrasah Tsanawiyah (MTs)</option>
                                        <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">NSM</label>
                                    <input type="text" class="form-control" id="nsm">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">NPSN</label>
                                    <input type="text" class="form-control" id="npsn">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">Status Sekolah</label>
                                    <input type="text" class="form-control" id="status-sekolah" readonly>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">NPWP</label>
                                    <input type="text" class="form-control" id="npwp" readonly>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                            <!-- INI Kanan -->
                            <div class="form-group mt-3">
                                    <label for="nis">Status Akreditasi</label>
                                    <select class="custom-select form-control" id="status-akreditasi">
                                        <option selected>_pilih_</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="belum terakreditasi">Belum Akreditasi</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="akreditasi">Nilai Akreditasi</label>
                                    <input type="text" class="form-control" id="nilai-akreditasi">
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
                                    <input type="text" class="form-control" id="tahun-berdiri">
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary mt-3 float-right" id="btnsave">Update</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>
</section>

<script>
    // Load detail lembaga
    loadDetailLembaga();

    $('#btnsave').on('click', function(){
        let datas = {
            id: $('#id-form').val(),
            nama_sekolah: $('#nama-sekolah').val(),
            jenjang_sekolah: $('#jenjang-sekolah').val(),
            nsm: $('#nsm').val(),
            npsn: $('#npsn').val(),
            status_sekolah: $('#status-sekolah').val(),
            npwp: $('#npwp').val(),
            status_akreditasi: $('#status-akreditasi').val(),
            nilai_akreditasi: $('#nilai-akreditasi').val(),
            tgl_akreditasi: $('#tanggal-akreditasi').val(),
            berlaku_akreditasi: $('#berlaku-akreditasi').val(),
            tahun_berdiri: $('#tahun-berdiri').val(),
        };
        
        $.ajax({
            method: "POST",
            url: "pages/kelembagaan/profil-lembaga-act.php",
            data: JSON.stringify(datas),
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
            method: "GET",
            url: "pages/kelembagaan/profil-lembaga-act.php",
            dataType: "json",
            success: function(msg){
                if(msg.status == "success"){
                    if(msg.count != 0){
                        $('#id-form').val(msg.data.id_lembaga);
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
                    }
                }else{
                    alert("data tidak ditemukan");
                }
            }
        })
    }


</script>