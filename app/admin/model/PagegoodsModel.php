<?php
namespace app\admin\model;
use think\Model;


class PagegoodsModel extends Model
{
	//获取正常的商品名称列表

	public function getGoodsSelect()
	{
		$list = db('w_pagegoods')->field('id,name')->select()->toArray();
		
		return $list;
	}


}