<?php
namespace Admin\Controller;
use Think\Controller;
class ApiController extends Controller {
    public function index(){ }

    public function ClassCreate(){
    	if(IS_POST)
    	{
    		$data = array(
    				'classname' => I('name'),
    				'headmaster' => I('headmaster'),
    				'attendandate_id' => I('attendandate')
    			);
    		if(CheckFieldNotNull($data) == false)
    		{
    			echo GetResult(false,'有字段为空');
    			return;
    		}

    		$id = M('Class')->add($data);

    		if($id > 0)
    		{
    			echo GetResult(true,'操作成功',array('id' => $id));
    		}
    		else
    		{
    			echo GetResult(false,'系统错误');
    		}
    	}
    }
}