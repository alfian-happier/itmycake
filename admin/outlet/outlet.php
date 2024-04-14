<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Data Outlet</h2>
		</div>
	</div>
	<div class="container-admin">
		<a href="?halaman=tambah_outlet" class="btn btn-primary" id="btnDefault">Tambah Outlet +</a><br><br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th width="1" style="text-align: center;">NO</th>
						<th style="text-align: center;">NAMA OUTLET</th>
						<th style="text-align: center;">ALAMAT</th>
						<th style="text-align: center;">FOTO OUTLET</th>
						<th style="text-align: center;">JAM OPERASIONAL</th>
						<th style="text-align: center;">NO. TELPON</th>
						<th style="text-align: center;">LOKASI</th>
						<th style="text-align: center;">GO FOOD</th>
						<th style="text-align: center;">GRAB FOOD</th>
						<th style="text-align: center;">AKSI</th>

					</tr>
				</thead>
				<tbody>
					<?php
                    $no = 1;
                    $ambil = $koneksi->query("SELECT * FROM outlet ORDER BY id_outlet DESC");
                    while ($data = $ambil->fetch_assoc()) {
                    ?>
					<tr>
						<td style="text-align: center;">
							<?php echo $no; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['nama_outlet']; ?>
						</td>
						<td style="text-align: center; max-width: 200px;">
							<?php echo $data['alamat_outlet']; ?>
						</td>
						<td style="text-align: center;"><img src="../foto_outlet/<?php echo $data['foto_outlet']; ?>"
								width="100"></td>
						<td style="text-align: center;">
							<?php echo $data['time_outlet']; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['no_telpon']; ?>
						</td>
						<td style="text-align: center; max-width: 50px; overflow-wrap: break-word;">
							<?php echo $data['location_outlet']; ?>
						</td>
						<td style="text-align: center; max-width: 50px; overflow-wrap: break-word;">
							<?php echo $data['go_food']; ?>
						</td>
						<td style="text-align: center; max-width: 100px; overflow-wrap: break-word; ">
							<?php echo $data['grab_food']; ?>
						</td>
						<td style="text-align: center;">
							<a href="?halaman=ubah_outlet&id=<?php echo $data['id_outlet']; ?>"
								class="btn btn-secondary" id="btnEdit">Ubah</a>
							<a href="?halaman=hapus_outlet&id=<?php echo $data['id_outlet']; ?>" class="btn btn-danger"
								id="btnDelete" onclick="return confirm('Yakin Hapus?')">Hapus</a>
						</td>
					</tr>
					<?php $no++;
                    } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>