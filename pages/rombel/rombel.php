<style>
    .bucket-rombel {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
   }
</style>

<div class="card">
    <div class="card-header">
        <i class="bi bi-building-fill"></i>&nbsp; Rombongan Belajar
    </div>
    <div class="card-body mt-4">
        <div class="button-rombel-act">
            <button type="button" id="add-rombel" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> add</button>
            <button type="button" id="edit-rombel" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> edit</button>
            <button type="button" id="del-rombel" class="btn btn-primary btn-sm"><i class="bi bi-trash"></i> delete</button>
        </div>
        <hr>
        <div class="bucket-rombel">
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title"><input type="radio"> KELAS 1 A</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">TP 2023/2024</h6>
                    <a href="#" class="card-link btn btn-primary btn-sm"><i class="bi bi-person-fill-add"></i></a>
                    <a href="#" class="card-link btn btn-primary btn-sm"><i class="bi bi-person-fill-dash"></i></a>
                </div>
            </div>
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title"><input type="radio"> KELAS 1 B</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">TP 2023/2024</h6>
                    <a href="#" class="card-link btn btn-primary btn-sm"><i class="bi bi-person-fill-add"></i></a>
                    <a href="#" class="card-link btn btn-primary btn-sm"><i class="bi bi-person-fill-dash"></i></a>
                </div>
            </div>
            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title"><input type="radio"> KELAS 1 C</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">TP 2023/2024</h6>
                    <a href="#" class="card-link btn btn-primary btn-sm"><i class="bi bi-person-fill-add"></i></a>
                    <a href="#" class="card-link btn btn-primary btn-sm"><i class="bi bi-person-fill-dash"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this where you want the button -->
<button type="button" class="btn btn-primary" id="showModalBtn">Show Modal</button>

<script>
$(document).ready(function() {
    $('#add-rombel').on('click', function() {  // Changed to use add-rombel button
        const modal = $.customModal({
            title: 'Tambah Rombongan Belajar',
            content: `
                <form id="rombelForm">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="namaKelas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Pelajaran</label>
                        <input type="text" class="form-control" id="tahunPelajaran" value="2023/2024" required>
                    </div>
                </form>
            `,
            size: 'large',
            theme: 'light',  // New feature: theme support
            buttons: [
                {
                    text: 'Batal',
                    class: 'btn-secondary',
                    click: function() {
                        modal.hide();
                    }
                },
                {
                    text: 'Simpan',
                    class: 'btn-primary',
                    click: function() {
                        if ($('#rombelForm')[0].checkValidity()) {
                            // Handle save action here
                            const namaKelas = $('#namaKelas').val();
                            const tahunPelajaran = $('#tahunPelajaran').val();
                            
                            // You can add your AJAX call here
                            console.log('Saving:', { namaKelas, tahunPelajaran });
                            
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data rombongan belajar berhasil disimpan'
                            });
                            
                            modal.hide();
                        } else {
                            $('#rombelForm')[0].reportValidity();
                        }
                    }
                }
            ]
        });
        
        modal.show();
    });

    // Edit modal
    $('#edit-rombel').on('click', function() {
        if (!$('.card-title input[type="radio"]:checked').length) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Silakan pilih kelas yang akan diedit'
            });
            return;
        }

        const modal = $.customModal({
            title: 'Edit Rombongan Belajar',
            content: `
                <form id="editRombelForm">
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="editNamaKelas" 
                               value="${$('.card-title input[type="radio"]:checked').parent().text().trim()}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Pelajaran</label>
                        <input type="text" class="form-control" id="editTahunPelajaran" value="2023/2024" required>
                    </div>
                </form>
            `,
            theme: 'light',
            buttons: [
                {
                    text: 'Batal',
                    class: 'btn-secondary',
                    click: function() { modal.hide(); }
                },
                {
                    text: 'Update',
                    class: 'btn-primary',
                    click: function() {
                        if ($('#editRombelForm')[0].checkValidity()) {
                            // Add your update logic here
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data rombongan belajar berhasil diupdate'
                            });
                            modal.hide();
                        } else {
                            $('#editRombelForm')[0].reportValidity();
                        }
                    }
                }
            ]
        });
        
        modal.show();
    });

    // Delete confirmation
    $('#del-rombel').on('click', function() {
        if (!$('.card-title input[type="radio"]:checked').length) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Silakan pilih kelas yang akan dihapus'
            });
            return;
        }

        const modal = $.customModal({
            title: 'Hapus Rombongan Belajar',
            content: '<p>Apakah Anda yakin ingin menghapus rombongan belajar ini?</p>',
            theme: 'light',
            buttons: [
                {
                    text: 'Batal',
                    class: 'btn-secondary',
                    click: function() { modal.hide(); }
                },
                {
                    text: 'Hapus',
                    class: 'btn-danger',
                    click: function() {
                        // Add your delete logic here
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Rombongan belajar berhasil dihapus'
                        });
                        modal.hide();
                    }
                }
            ]
        });
        
        modal.show();
    });
});
</script>