<?php
    // // Panggil file DB koneksi
    // require "../../function/database.php";


    // // Buat query yang di perlukan
    // $conn = mysqli_connect($host, $user, $pass, $database);
    // $query = "SELECT * FROM tb_siswa";


    // // Instansiasi Koneksi dan Query
    // $data_siswa = mysqli_query ($conn, $query);






?>
<section class="section">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body mt-4">
                    <div class="card-header bg-primary text-white">TAMBAH DATA SISWA</div>
                        <div class="row">
                            <div class="col-lg-6">

                        <!-- INI Kiri -->
                        <form action="" method="POST" id="formsiswa">
                        
                                <div class="form-group mt-3">
                                    <label >NIS Siswa</label>
                                    <input type="number" name="nis_siswa" class="form-control" id="nis" placeholder="NIS">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Nama Siswa</label>
                                    <input type="email" name="nama_siswa" class="form-control" id="nis" placeholder="Nama Siswa">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="custom-select form-control">
                                        <option selected>Pilih</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label >Tempat Lahir</label>
                                    <input type="tplahir" name="tplahir_siswa" class="form-control" id="nis" placeholder="Tempat Lahir">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Nama Ayah</label>
                                    <input type="email" name="ayah_siswa" class="form-control" id="nis" placeholder="Nama Ayah">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Kelas</label>
                                    <select name="kelas_siswa" class="custom-select form-control">
                                        <option selected>Pilih</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="8">9</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        
                        <!-- INI Kanan -->
                        
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label >NISN</label>
                                    <input type="number" name="nisn" class="form-control" id="nisn" placeholder="NISN">
                                </div>
                                
                                <div class="form-group mt-3">
                                    <label >NIK Siswa</label>
                                    <input type="number" name="nik_siswa" class="form-control" id="nisn" placeholder="NIK">
                                </div>

                                <div class="form-group mt-3">
                                    <label >No. Telpon</label>
                                    <input type="number" name="tlp_siswa" class="form-control" id="nisn" placeholder="No. Tlp">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Tanggal Lahir</label>
                                    <input type="date" name="tgllahir_siswa" class="form-control" id="nisn" placeholder="#">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Nama Ibu</label>
                                    <input type="text" name="ibu_siswa" class="form-control" id="nisn" placeholder="Nama Ibu">
                                </div>

                                <div class="form-group mt-3">
                                    <label >Rombel</label>
                                    <select name="rombel_siswa" class="custom-select form-control">
                                        <option selected>Pilih</option>
                                        <option value="VII A">VII A</option>
                                        <option value="VII B">VII B</option>
                                        <option value="VIII A">VIII A</option>
                                        <option value="VIII B">VIII B</option>
                                        <option value="IX A">IX A</option>
                                        <option value="IX B">IX B</option>
                                    </select>
                                </div>
                                
                                <button type="button" name="btnsave" id="btnsave" class="btn btn-primary mt-3 float-left">Save</button>
                                <button id="cancel-add" type="button" class="btn btn-primary mt-3 float-left">Cancel</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// TAMBAH DATA 
$('#btnsave').on('click', function(){

$.ajax({
    method: "POST",
    url: "pages/siswa/action-siswa.php",
    dataType: "json",
    data: "action=addsiswa&" + $('#formsiswa').serialize(),
    success: function(msg){
        if(msg.status == "sukses"){
            alert("Berhasil Tambah Data");
            $('.tampil').empty();
            $('.tampil').load('pages/siswa/siswa.php');
        }else{
            alert("Gagal Tambah Data");
            $('.tampil').empty();
            $('.tampil').load('pages/siswa/siswa.php');
        }
    }
})

})

// BATAL DATA
$('#cancel-add').on('click', function(){

        $('.tampil').empty();
        $('.tampil').load('pages/siswa/siswa.php');

})


</script>

