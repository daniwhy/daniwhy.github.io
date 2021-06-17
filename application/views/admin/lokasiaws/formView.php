<?php
$id_aws="";
$Latitude="";
$Longitude="";
if($parameter=='ubah'){
	$this->db->where('id_aws',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}

// value ketika validasi
if($this->session->flashdata('error_value')){
    extract($this->session->flashdata('error_value'));
}

?>
<?=content_open('Form Lokasi AWS')?>
    <?php
        // menampilkan error validasi
        if($this->session->flashdata('error_validation')){
            foreach ($this->session->flashdata('error_validation') as $key => $value) {
                echo '<div class="alert alert-danger">'.$value.'</div>';
            }
        }
    ?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('parameter',$parameter)?>
    	<?=input_hidden('',$id_aws)?>
	<div class="row">
		<div class ="col-md-5	">
    	<div class="form-group">
    		<label>ID AWS</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('id_aws',$id_aws)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Latitude</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('Latitude',$Latitude)?>
	    		</div>
    		</div>
    	</div>
		<div class="form-group">
    		<label>Longitude</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('Longitude',$Longitude)?>
	    		</div>
    		</div>
    	</div>
		<div class="col-md-8">
		<hr>
    	<div class="form-group">
    		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
		</div>
	</div>

	<div class="col-md-6">
		<h4>Pilih Titik</h4>
			<div id="map" style="height:400px;width:600px" >
			</div>
	</div>

	
	</div>

	</form>
<?=content_close()?> 