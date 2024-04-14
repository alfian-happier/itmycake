<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Data Promo</h2>
		</div>
	</div>
	<div class="container-admin">
		<a href="?halaman=tambah_promo" class="btn btn-primary" id="btnDefault">Tambah promo +</a><br><br>
		<div class="table-responsive">
			<table class="table table1 table-bordered table-striped table-hover" id="dataTables-example">
				<thead class="">
					<tr style="background-color: white;">
						<th width="1" style="text-align: center;">NO</th>
						<th style="text-align: center;">JUDUL</th>
						<th style="text-align: center;">DESKRIPSI</th>
						<th style="text-align: center;">SYARAT</th>
						<th style="text-align: center;">FOTO</th>
						<th style="text-align: center;">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $no = 1;
                    $ambil = $koneksi->query("SELECT * FROM promo ORDER BY kd_promo DESC");
                    while ($data = $ambil->fetch_assoc()) {
                    ?>
					<tr>
						<td style="text-align: center;">
							<?php echo $no; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['judul_promo']; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['deskripsi_promo']; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['syarat_promo']; ?>
						</td>
						<td style="text-align: center;"><img src="../foto_promo/<?php echo $data['foto_promo']; ?>"
								width="100"></td>
						<td style="text-align: center;">
							<a href="?halaman=ubah_promo&id=<?php echo $data['kd_promo']; ?>" class="btn btn-secondary"
								id="btnEdit">Ubah</a>
							<a href="?halaman=hapus_promo&id=<?php echo $data['kd_promo']; ?>" class="btn btn-danger"
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