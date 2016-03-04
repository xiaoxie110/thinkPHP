<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user = M('admin_user_info'); 
        $data = $user->select();
        $this->assign('userArr',$data);
        $jpush_tag = 1;
        $jpush_tag = 'jpush_tag'.$jpush_tag;
        dump($jpush_tag);
        $this->display();
    }
}