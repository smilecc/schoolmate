<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends Controller {
    public function index($page=1){
        // 映射
    	$count = M('Class')->count('id');
    	$attendanlist = M('attendandate')->order('id desc')->select();
    	$this->assign('clscount',$count);
    	$this->assign('page',$page);
    	$this->assign('attendanlist',$attendanlist);
        $this->display();
    }

    public function lists($page){
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

        // 映射
        $list = M('Class')->order('id desc')->page($page,10)->select();
        $this->assign('page',$page);
        $this->assign('pagecount',$pagecount);
    	$this->assign('list',$list);
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