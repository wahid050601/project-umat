<style>
.loading {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.9);
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    font-size: 25px;
    }
</style>


<div class="card">
    <div class="card-header">
        <i class="bi bi-journal-text"></i>&nbsp; Jadwal Pelajaran
    </div>
    <div class="card-body mt-4">
        
        <!-- Formm filter jadwal -->
         <div class="row mb-4">
            <div class="col-sm-3">
                <div class="form-group">
                    <select class="form-control form-control-sm" id="filterkelas">
                        <option value="">_pilih kelas_</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" id="tahunPelajaran" placeholder="Tahun Pelajaran" readonly>
                </div>
            </div>
            <div class="col-sm-3">
                <button type="button" class="btn btn-primary btn-sm" id="filterbtn"><i class="bi bi-gear-fill"></i> Proses Jadwal</button>
            </div>
         </div>
        
        
        <!-- render jadwal  -->
        <div class="mt-4">
            <div class="alert alert-warning" role="alert" id="alertInfo">
                silahkan pilih <strong>Kelas</strong>, kemudian klik tombol <strong>Proses Jadwal</strong>
            </div>
        </div>

    </div>
</div>

<script>
    // render select kelas
    loadrombel();
    
    // on select kelas, set tahun pelajaran by data-tprombel
    $('#filterkelas').on('change', function(){
        let tprombel = $(this).find(':selected').data('tprombel');
        if(tprombel){
            $('#tahunPelajaran').val(tprombel);
        } else {
            $('#tahunPelajaran').val('');
        }
    });


    // on click filterbtn, load jadwal
    $('#filterbtn').on('click', function(){
        if($('#filterkelas').val() == ''){
            alert("Silahkan pilih kelas terlebih dahulu!");
            return;
        }

        $('#alertInfo').hide();
    });




    /* utility function */
    function loadrombel(){
        $.ajax({
            url: "pages/nilai/nilai-action.php",
            method: "POST",
            data: {
                action: "loadlistselectkelas"
            },
            success: function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    let options = `<option value="">_pilih kelas_</option>`;
                    response.rombel.forEach(function(rom){
                        options += `<option value="${rom.id}" data-tprombel="${rom.tp_rombel}" >${rom.ket_rombel}</option>`;
                    });
                    $('#filterkelas').html(options);
                } else {
                    alert(response.info);
                }
            },
            error: function(err){
                alert("Error : "+ err.statusText);
            }
        });
    }

    function loadjadwal(idkelas, tprombel){
        $.ajax({
            url: "pages/pelajaran/pelajaran-action.php",
            method: "POST",
            data: {
                action: "loadjadwal",
                idkelas : idkelas,
                tprombel : tprombel
            },
            success: function(res){
                let response = JSON.parse(res);
                if(response.status == "success"){
                    // render jadwal
                    $('#renderJadwal').html(response.html);
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