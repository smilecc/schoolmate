<?php
namespace User\Model;
use Think\Model;

Class UserModel extends Model{
	// 查询用户正确性 若正确则返回userid
	/*
		SELECT `user`.realname,`user`.sex FROM user,alumnus
		WHERE alumnus.user_id = `user`.id 
	*/
	public function CheckStudent($realname, $sex, $classid, $classmate)
	{
		$class_arr = M('User')->field('user.id,user.realname,user.sex,user.username')->table('user user,alumnus alumnus')
		->where('alumnus.user_id = `user`.id AND class_id=%d', $classid)->select();
		
		// 处理用户名
		$realname = trim($realname);
		$classmate = trim($classmate);

		// 查找存在情况
		$find_user = false;
		$find_classmate = false;
		$backup_user = null; // 防止出现同名用户抢占性别不确定用户的情况
		$res_arr = array('userid' => -1);

		foreach ($class_arr as $key => $value) {
			// 查找姓名
			if ($value['realname'] == $realname) {

				if ($value['username'] != null) {
					continue;
				}

				if($value['sex'] == $sex) {
					$find_user = true;
					$res_arr['userid'] = $value['id'];
					continue;
				}

				if ($value['sex'] == 0) {
					$backup_user = $value['id'];
				}
				continue;
			}

			// 查找同学
			if($value['realname'] == $classmate) {
				$find_classmate = true;
			}
		}

		// 找不到相同性别 若存在未知性别 则替补
		if($find_user == false && $backup_user != null) {
			$res_arr['userid'] = $backup_user;
			$find_user = true;
		}

		if($find_user) {
			if($find_classmate) {
				// 完成验证
				$res_arr['status'] = true;
			} else {
				// 找不到同学
				$res_arr['status'] = false;
				$res_arr['info'] = '该班级没有该姓名的同学';
			}
		} else {
			// 找不到姓名
			$res_arr['status'] = false;
			$res_arr['info'] = '对不起，该班级未注册成员中不存在您';
		}

		return $res_arr;
	}

	// 创建或更新用户登录随机数
	public function LoginRandom($userid)
	{
		return $this->Random($userid,1);
	}
	
	public function RegisterRandom($userid)
	{
		return $this->Random($userid,0);
	}

	protected function Random($userid,$type)
	{
		$data = array(
			'random' => rand(),
			'user_id' => $userid,
			'type'	 => $type
			);
		M('UserSalt')->add($data);
	
		return $data['random'];
	}

	public function Login($email,$password)
	{
		if($email == '' || $password == '')
		{
			$resultArr = array(
			'status' => false,
			'info'	 => '存在未填项'
			);
			return $resultArr;
		}
		$userinfo = $this->where('email="%s" OR username="%s"',$email, $email)->find();
		$resultArr = array(
			'status' => false
			 );

		if(count($userinfo) == 0)
		{
			$resultArr['info'] = '用户不存在';
			return $resultArr;
		}

		// 校对密码
		$registerRand = M('UserSalt')->where('user_id=%d AND type=0',$userinfo['id'])->getField('random');
		if($userinfo['password'] == \User\Api\UserApi::LoginEncode($password.$registerRand))
		{
			$resultArr['status'] = true;
			$resultArr['username'] = $userinfo['username'];
			$resultArr['userid'] = $userinfo['id'];
			$resultArr['info'] = 'Success';
		}
		else
		{
			$resultArr['info'] = '密码错误';
		}
		return $resultArr;
	}

	public function CreateUser($username, $password, $email, $uid=-1)
	{
		$resultArr = array(
			'status' => false
		 );
		if($username == '' || $password == '' || $email == '')
		{
			$resultArr['info'] = '存在未填项';
			return $resultArr;
		}

		// 一系列验证
		$isAccepted = true;
		if(!$this->CheckUsername($username))
		{
			$resultArr['info'] = '用户名不符合条件<br/>请输入字母、数字、下划线、中文汉字<br/>2-16个字符';
			$isAccepted = false;
		}

		if(!$this->CheckPassword($password))
		{
			$resultArr['info'] = '密码不符合条件<br/>请输入6-128位密码';
			$isAccepted = false;
		}
		
		if(!$this->CheckEmail($email))
		{
			$resultArr['info'] = 'Email不符合条件<br/>请输入正确的邮箱';
			$isAccepted = false;
		}

		if($isAccepted == false)
		{
			return $resultArr;
		}

		// 检测用户存在情况
		$userinfo = $this->where('username="%s" OR email="%s"',$username,$email)->find();
		if(count($userinfo) > 0)
		{
			if($userinfo['username'] == $username)
			{
				$resultArr['info'] = '用户已存在';
			}
			else 
			{
				$resultArr['info'] = 'Email已存在';
			}

			return $resultArr;
		}
		// 入库
		$insertArray = array(
			'username'	=> $username,
			'email'		=> $email,
			'userstatus'=> 1
		);
		
		if($uid == -1)
		{
			$this->create($insertArray);
			$result = $this->add();
			$condition = $result;
		} 
		else
		{
			$condition = $this->where('id=%d',$uid)->save($insertArray);
			$result = $uid;
		}

		// 返回数据
		if($condition)
		{
			// 注册用户密码盐值
			$rand = $this->RegisterRandom($result);
			// 给定密码
			$this->where('id=%d',$result)->setField('password',\User\Api\UserApi::LoginEncode($password.$rand));
			$resultArr['info'] = '注册成功';
			$resultArr['status'] = true;
		}
		else
		{
			$resultArr['info'] = '系统繁忙，请稍后再试';
		}
		return $resultArr;
	}

	public function SaveUser($uid, $username, $password, $email, $sex)
	{
		if($sex == 1 || $sex == 2) {
			$this->where('id=%d',$uid)->setField('sex', $sex);
		}

		return $this->CreateUser($username, $password, $email, $uid);
	}

	public function ChangePassword($old,$new)
	{
		$resultArr = array(
			'status' => false
		 );
		if(session('id') == null)
		{
			$resultArr['error'] = '登录已失效';
			return $resultArr;
		}
		$userinfo = $this->where('id=%d', session('id'))->find();

		// 校对密码
		$registerRand = M('UserSalt')->where('user_id=%d AND type=0', session('id'))->getField('random');
		if($userinfo['password'] != \User\Api\UserApi::LoginEncode($old.$registerRand))
		{
			$resultArr['error'] = '原密码不正确';
			return $resultArr;
		}

		if(!preg_match('/[\S]{6,128}/',$new))
		{
			return $jsonResult = array('status' => false,'error' => '密码不符合条件，请输入6-128位密码' );
		}

		$data = array(
			'password' 	=> \User\Api\UserApi::LoginEncode($new.$registerRand)
			);
		trace($data,'debug');
		if($this->where('id=%d', session('id'))->save($data))
		{
			$resultArr['status'] = true;
			$resultArr['info']	= '修改密码成功';
		}
		else
		{
			$resultArr['error']	= '修改密码失败，密码未变动或系统错误';
		}
		return $resultArr;
	}

	// 重置密码
	public function ResetPwd($userid)
	{
		$registerRand = M('UserSalt')->where('user_id=%d AND type=0', $userid)->getField('random');
		if ($registerRand == null) {
			return false;
		}
		
		$data = array(
			'password' 	=> \User\Api\UserApi::LoginEncode('123456'.$registerRand)
			);

		return $this->where('id=%d', $userid)->save($data);
	}

	protected function CheckUsername($str)
	{
		if(preg_match('/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]{2,16}$/u',$str))
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	protected function CheckPassword($str)
	{
		if(preg_match('/[\S]{6,128}/',$str))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	protected function CheckEmail($str)
	{
		if(preg_match('/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/',$str))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}