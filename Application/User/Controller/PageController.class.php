<?php
namespace User\Controller;
use Think\Controller;
class PageController extends Controller {
	public function index(){}

	public function login()
	{   
        //M('ThinkAccess')->query("INSERT INTO think_access(think_access.role_id,think_access.node_id) VALUES(3,$i)");
        // for ($i = 11; $i <= 25; $i++) { 
        //     $data = array(
        //         'role_id' => 3, 
        //         'node_id' => $i
        //         );
        //     M('ThinkAccess')->add($data);
        // }
        (new \User\Api\UserApi)->Logout();
		$this->display();
	}

	public function register()
	{
		$attendan_list = M('Attendandate')->order('attendan desc')->select();
		$this->assign('attendan',$attendan_list);
		$this->display();
	}

	public function intro()
	{
		$auto_login = new \User\Api\UserApi;
		$auto_login->AutoLogin();
		if (getbrowser() == 'IELOW') {
			$this->redirect('/User/Page/intro_ie');
		}

		$year_arr = M('Attendandate')->where('id in (SELECT attendandate_id FROM class)')->order('id desc')->select();
		foreach ($year_arr as $key => &$value) {
			$value['classlist'] = M('Class')->query("SELECT class.*,COUNT(alumnus.id) as usercount FROM class LEFT JOIN alumnus ON class.id = alumnus.class_id WHERE attendandate_id=".$value['id']." GROUP BY class.id");
		}
		
		$this->assign('yearlist', $year_arr);
		$this->display();
	}

	public function intro_ie()
	{
		$auto_login = new \User\Api\UserApi;
		$auto_login->AutoLogin();
		$year_arr = M('Attendandate')->where('id in (SELECT attendandate_id FROM class)')->order('id desc')->select();
		foreach ($year_arr as $key => &$value) {
			$value['classlist'] = M('Class')->query("SELECT class.*,COUNT(alumnus.id) as usercount FROM class LEFT JOIN alumnus ON class.id = alumnus.class_id WHERE attendandate_id=".$value['id']." GROUP BY class.id");
		}
		
		$this->assign('yearlist', $year_arr);
		$this->display();
	}

	public function classlist($classid)
	{
		$auto_login = new \User\Api\UserApi;
		if($auto_login->AutoLogin()) {
			$isLogin = true;
			if(session('user_role') != 3 && session('user_role') != 4)
			{
				echo '你没有权限查看班级成员列表';
				return;
			}
		} else {
			$isLogin = false;
		}
		
		$class = new \Home\Model\ClassModel();
		$classlist = $class->GetMember($classid);

		$this->assign('isLogin',$isLogin);
		$this->assign('classlist',$classlist);
		$this->display();
	}
}