<?php
namespace Admin\Controller;
use Think\Controller;
require_once './Application/Common/Common/Excel/reader.php';

class ExcelController extends Controller {
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     0 ;// 设置附件上传大小
		$upload->exts      =     array('xls');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		// 上传文件 
		$info   =   $upload->upload();
		$res = array('status' => false);
		if(!$info) {// 上传错误提示错误信息
			$res['info'] = $upload->getError();
		}else{// 上传成功
			//$res = array('status' => true, 'info' => '上传成功');
			$data = new \Spreadsheet_Excel_Reader();
			$data->setOutputEncoding('utf-8');
			$data->read($_SERVER['DOCUMENT_ROOT'].'/Public/Uploads/'.$info['file']['savepath'].$info['file']['savename']);
			error_reporting(E_ALL ^ E_NOTICE);

			$tempClassList = D('Class')->GetAll();
			$classList = array();
			foreach ($tempClassList as $key => $value) {
				$classList[$value['attendan'].$value['classname']] = $value['id'];
			}

			$errorList = array();
			$insertList = array();
			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
				// $data->sheets[0]['cells'][$i][$j]
				$student['name'] = $data->sheets[0]['cells'][$i][1];
				$student['attendandate'] = $data->sheets[0]['cells'][$i][2];
				$student['classname'] = $data->sheets[0]['cells'][$i][3];
				$student['sex'] = $data->sheets[0]['cells'][$i][4];
				$student['id'] = $data->sheets[0]['cells'][$i][5];

				if(isset($classList[$student['attendandate'].$student['classname']]) == false) {
					$errorList[] = $i;
				} else {
					$student['classid'] =  $classList[$student['attendandate'].$student['classname']];
					$insertList[] = $student;
				}
			}

			if (count($errorList) != 0) {
				echo json_encode($errorList);
			} else {
				D('User')->AddUser($insertList);
			}
		}
	}
}