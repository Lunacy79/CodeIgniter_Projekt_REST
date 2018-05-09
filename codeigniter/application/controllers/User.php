<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    
    public function __construct(){
	parent::__construct();
	$this->load->model('User_model');
	
    }
    
    public function index(){
        $daten=$this->User_model->get();
        $this->data['daten']=$daten;
	$this->data['subview'] = 'pages/user_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
    public function login(){
	    $this->User_model->loggedin() == FALSE || redirect('data');
	    $data['title']= 'Login';
            $rules = $this->User_model->rules;
	    $this->form_validation->set_rules($rules);
	    if($this->form_validation->run() == TRUE){
		if($this->User_model->login() == TRUE){
                    redirect('data');  
                }
                else {
                    $this->session->set_flashdata('error', 'That email/password combination does not exist.');
                    $this->data['message']= 'That email/password combination does not exist.';
                }
	    }
            else {
                $this->load->view('pages/login_view');
            }
	    $this->load->view('pages/login_view', $this->data);
	}
	
	public function logout(){
	    $this->User_model->logout();
	    redirect('user/login');
	}
    
    public function newuser(){
        $rules = $this->User_model->rules_user;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $password=bin2hex(openssl_random_pseudo_bytes(4));
            $data=array(
                'user_type' => $this->input->post('user_type'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => hash('sha512', $password . $this->config->item('encryption_key')),
            );  
            if($this->User_model->save($data)){
                $this->data['message'] = "The account has been created!";
                if(isset($_POST['send_email'])){
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://w0135c5e.kasserver.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'm03e058e',
                        'smtp_pass' => 'Sunset2004',
                        'mailtype' => 'html',
                        'charset'   => 'iso-8859-1'
                    );
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('hello@carolinivens.de', 'Caro');
                    $this->email->to('carolin.ivens@gmail.com');
                    $this->email->subject('Your new account');
                    $this->email->message('Hello '. $this->input->post('name'). ', <br> Your login data for xxxx: <br>Name: '. $this->input->post('name'). '<br>'
                            . 'Email-address: '. $this->input->post('email'). '<br>Password (please change as soon as possible!): '. $password);
                    $this->email->send();
                }
            }
            else{
                $this->data['message'] = "An error occurred.";
            }
        }
        
        $this->data['subview'] = 'pages/newuser_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
    public function edit($id){
        if($id){
            $rules = $this->User_model->rules_user;
            $this->form_validation->set_rules($rules);
            if($this->form_validation->run() == TRUE){
                if(isset($_POST['change_password'])){
                    $password = $this->change_password($id);
                }
                else{
                    $password = 'wie gehabt';
                }
                if(isset($_POST['send_email'])){
                    $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://w0135c5e.kasserver.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'm03e058e',
                        'smtp_pass' => 'Sunset2004',
                        'mailtype' => 'html',
                        'charset'   => 'iso-8859-1'
                    );
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('hello@carolinivens.de', 'Caro');
                    $this->email->to('carolin.ivens@gmail.com');
                    $this->email->subject('Your new login data');
                    $this->email->message('Hello '. $this->input->post('name'). ', <br> Your new login data: <br>Name: '. $this->input->post('name'). '<br>'
                            . 'Email-address: '. $this->input->post('email'). '<br>Password (please change as soon as possible!): '. $password);
                    $this->email->send();
                }
                $data=array(
                    'user_type' => $this->input->post('user_type'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                );  
                if($this->User_model->save($data, $id)){
                    $this->data['message'] = "The changes have been saved!";
                }
                else{
                    $this->data['message'] = "An error occurred.";
                }
            }
        }
        else{
            $this->data['message'] = "This entry is not known.";
        }
        $this->data['daten'] = $this->User_model->get($id);
        $this->data['subview'] = 'pages/userEdit_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
    public function change_password($id){
        $password=bin2hex(openssl_random_pseudo_bytes(4));
        $dat=array(
            'password' => hash('sha512', $password . $this->config->item('encryption_key')),
        ); 
        $this->User_model->save($dat, $id);
        return $password;
    }
    
    public function delete($id){
        if($this->User_model->delete($id)){
            $this->data['message'] = "The changes have been saved!";
        }
        else{
            $this->data['message'] = "An error occurred.";
        }
        $daten=$this->User_model->get();
        $this->data['daten']=$daten;
	$this->data['subview'] = 'pages/user_view';
	$this->load->view('layout/_layout_main', $this->data);
    }
    
    public function _unique_email(){
        $id = $this->uri->segment(5);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('id', $id);
        $user = $this->User_model->get();
        if(count($user)){
            $this->form_validation->set_message('_unique_email', 'That email-address already exists.');
            return FALSE;
        }
        return TRUE;
    }
}
?>