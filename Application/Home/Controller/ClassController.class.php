<?php
namespace Home\Controller;
use Think\Controller;
class ClassController extends Controller {
    public function index(){
    	$classid = 1;
    	$classinfo = M('Class')->where('id=%d',$classid)->find();
    	$classinfo['attendan'] = M('Attendandate')->where('id=%d',$classinfo['attendandate_id'])->getField('attendan');

    	$this->assign('info',$classinfo);
    	$this->display();
    }

    public function activitycg(){
    	$this->display();
    }
}