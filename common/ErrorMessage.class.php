<?php
class ErrorMessage{
	//common part
	const SUCCESS		= "操作成功";
	const ERROR = "操作失败，服务器异常";
	//login
	const  VERIFY_CODE_WRONG = "验证码错误";
	const USER_OR_PWD_WRONG	="用户名或密码错误";
	//add user
	const  USER_EXIST = "此用户已经存在";
	const NEED_PARAM  = "有没有填写的必要属性";
	
}