<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// $data = array(
    	// 	'value' => 456
    	// 	);
    	// M('TestHello')->add($data);

    	// M('TestHello')->where('id=%d',1)->save($data);
    	// M('TestHello')->where('id=%d',1)->setField('value',789);

    	// M('TestHello')->where('id=%d',2)->delete();

    	// $arr1 = M('TestHello')->where('id=%d',1)->find();
    	// print_r($arr1);

    	$arr2 = M('TestHello')->select();
    	// print_r($arr2);

    	// D('TestHello')->add_plus(123);
    	$this->assign('data',$arr2);
    	$this->display();
    }
    public function test()
    {
        $this->display();
    }
}