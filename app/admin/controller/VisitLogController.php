<?php
//记账
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\PagegoodsModel;
class VisitLogController extends AdminBaseController
{
	public function index()
	{
		$gid = input('gid');
		//获取下拉列表
		$goods = new PagegoodsModel();
		$goods = $goods->getGoodsSelect();


		$list = DB::name('w_visitlog')->where('gid',$gid)->order('id DESC')->paginate(20);
		$page = $list->render();
		
		$this->assign('page',$page);
		$this->assign('goods',$goods);
		$this->assign('gid',$gid);
		
		$this->assign('list',$list);
		return $this->fetch();
	}

	//ajax加载商品单价
	public function ajaxGetPrice()
	{
		if($this->request->isajax()){
			$id = input('id');
			$type=input('type');
			//dump($type);
			if($type ==1){
				$p='buyprice';
			}elseif($type==2){
				$p='sellingprice';
			}
			$price = db('goods')->field($p)->where('id',$id)->find();
			$data=array('price'=>$price[$p]);
			return $data;
		}
		
	}

//信息添加
   public function addpost()
   {
   	if($this->request->ispost()){
   		$post = input();
   		$post['createtime'] = strtotime($post['createtime']);//账目生成时间
   		$post['addtime'] = time();
   		$res = db('goodsaction')->insert($post);
   		if($res){
			$this->success('添加成功',url('createjz/index'));
		}else{
			$this->error('添加失败');
		}
   	}
   }

}	