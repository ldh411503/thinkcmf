<?php
//查账
namespace app\admin\controller;

use cmf\controller\AdminBaseController;

use think\Db;
class PagegoodsController extends AdminBaseController
{
	public function index()
	{
		$list = DB::name('w_pagegoods')->order('id desc')->paginate(10);
		$page = $list->render();
		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}

	public function add()
	{
		//表单添加
		if($this->request->ispost()){

			$post=$this->request->param();
			
			$post['addtime'] = time();

			$res = DB::name('w_pagegoods')->insert($post);
			if($res){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
			//加载添加表单页面
			return $this->fetch();
	}


public function edit()
{
	//表单修改
	if($this->request->ispost()){
		$post=$this->request->param();
		$res = DB::name('w_pagegoods')->where('id',input('id'))->update($post);
		if($res){
				$this->success('修改成功',url('pagegoods/index'));
			}else{
				$this->error('修改失败',url('pagegoods/index'));
			}
	}else{
		//加载修改表单
		$id=input('id');
		$goods=DB::name('w_pagegoods')->where('id',$id)->find();
		$this->assign('goods',$goods);
		return $this->fetch();
	}


}

public function delete()
{
	$id = input('id');
	$res = DB::name('w_pagegoods')->where('id',$id)->delete();
	if($res){
			$this->success('删除成功',url('pagegoods/index'));
		}else{
			$this->error('删除失败',url('pagegoods/index'));
		}
}


}