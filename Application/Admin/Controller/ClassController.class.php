<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends BaseController {
	public function index($page=1){
        // 映射
		$count = M('Class')->count('id');
		$attendanlist = M('attendandate')->order('id desc')->select();
		$this->assign('clscount',$count);
		$this->assign('page',$page);
		$this->assign('attendanlist',$attendanlist);
		$this->display();
	}

	public function lists($page,$year,$search=''){
        // 映射
		if($search == '')
		{
			$count = M('Class')->count('id');
			$this->assign('clscount',$count);

            // 处理页码
			$pagecount = (integer)(($count / 10) + 1);

            // 防止超出大小
			if($page <= 0){
				$page = 1;
			}
			if($page > $pagecount){
				$page = $pagecount;
			}

			if ($year == -1) {
				$list = M('Class')->order('id desc')->page($page,10)->select();
			} else {
				$list = M('Class')->where('attendandate_id=%d', $year)->order('id desc')->page($page,10)->select();
			}
			
		}
		else
		{
			$search = array('like','%'.$search.'%');
			$where['classname'] = $search;
			$where['headmaster'] = $search;
			$where['_logic'] = 'OR';
			$count = M('Class')->where($where)->count();
			$pagecount = (integer)(($count / 10) + 1);
			$list = M('Class')->where($where)->order('id desc')->page($page,10)->select();
		}

		D('Attendandate')->DisposeClass($list);
		$this->assign('records',$count);
		$this->assign('page',$page);
		$this->assign('pagecount',$pagecount);
		$this->assign('list',$list);
		$this->display();
	}

	public function import($alert = false){
		$this->assign('alert',$alert);
		$this->display();
	}

	public function studentlist($classid){
		$class = new \Home\Model\ClassModel();
		$classlist = $class->GetMember($classid);

		$this->assign('classid', $classid);
		$this->assign('classlist',$classlist);
		$this->display();
	}

    // 初始化 入学日期 1970 - 2015
	public function CreateAttendan()
	{
    	// $db = M('attendandate');
    	// for ($i=1970; $i < 2016; $i++) { 
    	// 	$data = array('attendan' => $i);
    	// 	$db->add($data);
    	// }
	}
}