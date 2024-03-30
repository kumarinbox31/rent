<?php 
class SiteModel extends CI_Model{
    
    function getRoomsByPropertyId($propid){
        return $this->db->get_where('ab_rooms',['property_id'=>$propid,'user_id'=>$this->session->id]);
    }
    
    function totalRoomCapicityByProjectId($propid){
        return $this->db->select('SUM(capicity) as ttl')->get_where('ab_rooms',['property_id'=>$propid,'user_id'=>$this->session->id])->row()->ttl;
    }
    
    function totalRoomCurrentValueByProjectId($propid){
        return $this->db->select('SUM(value_now) as ttl')->get_where('ab_rooms',['property_id'=>$propid,'user_id'=>$this->session->id])->row()->ttl;
    }
    
    function addRoom($data){
        $data['user_id'] = $this->session->id;
        return $this->db->insert('ab_rooms',$data);
    }
    function getRooms($wh=[]){
        $wh['user_id'] = $this->session->id;
        return $this->db->get_where('ab_rooms',$wh);
    }
    function getPropertyById($id){
        return $this->db->get_where('ab_property',['user_id'=>$this->session->id,'id'=>$id]);
    }
    function getAvailableRooms($wh=[]){
        $wh['user_id'] = $this->session->id;
        return $this->db->get_where('ab_rooms',$wh);
    }
    function addTenant($data){
        $data['user_id'] = $this->session->id;
        return $this->db->insert('ab_tenant',$data);
    }
    function getTenant($wh=[]){
        $wh['user_id'] = $this->session->id;
        return $this->db->get_where('ab_tenant',$wh);
    }
    function saveMonthlyReading($room_id,$reading,$extra_amount,$month,$year){
        $user_id = $this->session->id;
        $wh = ['user_id'=>$user_id,'room_id'=>$room_id,'month'=>$month,'year'=>$year];
        $data = ['user_id'=>$user_id,'room_id'=>$room_id,'reading'=>$reading,'extra_amount'=>$extra_amount,'month'=>$month,'year'=>$year];
        $get = $this->db->get_where('ab_monthly_reading',$wh);
        if($get->num_rows()){
            return $this->db->where($wh)->update('ab_monthly_reading',$data);
        }else{
            return $this->db->insert('ab_monthly_reading',$data);
        }
    }
    function getMonthlyReading($room_id,$month,$year,$key,$val=''){
        $user_id = $this->session->id;
        $get = $this->db->select($key)->get_where('ab_monthly_reading',['user_id'=>$user_id,'room_id'=>$room_id,'month'=>$month,'year'=>$year]);
        if($get->num_rows()){
            $row = $get->row();
            $val = @$row->$key;
        }
        return $val;
    }
}