<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
class GoodsController extends AdminBaseController
{
	public function index()
	{
		if($this->request->ispost()){
			$name = input('name');
			
			$list = DB::name('goods')->where("name like %$name%")->select();
		}else{
			$state=input('state')?input('state'):2;
			$list = DB::name('goods')->where('state',$state)->order('id desc')->paginate(10);
		}
		
	//dump($list);
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}


public function add()
{


	return $this->fetch();
}
//增
public function addpost()
{
	if($this->request->ispost()){
		$post = $_POST;
		if($post['name']==''){
			return $this->error('商品名不能为空',url('goods/add'));
		}
		//是否重复
		$goods = DB::name('goods')->where('name',$post['name'])->find();
		if($goods){
			return $this->error('此商品已存在，不要重复添加哦');
		}

		$post['addtime']=time();
		$res = DB::name('goods')->insert($post);

		if($res){
			$this->success('添加成功',url('goods/add'));
		}else{
			$this->error('添加失败');
		}
	};
}

//删
public function delete()
{
	$id = input('id');
	$res = db('goods')->where('id',$id)->delete();

		if($res){
			$this->success('删除成功',url('goods/index'));
		}else{
			$this->error('删除失败');
		}
}

//改
public function edit()
{
	if($this->request->ispost()){
		$input = input();

		$res = db('goods')->where('id',$input['id'])->update($input);
		if($res){
			$this->success('修改成功',url('goods/index'));
		}else{
			$this->error('修改失败');
		}

	}else{
		//加载修改信息页面
		$id = input('id');
		$goods = db('goods')->where('id',$id)->find();
		$this->assign('goods',$goods);
		return $this->fetch();
	}
}




}