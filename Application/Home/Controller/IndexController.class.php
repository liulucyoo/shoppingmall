<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
  /*商城主页*/
    public function index(){
        $this->display();
    }
    /*个人主页*/
	 public function show(){
   		 $user = $_SESSION['uid'];
      $Data = M('goods');
      $this->data = $Data->select();
    	$this->assign('user',$user);   
      $this->display();// 显示用户信息展示页面*/
   }
   /*收藏点击*/
   public function collect(){
      $id = I('get.goodsid');
      $goods = M('goods');
      $add = $goods->where("goodsid=$id")->setInc('collectnum');
      $this->ajaxReturn($id);
   }
   /*购买点击*/
   public function sell(){
      $id = I('get.goodsid');
      $b = M('goods');
      $c = $b->where("goodsid=$id")->setInc('sellnum');
      $this->ajaxReturn($id);
   }
   /*收藏详情页*/
   public function collectDetail(){
      $user = $_SESSION['uid'];
      $this->assign('user',$user);   
      $Data = M('goods');
      $this->data = $Data->select();
      $this->display();// 显示用户信息展示页面*/
   }
   public function insertCollect(){
        $User = M("user_goods"); // 实例化User对象
        $data['id'] = '1';
        $data['userid'] = '2';
        $data['goodsid'] = '1';
        $data['state'] = '1';
        $data['sell'] = '1';
        $User->add($data);
        echo "11";
   }
   /*购买详情页*/
   public function sellDetail(){
       //echo $user;
      $Data = M('goods');
      $this->data = $Data->select();
      $this->assign('user',$user);   
      $this->display();// 显示用户信息展示页面
   }
}