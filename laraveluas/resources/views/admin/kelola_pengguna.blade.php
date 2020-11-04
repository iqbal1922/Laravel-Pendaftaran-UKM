@extends('master')

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <a href="#" class="act-btn" onclick="add_supplier()">+</a>
            <!-- OVERVIEW -->
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Kelola Pengguna</h3>
                    <p class="panel-subtitle">Admin / Kelola Pengguna</p>
                </div>
                <div class="panel-body">
                    <table class="display" id="data">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $row)
                                <tr>
                                    <td> <?= $row->mahasiswa->nim; ?> </td>
                                    <td> <?= $row->name; ?> </td>
                                    <th> <?= $row->password; ?> </th>
                                    <td>
                                        <button class="btn btn-warning" onclick="edit_pengguna( <?= $row->id; ?> )"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-info" onclick="reset(<?= $row->id; ?>)"><i class="fa fa-undo"></i> Reset Password</button>
                                        <button class="btn btn-danger" onclick="window.location.href='{{ route('hapususer', ['id'=> $row->id]) }}'"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>

<script>
    function add_supplier() {
        // $('#form')[0].reset();
        $("#myModal").modal('show');
        $('.modal-title').text('Tambah Pengguna'); // Set title to Bootstrap modal title
        $('#passwordnew').css('display', 'none');
        $('#password').show();
        $('#pengguna').show();
        $('#pegawai').show();
        $('#email').show();
        $('#password label').text('Password');
        $('[name=submit]').val('Tambah').show();
        $('#form').attr('action', "{{ url('simpanuser') }}");
        $('.modal-footer').show();
    }

    function edit_pengguna(id) {
        save_method = 'update';
        // $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url: "{{url('getuserid')}}/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_user"]').val(data.id_user);
                $('[name="username"]').val(data.username);
                $('[name="password"]').val(data.password);
                $('#password').css('display', 'none');
                $('#passwordnew').css('display', 'none');
                $('#confirm').css('display', 'none');
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Pengguna'); // Set title to Bootstrap modal title
                $('[name=submit]').val('Edit').show();
                $('.modal-footer').show();
                $('#form').attr('action', '{{ url("edituser") }}/' + id);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax' + jqXHR);
            }
        });
    }

    function reset(id) {
        save_method = 'update';
        // $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
           // url: "" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_user"]').val(data.id_user);
                $('#pengguna').css('display', 'none');
                $('#username').css('display', 'none');
                $('#password').show();
                $('#password label').text('Password Lama');
                $('#passwordnew').show();
                $('#confirm').css('display', 'none');
                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Reset Password'); // Set title to Bootstrap modal title
                $('[name=submit]').val('Reset').show();
                $('.modal-footer').show();
                $('#form').attr('action', '');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax' + jqXHR);
            }
        });
    }
</script>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Jenis Kegiatan</h4>
            </div>
            <div class="modal-body">
            <form action="{{ route('simpanuser') }}" method="POST" id="form">
                @csrf
                <input type="hidden" name="id_user" />
                <div class="form-group" id="pengguna">
                    <label>NIM</label>
                    <select name="id_mahasiswa" id="" class="form-control">
                        @foreach ($mahasiswa as $users)
                            <option value="<?= $users->id; ?>"><?= $users->nim; ?>-<?= $users->nama_mahasiswa; ?></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="username">
                    <label>Username</label>
                    <input type="username" name="name" class="form-control">
                </div>
                <div class="form-group" id="username">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group" id="password">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group" id="passwordnew">
                    <label>Password Baru</label>
                    <input type="password" name="new_password" class="form-control" id="new_password">
                </div>
                <div class="form-group" id="confirm">
                    <label>Konfirmasi Password</label> <small id="notif-confirm"></small>
                    <input type="password" name="confirm" class="form-control">
                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection