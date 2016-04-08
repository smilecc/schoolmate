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

			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				// $data->sheets[0]['cells'][$i][$j]
				$student['name'] = trim($data->sheets[0]['cells'][$i][1]);
				$student['attendandate'] = trim($data->sheets[0]['cells'][$i][2]);
				$student['classname'] = trim($data->sheets[0]['cells'][$i][3]);
				$student['sex'] = trim($data->sheets[0]['cells'][$i][4]);
				$student['id'] = isset($data->sheets[0]['cells'][$i][5]) ? trim($data->sheets[0]['cells'][$i][5]) : null;

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

				// 存在则入库 不存在则反馈给用户
				if(isset($classList[$student['attendandate'].$student['classname']]) == false) {
					$errorList[] = array(
						'line' => $i,
						'classname' => $student['classname'],
						'year' => $student['attendandate']
						);
				} else {
					$student['classid'] =  $classList[$student['attendandate'].$student['classname']];
					$insertList[] = $student;
				}
			}

			if (count($errorList) != 0) {
				echo json_encode(array(
						'status' => 2,
						'info' => '存在不符数据，没有任何数据被导入，请修改正确后重新导入即可',
						'lines' => $errorList
					));
			} else {
				D('User')->AddUser($insertList);
				echo json_encode(array('status' => 0, 'info' => '操作成功'));
			}
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