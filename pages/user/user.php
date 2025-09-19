<style>
  .table-user{
    font-size: smaller;
    width: 100%;
    white-space: nowrap;
  }
  
  /* Styling untuk baris yang dipilih */
  .table-user tbody tr.selected {
    background-color: #b8daff !important;
    color: #212529;
  }
  
  /* Cursor pointer untuk menunjukkan baris dapat diklik */
  .table-user tbody tr {
    cursor: pointer;
  }
</style>

<div class="card">
    <div class="card-header">
        <i class="bi bi-people-fill"></i>&nbsp; Konfigurasi User
    </div>
    <div class="card-body mt-4">
        <div class="button-users">
            <button type="button" class="btn btn-primary btn-sm" id="btnAddUser"><i class="bi bi-plus-circle"></i></button>
            <button type="button" class="btn btn-primary btn-sm disabled" id="btnEditUser"><i class="bi bi-pencil-square"></i></button>
            <button type="button" class="btn btn-primary btn-sm disabled" id="btnDeleteUser"><i class="bi bi-trash"></i></button>
        </div>
        <hr>

        <div class="content-users">
            <table class="table table-bordered table-hover table-sm table-user">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No.Telp</th>
                        <th class="text-center">E-Mail</th>
                        <th class="text-center">Akses User</th>
                    </tr>
                </thead>
                <tbody class="put-data-user">
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal add data user -->
<div class="modal" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel"><i class="bi bi-plus-square"></i> TAMBAH DATA USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="bi bi-times"></i></button>
            </div>
            <div class="modal-body row">
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Username</label>
                    <input type="text" class="form-control form-control-sm form-add-user" id="username" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Password</label>
                    <input type="text" class="form-control form-control-sm form-add-user" id="password" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Nama</label>
                    <input type="text" class="form-control form-control-sm form-add-user" id="nama" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control form-control-sm form-add-user" id="alamat" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">No. Telp</label>
                    <input type="text" class="form-control form-control-sm form-add-user" id="telp" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">E-Mail</label>
                    <input type="text" class="form-control form-control-sm form-add-user" id="email" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Akses user</label>
                    <select class="form-control form-control-sm form-add-user" id="role">
                        <option value="">_pilih_</option>
                        <option value="guru">Guru</option>
                        <option value="walikelas">Wali Kelas</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
                
            </div>
            <div class="modal-footer set-btn-add">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="savedatauser"><i class="bi bi-check-circle"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal edit data user -->
<div class="modal" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel"><i class="bi bi-pencil-square"></i> EDIT DATA USER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="bi bi-times"></i></button>
            </div>
            <div class="modal-body row">
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Username</label>
                    <input type="text" class="form-control form-control-sm form-edit-user" id="usernameEdit" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Password</label>
                    <input type="text" class="form-control form-control-sm form-edit-user" id="passwordEdit" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Nama</label>
                    <input type="text" class="form-control form-control-sm form-edit-user" id="namaEdit" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control form-control-sm form-edit-user" id="alamatEdit" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">No. Telp</label>
                    <input type="text" class="form-control form-control-sm form-edit-user" id="telpEdit" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">E-Mail</label>
                    <input type="text" class="form-control form-control-sm form-edit-user" id="emailEdit" placeholder="input...">
                </div>
                
                <div class="form-group mt-2 mb-2">
                    <label for="">Akses user</label>
                    <select class="form-control form-control-sm form-edit-user" id="roleEdit">
                        <option value="">_pilih_</option>
                        <option value="guru">Guru</option>
                        <option value="walikelas">Wali Kelas</option>
                        <option value="admin">Administrator</option>
                    </select>
                </div>
                
            </div>
            <div class="modal-footer set-btn-edit">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="savedatauser"><i class="bi bi-check-circle"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>


