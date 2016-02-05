<?php
namespace Home\Controller;
use Think\Controller;
class ClassController extends Controller {
    private function myClassid(){
        return 1;
    }

    public function index(){
    	$classid = self::myClassid();
    	$classinfo = M('Class')->where('id=%d',$classid)->find();
    	$classinfo['attendan'] = M('Attendandate')->where('id=%d',$classinfo['attendandate_id'])->getField('attendan');

    	$this->assign('info',$classinfo);
    	$this->display();
    }

    public function activitycg(){
        $this->assign('classid',self::myClassid());
    	$this->display();
    }
}