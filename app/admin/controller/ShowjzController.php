<?php
//查账
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use app\admin\model\GoodsModel;
use think\Db;
class ShowjzController extends AdminBaseController
{
	//销售记录   进货记录
	public function index()
	{
		$type = input('type')?input('type'):2;

		//查记录
		$list = DB::name('goodsaction')->field('ga.*,g.name')->alias('ga')->join('__GOODS__ g','ga.gid=g.id')->where('ga.type',$type)->order('ga.id desc')->paginate(10);
dump($list);die;
		$page = $list->render();

		$this->assign('list',$list);
		$this->assign('page',$page);
		return $this->fetch();
	}


}