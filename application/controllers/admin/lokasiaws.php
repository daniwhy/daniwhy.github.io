<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lokasiaws extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->logged!==true){
	      redirect('admin/auth');
	    }
	    if($this->session->level!=='Admin'){
	      redirect('admin/beranda');
	    }
		$this->load->model('lokasiawsModels','Model');
	}

	public function index()
	{
		$datacontent['url']='admin/lokasiaws';
		$datacontent['title']='Lokasi AWS';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/lokasiaws/tabelView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function form($parameter='',$id='')
	{
		$datacontent['url']='admin/lokasiaws';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form Lokasi AWS';
		$data['content']=$this->load->view('admin/lokasiaws/formView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/lokasiaws/js/formJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
	public function simpan()
	{
		if($this->input->post()){

			// cek validasi
			$validation=null;
			
			$this->db->where('id_aws',$this->input->post(''));
			$check=$this->db->get('lokasiaws');
			if($check->num_rows()>0){
				$validation[]='ID AWS Sudah Ada';
			}
			//tidak boleh kosong
			if($this->input->post('Latitude')==''){
				$validation[]='Latitude Tidak Boleh Kosong';
			}
			if($this->input->post('Longitude')==''){
				$validation[]='Longitude Tidak Boleh Kosong';
			}


			$data=[
				'id_aws'=>$this->input->post('id_aws'),
				'Latitude'=>$this->input->post('Latitude'),
				'Longitude'=>$this->input->post('Longitude'),
			];
			
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_aws'=>$this->input->post('id_aws')]);
			}

	}
	redirect(site_url('admin/lokasiaws'));
} 
public function hapus($id=''){
	// hapus file di dalam folder
	$this->db->where('id_aws',$id);
	$get=$this->Model->get()->row();
	// end hapus file di dalam folder
	$this->Model->delete(["id_aws"=>$id]);
	redirect('admin/lokasiaws');
}
}