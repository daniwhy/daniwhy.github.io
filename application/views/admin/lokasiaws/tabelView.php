<?=content_open($title)?>
<a href="<?=site_url($url.'/form/tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah</a>
<hr>
<?=$this->session->flashdata('info')?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center" width="50px">No</th>
			<th>ID AWS</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th width="200px">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach ($datatable->result() as $row) {
				?>
					<tr>
						<td class="text-center"><?=$no?></td>
						<td><?=$row->id_aws?></td>
						<td><?=$row->Latitude?></td>
						<td><?=$row->Longitude?></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="<?=site_url($url.'/form/ubah/'.$row->id_aws)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
								<a href="<?=site_url($url.'/hapus/'.$row->id_aws)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</td>
					</tr>
				<?php
				$no++;
			}

		?>
	</tbody>
</table>
<?=content_close()?>