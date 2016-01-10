<?php
namespace User\Controller;
use Think\Controller;
class ApiController extends Controller {
    public function index(){}

    public function login($email,$password)
    {
    	$resArr = \User\Api\UserApi::Login($email,$password);
       	echo json_encode($resArr);
    }

    public function register($username,$password,$email)
    {
    	echo json_encode(\User\Api\UserApi::Register($username,$password,$email));
    }

    public function logout()
    {
        \User\Api\UserApi::Logout();
    }
}