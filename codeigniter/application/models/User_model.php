<?php
class User_model extends MY_Model{
    
    protected $_table_name = 'users';
    protected $_order_by = 'email';
    public $rules = array(
	'email' => array(
	    'field' => 'email',
	    'label' => 'E-Mail',
	    'rules' => 'required'
	),
	'password' => array(
	    'field' => 'password',
	    'label' => 'Passwort',
	    'rules' => 'required'
	)
    );
    
    public $rules_user = array(
	'name' => array(
	    'field' => 'name',
	    'label' => 'Name',
	    'rules' => 'required'
	),
        'email' => array(
	    'field' => 'email',
	    'label' => 'E-Mail',
	    'rules' => 'required|valid_email|callback__unique_email'
	),
    );
    
    public function __construct() {
	parent::__construct();
    }
    
    public function login(){
        $user = $this->get_by(array('email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password')),), TRUE);
        if(count($user)){
            $data1 = array(
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE
            );
            $this->session->set_userdata($data1);
	    return TRUE;
        }
	else{
	    return FALSE;
	}
    }
    
    public function logout(){
        $this->session->sess_destroy();
    }
    
    public function loggedin(){
	return (bool) $this->session->userdata('loggedin');
    }
    
    public function hash($string){
        return hash('sha512', $string . $this->config->item('encryption_key'));
    }
}