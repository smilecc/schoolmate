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

            // 判断是否存在空字段
    		if(CheckFieldNotNull($data) == false)
    		{
    			echo GetResult(false,'有字段为空');
    			return;
    		}

            // 入库
    		$id = D('Class')->CreateClass($data);

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

    public function ClassDelete($id){
        if(IS_POST){
            if(D('Class')->DeleteClass($id)){
                echo GetResult();
            }else{
                echo GetResult(false);
            }
        }
    }
}