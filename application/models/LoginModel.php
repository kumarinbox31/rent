<?php 
class LoginModel extends CI_Model{
    public $table = 'login';
    
    function validate_user($user,$pass){
        $get = $this->db->get_where($this->table,['_user'=>$user,'_pass'=>md5($pass)]);
        if($get->num_rows()){
            return $get;
        }else{
            return false;
        }
    }
    
}