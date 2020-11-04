<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <a href="#" class="act-btn" data-toggle="modal" data-target="#myModal">+</a>
            <?php echo $this->session->flashdata('notify'); ?>
            <?php echo validation_errors(); ?>
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Galeri UKM</h3>
                    <p class="panel-subtitle">Admin / Galeri UKM</p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="display" id="data">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama UKM</th>
                                    <th>Lokasi</th>
                                    <th>Hari</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($dokumentasi as $row) : ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $row['nama_ukm']; ?></td>
                                        <td><?php echo $row['lokasi']; ?></td>
                                        <td><?php echo $row['hari']; ?></td>
                                    </tr>
                                <?php $no += 1;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
    </div>
</div>