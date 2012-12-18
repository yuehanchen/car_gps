<html>
<?php 
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
?>

</html>