<script>

    // LOAD DATA USER
    loadDataUser();


    // SELECT DATA
    $('#btnEditUser, #btnDeleteUser').addClass('disabled');
    var selectedRowData = null;
    $('.table-user tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');
        if ($(this).hasClass('selected')) {
            selectedRowData = {};
            $(this).find('td').each(function() {
                $.each(this.dataset, function(key, val) {
                    selectedRowData[key] = val;
                });
            });
            $('#btnEditUser, #btnDeleteUser').removeClass('disabled');
        } else {
            selectedRowData = null;
            $('#btnEditUser, #btnDeleteUser').addClass('disabled');
        }
    });

    // ADD DATA USER
    $('#btnAddUser').on('click', function(){
        let btnset = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="savedatauser"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.set-btn-add').html(btnset);
        $('.form-add-user').val('');
        $('.form-add-user').val('').trigger('change');
        $('#addUserModal').modal('show');

        $('#savedatauser').on('click', function(){
            let datasend = {
                action: 'adduser',
                username: $('#username').val(),
                password: $('#password').val(),
                nama: $('#nama').val(),
                alamat: $('#alamat').val(),
                telp: $('#telp').val(),
                email: $('#email').val(),
                role: $('#role').val(),
            }

            $.ajax({
                method: 'POST',
                url: 'pages/user/action-user.php',
                dataType: 'json',
                data: datasend,
                success: function(msg){
                    $('.form-add-user').val('');
                    $('.form-add-user').val('').trigger('change');
                    $('#addUserModal').modal('hide');
                    loadDataUser();

                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                },
                error: function(err){
                    $('#addUserModal').modal('hide');
                    Swal.fire({
                        title: 'Error',
                        text: JSON.stringify(err),
                        icon: 'error'
                    });
                }
            })
        });
    })

    // EDIT DATA USER
    $('#btnEditUser').on('click', function(){
        console.log("DATA SELCET : ", selectedRowData);
        let btnset = `
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
        <button type="button" class="btn btn-primary btn-sm" id="savedatauseredit"><i class="bi bi-check-circle"></i> Simpan</button>`;
        $('.set-btn-edit').html(btnset);
        $('#editUserModal').modal('show');

        let user = selectedRowData;
        $('#usernameEdit').val(user.username);
        $('#passwordEdit').val(user.password);
        $('#namaEdit').val(user.nama);
        $('#alamatEdit').val(user.alamat);
        $('#telpEdit').val(user.telp);
        $('#emailEdit').val(user.email);
        $('#roleEdit').val(user.role).trigger('change');

        $('#savedatauseredit').on('click', function(){
            let datasendEdit = {
                action: 'edituser',
                id: user.id,
                username: $('#usernameEdit').val(),
                password: $('#passwordEdit').val(),
                nama: $('#namaEdit').val(),
                alamat: $('#alamatEdit').val(),
                telp: $('#telpEdit').val(),
                email: $('#emailEdit').val(),
                role: $('#roleEdit').val(),
            } 
            $.ajax({
                method: 'POST',
                url: 'pages/user/action-user.php',
                dataType: 'json',
                data: datasendEdit,
                success: function(msg){
                    $('.form-edit-user').val('');
                    $('.form-edit-user').val('').trigger('change');
                    $('#editUserModal').modal('hide');
                    loadDataUser();
    
                    Swal.fire({
                        title: msg.status,
                        text: msg.info,
                        icon: msg.status
                    });
                },
                error: function(err){
                    $('#editUserModal').modal('hide');
                    Swal.fire({
                        title: 'Error',
                        text: JSON.stringify(err),
                        icon: 'error'
                    });
                }
            })
        })
    })
    
    // DELETE DATA USER
    $('#btnDeleteUser').on('click', function(){
        let dt = selectedRowData;
        Swal.fire({
            icon: "question",
            title: "Hapus Data User",
            text: "Ingin hapus data user "+ dt.nama +" ?",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    url: 'pages/user/action-user.php',
                    dataType: 'json',
                    data: {action: 'deleteuser', id: dt.id},
                    success: function(msg){
                        loadDataUser();
                        Swal.fire({
                            title: msg.status,
                            text: msg.info,
                            icon: msg.status
                        });
                    },
                    error: function(err){
                        Swal.fire({
                            title: 'Error',
                            text: JSON.stringify(err),
                            icon: 'error'
                        });
                    }
                });
            }
        });
    })









    function loadDataUser(){
        $('.table-user').DataTable().destroy();
        $.ajax({
            method: 'POST',
            url: 'pages/user/action-user.php',
            dataType: 'json',
            data: {action: 'loaddatauser'},
            success: function(user){

                let datauser = '';
                let num = 1;
                $.each(user.data, function(id,val){
                    datauser += `
                    <tr>
                        <td data-id="${val.id}">${num++}</td>
                        <td data-username="${val.username}">${val.username}</td>
                        <td data-password="${val.password}">${randomString()}</td>
                        <td data-nama="${val.nama}">${val.nama}</td>
                        <td data-alamat="${val.alamat}">${val.alamat}</td>
                        <td data-telp="${val.no_telp}">${val.no_telp}</td>
                        <td data-email="${val.email}">${val.email}</td>
                        <td data-role="${val.level}">${val.level}</td>
                    </tr>`;
                });
                $('.put-data-user').html(datauser);
                $('.table-user').DataTable();
            }
        })
    }


    // Utilities
    function randomString() {
        const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        let result = "";
        
        for (let i = 0; i < 10; i++) {
            const randomIndex = Math.floor(Math.random() * chars.length);
            result += chars[randomIndex];
        }
        
        return result;
    }

</script>