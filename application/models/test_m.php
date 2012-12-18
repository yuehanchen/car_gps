<?php
class Test_m extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
		mysql_query("SET NAMES UTF8");
	}
	function user_insert($arr)
	{

		$this->db->insert('user',$arr);	
	}
	
	function user_select($uname)
	{
		$this->db->where('uname',$uname);
		$this->db->select('*');
		$query=$this->db->get('user');
		return $query->result();		
	}
	function user_delete($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete('user');
	}
}

?>