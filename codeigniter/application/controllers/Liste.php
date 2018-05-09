<?php
require_once(APPPATH.'libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;

class Liste extends REST_Controller{
    
    public function __construct() {
	parent::__construct();
        $this->load->model('Data_model');
    }
   
    public function index_get()
  {
        $this->response($this->Data_model->getList());
  }
}
?>
