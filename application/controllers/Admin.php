<?php
class Admin extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        if(!$this->session->has_userdata('type') && $this->session->type != 'Admin'){
            redirect('/');
        }
    }
    
    public function index(){
        $this->_render();
    }
    
    public function property($page='index'){
        $this->_render('property/'.$page);
    }
    
    public function _render($page='index',$data=[]){
        $this->load->view('template/header',$data);
        $this->load->view('admin/'.$page);
        $this->load->view('template/footer');
    }
    
}