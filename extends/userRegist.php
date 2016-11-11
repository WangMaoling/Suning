<?php
	
	require "Model.class.php";
	require "config.php";
	error_reporting(0);//屏蔽警告
	$model = new Model('wml_user');

	$user_data = $model->where("username='$_GET[username]'")->select();
	if(!empty($user_data)){
		echo "用户已存在";
	   	exit;
	}else{
	    $product['username'] = $_GET[username];
	    $product['password'] = $_GET[pwd];
	   	$product['email'] =$_GET[email];
	   	$result = $model->add($product);
	   	echo $result;
	}
