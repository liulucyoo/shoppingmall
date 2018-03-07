<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class LoginController
 * @package Home\Controller
 */
class LoginController extends Controller {
    /**
     * 用户登录
     */
    public function login()
    {
        // 判断提交方式
        if (IS_POST) {
            // 实例化Login对象
            $login = M('users');
            // 自动验证 创建数据集
            if (!$data = $login->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                exit($login->getError());
            }
            // 组合查询条件
            $where = array();
            $where['username'] = $data['username'];
            $result = $login->where($where)->field('userid,username,email,password')->find();

            // 验证用户名 对比 密码
            if ($result && $result['password'] == $result['password']) {
                // 存储session
                //session('username', $result['username']);   // 当前用户名
                $_SESSION['uid'] = $where['username'];
                // 更新用户登录信息
                //$where['userid'] = session('uid');

                $this->success('登录成功,正跳转至主页...', U('Index/show'));
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
        } else {
            $this->display();
        }
    }

    /**
     * 用户注册
     */
    public function register()
    {
        // 判断提交方式 做不同处理
        if (IS_POST) {
            // 实例化User对象
            $user = M('users');

            // 自动验证 创建数据集
            if (!$data = $user->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                exit($user->getError());
            }
            $data['createtime'] = date("Y-m-d H-i-s",time());

            //插入数据库
            if ($id = $user->add($data)) {
                $user->data($data)->save();
                $this->success('注册成功', U('Index/index'), 2);
            } else {
                $this->error('注册失败');
            }
        } else {
            $this->display();
        }
    }

    /**
     * 用户注销
     */
    public function logout()
    {
        // 清楚所有session
        session(null);
        $this->display('Index:index');
    }

    /**
     * 验证码
     */
    public function verify()
    {
        // 实例化Verify对象
        $verify = new \Think\Verify();

        // 配置验证码参数
        $verify->fontSize = 14;     // 验证码字体大小
        $verify->length = 4;        // 验证码位数
        $verify->imageH = 38;       // 验证码高度
        $verify->useImgBg = flase;   // 开启验证码背景
        $verify->useNoise = false;  // 关闭验证码干扰杂点
        $verify->entry();
    }
}