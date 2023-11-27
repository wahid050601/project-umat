
<section class="section">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body mt-4">
                    <div class="row"> 
                        <div class="col-lg-6">
                            <form action="#" method="POST" id="formguru">
                                <div class="form-group mt-3">
                                    <label for="number">ID Guru</label>
                                    <input type="number" name="idguru" class="form-control" id="ID" placeholder="ID">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="text">Nama Guru</label>
                                    <input type="nama" name="namaguru" class="form-control" id="nama" placeholder="Nama Guru">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="number">NUPTK</label>
                                    <input type="nuptk" name="nuptk" class="form-control" id="nuptk" placeholder="NUPTK">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="text">Mata pelajaran</label>
                                    <input type="mapel" name="mapel" class="form-control" id="mapel" placeholder="Mata Pelajaran">
                                </div>
                                
                                                
                                <button type="button" name="btnsave" id="btnsave" class="btn btn-primary mt-3 float-left">Save</button>
                                <button id="cancel" type="button" class="btn btn-primary mt-3 float-left">Cancel</button>
                            </form>
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
            url: "pages/guru/action.php",
            dataType: "json",
            data: "action=addguru&" + $('#formguru').serialize(),
            success: function(msg){
                if(msg.status == "success"){
                    alert("berhasil tambah data");
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
$('#cancel').on('click', function(){

    $('.tampil').empty();
    $('.tampil').load('pages/guru/guru.php');

})


</script>
