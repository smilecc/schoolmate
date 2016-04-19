<?php
namespace Admin\Controller;
use Think\Controller;
require_once './Application/Common/Common/Excel/reader.php';

/*
Excel 用户 上传接口
返回格式:json
字段1 : status
返回值说明
{
	0 => 成功
	1 => 上传错误
	2 => 解析错误
}
*/
class ExcelController extends Controller {
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0 ;// 设置附件上传大小
		$upload->exts      =     array('xls');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
		$res = array('status' => 1);
		if(!$info) {// 上传错误提示错误信息
			$res['info'] = $upload->getError();
			echo json_encode($res);
			return;
		}else{// 上传成功
			//$res = array('status' => true, 'info' => '上传成功');
			$data = new \Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('utf-8');
			$data->read($_SERVER['DOCUMENT_ROOT'].'/Public/Uploads/'.$info['file']['savepath'].$info['file']['savename']);

			// 对班级和入学年份进行存在性认证
			$tempClassList = D('Class')->GetAll();
			$classList = array();
			foreach ($tempClassList as $key => $value) {
				$classList[$value['attendan'].$value['classname']] = $value['id'];
			}

			$errorList = array();
			$insertList = array();
			$countList = array();
			$reArr = array();
			$userdb = D('User');

			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				// $data->sheets[0]['cells'][$i][$j]
				$student['name'] = trim($data->sheets[0]['cells'][$i][1]);
				$student['attendandate'] = trim($data->sheets[0]['cells'][$i][2]);
				$student['classname'] = trim($data->sheets[0]['cells'][$i][3]);
				$student['sex'] = trim($data->sheets[0]['cells'][$i][4]);
				$student['id'] = isset($data->sheets[0]['cells'][$i][5]) ? trim($data->sheets[0]['cells'][$i][5]) : null;

				if ($student['name'] == null || $student['name'] == '') {
					continue;
				}

				switch ($student['sex']) {
					case '男':
						$student['sex'] = 1;
						break;
					case '女':
						$student['sex'] = 2;
						break;
					default:
						$student['sex'] = 0;
						break;
				}

				$student['roleid'] = 1;

				if(isset($countList[$student['attendandate'].'年 '.$student['classname']]) == false){
					$countList[$student['attendandate'].'年 '.$student['classname']] = 0;
				}

				// 存在则入库 不存在则反馈给用户
				if(isset($classList[$student['attendandate'].$student['classname']]) == false) {
					$errorList[] = array(
						'line' => $i,
						'classname' => $student['classname'],
						'year' 		=> $student['attendandate'],
						'name'		=> $student['name']
						);
				} else {
					$student['classid'] =  $classList[$student['attendandate'].$student['classname']];

					$isRepeat = ($data->sheets[0]['cells'][$i][6] == 1);
					$count = $userdb->FindUser($student['classid'], $student['name']);

					if($count == 0) {
						$insertList[] = $student;
					} else {
						if($isRepeat AND $count == 1) {
							$insertList[] = $student;
						} else {
							continue;
						}
					}

					D('User')->AddUser($insertList);
					unset($insertList);
					$countList[$student['attendandate'].'年 '.$student['classname']]++;
				}
			}
		}

		$this->assign('errorlist', $errorList);
		$this->assign('countlist', $countList);
		$this->display();
	}

	public function upload_enployee()
	{
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0 ;// 设置附件上传大小
		$upload->exts      =     array('xls');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
		$res = array('status' => 1);
		if(!$info) {// 上传错误提示错误信息
			$res['info'] = $upload->getError();
			echo json_encode($res);
			return;
		}else{// 上传成功
			$data = new \Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('utf-8');
			$data->read($_SERVER['DOCUMENT_ROOT'].'/Public/Uploads/'.$info['file']['savepath'].$info['file']['savename']);
			$user = D('User');

			$errorList = array();
			$insert_count = 0;
			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				unset($insertList);
				
				$teacher['name'] = trim($data->sheets[0]['cells'][$i][1]);
				$teacher['sex'] = trim($data->sheets[0]['cells'][$i][2]);
				$teacher['username'] = trim($data->sheets[0]['cells'][$i][3]);
				$teacher['roleid'] = 4;

				if ($teacher['name'] == null || $teacher['name'] == '') {
					continue;
				}

				if ($teacher['username'] == null || $teacher['username'] == '') {
					$errorList[] = array(
						'line' 	=> $i,
						'name'	=> $teacher['name'],
						'bec'	=> '工号为空'
						);
					continue;
				}


				switch ($teacher['sex']) {
					case '男':
						$teacher['sex'] = 1;
						break;
					case '女':
						$teacher['sex'] = 2;
						break;
					default:
						$teacher['sex'] = 0;
						break;
				}

				$count = $user->FindTeacher($teacher['name']);
				$isRepeat = ($data->sheets[0]['cells'][$i][4] == 1);

				if($count == 0 OR ($isRepeat AND $count == 1)) {
					$insertList[] = $teacher;

					if($user->FindUsername($teacher['username'])) {
						$errorList[] = array(
							'line' 		=> $i,
							'name'		=> $teacher['name'],
							'bec'		=> '工号存在重复'
							);
						continue;
					}
				} else {
					continue;
				}

				$user->AddUser($insertList);
				$insert_count++;
			}

			echo '操作成功，本次共导入'.$insert_count.'记录';
			print_r($errorlist);
			$this->assign('errorlist', $errorList);
			$this->display();
		}
	}

	public function upload_class(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0 ;// 设置附件上传大小
		$upload->exts      =     array('xls');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
		$res = array('status' => 1);
		if(!$info) {// 上传错误提示错误信息
			$res['info'] = $upload->getError();
			echo json_encode($res);
			return;
		}else{// 上传成功
			//$res = array('status' => true, 'info' => '上传成功');
			$data = new \Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('utf-8');
			$data->read($_SERVER['DOCUMENT_ROOT'].'/Public/Uploads/'.$info['file']['savepath'].$info['file']['savename']);

			$attendanMap = D('Attendandate')->GetMap();
			$errorList = array();

			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				// $data->sheets[0]['cells'][$i][$j]
				$attendan = trim($data->sheets[0]['cells'][$i][1]);
				$student['attendandate_id'] = $attendanMap[$attendan];
				$student['classname'] = trim($data->sheets[0]['cells'][$i][2]);
				$student['headmaster'] = trim($data->sheets[0]['cells'][$i][3]);

				$insertList[] = $student;

				if(isset($student['attendandate_id']) == false) {
					$student['attendan'] = $attendan;
					$student['line'] = $i;
					$errorList[] = $student;
				}
			}
			if (count($errorList) != 0) {
				echo json_encode(array(
					'status' => 2, 
					'info'   => '存在不符的年份数据，没有任何数据被导入，请修改正确后重新导入即可',
					'lines'	 => $errorList
					));
			} else {
				foreach ($insertList as $key => $value) {
					D('Class')->CreateClass($value);
				}
				echo json_encode(array('status' => 0, 'info' => '操作成功'));
			}
		}
	}
}