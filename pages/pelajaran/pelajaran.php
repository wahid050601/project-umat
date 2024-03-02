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
        <!-- HEADER TAB JADWAL -->
        <span style="color: red; font-style: italic; font-size: 11px;">*) Pilih salah satu jadwal</span>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button data-namahari="Senin" class="nav-link jadwalmapel" id="senin-tab" data-bs-toggle="tab" data-bs-target="#page_jadwal" type="button" type="button" role="tab" aria-controls="page_jadwal" aria-selected="true">senin</button>
            </li>
            <li class="nav-item" role="presentation">
                <button data-namahari="Selasa" class="nav-link jadwalmapel" id="selasa-tab" data-bs-toggle="tab" data-bs-target="#page_jadwal" type="button" type="button" role="tab" aria-controls="page_jadwal" aria-selected="true">selasa</button>
            </li>
            <li class="nav-item" role="presentation">
                <button data-namahari="Rabu" class="nav-link jadwalmapel" id="rabu-tab" data-bs-toggle="tab" data-bs-target="#page_jadwal" type="button" type="button" role="tab" aria-controls="page_jadwal" aria-selected="true">rabu</button>
            </li>
            <li class="nav-item" role="presentation">
                <button data-namahari="Kamis" class="nav-link jadwalmapel" id="kamis-tab" data-bs-toggle="tab" data-bs-target="#page_jadwal" type="button" type="button" role="tab" aria-controls="page_jadwal" aria-selected="true">kamis</button>
            </li>
            <li class="nav-item" role="presentation">
                <button data-namahari="Jumat" class="nav-link jadwalmapel" id="jumat-tab" data-bs-toggle="tab" data-bs-target="#page_jadwal" type="button" type="button" role="tab" aria-controls="page_jadwal" aria-selected="true">jumat</button>
            </li>
            <li class="nav-item" role="presentation">
                <button data-namahari="Sabtu" class="nav-link jadwalmapel" id="sabtu-tab" data-bs-toggle="tab" data-bs-target="#page_jadwal" type="button" type="button" role="tab" aria-controls="page_jadwal" aria-selected="true">sabtu</button>
            </li>
        </ul>

        <!-- BODY TAB JADWAL -->
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade" id="page_jadwal" role="tabpanel">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="head-jadwal">Jadwal Hari <span class="day-jadwal"></span></div>
                        <hr>
                        <div class="button-action">
                            <button class="btn btn-primary btn-sm" id="addJadwalBtn"><i class="bi bi-plus"></i></button>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                        </div>
                        <!-- Loading -->
                        <!-- <div class="loading"><i class="bi bi-cloud-arrow-down"></i>&nbsp; Loading ...</div> -->
                        <div class="table-jadwal">

                        </div>
                    </li>
                </ul>
            </div>
            <!-- <div class="tab-pane fade" id="selasa" role="tabpanel" aria-labelledby="selasa-tab">
                SELASA Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officiis?
            </div>
            <div class="tab-pane fade" id="rabu" role="tabpanel" aria-labelledby="rabu-tab">
                RABU Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officiis?
            </div>
            <div class="tab-pane fade" id="kamis" role="tabpanel" aria-labelledby="kamis-tab">
                KAMIS Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officiis?
            </div>
            <div class="tab-pane fade" id="jumat" role="tabpanel" aria-labelledby="jumat-tab">
                JUMAT Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officiis?
            </div>
            <div class="tab-pane fade" id="sabtu" role="tabpanel" aria-labelledby="sabtu-tab">
                SABTU Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, officiis?
            </div> -->
        </div>

        <!-- <ul class="list-group mt-4">
            <li class="list-group-item text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" data-namahari="Senin" class="btn btn-outline-primary jadwalmapel" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Senin</button>
                    <button type="button" data-namahari="Selasa" class="btn btn-outline-primary jadwalmapel" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Selasa</button>
                    <button type="button" data-namahari="Rabu" class="btn btn-outline-primary jadwalmapel" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Rabu</button>
                    <button type="button" data-namahari="Kamis" class="btn btn-outline-primary jadwalmapel" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Kamis</button>
                    <button type="button" data-namahari="Jumat" class="btn btn-outline-primary jadwalmapel" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Jumat</button>
                    <button type="button" data-namahari="Sabtu" class="btn btn-outline-primary jadwalmapel" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Sabtu</button>
                </div>
            </li>
            <div class="collapse" id="collapseExample">
                <li class="list-group-item">
                    <div class="head-jadwal">
                        Jadwal Hari <span class="day-jadwal"></span>
                    </div>
                    <hr>
                    <div class="button-action">
                        <button class="btn btn-primary btn-sm" id="addJadwalBtn"><i class="bi bi-plus"></i></button>
                        <button class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></button>
                    </div>
                    
                    <div class="loading"><i class="bi bi-cloud-arrow-down"></i>&nbsp; Loading ...</div>
                    <div class="table-jadwal">

                    </div>
                </li>
            </div>
            <small style="font-size: 11px; font-style: italic; color: red;">*) Pilih salah satu hari</small>
        </ul> -->
    </div>
