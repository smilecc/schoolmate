<?php
namespace User\Controller;
use Think\Controller;
class PageController extends Controller {
    public function index(){}

    public function login()
    {   
        //M('ThinkAccess')->query("INSERT INTO think_access(think_access.role_id,think_access.node_id) VALUES(3,$i)");
        // for ($i = 11; $i <= 25; $i++) { 
        //     $data = array(
        //         'role_id' => 3, 
        //         'node_id' => $i
        //         );
        //     M('ThinkAccess')->add($data);
        // }
    	$this->display();
    }

    public function register()
    {
    	$attendan_list = M('Attendandate')->order('attendan desc')->select();
    	$this->assign('attendan',$attendan_list);
    	$this->display();
    }

    public function intro()
    {
        $this->display();
    }
}