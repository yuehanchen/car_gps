<?php

class Login extends CI_Controller
{
	function index()
	{
		$this->load->view('login');
	}
	
	function insert()
	{
		$this->load->model('test_m');
		$arr=array('uname'=>'u1');
		
		$this->test_m->user_insert($arr);	
	}
	
	function checklogin()
	{
		$this->load->model("test_m");
		$user=$this->test_m->user_select($_POST['uname']);
		//$user = $this->input->post('uname');	
		if($user)
		{		
			if($user[0]->upass==$_POST['upass'])
			//if($user[0]->u_name==$_POST['upass'])
			{
				$this->load->library('session');
				$arr=array('uid'=>$user[0]->uid);
				$this->session->set_userdata($arr);
				//echo '用户名正确';
				//
				if($this->session->userdata('uid'))
				{
					$uuser = $this->input->post('uname');
					$sel_but = $user[0]->sel_but;
					$data=array('v_name'=>$uuser,'v_selbut'=>$sel_but);
					$this->load->view('loginok.php',$data);
					//echo '已经设置sessions';
				}
				else
				{
					$this->load->view('login.php');
					//echo '没有sessions';
				}
				//
				//$this->load->view('index1.php');		
			}
			else
			{
				echo '密码错误';
			}
		}
		else
		{
			echo '不存在用户名';
		}
	}

	function checksession()
	{
		$this->load->library('session');
		//
		if($this->session->userdata('uid'))
		{
			$this->load->view('loginok.php');
			//echo '已经设置sessions';
		}
		else
		{
			$this->load->view('login.php');
			//echo '没有sessions';
		}
		//
		//$this->load->view('index1.php');
		/*		
		if($this->session->userdata('uid'))
		{
			echo '已经登录';
		}
		else
		{
			echo '没有登录';	
		}
		*/
	}

	function loginout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('uid');
		$this->load->view('login.php');
	}

	function useradd()
	{
		$this->load->mode('test_m');
		for($i=1;$i<=40;$i++)
		{
			$name='u'.$i;
			$arr=array('uname'=>$name,'upass'=>'123456');
			$this->test_m->user_insert($arr);
		}
	}

	function pagelist()
	{
		$this->load->model('test_m');
		$user=$this->test_m->user_select_all();
		//var_dump($user);
		$pagenum=5;

		$config['total_rows']=$pageall;
		$config['per_page']=$pagenum;
		$config['num_links']=3;
		$config['base_url']="/index.php/page/pagelist";
	}
}