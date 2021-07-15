<?=content_open($title)?>
<div class="dropdown show">
  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Lokasi AWS
  </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  	<a class="dropdown-item" href="http://localhost/webcuaca/admin/download/index">PPNS-1</a>
    <a class="dropdown-item" href="http://localhost/webcuaca/admin/download1/index">GSI-1</a>
    <a class="dropdown-item" href="http://localhost/webcuaca/admin/download2/index">TGL-1</a>
  </div>
</div>
<hr>
<?=$this->session->flashdata('info')?>


<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center" width="50px">No</th>
			<th>ID AWS</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Time Stamp</th>
			<th>Hujan (mm)</th>
			<th>Suhu °C</th>
			<th>Kelembaban %</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($datatable->result() as $row) {
				?>
					<tr>
						<td class="text-center"><?=++$start;?></td>
						<td><?=$row->id_aws?></td>
						<td><?=$row->Latitude?></td>
						<td><?=$row->Longitude?></td>
						<td><?=$row->time?></td>
						<td><?=$row->hujan?></td>
						<td><?=$row->suhu?></td>
						<td><?=$row->kelembaban?></td>
						<td class="text-center">
							</div>
						</td>
					</tr>
				<?php
			}

		?>
	</tbody>
</table>
<?=$this->pagination->create_links();?>
<a href="<?=site_url('admin/download2/export')?>" class="btn btn-success" ><i class="fa fa-download"></i> Download</a>
<?=content_close()?>