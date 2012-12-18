<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_edit extends CI_Controller {

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
	public function index($id,$msg="")
	{   
		$this->load->model('welcome_model','',TRUE);//载入模型类，第三个参数true表示自动连接数据库
	    //数据库配置文件在application/config/database.php
	    $data['post'] = $this->welcome_model->get_entries_by_id($id);//读取当前留言
	    if($msg=="done")$data['msg']=true;
	    if($msg=="failed")$data['msg']=false;
	    //这个方法返回的是对象数组，根据参考手册，对象数组在赋值给视图时需要转化成数组元素
	    //应此使用$data['post']，数组下标可以自定义
	    //由于我们编辑留言操作的仍然是welcome表，所以我把编辑留言的方法写在post_edit_model中
	    //你也自定义一个模型，把编辑留言的方法写在自定义的模型中，但是本人并不建议这么做，最好把操作某一张表的方法都写在一个模型文件中
	    $this->load->view('post_edit',$data);//赋值的时候还是用$data，注意区别
	}
	
	public function editpost($id)
	{   $this->load->model('welcome_model','',TRUE);//载入模型类，第三个参数true表示自动连接数据库
	    //数据库配置文件在application/config/database.php
	    if($this->welcome_model->update_entries_by_id($id)){//如果更新成功返回当前页面
	    redirect('post_edit/index/'.$id.'/done','location',301);
	    }else{
	    redirect('post_edit/index/'.$id.'/failed','location',301);	
	    }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */