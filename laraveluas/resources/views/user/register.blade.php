@extends('master')

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
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
                    <div class="panel-title">Data UKM</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                    <?php $date = date_create($mahasiswa['tanggal_lahir']);
                                    $new_date = date_format($date, "d-F-Y"); ?>
                                    <label>Nama : </label> <?php echo $mahasiswa['nama_mahasiswa']; ?> <br />
                                    <label>Kelas : </label> <?php echo $mahasiswa['kelas']; ?> - <?php echo $mahasiswa['rombel']; ?> <?php echo $mahasiswa['jurusan']; ?> <br />
                                    <label>TTL : </label> <?php echo $mahasiswa['tempat_lahir']; ?>, <?php echo $new_date; ?> <br />
                                    <label for="nis">NIM :</label> <?php echo $mahasiswa['nim']; ?>
                            </div>
                        </div> 
                            @if ($set_ukm->count() == 0)
                            <div class="alert alert-danger">
                                Anda belum mengikuti UKM satu pun
                            </div>             
                            @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Nama UKM</th>
                                        <th>Lokasi</th>
                                        <th>Jadwal UKM</th>
                                        <th>Tanggal Daftar</th>
                                    </thead>
                                    <tbody>                                
                                        @foreach ($set_ukm as $row_ukm) 
                                            <tr>
                                                <td><?= $row_ukm->ukm->nama_ukm; ?></td>
                                                <td><?php echo $row_ukm->ukm->lokasi; ?></td>
                                                <td><?php echo $row_ukm->ukm->hari; ?>, <?php echo $row_ukm->ukm->jam_mulai; ?> - <?php echo $row_ukm->ukm->jam_selesai; ?></td>
                                                <td><?php echo $row_ukm['tanggal_daftar']; ?></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>     
                            @endif                     
                    </div>
                </div>
            </div>
            <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Registrasi UKM</h3>
                    <p class="panel-subtitle">User / Registrasi UKM</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>Nama UKM</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Lokasi UKM</th>
                                    <th>Jadwal UKM</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ukm as $row)
                                    <tr>
                                        <td><?php echo $row->nama_ukm; ?></td>
                                        <td><?php echo $row->penanggung_jawab; ?></td>
                                        <td><?php echo $row->lokasi; ?></td>
                                        <td><?php echo $row->hari; ?>, <?php echo $row->jam_mulai; ?> - <?php echo $row->jam_selesai; ?></td>
                                        <td>
                                        <button class="btn btn-success" onclick="window.location.href='{{ route('registered', ['id' => $row->id]) }}'"><i class="fa fa-check"></i> Registrasi</button>
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
@endsection