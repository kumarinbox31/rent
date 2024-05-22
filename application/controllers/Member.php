<?php
class Member extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        if($this->session->has_userdata('type') == false && $this->session->type != 'Member'){
            redirect('/');
        }
        $this->load->library('upload');
        $this->load->library('pagination');
    }
    
    public function index(){
        $this->_render();
    }
    
    public function property($page='index'){
        if($post = $this->input->post()){
            $action = $post['action'];unset($post['action']);
            switch($action){
                case 'add-property':
                    $post['user_id'] = $this->session->id;
                    $post['other'] = json_encode($post['other']);
                    if($_FILES['image']['name'] != ''){
                        $post['image'] = file_up('image','property');
                    }
                    $this->db->insert('ab_property',$post);
                    $this->session->set_flashdata('success_msg','Property added successfully.');
                    redirect(base_url('property'));
                break;
            }
        }else{
            $this->_render('property/'.$page);
        }
    }
    public function room($page='index',$id = 0){
        $data = array();
        if($post = $this->input->post()){
            $action = @$post['action'];unset($post['action']);
            switch($action){
                case 'add-room':
                    if($_FILES['image']['name'] != ''){
                        $post['image'] = file_up('image','room');
                    }
                    $this->SiteModel->addRoom($post);
                    $this->session->set_flashdata('success_msg','Room added successfully.');
                    redirect(current_url());
                break;
                case 'get-rooms':
                    $data['property_id'] = $post['property_id'];
                    $data['rooms'] = $this->SiteModel->getRooms(['property_id'=>$post['property_id']]);
                break;
                case 'save-monthly-reading':
                    $reading = intval($post['reading']);
                    $extra_amount = intval($post['extra_amount']);
                    $month = $post['month'];
                    $year = $post['year'];
                    $room_id = $post['room_id'];
                    $res = $this->SiteModel->saveMonthlyReading($room_id,$reading,$extra_amount,$month,$year);
                    $this->session->set_flashdata('success_msg','Saved Successfully.');
                    redirect(current_url());
                break;
            }
        }
        $this->_render('room/'.$page,$data);
    }
    public function tenant($page='index',$id = 0){
        $data = array();
        if($post = $this->input->post()){
            $action = @$post['action'];unset($post['action']);
            switch($action){
                case 'add-tenant':
                    if($_FILES['image']['name'] != ''){
                        $post['image'] = file_up('image','tenant');
                    }
                    $this->SiteModel->addTenant($post);
                    $this->session->set_flashdata('success_msg','Tenant added successfully.');
                    redirect(current_url());
                break;
            }
        }
        $this->_render('tenant/'.$page,$data);
    }
    
    public function _render($page='index',$data=[]){
        $this->load->view('template/header',$data);
        $this->load->view('member/'.$page);
        $this->load->view('template/footer');
    }
    
    function delete($table,$id){
        $id = intval($id);
        $this->db->delete($table,$id);
        $this->session->set_flashdata('success_msg','Deleted successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }
    function monthly_report($page=''){
        if($post = $this->input->post()){
            $action = @$post['action'] ?? '';
            switch($action){
                case 'save-multiple-room-reading':
                    $month = $post['month'];
                    $year = $post['year'];
                    foreach($post['data'] as $room_id => $data){
                        $reading = intval($data['reading']);
                        $extra_amount = intval($data['extra_amount']);
                        $res = $this->SiteModel->saveMonthlyReading($room_id,$reading,$extra_amount,$month,$year);
                    }
                    $this->session->set_flashdata('success_msg','Saved successfully.');
                    redirect(current_url());
                break;
            }
        }
        $this->_render('monthly-report/'.$page);
    }
    function complaint($page=''){
        $this->_render('complaint/'.$page);
    }
}