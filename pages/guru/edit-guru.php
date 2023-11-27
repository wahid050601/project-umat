<?php
require "../../function/database.php";


$simpanguru=$_GET["idguru"];

$query = "SELECT * FROM tb_guru WHERE id_guru=$simpanguru";
$guru = mysqli_query($connect, $query);

foreach($guru as $g){
    $data = $g;
}




?>
<section class="section">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body mt-4">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <div class="card-header bg-primary text-white">EDIT DATA GURU</div>
                            <form action="#" method="POST" id="formguru">
                                <!-- <div class="form-group mt-3">
                                    <label for="number">ID Guru</label> -->
                                    <input type="hidden" name="idguru" class="form-control" id="id" value="<?= $data["id_guru"] ?>">
                                <!-- </div> -->

                                <div class="form-group mt-3">
                                    <label for="text">Nama Guru</label>
                                    <input type="nama" name="namaguru" class="form-control" id="nama" value="<?= $data["nama_guru"] ?>">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">NUPTK</label>
                                    <input type="nuptk" name="nuptk" class="form-control" id="nuptk" value="<?= $data["nuptk"] ?>">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="text">Mata pelajaran</label>
                                    <input type="mapel" name="mapel" class="form-control" id="mapel" value="<?= $data["mapel_guru"] ?>">
                                </div>
                                
                                                
                                <button type="button" name="btnsave" id="btnsave" class="btn btn-primary mt-3 float-left">Save</button>
                                <button id="cancel-edit" type="button" class="btn btn-primary mt-3 float-left">Cancel</button>
                            </form>
                        </div>
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
            url: "pages/guru/action.php",
            dataType: "json",
            data: "action=editguru&" + $('#formguru').serialize(),
            success: function(msg){
                if(msg.status == "success"){
                    alert("berhasil edit data");
                    $('.tampil').empty();
                    $('.tampil').load('pages/guru/guru.php');
                }else{
                    alert("gagal tambah data");
                    $('.tampil').empty();
                    $('.tampil').load('pages/guru/guru.php');
                }
            }
        })
        
    })

// BATAL DATA
$('#cancel-edit').on('click', function(){

$('.tampil').empty();
$('.tampil').load('pages/guru/guru.php');

})

</script>
