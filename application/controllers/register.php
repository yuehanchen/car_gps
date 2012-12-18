<?php
class register extends CI_Controller
{
	function index()
	{
		$this->load->view('register');
	}

	function insert()
	{
		$this->load->model('test_m');
		//$arr=array(uname)
		//$this->load->library('form_validation');
		//$arr=array('u_name'=>'1234','uname'=>'1234','upass'=>'12345','u_upass'=>'123456');
		//$this->test_m->user_insert($arr);

		$u_name = $this->input->post('u_name');
		if (!$u_name)
		{
			echo '请输入用户名称';
		}else{
		$uname = $this->input->post('uname');
		if (!$uname)
		{
			echo '请输入用户账号';
		}else{
		//$upass = md5($this->input->post('upass'));
		$upass = $this->input->post('upass');
		if (!$this->input->post('upass'))
		{
			echo '请输入密码';
		}else{	
		//$u_upass = md5($this->input->post('u_upass'));
		$u_upass = $this->input->post('u_upass');
		if (!$this->input->post('u_upass'))
		{
			echo '请再次输入密码';
		}
		else
		{
			$sel_but = $this->input->post('sel_but');
			if($sel_but)
			{
				//if (($upass == $u_upass)&&(($u_name && $uname && $upass &&　$u_upass) != 0))
				if ($upass == $u_upass)
				{
					
					//if ($u_name && $uname && $upass && $u_upass)
					//{
					$arr=array('u_name'=>$u_name,'uname'=>$uname,'upass'=>$upass,'u_upass'=>$u_upass,'sel_but'=>$sel_but);
					$this->test_m->user_insert($arr);
					echo '注册成功';
					//}
				}
				else
				{
					echo '输入的两次密码不匹配';
				}	
			}else
			{
				echo '选择错误';	
			}		
		}
	  }}}
	}
		
/*		
		$this->load->library('form_validation'); // 使用CI的表单验证, 如下:
		$this->form_validation->set_rules('u_name', 'u_name', 'required');
		$this->form_validation->set_rules('uname', 'uname', 'required');
		$this->form_validation->set_rules('upass', 'upass', 'required');
		$this->form_validation->set_rules('u_upass', 'u_upass', 'required');
		if($this->form_validation->run() != false)
		{
			$arr=array('u_name'=>$u_name,'uname'=>$uname,'upass'=>$upass,'u_upass'=>$u_upass);
			//echo '输出表单';
			echo $arr;
		}
*/		
		function delete()
		{	
			$this->load->model('test_m');	
			$id = $this->input->post('id');
		//	$this->test_m->delId(1);
			$rows = $this->test_m->user_delete($id);
		//	if ($rows != FALSE)
		//	{
		//		echo '删除成功';
		//	}	
		}
	
}
?>