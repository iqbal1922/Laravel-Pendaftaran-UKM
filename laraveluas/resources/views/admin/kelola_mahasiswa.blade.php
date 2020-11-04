@extends('master')

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
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
                    <h3 class="panel-title">Kelola Mahasisiswa</h3>
                    <p class="panel-subtitle">Admin / Data Mahasiswa</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $row)
                                    <?php $date = date_create($row["tanggal_lahir"]);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <tr>
                                        <td><?= $row['nim']; ?></td>
                                        <td><?php echo $row['nama_mahasiswa']; ?></td>
                                        <th><?php echo $row['tempat_lahir']; ?>, <?php echo $new_date; ?></th>
                                        <th><?php echo $row['alamat']; ?></th>
                                        <th><?php echo $row['kelas']; ?>-<?php echo $row['rombel']; ?> <?php echo $row['jurusan']; ?></th>
                                        <td>
                                            <button class="btn btn-warning" onclick="edit_mahasiswa('<?=$row->id?>')"><i class="fa fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger" onclick="window.location.href='{{ route('hapus', ['id'=> $row->id]) }}'"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>

<script>
    function edit_mahasiswa(id) {
        save_method = 'update';
        //$('#form').reset(); // reset form on modals
        //Ajax Load data from ajaxs
        $.ajax({
            url: '{{ url("getmhsid") }}/' + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_mahasiswa"]').val(data.id_mahasiswa);
                $('[name="nim"]').val(data.nim);
                $('[name="nama_mahasiswa"]').val(data.nama_mahasiswa);
                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
                $('[name="alamat"]').val(data.alamat);

                $('#myModal').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Mahasiswa'); // Set title to Bootstrap modal title
                $('[name=submit]').val('Edit').show();
                $('.modal-footer').show();
                $('#form').attr('action', '{{ url("editmhs") }}/' + id);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax' + jqXHR);
            }
        });
    }
</script>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Mahasiswa</h4>
            </div>
            <div class="modal-body">
                {{-- {{ Form::open('mahasiswa/create', array('id' => 'form')); }} --}}
                <form method="POST" action="{{ route('simpanmhs') }}" id="form">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id_siswa" />
                        <div class="form-group" id="pengguna">
                            <label>NIM</label>
                        <input type="text" name="nim" class="form-control">
                        </div>

                        <div class="form-group" id="email">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" class="form-control">
                        </div>

                        <div class="form-group" id="email">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>

                        <div class="form-group" id="email">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" id="email">
                            <label>Alamat </label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas" id="" class="form-control">
                                <option value="TI-1">TI-1</option>
                                <option value="TI-2">TI-2</option>
                                <option value="TI-3">TI-3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <select name="jurusan" id="" class="form-control">
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelas</label>
                            <select name="rombel" id="" class="form-control">
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                                <option value="e">E</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-success" id="button-disabled">
                    {{-- {{ Form::close(); }} --}}
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection