<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Data Produk</h2>
		</div>
	</div>
	<div class="container-admin">
		<a href="?halaman=tambah_produk" class="btn btn-primary" id="btnDefault">Tambah Produk +</a><br><br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th width="1" style="text-align: center; background-color: ">NO</th>
						<th style="text-align: center;">NAMA PRODUK</th>
						<th style="text-align: center;">CATEGORY</th>
						<th style="text-align: center;">HARGA</th>
						<!-- <th style="text-align: center;">SIZE</th> -->
						<th style="text-align: center;">FOTO</th>
						<th style="text-align: center;">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $no = 1;
                    $ambil = $koneksi->query("SELECT * FROM produk ORDER BY kd_produk DESC");
                    $prop = $koneksi->query("SELECT * FROM prop_produk ORDER BY kd_produk DESC");
                    $size = $prop->fetch_assoc();
                    //$price = mysqli_fetch_assoc($prop);
                    while ($data = $ambil->fetch_assoc()) {
                    ?>
					<tr>
						<td style="text-align: center;">
							<?php echo $no; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['nama_produk']; ?>
						</td>
						<td style="text-align: center;">
							<?php echo $data['nama_category']; ?>
						</td>
						<td style="text-align: center;">Rp.
							<?php echo number_format($data['harga_produk']); ?>
						</td>
						<!-- <td style="text-align: center;">
							<?php echo $size['size']; ?>
						</td> -->
						<td style="text-align: center;"><img src="../foto_produk/<?php echo $data['foto_produk']; ?>"
								width="100"></td>
						<td style="text-align: center;">
							<a href="?halaman=ubah_produk&id=<?php echo $data['kd_produk']; ?>"
								class="btn btn-secondary" id="btnEdit">Ubah</a>
							<a href="?halaman=hapus_produk&id=<?php echo $data['kd_produk']; ?>" class="btn btn-danger"
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