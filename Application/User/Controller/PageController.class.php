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
		$year_arr = M('Attendandate')->where('id in (SELECT attendandate_id FROM class)')->order('id desc')->select();
		foreach ($year_arr as $key => &$value) {
			$value['classlist'] = M('Class')->query("SELECT class.*,COUNT(alumnus.id) as usercount FROM class LEFT JOIN alumnus ON class.id = alumnus.class_id WHERE attendandate_id=".$value['id']." GROUP BY class.id");
		}
		
		$this->assign('yearlist', $year_arr);
		$this->display();
	}

	public function classlist($classid)
	{
		if (session('id') == null) {
			$isLogin = false;
		} else {
			$isLogin = true;
		}
		$class = new \Home\Model\ClassModel();
		$classlist = $class->GetMember($classid);

		$this->assign('isLogin',$isLogin);
		$this->assign('classlist',$classlist);
		$this->display();
	}
}