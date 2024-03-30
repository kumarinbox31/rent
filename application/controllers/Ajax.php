<?php
class Ajax extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
        if($post = $this->input->post()){
            $action = $post['action'];unset($post['action']);
            switch($action){
                case 'get-available-rooms':
                    $propid = $post['propid'];
                    $get = $this->SiteModel->getAvailableRooms(['property_id'=>$propid]);
                    $html = '';
                    foreach($get->result() as $row){
                        $html.= '<option value="'.$row->id.'">'.$row->title."($row->room_no)".'</option>';
                    }
                    echo json_encode(['status'=>true,'html'=>$html]);
                break;
                default:
                    echo json_encode(['status'=>false,'html'=>'']);
                break;
            }
        }
    }
    
}