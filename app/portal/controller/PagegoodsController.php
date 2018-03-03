<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Db;
class PagegoodsController extends HomeBaseController
{
    public function index()
    {	
        $id = input('id');
        session('id',$id);
        $controller = DB::name('w_pagegoods')->where('id',$id)->value('controller');

    	$data['ip']=$_SERVER["REMOTE_ADDR"];
        $data['addtime'] =time();	
        DB::name('w_visitlog')->insert($data);
    
        return $this->fetch("$controller/index");
    }

    public function addpost()
    {
    	$input = input();
    	if($this->request->ispost()){
    		unset($input['submit']);
    		$input['addtime']=time();
            $input['gid']=session('id');
    		//执行添加
    		$res = DB::name('w_orders')->insert($input);
    		if($res){
    			return $this->success('下单成功');
    		}else{
    			return $this->error('下单失败');
    		}
    	}
    }
}