</div>


<!-- Modal Add Data -->
<div class="modal fade" id="AddJadwalModal" tabindex="-1" aria-labelledby="AddJadwalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddJadwalModalLabel">Tambah Jadwal Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="header-form text-center">Jadwal Hari <span class="dayname"></span></div>
                <form action="" method="post" class="mt-3" id="form-add-jadwal">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <select name="" id="" class="form-control form-control-sm sel-jam">
                                    <option value="">_ jam ke _</option>
                                    <script>
                                        $(document).ready(function(){
                                            let selectopt = '';
                                            for(let i=1; i <= 10; i++){
                                                selectopt += ' <option value="'+i+'">'+i+'</option>';
                                            }
                                            $('.sel-jam').append(selectopt);
                                        });
                                    </script>
                                </select>
                            </div>
                            <div class="col-4">
                                <input type="text" name="" id="waktuMulai" placeholder="00.00" class="form-control form-control-sm">
                            </div>
                            <div class="col-1 text-center">
                                <span class="h4"> - </span>
                            </div>
                            <div class="col-4">
                                <input type="text" name="" id="waktuSelesai" placeholder="00.00" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="" id="" class="form-control form-control-sm formSelectMapel">
                            <!-- Select Here -->
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <select name="" id="" class="form-control form-control-sm formSelectGuru">
                            <!-- Select Here -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="saveDataJadwal"><i class="bi bi-download"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.jadwalmapel').on('click', function(){
        $('.table-jadwal').hide();
        $('.loading').show();

        // Changes Header Jadwal
        var namahari = $(this).data('namahari');
        $('.day-jadwal').html(namahari);
        
        // Get Data Mapel
        getDataMapel(namahari);
    });

    $('#addJadwalBtn').on('click', function(){
        $('.formSelectGuru').empty();
        $('.formSelectGuru').append('<option>__Pilih Guru__</option>');
        $('.formSelectGuru').attr('disabled', true);

        let datahari = $('.day-jadwal').text();
        $('.dayname').html(datahari);
        console.log(datahari)
        $.ajax({
            method: "POST",
            url: "pages/pelajaran/pelajaran-get-data.php",
            dataType: "json",
            data: {"action" : "getDataGuruMapel"},
            success: function(msg){
                let datamapel = '<option>__Pilih Pelajaran__</option>';
                $.each(msg.datagurumapel, function(index, value){
                    datamapel += '<option value="'+value.mapel_guru+'">'+value.mapel_guru+'</option>';
                });
                $('.formSelectMapel').empty();
                $('.formSelectMapel').append(datamapel);

                $('.formSelectMapel').on('change', function(){
                    let dataguru = '<option>__Pilih Guru__</option>';
                    $.each(msg.datagurumapel, function(index, value){
                        dataguru += '<option value="'+value.nama_guru+'">'+value.nama_guru+'</option>';
                    });
                    $('.formSelectGuru').empty();
                    $('.formSelectGuru').append(dataguru);
                    $('.formSelectGuru').attr('disabled', false);
                });
            }
        });
        $('#AddJadwalModal').modal('show');
    });

    $('#saveDataJadwal').on('click', function(){
        if($('.sel-jam').val()=='' || $('#waktuMulai').val()=='' || $('#waktuSelesai').val()=='' || $('.formSelectMapel').val()=='' || $('.formSelectGuru').val()==''){
            Swal.fire({
                title: "warning",
                icon: "warning",
                text: "Harap lengkapi data isian",
            });
        }else{
            $.ajax({
                method: "POST",
                url: "pages/pelajaran/pelajaran-func-data.php",
                dataType: "json",
                data: {
                    "action" : "addJadwalMapel",
                    "triger" : "true",
                    "hari" : $('.dayname').text(),
                    "jamke" : $('.sel-jam').val(),
                    "waktumulai" : $('#waktuMulai').val(),
                    "waktuselesai" : $('#waktuSelesai').val(),
                    "mapel" : $('.formSelectMapel').val(),
                    "guru" : $('.formSelectGuru').val()
                },
                beforeSend: function(data){
                    $('#form-add-jadwal')[0].reset();
                    $('#AddJadwalModal').modal('hide');
                },
                success: function(msg){
                    let namahari = $('.day-jadwal').text();
                    if(msg.note == 'notadd'){
                        Swal.fire({
                            title: 'warning',
                            text: msg.text,
                            icon:  'warning'
                        });
                    }else{
                        if(msg.status == 'success'){
                            Swal.fire({
                                title: msg.status,
                                text: 'data berhasil ditambah',
                                icon:  msg.status
                            }).then((ok)=>{
                                getDataMapel(namahari);
                            });
                        }else{
                            Swal.fire({
                                title: msg.status,
                                text: 'data gagal ditambah',
                                icon:  msg.status
                            }).then((ok)=>{
                                getDataMapel(namahari);
                            });
                        }
                    }
                }
            });
        }
    });


    //  FUNCTION ==========================================================================
    function getDataMapel(namahari){
        $.ajax({
            method: "POST",
            url: "pages/pelajaran/pelajaran-get-data.php",
            dataType: "json",
            data: {
                "action" : "getDataMapel",
                "datahari" : namahari
            },
            success: function(msg){
                if(msg.datamapel != ''){
                    let rowspan = msg.datamapel.length + 1;
                    let showmapel = `
                    <table class="table table-bordered border-primary mt-3">
                        <tr class="bg-primary text-white text-center"><th colspan="5">Jadwal Pelajaran Hari `+msg.datamapel[0]["hari"]+`</th></tr>
                        <tr class="text-center"><td rowspan="`+rowspan+`" width="7%">`+msg.datamapel[0]["hari"]+`</td></tr>`;
                    $.each(msg.datamapel, function(idx, value){
                        showmapel += `
                        <tr>
                            <td class="text-center" width="10%">Jam ke-`+value.jam_ke+`</td>
                            <td class="text-center" width="15%">`+value.waktu_mulai+` - `+value.waktu_selesai+`</td>
                            <td width="30%">`+value.mapel+`</td>
                            <td>`+value.guru_mapel+`</td>
                        </tr>`;
                    });
                    showmapel += `</table>`;
                    $('.table-jadwal').empty();
                    $('.table-jadwal').append(showmapel);
                    $('.table-jadwal').show();
                    // $('.table-jadwal').DataTable();
                    $('.loading').hide();
                }else{
                    // Swal.fire({
                    //     title: "warning",
                    //     icon: "warning",
                    //     text: "tidak ada jadwal pelajaran, harap tambah terlebih dahulu",
                    // });

                    $('.table-jadwal').empty();
                    $('.table-jadwal').append('<div style="font-style: italic; color: red;" class="text-center">Jadwal hari '+namahari+' kosong, harap tambah data pelajaran</div>');
                    $('.table-jadwal').show();
                    $('.loading').hide();
                }
            }
        });
    }
</script>