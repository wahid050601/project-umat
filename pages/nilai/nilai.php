
<div class="card">
    <div class="card-header">
        <i class="bi bi-book"></i>&nbsp; Input Nilai Siswa
    </div>
    <div class="card-body mt-4">
        <div class="row">
            <div class="col-md-6">
                <table style="width: 100%;" class="mb-2">
                    <tr>
                        <th width="40%">Pilih Kelas</th>
                        <th>:</th>
                        <td>
                            <select class="form-control form-control-sm" id="kelas">
                                <option value="">_pilih_</option>
                                <option value="4A">KELAS 4A</option>
                                <option value="4B">KELAS 4B</option>
                                <option value="5A">KELAS 5A</option>
                                <option value="5B">KELAS 5B</option>
                                <option value="6A">KELAS 6A</option>
                                <option value="6B">KELAS 6B</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="40%">Pilih Mata Pelajaran</th>
                        <th>:</th>
                        <td>
                            <select class="form-control form-control-sm" id="kelas">
                                <option value="">_pilih_</option>
                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                <option value="Matematika">Matematika</option>
                                <option value="Ilmu Pengetahuan Alam (IPA)">Ilmu Pengetahuan Alam (IPA)</option>
                                <option value="Ilmu Pengetahuan Sosial (IPS)">Ilmu Pengetahuan Sosial (IPS)</option>
                                <option value="Pendidikan Pancasila & Kewarganegaraan (PPKn)">Pendidikan Pancasila & Kewarganegaraan (PPKn)</option>
                                <option value="Pendidikan Agama">Pendidikan Agama</option>
                                <option value="Seni Budaya & Keterampilan (SBK)">Seni Budaya & Keterampilan (SBK)</option>
                                <option value="endidikan Jasmani, Olahraga & Kesehatan (PJOK)">Pendidikan Jasmani, Olahraga & Kesehatan (PJOK)</option>
                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="button" class="btn btn-primary btn-sm mb-3"><i class="bi bi-search"></i> Cari</button>
            </div>
            <div class="col-md-6">
            </div>
            <br>
            <hr>

            <table class="table table-bordered table-sm table-striped table-nilai">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">No.Induk</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">L/P</th>
                        <th class="text-center">Harian</th>
                        <th class="text-center">PAT/PAS</th>
                        <th class="text-center">Rapor</th>
                        <th class="text-center">Predikat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">12.0232</td>
                        <td>Rangga Setiawan</td>
                        <td class="text-center">L</td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">B</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">12.0424</td>
                        <td>Rahayu</td>
                        <td class="text-center">P</td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">B</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">12.0335</td>
                        <td>Rangga Setiawan</td>
                        <td class="text-center">L</td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">78 <i class="bi bi-pencil-fill"></i></td>
                        <td class="text-center">B</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>

    // Load data eskul
    loaddataeskul();



    function loaddataeskul(){
        $('.table-nilai').DataTable().destroy();
        $('.table-nilai').DataTable();
    }
    
</script>