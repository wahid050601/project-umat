<div class="pagetitle">
  <h1>Alamat Lembaga</h1>
</div>

<div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body mt-4">
                    <i class="bi bi-home"></i><span>Data Lembaga</span>
                        <div class="row"> 
                            <div class="col-lg-6">
                            <!-- INI Kiri -->
                            <form action="">
                                <div class="form-group mt-3">
                                    <label for="text">Nama Sekolah</label>
                                    <input type="text" class="form-control" id="nama-madrasah" placeholder="Nama Sekolah">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nisn">Jenjang Sekolah</label>
                                    <select class="custom-select form-control">
                                        <option selected>Pilih</option>
                                        <option value="MI">Madrasah Ibtidaiyah (MI)</option>
                                        <option value="MTs">Madrasah Tsanawiyah (MTs)</option>
                                        <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">Nomor SIOP</label>
                                    <input type="number" class="form-control" id="nomor-siop" placeholder="Nomor SIOP">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="siop">Masa Berlaku SIOP</label>
                                    <select class="custom-select form-control">
                                        <option selected>Masa Berlaku SIOP Sekolah</option>
                                        <option value="tidak">Tanpa Masa Berlaku</option>
                                        <option value="ada">Ada Masa Berlaku</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nis">Status Akreditasi</label>
                                    <select class="custom-select form-control">
                                        <option selected>Status Akreditasi</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="2">C</option>
                                        <option value="2">Belum Akreditasi</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="akreditasi">Tanggal Akreditasi</label>
                                    <input type="date" class="form-control" id="akreditasi" placeholder="#">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                            <!-- INI Kanan -->
                                <div class="form-group mt-3">
                                    <label for="number">NPSN</label>
                                    <input type="number" class="form-control" id="nisn" placeholder="NPSN">
                                </div>
                                
                                <div class="form-group mt-3">
                                    <label for="number">NIK Siswa</label>
                                    <input type="number" class="form-control" id="nisn" placeholder="NIK">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nisn">No. Telpon</label>
                                    <input type="number" class="form-control" id="nisn" placeholder="No. Tlp">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nisn">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="nisn" placeholder="#">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="nisn">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nisn" placeholder="Nama Ibu">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="rombel">Rombel</label>
                                    <select class="custom-select form-control">
                                        <option selected>Pilih</option>
                                        <option value="1">Kelas 7A</option>
                                        <option value="2">Kelas 7B</option>
                                        <option value="2">Kelas 8A</option>
                                        <option value="2">Kelas 8B</option>
                                        <option value="2">Kelas 9A</option>
                                        <option value="2">Kelas 9B</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mt-3 float-right">Save</button>
                                <button type="button" class="btn btn-primary mt-3 float-right">Cancel</button>
                            </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>
</section>

<script>
    $('#btnsave').on('click', function(){

        $.ajax({
            method: "POST",
            url: "pages/kelembagaan/profil-lembaga.php",
            dataType: "json",
            data: "action=add&" + $('#formguru').serialize(),
            success: function(msg){
                if(msg.status == "success"){
                    alert("berhasil tambah data");
                }else{
                    alert("gagal tambah data");
                }
            }
        })
        
    })


</script>