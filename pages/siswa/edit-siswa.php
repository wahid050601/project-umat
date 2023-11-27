<?php
require "../../function/database.php";


$simpansiswa=$_GET["idsiswa"];

$query = "SELECT * FROM tb_siswa WHERE id_siswa=$simpansiswa";
$siswa = mysqli_query($connect, $query);

foreach($siswa as $g){
    $data = $g;
}




?>


<section class="section">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body mt-4">
                    <div class="card-header bg-primary text-white">EDIT DATA SISWA</div> 
                        <form id="formsiswa" action="" method="POST">
                            <input type="hidden" name="id_siswa" id="id_siswa" value="<?= $data["id_siswa"] ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <label >NIS Siswa</label>
                                        <input type="number" name="nis_siswa" class="form-control" id="nis" value="<?= $data["nis_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Nama Siswa</label>
                                        <input type="email" name="nama_siswa" class="form-control" id="nama" value="<?= $data["nama_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="custom-select form-control" >
                                            <option value="<?= $data["jk_siswa"] ?>"><?= $data["jk_siswa"] ?></option>
                                            <option value="laki-laki">laki-laki</option>
                                            <option value="perempuan">perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Tempat Lahir</label>
                                        <input type="email" name="tp_siswa" class="form-control" id="nis" value="<?= $data["tplahir_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Nama Ayah</label>
                                        <input type="email" name="ayah_siswa" class="form-control" id="nis" value="<?= $data["ayah_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Kelas</label>
                                        <select name="kls_siswa" class="custom-select form-control" value="<?= $data["kelas_siswa"] ?>">
                                            <option value="<?= $data["kelas_siswa"] ?>"><?= $data["kelas_siswa"] ?></option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="8">9</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group mt-3">
                                        <label >NISN</label>
                                        <input type="number" name="nisn" class="form-control" id="nisn" value="<?= $data["nisn_siswa"] ?>">
                                    </div>
                                    
                                    <div class="form-group mt-3">
                                        <label >NIK Siswa</label>
                                        <input type="number" name="nik_siswa" class="form-control" id="nisn" value="<?= $data["nik_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >No. Telpon</label>
                                        <input type="number" name="telp_siswa" class="form-control" id="nisn" value="<?= $data["telp_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control" id="nisn" value="<?= $data["tgl_lahir"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Nama Ibu</label>
                                        <input type="text" name="ibu_siswa" class="form-control" id="nisn" value="<?= $data["ibu_siswa"] ?>">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label >Rombel</label>
                                        <select name="rombel_siswa" class="custom-select form-control" value="<?= $data["rombel_siswa"] ?>">
                                            <option value="<?= $data["rombel_siswa"] ?>"><?= $data["rombel_siswa"] ?></option>
                                            <option value="VII A">VII A</option>
                                            <option value="VII B">VII B</option>
                                            <option value="VIII A">VIII A</option>
                                            <option value="VIII B">VIII B</option>
                                            <option value="IX A">IX A</option>
                                            <option value="IX B">IX B</option>
                                        </select>
                                    </div>
                                

                                    <button type="button" name="btnsave" id="btnsave" class="btn btn-primary mt-3 float-left">Save</button>
                                    <button id="cancel-edit" type="button" class="btn btn-primary mt-3 float-left">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
// SIMPAN DATA
    $('#btnsave').on('click', function(){

        $.ajax({
            method: "POST",
            url: "pages/siswa/action-siswa.php",
            dataType: "json",
            data: "action=editsiswa&" + $('#formsiswa').serialize(),
            success: function(msg){
                if(msg.status == "sukses"){
                    alert("berhasil edit data");
                    $('.tampil').empty();
                    $('.tampil').load('pages/siswa/siswa.php');
                }else{
                    alert("gagal tambah data");
                    $('.tampil').empty();
                    $('.tampil').load('pages/siswa/siswa.php');
                }
            }
        })
        
    })

// BATAL DATA
$('#cancel-edit').on('click', function(){

$('.tampil').empty();
$('.tampil').load('pages/siswa/siswa.php');

})

</script>
