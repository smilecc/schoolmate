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

	public function ClassChange(){
		if(IS_POST)
		{
			$data = array(
				'id' => I('id'),
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
			$id = D('Class')->ChangeClass($data);

			if($id > 0)
			{
				echo GetResult();
			}
			else
			{
				echo GetResult(false);
			}
		}
	}

	public function op_user_role($user_id, $role_id, $type) {
		if(IS_POST)
		{
			$data = array(
				'user_id' => $user_id,
				'role_id' => $role_id
				);
			if($type == 'add')
			{
				$res = M('ThinkRoleUser')->add($data);
			}
			else
			{
				$res = M('ThinkRoleUser')->where('user_id=%d', $user_id)->setField('role_id', $role_id);
			}

			if($res > 0)
			{
				$res_arr = array('status' => true);
			} 
			else
			{
				$res_arr = array('status' => false);
			}
			echo json_encode($res_arr);
		}
	}
}