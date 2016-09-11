<?php
use Think\Controller;
class IndexController extends Controller { 

    public function index() {
        $Photo  =   M('Photo');
        $data   =   $Photo->order('create_time desc')->find();
        $this->assign('data', $data);
        import('@.ORG.String');
        $code = \String::randString(3, 4, '￥@*&*（');
        dump($code);
        $count  = $Photo->count();    //计算总数 
        $Page = new \Think\Page($count, 3); 
        //列表值
        $list   = $Photo->order('id desc')->limit($Page->firstRow. ',' . $Page->listRows)->select(); 
        $show       = $Page->show();// 分页显示输出     
        //输出显示        
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板       
    }

    public function upload() {
        if (!empty($_FILES)) {
            //如果有文件上传 上传附件
            $this->_upload();
        }
    }

    // 文件上传
    protected function _upload() {
        import('@.ORG.UploadFile');
        //导入上传类
        $upload = new \UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = './Uploads/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '400,100';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '400,100';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = true;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            \Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'File/View/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }
        $model  = M('Photo');
        //保存当前数据对象
        $data['image']          = $_POST['image'];
        $data['create_time']    = NOW_TIME;
        $list   = $model->add($data);
        if ($list !== false) {
            $this->success('上传图片成功！');
        } else {
            $this->error('上传图片失败!');
        }
    }
}