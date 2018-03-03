<?php
//记账
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use app\admin\model\PagegoodsModel;
use think\Db;
class OrdersController extends AdminBaseController
{
	public function index()
	{
		$gid = input('gid');
		$state = input('state')?input('state'):1;
		//获取下拉列表
		$goods = new PagegoodsModel();
		$goods = $goods->getGoodsSelect();

		if($gid && $state){
			$data = DB::name('w_orders')->field('p.name,o.*')->alias('o')->join('__W_PAGEGOODS__ p','o.gid=p.id')->where(['p.id'=>$gid,'o.state'=>$state])->paginate(10);
			$page = $data->render();
			$data = $data->toArray();
			$list = $data['data'];
			
		//dump($list);die;
		
			$action='无操作';
			foreach($list as &$v){
				switch($state){
					case 1:
						$v['state']='待发货';
						$v['time']=$v['addtime'];
						$time='下单时间';
						$sta=2;
						$action = '发货';
							$this->assign('sta',$sta);	
						break;
					case 2:
						$v['state'] = '已发货';
						$v['time'] = $v['sendtime'];
						$time = '发货时间';
						$sta=3;
						$this->assign('sta',$sta);	
						$action='确认收货';
						break;
					case 3:
						$v['state'] = '已收货';
						$v['time'] = $v['overtime'];
						$time = '收货时间';
						$sta=3;
						$this->assign('sta',$sta);	
						break;
					case 4:
						$v['state'] = '拒收货';
						$v['time'] = $v['overtime'];
						$time = '收货时间';
						break;

					}

					$this->assign('time',$time);
			}
	
		$this->assign('action',$action);	
		
		$this->assign('page',$page);
		
		$this->assign('list',$list);
	}
		$this->assign('gid',$gid);
		$this->assign('goods',$goods);
		return $this->fetch();
	}

	//订单 操作
	public function action()
	{
		$data=[];
		$data['state'] = input('state');
		$id=input('id');
		switch($data['state']){
			case 2:
				$data['sendtime']=time();
				break;
			case 3:
				$data['overtime'] = time();
				break;	
		}
		//执行修改
		$res = DB::name('w_orders')->where('id',$id)->update($data);
	
		if($res){
			return $this->success('操作成功');
		}else{
			return $this->error('操作失败');
		}
	}

//信息添加
   public function addpost()
   {
   	echo 444;die;
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