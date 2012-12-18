<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	//类成员变量是user表的字段
    var $name   = '';
    var $pwd = '';
    var $posttime    = '';

    function __construct()
    {
        parent::__construct();
    }

    function add_user()
    {
        $this->name = $this->input->post('username');
        $this->pwd = md5($this->input->post('pwd'));
        $this->posttime = time();
        return $this->db->insert('user', $this);
        
    }
    
    function check_user_login($user,$pwd){
    	if(!trim($user)){
    		echo '用户名不能为空';
    		exit();
    	}elseif(iconv_strlen($user)>7){
    		echo '用户名最大长度为7';
    		exit();
    	}elseif(!trim($pwd)){
    		echo '密码不能为空';
    		exit();
    	}elseif(strlen($pwd)<6){
    		echo '密码长度最少为6';
    		exit();
    	}
    	$query = $this->db->get_where('user', array('name' => $user,'pwd'=>md5($pwd)));
    	if($query->num_rows()){
    	   session_start();
    	   $_SESSION['login_name']=$user;
    	   echo 'login';
    	}else{
    	  echo '用户名或者密码不正确';
    	}
    }
    
    function update_entries_by_id($id)
    {
    	$data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $this->db->where('id', $id);
        return $query = $this->db->update('welcome', $data);
    }

    function check_user_reg($user,$pwd){
    	if(!trim($user)){
    		echo '用户名不能为空';
    		exit();
    	}elseif(iconv_strlen($user)>7){
    		echo '用户名最大长度为7';
    		exit();
    	}elseif(!trim($pwd)){
    		echo '密码不能为空';
    		exit();
    	}elseif(strlen($pwd)<6){
    		echo '密码长度最少为6';
    		exit();
    	}
    	$query = $this->db->get_where('user', array('name' => $user));
    	if($query->num_rows()){
    	   echo '用户名已经被注册';
    	}else{
    	   session_start();
    	   $_SESSION['login_name']=$user;
    	   echo 'submit';
    	}
    }
    
	function user_login_out(){
    session_start();
    unset($_SESSION);
    session_destroy();
    redirect('/','location',301);
	}

}
