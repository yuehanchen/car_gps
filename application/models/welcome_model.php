<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome_model extends CI_Model {
	//类成员变量是welcome表的字段
    var $title   = '';
    var $content = '';
    var $posttime    = '';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('welcome', 10);
        return $query->result();
    }

    function get_entries_by_page($off,$page_size)
    {
    	$this->db->order_by('id desc');//设置排序语句，可以看出需要在读取记录的方法调用之前设置
        $query = $this->db->get('welcome', $page_size,$off);
        return $query->result();
    }
    
    function get_total_entries()
    {
        return $this->db->count_all('welcome');
    }
    
    function insert_entry()
    {
        $this->title = $this->input->post('title');
        $this->content = $this->input->post('content');
        $this->posttime = time();
        return $this->db->insert('welcome', $this);
        
    }
    
    function get_entries_by_id($id)
    {
        $query = $this->db->get_where('welcome', array('id'=>$id));
        return $query->result();
    }
    
    function update_entries_by_id($id)
    {
    	$data['title'] = $this->input->post('title');
        $data['content'] = $this->input->post('content');
        $this->db->where('id', $id);
        return $query = $this->db->update('welcome', $data);
    }


}
