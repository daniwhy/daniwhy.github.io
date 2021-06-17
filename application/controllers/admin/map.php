<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class map extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->logged!==true){
	      redirect('admin/auth');
	    }
	    if($this->session->level!=='Admin'){
	      redirect('admin/beranda');
	    }
		$this->load->model('mapModels','Model');
	}

	public function index()
	{
		$datacontent['url']='admin/map';
		$datacontent['title']='Lokasi AWS';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('admin/map/mapView',$datacontent,TRUE);
		$data['js']=$this->load->view('admin/map/js/mapJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('admin/layouts/html',$data);
	}
}