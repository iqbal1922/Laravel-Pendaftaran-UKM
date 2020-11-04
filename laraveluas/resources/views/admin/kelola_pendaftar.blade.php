<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<?php echo $this->session->flashdata('notify'); ?>
			<?php echo validation_errors(); ?>
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pendaftar</h3>
					<p class="panel-subtitle">Admin / Data UKM / Lihat Pendaftar</p>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="display" id="data">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama Mahasiswa</th>
									<th>Kelas</th>
									<th>Tanggal Daftar</th>
									<th>Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($set as $row) { ?>
									<tr>
										<td><?php echo $row->nim; ?></td>
										<td><?php echo $row->nama_mahasiswa; ?></td>
										<td><?php echo $row->kelas . $row->jurusan . $row->rombel; ?></td>
										<td><?php echo $row->tanggal_daftar; ?></td>
										<td>
											<?php echo anchor('ukm/hapus_pendaftar/' . $row->id_ukm . '/' . $row->id_mahasiswa, '<button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Pendaftar</button>');
											?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
	</div>
</div>