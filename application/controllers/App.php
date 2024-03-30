<?php
class App extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('LoginModel');
    }
    
    public function index(){
        $this->load->view('admin/login');
    }
    
    public function login(){
        if($post = $this->input->post()){
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $get = $this->LoginModel->validate_user($user,$pass);
            if($get){
                $row = $get->row();
                $data = [
                    'id'    =>  $row->id,
                    'type'  =>  $row->type,
                    'session'   =>  time(),
                    'name'      =>  $row->name,
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('success_msg','Logged in successfully.');
                redirect($row->type);
            }else{
                $this->session->set_flashdata('error_msg','Username or password worng');
                redirect('/');
            }
        }else{
            redirect('/');
        }
    }
    public function logout(){
        session_destroy();
        redirect('/');
    }
}