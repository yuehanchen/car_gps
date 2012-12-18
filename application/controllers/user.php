<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function show_reg()
	{   
		$this->load->view('user_reg');
	}
	
	public function show_login()
	{   
		$this->load->view('user_login');
	}
	
	//写入用户信息
    public function reg()
	{   
		$this->load->model('user_model','',TRUE);
        if($this->user_model->add_user()){//执行插入操作
        	redirect('/','location',301);//如果写入成功，返回首页
        	//redirect是ci的一个URL辅助函数，我在application/config/autoload.php设置了自动载入url辅助函数
        	//打开autoload.php，你会发现这么一句$autoload['helper'] = array('url');
        	//在system/helpers文件夹里面是所有的辅助函数文件，你会发现它们的命名方法是"辅助函数名_helper.php"
        	//我们载入的是url_helper.php,所以是$autoload['helper'] = array('url');
        }
	}
	
	//验证用户登录的方法
    public function ajax_check_login()
	{   
		$this->load->model('user_model','',TRUE);
        $this->user_model->check_user_login($_POST['user'],$_POST['pwd']);
       
	}
	
	//验证用户注册的方法
	public function ajax_check_reg(){
		$this->load->model('user_model','',TRUE);
		$this->user_model->check_user_reg($_POST['user'],$_POST['pwd']);
	}
	
	//用户退出登录的方法
	public function loginout(){
    session_start();
    unset($_SESSION);
    session_destroy();
    redirect('/','location',301);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */