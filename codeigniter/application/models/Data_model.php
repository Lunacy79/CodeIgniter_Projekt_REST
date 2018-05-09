<?php
//<<<<<<< Upstream, based on origin/home
//class Data_model extends MY_Model {
//    
//    protected $_table_name = 'data';
//    public $rules = array(
//	'name' => array(
//	    'field' => 'name',
//	    'label' => 'Name',
//	    'rules' => 'required'
//	)
//    );
//    
//    public function __construct(){
//	parent::__construct();
//    }
//    
//    
//    public function setData(){
//        
//    }
//    
//    public function removeData(){
//        
//    }
//}
//=======

class Data_model extends MY_Model {
    
    protected $_table_name = 'data';
    protected $_order_by = 'type';
    public $rules = array(
	'name' => array(
	    'field' => 'name',
	    'label' => 'Name',
	    'rules' => 'required'
	)
    );
    
    public function __construct(){
	parent::__construct();
    }
    
    public function upload($file, $name){
        $ftype= "";
        if ($file['is_image']){
            $ftype = 'pano';
        }
        else {
            $ftype = 'video';
        }
        $data = array(
            'type' => $ftype,
            'basename' => $name,
            'filepath' => $file['file_name'],
            'size' => $file['file_size'],
        );
        if($this->save($data)){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function getList(){
        $this->db->select('filepath,basename,type');
        $this->db->order_by('type', 'DESC');
        $list = $this->db->get('data');
        return $list->result();
    }
}
//>>>>>>> b79f534 Erneuerungen
