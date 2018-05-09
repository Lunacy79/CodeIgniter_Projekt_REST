<?php
class MY_Controller extends CI_Controller {
    
    public $data = array();
    function __construct(){
	
	parent::__construct();
	$this->data['meta_title'] = 'My CMS';
	$this->data['errors'] = array();
	$this->data['site_name'] = config_item('site_name');
	$this->load->helper('form');
	$this->load->library('form_validation');
        $this->load->model('User_model');
        
        $exception_urls = array('login','user/login','user/logout');
        if(in_array(uri_string(), $exception_urls) == FALSE){
//	if(uri_string() != 'login' && uri_string() != 'login/logout'){
            if($this->User_model->loggedin() == FALSE){
                redirect('user/login');
            }
        }
    }
}
?>
