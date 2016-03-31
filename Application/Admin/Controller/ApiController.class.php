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

	public function op_user_role($user_id=null, $role_id, $type, $mode='form') {
		if(IS_POST)
		{
			if($user_id == null)
			{
				if(null == I('username'))
				{
					$this->error('出问题了');
					exit();
				} else {
					$username = I('username');
					$user_id = M('User')->where("username='%s'",$username)->getField('id');

					if($user_id == null)
					{
							$this->error('用户名不存在');
							exit();
					}
				}
			}

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
			if($mode == 'ajax')
			{
				echo json_encode($res_arr);
			}
			else
			{
				if($res_arr['status'])
				{
					$this->success('操作成功', "/Admin/User/role");
				}
				else
				{
					$this->error('操作失败');
				}
			}	
		}
	}

	public function delete_role_user($user_id, $role_id) {
		if(M('ThinkRoleUser')->where('user_id=%d AND role_id=%d',$user_id, $role_id)->delete() > 0)
		{
			$this->success('删除成功');
		}
		else
		{
			$this->error('删除失败');
		}
	}
}