

<div class="card">
    <div class="card-header">
        <i class="bi bi-person-fill"></i>&nbsp; Profil User
    </div>
    <div class="card-body mt-4">

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img id="profile-image-preview" src="assets/img/logo_yaj.jpg" alt="Profile" class="rounded-circle" style="width: 180px; height: 180px; object-fit: cover;">
                        <h2 id="profile-name-title">-</h2>
                        <h3 id="profile-level-title">-</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3 ml-4 mr-4">
                        
                        <div class="form-group mt-2 mb-2">
                            <label for="username-cnf">Username</label>
                            <input type="text" id="username-cnf" class="form-control form-control-sm">
                        </div>
                        
                        <div class="form-group mt-2 mb-2">
                            <label for="password-cnf">Password</label>
                            <input type="password" id="password-cnf" class="form-control form-control-sm" placeholder="Kosongkan jika tidak ingin mengubah password">
                        </div>
                        
                        <div class="form-group mt-2 mb-2">
                            <label for="nama-cnf">Nama User</label>
                            <input type="text" id="nama-cnf" class="form-control form-control-sm">
                        </div>
                        
                        <div class="form-group mt-2 mb-2">
                            <label for="alamat-cnf">Alamat</label>
                            <input type="text" id="alamat-cnf" class="form-control form-control-sm">
                        </div>
                        
                        <div class="form-group mt-2 mb-2">
                            <label for="telp-cnf">No.Telp</label>
                            <input type="text" id="telp-cnf" class="form-control form-control-sm">
                        </div>
                        
                        <div class="form-group mt-2 mb-2">
                            <label for="email-cnf">E-Mail</label>
                            <input type="text" id="email-cnf" class="form-control form-control-sm">
                        </div>

                        <div class="form-group mt-2 mb-2">
                            <label for="image-cnf">Foto Profil</label>
                            <input type="file" id="image-cnf" accept="image/*" class="form-control form-control-sm">
                        </div>

                        <button type="button" class="btn btn-primary btn-sm mt-2" id="updt-profil"><i class="bi bi-pencil-square"></i> Update Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
</div>

<script>
    loadProfileData();

    $('#updt-profil').on('click', function () {
        let formData = new FormData();
        formData.append('action', 'updateprofile');
        formData.append('username', $('#username-cnf').val());
        formData.append('password', $('#password-cnf').val());
        formData.append('nama', $('#nama-cnf').val());
        formData.append('alamat', $('#alamat-cnf').val());
        formData.append('telp', $('#telp-cnf').val());
        formData.append('email', $('#email-cnf').val());

        let imageFile = $('#image-cnf')[0].files[0];
        if (imageFile) {
            if (imageFile.size > 8 * 1024 * 1024) {
                Swal.fire({
                    title: 'Error',
                    text: 'Ukuran foto terlalu besar. Maksimal 8 MB.',
                    icon: 'error'
                });
                return;
            }
            formData.append('image', imageFile);
        }

        $.ajax({
            method: 'POST',
            url: 'pages/profile/action-profile.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (msg) {
                Swal.fire({
                    title: msg.status,
                    text: msg.info,
                    icon: msg.status
                }).then(function () {
                    if (msg.status === 'success') {
                        loadProfileData();
                        $('#password-cnf').val('');
                        $('#image-cnf').val('');
                    }
                });
            },
            error: function (err) {
                Swal.fire({
                    title: 'Error',
                    text: JSON.stringify(err),
                    icon: 'error'
                });
            }
        });
    });

    function loadProfileData() {
        $.ajax({
            method: 'POST',
            url: 'pages/profile/action-profile.php',
            data: { action: 'loadprofile' },
            dataType: 'json',
            success: function (msg) {
                if (msg.status === 'success') {
                    $('#username-cnf').val(msg.data.username);
                    $('#nama-cnf').val(msg.data.nama);
                    $('#alamat-cnf').val(msg.data.alamat);
                    $('#telp-cnf').val(msg.data.no_telp);
                    $('#email-cnf').val(msg.data.email);
                    $('#profile-name-title').text(msg.data.nama.toUpperCase());
                    $('#profile-level-title').text(msg.data.level || 'User');

                    if (msg.data.image && msg.data.image !== '') {
                        let imageSrc = 'assets/img/profile/' + msg.data.image;
                        $('#profile-image-preview').attr('src', imageSrc).one('error', function () {
                            $(this).attr('src', 'assets/img/logo_yaj.jpg');
                        });
                    } else {
                        $('#profile-image-preview').attr('src', 'assets/img/logo_yaj.jpg');
                    }
                } else {
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: 'error'
                    });
                }
            },
            error: function (err) {
                Swal.fire({
                    title: 'Error',
                    text: JSON.stringify(err),
                    icon: 'error'
                });
            }
        });
    }
</script>

