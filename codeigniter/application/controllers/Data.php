<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller {
    
    public function __construct(){
	parent::__construct();
	$this->load->model('Data_model');
	
    }
    
    public function index(){
        $daten=$this->Data_model->get();
        $this->data['daten']=$daten;
	$this->data['subview'] = 'pages/data_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
    public function edit($id){
        if($id){
            $rules = $this->Data_model->rules;
            $this->form_validation->set_rules($rules);
            if($this->form_validation->run() == TRUE){

                $this->edit_db($id);
            }
            else {
                
            }
        }
        else{
            $this->data['message'] = "This entry is not known.";
        }
        $this->data['daten'] = $this->Data_model->get($id);
        $this->data['subview'] = 'pages/edit_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
     public function edit_db($id){
        
        $daten=array(
            'basename' => $this->input->post('name'),
        );  
        if($this->Data_model->save($daten, $id)){
            $this->data['message'] = "The changes have been saved!";
        }
        else{
            $this->data['message'] = "An error occurred.";
        }
     }
    
    public function upload(){
	$this->data['subview'] = 'pages/upload_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
    public function do_upload(){
        $rules = $this->Data_model->rules;
	$this->form_validation->set_rules($rules);
        
	$config['upload_path'] = './uploads/';
	$config['allowed_types']        = 'gif|jpg|png';
	$config['max_size']             = 4000;
	$this->load->library('upload', $config);
	
	if(!is_dir('uploads/')){
	    mkdir('./uploads/', 0777, TRUE);
	}
	if($this->form_validation->run() == TRUE){
            $this->upload_db();
        }
        else {
            $this->data['subview'] = 'pages/upload_view';
            $this->load->view('layout/_layout_main', $this->data);
        }
    }
    
    public function upload_db(){
        if(!$this->upload->do_upload('userfile')){
            $this->data['error'] = array('error' => $this->upload->display_errors());
            $this->data['subview'] = 'pages/upload_view';
            $this->load->view('layout/_layout_main', $this->data);
        }
        else{
            $data=$this->upload->data();
            $dname = $this->input->post('name');
            if ($data['is_image']){
                $dtype = 'pano';
            }
            else {
                $dtype = 'video';
            }
            if($this->Data_model->upload($data, $dname)== TRUE){
                $this->data['upload_name'] = $this->input->post('name');
                $this->data['upload_data']= $this->upload->data();
                $this->data['subview'] = 'pages/success_view';
                $this->load->view('layout/_layout_main', $this->data);
            }
            else {
                $error = 'upload did not work properly';
                $this->data['subview'] = 'pages/upload_view';
                $this->load->view('layout/_layout_main', $this->data, $error);
            }
        }
    }
    
    public function delete($id){
        if($this->Data_model->delete($id)){
            $this->data['message'] = "The changes have been saved!";
        }
        else{
            $this->data['message'] = "An error occurred.";
        }
        $daten=$this->Data_model->get();
        $this->data['daten']=$daten;
	$this->data['subview'] = 'pages/data_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
}
?>