@extends('master')

@section('content')
    
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Dashboard</h3>
                    <p class="panel-subtitle">Selamat Datang Administrator</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-users"></i></span>
                                <p>
                                    <span class="number">12</span>
                                    <span class="title">Total Siswa</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">1</span>
                                    <span class="title">Total Akun</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-list"></i></span>
                                <p>
                                    <span class="number">2</span>
                                    <span class="title">Total Ekstrakurikuler</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-list"></i></span>
                                <p>
                                    <span class="number">3</span>
                                    <span class="title">Total Pendaftaran</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection