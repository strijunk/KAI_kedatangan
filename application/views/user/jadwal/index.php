<!-- Begin Page Content -->
<div class="container-fluid">

	<a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ModalaAdd">Tambah Data</a>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data Jadwal Kereta</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Jalur Kereta</th>
							<th>No Kereta</th>
							<th>Nama Kereta</th>
							<th>Tujuan</th>
							<th>Keberangkatan</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody id="show_data">
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- MODAL ADD -->

	<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-black">Tambah Jadwal Kereta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="form-group">
							<label>Jalur Kereta</label>
							<input type="number" class="form-control" name="jalur_kereta" id="jalur_kereta" placeholder="Masukkan jalur kereta" required>
						</div>
						<div class="form-group">
							<label>Nomor Kereta</label>
							<input type="text" class="form-control" name="no_kereta" id="no_kereta" placeholder="Masukkan nomor kereta" required>
						</div>
						<div class="form-group">
							<label>Nama Kereta</label>
							<input type="text" class="form-control" name="nama_kereta" id="nama_kereta" placeholder="Masukkan nama kereta" required>
						</div>
						<div class="form-group">
							<label>Tujuan</label>
							<input type="text" class="form-control" name="tujuan_kereta" id="tujuan_kereta" placeholder="Masukkan lokasi tujuan kereta" required>
						</div>
						<div class="form-group">
							<label>Keberangkatan</label>
							<input type="text" class="form-control" name="waktu_keberangkatan" id="waktu_keberangkatan" placeholder="Masukkan waktu keberangkatan" required>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-primary btn-block" id="btn_simpan">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL ADD-->
	<!-- MODAL EDIT -->
	<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-black">Edit Jadwal Kereta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">
						<input type="hidden" name="id_edit" id="id2">
						<div class="form-group">
							<label>Jalur Kereta</label>
							<input type="number" class="form-control" name="jalur_kereta_edit" id="jalur_kereta2" placeholder="Masukkan jalur kereta" required>
						</div>
						<div class="form-group">
							<label>Nomor Kereta</label>
							<input type="text" class="form-control" name="no_kereta_edit" id="no_kereta2" placeholder="Masukkan nomor kereta" required>
						</div>
						<div class="form-group">
							<label>Nama Kereta</label>
							<input type="text" class="form-control" name="nama_kereta_edit" id="nama_kereta2" placeholder="Masukkan nama kereta" required>
						</div>
						<div class="form-group">
							<label>Tujuan</label>
							<input type="text" class="form-control" name="tujuan_kereta_edit" id="tujuan_kereta2" placeholder="Masukkan lokasi tujuan kereta" required>
						</div>
						<div class="form-group">
							<label>Keberangkatan</label>
							<input type="text" class="form-control" name="waktu_keberangkatan_edit" id="waktu_keberangkatan2" placeholder="Masukkan waktu keberangkatan" required>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-primary" id="btn_update">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->
	<!--MODAL HAPUS-->
	<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-black">Hapus Jadwal Kereta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="form-horizontal">

					<input type="hidden" name="id" id="idJadwal" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda yakin mau menghapus data ini?</p>
					</div>

					<div class="modal-footer">
						<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL HAPUS-->
