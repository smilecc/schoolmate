<?php
namespace User\Api;
use User\Model\UserModel;

class UserApi{
    /*
    初始化，实例化操作模型
    */
    protected $model;
    public function __construct(){
        $this->model = new UserModel();
    }

    public static function LoginEncode($text)
    {
        $text = md5(md5($text));
        return $text;
    }

    //自动登录
    public static function AutoLogin()
    {
        if(cookie('token') != NULL && (session('user_status') == 2 || session('user_status') == 1))
        {
            // token 不为空 且session存在值
            return true;
        }
        else
        {
            if(cookie('userid') == NULL)
            {
                self::Logout();
                return false;
            }

            $saltArr = M('UserSalt')->where('userid=%d',cookie('userid'))->getField('md5(random)',true);
            if(in_array(cookie('token'),$saltArr))
            {
                session('user_status',2);
                return true;
            }
            else
            {
                self::Logout();
                return false;
            }
        }
    }

    // 用户登录
    public static function Login($email,$password)
    {
        if(self::AutoLogin())
        {
            $resArr = array(
                'status' => true,
                'info'   => 'Has logged'
                );
            return $resArr;
        }
        else
        {
            $resArr = D('User')->Login($email,$password);
            self::SetLoginCookie($resArr);
            return $resArr;
        }
    }

    // 认证登录状态 若通过 则设置用户cookie
    protected static function SetLoginCookie($resArr)
    {
        if($resArr['status'])
        {
            $random = D('User')->LoginRandom($resArr['userid']);
            cookie('token',md5($random));
            cookie('username',$resArr['username']);
            cookie('userid',$resArr['userid']);

            // Set session
            /// user_status 是用户登录的标识
            /// 0 is no Login
            /// 1 is password Login
            /// 2 is cookies Login
            session('user_status',1);
        }
    }

    //用户登出
    public static function Logout()
    {
        session('user_status',NULL);
        cookie('token',NULL);
        cookie('username',NULL);
        cookie('userid',NULL);
    }

    // 用户注册
    public static function Register($username,$password,$email)
    {
        return D('User')->CreateUser($username,$password,$email);
    }
}
?>