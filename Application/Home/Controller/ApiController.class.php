<?php
namespace Home\Controller;
use Think\Controller;
class ApiController extends Controller {
    public function index(){}

	public function CreateActivitty(){
		if(IS_POST){
			$title = I('title');
			$content =  I('content');
			$classid = I('classid');

			echo D('Activity')->CreateActivity($title,$content,$classid);
		}
	}    
}