</div>
<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		getData(); //pemanggilan fungsi

		//fungsi get data
		function getData() {
			$.ajax({
				type: 'GET',
				url: '<?php echo base_url() ?>user/jadwal/data',
				async: true,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						var o = i + 1;
						html += '<tr>' +
							'<td>' + o + '</td>' +
							'<td>' + data[i].jalur_kereta + '</td>' +
							'<td>' + data[i].no_kereta + '</td>' +
							'<td>' + data[i].nama_kereta + '</td>' +
							'<td>' + data[i].tujuan_kereta + '</td>' +
							'<td>' + data[i].waktu_keberangkatan + '</td>' +
							'<td style="text-align:center;">' +
							'<a href="javascript:;" class="btn btn-primary btn-xs item_edit" data="' + data[i].id_kereta + '">Edit</a>' + ' ' +
							'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].id_kereta + '">Hapus</a>' +
							'</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
					var table = $('#mydata').DataTable();
				}
			});
		}
		//end fungsi get data

		//fungsi simpan
		$('#btn_simpan').on('click', function() {
			var jalur_kereta = $('#jalur_kereta').val();
			var no_kereta = $('#no_kereta').val();
			var nama_kereta = $('#nama_kereta').val();
			var tujuan_kereta = $('#tujuan_kereta').val();
			var waktu_keberangkatan = $('#waktu_keberangkatan').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('user/jadwal/store') ?>",
				dataType: "JSON",
				data: {
					jalur_kereta: jalur_kereta,
					no_kereta: no_kereta,
					nama_kereta: nama_kereta,
					tujuan_kereta: tujuan_kereta,
					waktu_keberangkatan: waktu_keberangkatan,
				},
				success: function(data) {
					$('[name="jalur_kereta"]').val("");
					$('[name="no_kereta"]').val("");
					$('[name="nama_kereta"]').val("");
					$('[name="tujuan_kereta"]').val("");
					$('[name="waktu_keberangkatan"]').val("");
					$('#ModalaAdd').modal('hide');
					getData();
				}
			});
			return false;
		});
		//end fungsi simpan

		//fungsi edit
		$('#show_data').on('click', '.item_edit', function() {
			var id = $(this).attr('data');
			$.ajax({
				type: "GET",
				url: "<?php echo base_url('user/jadwal/edit') ?>",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$.each(data, function(id_kereta, jalur_kereta, no_kereta, nama_kereta, tujuan_kereta, waktu_keberangkatan) {
						$('#ModalaEdit').modal('show');
						$('[name="id_edit"]').val(data.id_kereta);
						$('[name="jalur_kereta_edit"]').val(data.jalur_kereta);
						$('[name="no_kereta_edit"]').val(data.no_kereta);
						$('[name="nama_kereta_edit"]').val(data.nama_kereta);
						$('[name="tujuan_kereta_edit"]').val(data.tujuan_kereta);
						$('[name="waktu_keberangkatan_edit"]').val(data.waktu_keberangkatan);
					});
				}
			});
			return false;
		});

		//Update Barang
		$('#btn_update').on('click', function() {
			var id = $('#id2').val();
			var jalur_kereta = $('#jalur_kereta2').val();
			var no_kereta = $('#no_kereta2').val();
			var nama_kereta = $('#nama_kereta2').val();
			var tujuan_kereta = $('#tujuan_kereta2').val();
			var waktu_keberangkatan = $('#waktu_keberangkatan2').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url('user/jadwal/update') ?>",
				dataType: "JSON",
				data: {
					id: id,
					jalur_kereta: jalur_kereta,
					no_kereta: no_kereta,
					nama_kereta: nama_kereta,
					tujuan_kereta: tujuan_kereta,
					waktu_keberangkatan: waktu_keberangkatan,
				},
				success: function(data) {
					$('[name="jalur_kereta_edit"]').val("");
					$('[name="no_kereta_edit"]').val("");
					$('[name="nama_kereta_edit"]').val("");
					$('[name="tujuan_kereta_edit"]').val("");
					$('[name="waktu_keberangkatan_edit"]').val("");
					$('#ModalaEdit').modal('hide');
					getData();
				}
			});
			return false;
		});
		//fungsi hapus
		//GET HAPUS
		$('#show_data').on('click', '.item_hapus', function() {
			var id = $(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="id"]').val(id);
		});

		$('#btn_hapus').on('click', function() {
			var id = $('#idJadwal').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('user/jadwal/delete') ?>",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$('#ModalHapus').modal('hide');
					getData();
				}
			});
			return false;
		});
	});
</script>
