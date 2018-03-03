<?php
namespace app\admin\model;
use think\Model;


class GoodsModel extends Model
{
	//获取正常的商品名称下拉列表

	public function getGoodsSelect()
	{
		$list = db('goods')->field('id,name')->where('state',2)->select();
		$str = "";
		if($list){
			
			foreach($list as $v){
				$str.="<option value=".$v['id'].">";
				$str.=$v['name']."</option>";
			}

		}

		return $str;
	}


}