<?php
	
	require "Model.class.php";
	require "config.php";
	error_reporting(0);//屏蔽警告
	$model = new Model('wml_user');
	$username=$_GET['username'];
	$password=$_GET['pwd'];
	$user_data = $model->where("username='$_GET[username]'")->select();

	
	if(empty($user_data)){
		echo "用户名不存在";
	   	exit;
	}
	 if($password!= $user_data[0]['password']){
	    	echo "用户密码错误";
	    	exit;
	}else{
		setcookie('userName',$username,time()+3600*24,'/');
		echo "正在登录";
		echo " <script> 
			setTimeout(function(){
				window.location.href='../index.php'	
			},1500)
		</script>";		
	}
	