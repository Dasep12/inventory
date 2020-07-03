<?php

 /**
  * 
  */
 class Dashboard extends CI_Controller
 {
 	public function index()
 	{
 		$data['url'] = $this->uri->segment(2) ;
 		$data['url2'] = $this->uri->segment(3);
 		$this->template->load('template/template','administrator/Dashboard',$data);
 	}
 }