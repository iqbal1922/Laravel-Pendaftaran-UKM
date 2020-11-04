@extends('master')

@section('content')

<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Galeri UKM</h3>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ukm as $row)
                                    <tr>
                                        <td><?= $row->nama_ukm; ?></td>
                                        <td><?= $row->penanggung_jawab; ?></td>
                                        <td><?= $row->lokasi; ?></td>
                                        <td><?= $row->hari; ?>, <?= $row->jam_mulai; ?> - <?= $row->jam_selesai; ?></td>
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