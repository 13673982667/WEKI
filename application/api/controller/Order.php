<?php

/**
 * @Author: Cui
 * @Date:   2018-08-16 15:56:44
 * @Last Modified by:   Administrator
 * @Last Modified time: 2018-08-23 16:16:41
 */
namespace app\api\controller;
use app\common\logic\OrderLogic;
use app\common\logic\UsersLogic;
use \think\Page;

class Order extends Base {
	public function _initialize() {
		parent::_initialize();
	}

	/**
	 * 订单列表
	 * @return mixed
	 */
	public function order_list() {
		if (!($uId = input('uId'))) {
			return show(2);
		}
		$where = ' user_id=' . $uId;
		//条件搜索
		if (I('get.type')) {
			$where .= C(strtoupper(I('get.type')));
		}
		$where .= ' and prom_type < 5 '; //虚拟订单和拼团订单不列出来
		$count = M('order')->where($where)->count();
		$size = input('size') ? input('size') : 10;
		$Page = new Page($count, $size);
		$show = $Page->show();
		$order_str = "order_id DESC";
		$order_list = M('order')->order($order_str)->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->select();

		//获取订单商品
		$model = new UsersLogic();
		foreach ($order_list as $k => $v) {
			$order_list[$k] = set_btn_order_status($v); // 添加属性  包括按钮显示属性 和 订单状态显示属性
			//$order_list[$k]['total_fee'] = $v['goods_amount'] + $v['shipping_fee'] - $v['integral_money'] -$v['bonus'] - $v['discount']; //订单总额
			$data = $model->get_order_goods($v['order_id']);
			$order_list[$k]['goods_list'] = $data['result'];
			$count_goods_num = 0;
			foreach ($order_list[$k]['goods_list'] as $kk => $vv) {
				$count_goods_num += $vv['goods_num'];
				$order_list[$k]['goods_list'][$kk]['goods_img'] = goods_thum_images($order_list[$k]['goods_list'][$kk]['goods_id'], 200, 200);
			}
			$order_list[$k]['count_goods_num'] = $count_goods_num;
		}
		$data = [
			'order_status' => C('ORDER_STATUS'),
			'shipping_status' => C('SHIPPING_STATUS'),
			'pay_status' => C('PAY_STATUS'),
			'lists' => $order_list,
		];
		if (count($order_list) > 0) {
			return show(1, '', $data);
		}
		return show(0);
		// $this->assign('order_status', C('ORDER_STATUS'));
		// $this->assign('shipping_status', C('SHIPPING_STATUS'));
		// $this->assign('pay_status', C('PAY_STATUS'));
		// $this->assign('page', $show);
		// $this->assign('lists', $order_list);
		// $this->assign('active', 'order_list');
		// $this->assign('active_status', I('get.type'));
		// if ($_GET['is_ajax']) {
		// 	return $this->fetch('ajax_order_list');
		// 	exit;
		// }
		// return $this->fetch();
	}

	/**
	 * 取消订单
	 */
	public function cancel_order() {
		$id = I('get.order_id/d');
		$user_id = i('uId');
		if (!$id || !$user_id) {
			return show();
		}
		//检查是否有积分，余额支付
		$logic = new OrderLogic();
		$data = $logic->cancel_order($user_id, $id);
		// $this->ajaxReturn($data);
		return show($data['status'], $data['msg'], $data['result']);
	}
	/**
	 * 确认收货
	 */
	public function confirm_order() {
		if (!($order_id = input('order_id')) || !($uId = input('uId'))) {
			return show();
		}
		$data = confirm_order($order_id, $uId);
		return show($data['status'], $data['msg'], $data['result']);
	}
}