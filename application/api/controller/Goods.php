<?php

/**
 * @Author: Cui
 * @Date:   2018-08-17 11:48:22
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-08-21 11:54:03
 */
namespace app\api\controller;
use app\common\logic\GoodsLogic;
use \think\Page;

class Goods extends Base {

	/**
	 * 积分商城
	 */
	public function integralMall() {
		$cat_id = I('get.id/d');
		$minValue = I('get.minValue');
		$maxValue = I('get.maxValue');
		$brandType = I('get.brandType');
		$point_rate = tpCache('shopping.point_rate');
		$is_new = I('get.is_new', 0);
		$exchange = I('get.exchange', 0);
		$goods_where = array(
			'is_on_sale' => 1, //是否上架
			'is_virtual' => 0,
		);
		//积分兑换筛选
		$exchange_integral_where_array = array(array('gt', 0));
		// 分类id
		if (!empty($cat_id)) {
			$goods_where['cat_id'] = array('in', getCatGrandson($cat_id));
		}
		//积分截止范围
		if (!empty($maxValue)) {
			array_push($exchange_integral_where_array, array('elt', $maxValue));
		}
		//积分起始范围
		if (!empty($minValue)) {
			array_push($exchange_integral_where_array, array('egt', $minValue));
		}
		//积分+金额
		if ($brandType == 1) {
			array_push($exchange_integral_where_array, array('exp', ' < shop_price* ' . $point_rate));
		}
		//全部积分
		if ($brandType == 2) {
			array_push($exchange_integral_where_array, array('exp', ' = shop_price* ' . $point_rate));
		}
		//新品
		if ($is_new == 1) {
			$goods_where['is_new'] = $is_new;
		}
		//我能兑换
		$user_id = cookie('user_id');
		if ($exchange == 1 && !empty($user_id)) {
			$user_pay_points = intval(M('users')->where(array('user_id' => $user_id))->getField('pay_points'));
			if ($user_pay_points !== false) {
				array_push($exchange_integral_where_array, array('lt', $user_pay_points));
			}
		}

		$goods_where['exchange_integral'] = $exchange_integral_where_array;
		$goods_list_count = M('goods')->where($goods_where)->count(); //总页数
		$size = input('size') ? input('size') : 10;
		$page = new Page($goods_list_count, $size);
		$goods_list = M('goods')->where($goods_where)->limit($page->firstRow . ',' . $page->listRows)->select();
		if (!$goods_list) {
			return show();
		}
		// $goods_list = M('goods')->where($goods_where)->page($this->page, $this->size)->select();

		$goods_category = M('goods_category')->where(array('level' => 1))->select();

		$data = [
			'goods_list' => $goods_list,
			'point_rate' => $point_rate, //兑换率

		];
		return show(1, '', $data);
		// $this->assign('goods_list', $goods_list);
		// $this->assign('page', $page->show());
		// $this->assign('goods_list_count', $goods_list_count);
		// $this->assign('goods_category', $goods_category); //商品1级分类
		// $this->assign('point_rate', $point_rate); //兑换率
		// $this->assign('nowPage', $page->nowPage); // 当前页
		// $this->assign('totalPages', $page->totalPages); //总页数
		// return $this->fetch();
	}

	/**
	 * 商品详情页
	 */
	public function goodsInfo() {
		C('TOKEN_ON', true);
		$goodsLogic = new GoodsLogic();
		$goods_id = I("get.id/d");
		$goodsModel = new \app\common\model\Goods();
		$goods = $goodsModel::get($goods_id);
		if (empty($goods) || ($goods['is_on_sale'] == 0) || ($goods['is_virtual'] == 1 && $goods['virtual_indate'] <= time())) {
			$this->error('此商品不存在或者已下架');
		}
		if (cookie('user_id')) {
			$goodsLogic->add_visit_log(cookie('user_id'), $goods);
		}
		if ($goods['brand_id']) {
			$brnad = M('brand')->where("id", $goods['brand_id'])->find();
			$goods['brand_name'] = $brnad['name'];
		}
		$goods_images_list = M('GoodsImages')->where("goods_id", $goods_id)->select(); // 商品 图册
		$goods_attribute = M('GoodsAttribute')->getField('attr_id,attr_name'); // 查询属性
		$goods_attr_list = M('GoodsAttr')->where("goods_id", $goods_id)->select(); // 查询商品属性表
		$filter_spec = $goodsLogic->get_spec($goods_id);
		$spec_goods_price = M('spec_goods_price')->where("goods_id", $goods_id)->getField("key,price,store_count,item_id"); // 规格 对应 价格 库存表
		$commentStatistics = $goodsLogic->commentStatistics($goods_id); // 获取某个商品的评论统计
		$goods['sale_num'] = M('order_goods')->where(['goods_id' => $goods_id, 'is_send' => 1])->count();
		//当前用户收藏
		$user_id = cookie('user_id');
		$collect = M('goods_collect')->where(array("goods_id" => $goods_id, "user_id" => $user_id))->count();
		$goods_collect_count = M('goods_collect')->where(array("goods_id" => $goods_id))->count(); //商品收藏数
		$point_rate = tpCache('shopping.point_rate');
		$data = [
			'spec_goods_price' => $spec_goods_price, // 规格 对应 价格 库存表
			'goods_attribute' => $goods_attribute, //属性值
			'goods_attr_list' => $goods_attr_list,
			'filter_spec' => $filter_spec,
			'goods_images_list' => $goods_images_list,
			'goods' => $goods->toArray(),
			'point_rate' => $point_rate, //兑换率
		];
		return show(1, '', $data);
		// $this->assign('spec_goods_price', json_encode($spec_goods_price, true)); // 规格 对应 价格 库存表
		// $this->assign('collect', $collect);//收藏
		// $this->assign('commentStatistics', $commentStatistics); //评论概览
		// $this->assign('goods_attribute', $goods_attribute); //属性值
		// $this->assign('goods_attr_list', $goods_attr_list); //属性列表
		// $this->assign('filter_spec', $filter_spec); //规格参数
		// $this->assign('goods_images_list', $goods_images_list); //商品缩略图
		// $this->assign('goods', $goods->toArray());
		// $point_rate = tpCache('shopping.point_rate');
		// $this->assign('goods_collect_count', $goods_collect_count); //商品收藏人数
		// $this->assign('point_rate', $point_rate);
		// return $this->fetch();
	}

}